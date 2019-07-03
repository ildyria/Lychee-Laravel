<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Album;
use App\Configs;
use App\ControllerFunctions\ReadAccessFunctions;
use App\Logs;
use App\ModelFunctions\AlbumFunctions;
use App\ModelFunctions\Helpers;
use App\ModelFunctions\PhotoFunctions;
use App\ModelFunctions\SessionFunctions;
use App\ModelFunctions\SymLinkFunctions;
use App\Photo;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipStream\ZipStream;

class PhotoController extends Controller
{
	/**
	 * @var PhotoFunctions
	 */
	private $photoFunctions;

	/**
	 * @var SessionFunctions
	 */
	private $sessionFunctions;

	/**
	 * @var ReadAccessFunctions
	 */
	private $readAccessFunctions;

	private $albumFunctions;

	/**
	 * @var SymLinkFunctions
	 */
	private $symLinkFunctions;

	/**
	 * @param PhotoFunctions      $photoFunctions
	 * @param AlbumFunctions      $albumFunctions
	 * @param SessionFunctions    $sessionFunctions
	 * @param ReadAccessFunctions $readAccessFunctions
	 * @param SymLinkFunctions    $symLinkFunctions
	 */
	public function __construct(
		PhotoFunctions $photoFunctions,
		AlbumFunctions $albumFunctions,
		SessionFunctions $sessionFunctions,
		ReadAccessFunctions $readAccessFunctions,
		SymLinkFunctions $symLinkFunctions
	) {
		$this->photoFunctions = $photoFunctions;
		$this->albumFunctions = $albumFunctions;
		$this->sessionFunctions = $sessionFunctions;
		$this->readAccessFunctions = $readAccessFunctions;
		$this->symLinkFunctions = $symLinkFunctions;
	}

	/**
	 * Given a photoID and albumID returns the data of the photo.
	 *
	 * @param Request $request
	 *
	 * @return array|string
	 */
	public function get(Request $request)
	{
		$request->validate([
			'albumID' => 'string|required',
			'photoID' => 'string|required',
		]);

		$photo = Photo::with('album')->find($request['photoID']);

		// Photo not found?
		if ($photo == null) {
			Logs::error(__METHOD__, __LINE__, 'Could not find specified photo');

			return 'false';
		}

		$return = $photo->prepareData();
		$this->symLinkFunctions->getUrl($photo, $return);
		if (!$this->sessionFunctions->is_current_user($photo->owner_id)) {
			if ($photo->album_id != null) {
				if (!$photo->album->full_photo_visible()) {
					$photo->downgrade($return);
				}
			} else {
				if ($request['albumID'] == 'f' || $request['albumID'] == 'r') {
					if (Configs::get_value('full_photo', '1') != '1') {
						$photo->downgrade($return);
					}
				}
			}
		}

		$return['original_album'] = $return['album'];
		// This way preserves the back button functionality for photos
		// in smart albums.
		$return['album'] = $request['albumID'];

		return $return;
	}

	/**
	 * Return a random public photo (starred)
	 * This is used in the Frame Controller.
	 *
	 * @return string
	 */
	public function getRandom()
	{
		// here we need to refine.

		$photo = Photo::select_stars(Photo::whereIn('album_id',
			$this->albumFunctions->getPublicAlbums()))
			->inRandomOrder()
			->first();

		if ($photo == null) {
			return Response::error('no pictures found!');
		}

		$return = $photo->prepareData();
		$this->symLinkFunctions->getUrl($photo, $return);

		return $return;
	}

	/**
	 * Add a function given an AlbumID.
	 *
	 * @param Request $request
	 *
	 * @return false|string
	 */
	public function add(Request $request)
	{
		$request->validate([
			'albumID' => 'string|required',
			'0' => 'required',
			//            '0.*' => 'image|mimes:jpeg,png,jpg,gif',
			'0.*' => 'image|mimes:jpeg,png,jpg,gif,mov,webm,mp4,ogv',
			//                |max:2048'
		]);

		if (!$request->hasfile('0')) {
			return Response::error('missing files');
		}

		// Only process the first photo in the array
		$file = $request->file('0');

		$nameFile = array();
		$nameFile['name'] = $file->getClientOriginalName();
		$nameFile['type'] = $file->getMimeType();
		$nameFile['tmp_name'] = $file->getPathName();

		return $this->photoFunctions->add($nameFile, $request['albumID']);
	}

	/**
	 * Change the title of a photo.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setTitle(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
			'title' => 'required|string|max:100',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$no_error = true;
		foreach ($photos as $photo) {
			$photo->title = $request['title'];
			$no_error |= $photo->save();
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Set if a photo is a favorite.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setStar(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$no_error = true;
		foreach ($photos as $photo) {
			$photo->star = ($photo->star != 1) ? 1 : 0;
			$no_error |= $photo->save();
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Set the description of a photo.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setDescription(Request $request)
	{
		$request->validate([
			'photoID' => 'required|string',
			'description' => 'string|nullable',
		]);

		$photo = Photo::find($request['photoID']);

		// Photo not found?
		if ($photo == null) {
			Logs::error(__METHOD__, __LINE__, 'Could not find specified photo');

			return 'false';
		}

		$photo->description = $request['description'];

		return $photo->save() ? 'true' : 'false';
	}

	/**
	 * Define if a photo is public.
	 * We do not advise the use of this and would rather see people use albums visibility
	 * This would highly simplify the code if we remove this. Do we really want to keep it ?
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setPublic(Request $request)
	{
		$request->validate([
			'photoID' => 'required|string',
		]);

		$photo = Photo::find($request['photoID']);

		// Photo not found?
		if ($photo == null) {
			Logs::error(__METHOD__, __LINE__, 'Could not find specified photo');

			return 'false';
		}

		$photo->public = $photo->public != 1 ? 1 : 0;

		return $photo->save() ? 'true' : 'false';
	}

	/**
	 * Set the tags of a photo.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setTags(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
			'tags' => 'string|nullable',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$no_error = true;
		foreach ($photos as $photo) {
			$photo->tags = ($request['tags'] !== null ? $request['tags'] : '');
			$no_error &= $photo->save();
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Define the album of a photo.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function setAlbum(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
			'albumID' => 'required|string',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$albumID = $request['albumID'];

		$album = null;
		if ($albumID !== '0') {
			// just to be sure to handle ownership changes in the process.
			$album = Album::find($albumID);
			if ($album === null) {
				Logs::error(__METHOD__, __LINE__,
					'Could not find specified album');

				return false;
			}
		}

		$no_error = true;
		$takestamp = [];
		foreach ($photos as $photo) {
			$oldAlbumID = $photo->album_id;

			$photo->album_id = ($albumID == '0') ? null : $albumID;
			if ($album !== null) {
				$photo->owner_id = $album->owner_id;
				$takestamp[] = $photo->takestamp;
			}
			$no_error &= $photo->save();

			if ($oldAlbumID !== null) {
				$oldAlbum = Album::find($oldAlbumID);
				if ($oldAlbum === null) {
					Logs::error(__METHOD__, __LINE__,
						'Could not find an album');
					$no_error = false;
				}
				$no_error &= $oldAlbum->update_takestamps([$photo->takestamp],
					false);
			}
		}
		if ($album !== null) {
			$no_error &= $album->update_takestamps($takestamp, true);
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Define the license of the photo.
	 *
	 * @param Request $request
	 *
	 * @return false|string
	 */
	public function setLicense(Request $request)
	{
		$request->validate([
			'photoID' => 'required|string',
			'license' => 'required|string',
		]);

		$photo = Photo::find($request['photoID']);

		// Photo not found?
		if ($photo == null) {
			Logs::error(__METHOD__, __LINE__, 'Could not find specified photo');

			return 'false';
		}

		$licenses = [
			'none',
			'reserved',
			'CC0',
			'CC-BY',
			'CC-BY-ND',
			'CC-BY-SA',
			'CC-BY-NC',
			'CC-BY-NC-ND',
			'CC-BY-NC-SA',
		];
		$found = false;
		$i = 0;
		while (!$found && $i < count($licenses)) {
			if ($licenses[$i] == $request['license']) {
				$found = true;
			}
			$i++;
		}
		if (!$found) {
			Logs::error(__METHOD__, __LINE__,
				'wrong kind of license: ' . $request['license']);

			return Response::error('wrong kind of license!');
		}

		$photo->license = $request['license'];

		return $photo->save() ? 'true' : 'false';
	}

	/**
	 * Delete a photo.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function delete(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$no_error = true;
		$albums = [];
		$takestamp = [];

		foreach ($photos as $photo) {
			$no_error &= $photo->predelete();

			if ($photo->album_id !== null) {
				$albums[] = $photo->album;
				$takestamp[] = $photo->takestamp;
			}

			$no_error &= $photo->delete();
		}

		// TODO: ideally we would like to avoid duplicates here...
		for ($i = 0; $i < count($albums); $i++) {
			$no_error &= $albums[$i]->update_takestamps([$takestamp[$i]],
				false);
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Duplicate a photo.
	 * Only the SQL entry is duplicated for space reason.
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function duplicate(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
		]);

		$photos = Photo::whereIn('id', explode(',', $request['photoIDs']))
			->get();

		$no_error = true;
		foreach ($photos as $photo) {
			$duplicate = new Photo();
			$duplicate->title = $photo->title;
			$duplicate->description = $photo->description;
			$duplicate->url = $photo->url;
			$duplicate->tags = $photo->tags;
			$duplicate->public = $photo->public;
			$duplicate->type = $photo->type;
			$duplicate->width = $photo->width;
			$duplicate->height = $photo->height;
			$duplicate->size = $photo->size;
			$duplicate->iso = $photo->iso;
			$duplicate->aperture = $photo->aperture;
			$duplicate->make = $photo->make;
			$duplicate->model = $photo->model;
			$duplicate->lens = $photo->lens;
			$duplicate->shutter = $photo->shutter;
			$duplicate->focal = $photo->focal;
			$duplicate->latitude = $photo->latitude;
			$duplicate->longitude = $photo->longitude;
			$duplicate->altitude = $photo->altitude;
			$duplicate->takestamp = $photo->takestamp;
			$duplicate->star = $photo->star;
			$duplicate->thumbUrl = $photo->thumbUrl;
			$duplicate->thumb2x = $photo->thumb2x;
			$duplicate->album_id = $photo->album_id;
			$duplicate->checksum = $photo->checksum;
			$duplicate->medium = $photo->medium;
			$duplicate->medium2x = $photo->medium2x;
			$duplicate->small = $photo->small;
			$duplicate->small2x = $photo->small2x;
			$duplicate->owner_id = $photo->owner_id;
			$no_error &= $duplicate->save();
		}

		return $no_error ? 'true' : 'false';
	}

	/**
	 * Return a photo as an archive just to annoy @SerenaButler.
	 *
	 * @param Request $request
	 *
	 * @return Response|void
	 */
	public function getArchive(Request $request)
	{
		$request->validate([
			'photoIDs' => 'required|string',
			'kind' => 'nullable|string',
		]);

		$photoIDs = explode(',', $request['photoIDs']);

		$extract_names = function ($photoID) use ($request) {
			// Illicit chars
			$badChars = array_merge(
				array_map('chr', range(0, 31)),
				array(
					'<',
					'>',
					':',
					'"',
					'/',
					'\\',
					'|',
					'?',
					'*',
				)
			);

			$photo = Photo::with('album')->find($photoID);

			if ($photo == null) {
				Logs::error(__METHOD__, __LINE__, 'Could not find specified photo');

				return null;
			}

			$title = str_replace($badChars, '', $photo->title);
			if ($title === '') {
				$title = 'Untitled';
			}

			// determine the file based on given size
			switch ($request['kind']) {
				case 'MEDIUM':
					if (strpos($photo->type, 'video') !== 0) {
						$url = Config::get('defines.dirs.LYCHEE_UPLOADS_MEDIUM')
							. $photo->url;
					} else {
						$url = Config::get('defines.dirs.LYCHEE_UPLOADS_MEDIUM')
							. $photo->thumbUrl;
					}
					$kind = '-' . $photo->medium;
					break;
				case 'SMALL':
					if (strpos($photo->type, 'video') !== 0) {
						$url = Config::get('defines.dirs.LYCHEE_UPLOADS_SMALL')
							. $photo->url;
					} else {
						$url = Config::get('defines.dirs.LYCHEE_UPLOADS_SMALL')
							. $photo->thumbUrl;
					}
					$kind = '-' . $photo->small;
					break;
				default:
					$url = Config::get('defines.dirs.LYCHEE_UPLOADS_BIG')
						. $photo->url;
					$kind = '';
					break;
			}

			// Check the file actually exists
			if (!file_exists($url)) {
				Logs::error(__METHOD__, __LINE__, 'File is missing: ' . $url . ' (' . $title . ')');

				return null;
			}

			// Get extension of image
			$extension = Helpers::getExtension($url, false);

			return array($title, $kind, $extension, $url);
		};

		if (count($photoIDs) === 1) {
			$ret = $extract_names($photoIDs[0]);
			if ($ret === null) {
				return abort(404);
			}

			list($title, $kind, $extension, $url) = $ret;

			// Set title for photo
			$file = $title . $kind . $extension;

			$response = new BinaryFileResponse($url);
			$response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $file);
		} else {
			$response = new StreamedResponse(function () use ($request, $photoIDs, &$extract_names) {
				$zip = new ZipStream(null);

				$files = [];
				foreach ($photoIDs as $photoID) {
					$ret = $extract_names($photoID);
					if ($ret == null) {
						return abort(404);
					}

					list($title, $kind, $extension, $url) = $ret;

					// Set title for photo
					$file = $title . $kind . $extension;
					// Check for duplicates
					if (!empty($files)) {
						$i = 1;
						$tmp_file = $file;
						while (in_array($tmp_file, $files)) {
							// Set new title for photo
							$tmp_file = $title . $kind . '-' . $i . $extension;
							$i++;
						}
						$file = $tmp_file;
					}
					// Add to array
					$files[] = $file;

					$zip->addFileFromPath($file, $url);
				} // foreach ($photoIDs)

				// finish the zip stream
				$zip->finish();
			});

			// Set file type and destination
			$response->headers->set('Content-Type', 'application/x-zip');
			$disposition = HeaderUtils::makeDisposition(HeaderUtils::DISPOSITION_ATTACHMENT, 'Photos.zip');
			$response->headers->set('Content-Disposition', $disposition);
		}

		// Disable caching
		$response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
		$response->headers->set('Pragma', 'no-cache');
		$response->headers->set('Expires', '0');

		return $response;
	}

	/**
	 * GET to manually clear the symlinks.
	 *
	 * @return string
	 */
	public function clearSymLink()
	{
		return $this->symLinkFunctions->clearSymLink();
	}
}
