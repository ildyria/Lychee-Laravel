<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Configs;
use App\ControllerFunctions\ReadAccessFunctions;
use App\Album;
use App\ModelFunctions\AlbumFunctions;
use App\ModelFunctions\SessionFunctions;
use App\Photo;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	/**
	 * @var AlbumFunctions
	 */
	private $albumFunctions;

	/**
	 * @var SessionFunctions
	 */
	private $sessionFunctions;

	/**
	 * @var readAccessFunctions
	 */
	private $readAccessFunctions;

	/**
	 * @param AlbumFunctions      $albumFunctions
	 * @param ReadAccessFunctions $readAccessFunctions
	 */
	public function __construct(AlbumFunctions $albumFunctions, SessionFunctions $sessionFunctions, ReadAccessFunctions $readAccessFunctions)
	{
		$this->albumFunctions = $albumFunctions;
		$this->sessionFunctions = $sessionFunctions;
		$this->readAccessFunctions = $readAccessFunctions;
	}

	/**
	 * Escape special characters for a LIKE query.
	 *
	 * @param string $value
	 * @param string $char
	 *
	 * @return string
	 */
	private static function escape_like(string $value, string $char = '\\'): string
	{
		return str_replace(
			[
				$char,
				'%',
				'_',
			],
			[
				$char . $char,
				$char . '%',
				$char . '_',
			],
			$value
		);
	}

	/**
	 * Given a string split it by spaces to get terms and make a like search on the database.
	 * We search on albums and photos. title, tags, description are considered.
	 * TODO: add search by date.
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function search(Request $request)
	{
		if (!$this->sessionFunctions->is_logged_in() && Configs::get_value('public_search', '0') !== '1') {
			return Response::error('Search disabled.');
		}

		$request->validate([
			'term' => 'required|string',
		]);

		// Initialize return var
		$return = array(
			'photos' => null,
			'albums' => null,
			'hash' => '',
		);

		$terms = explode(' ', $request['term']);

		$escaped_terms = array();

		foreach ($terms as $term) {
			$escaped_terms[] = SearchController::escape_like($term);
		}

		/**
		 * Albums.
		 *
		 * Begin by building a list of all albums and subalbums accessible
		 * from the top level.  This includes password-protected albums
		 * (since they are visible) but not their content.
		 */
		$toplevel = $this->albumFunctions->getToplevelAlbums();
		if ($toplevel === null) {
			return Response::error('I could not find you.');
		}

		$albumIDs = [];
		if ($toplevel['albums'] !== null) {
			foreach ($toplevel['albums'] as $album) {
				$albumIDs[] = $album->id;
				if ($this->readAccessFunctions->album($album->id) === 1) {
					$albumIDs = $this->albumFunctions->get_sub_albums($album, $albumIDs, true);
				}
			}
		}
		if ($toplevel['shared_albums'] !== null) {
			foreach ($toplevel['shared_albums'] as $album) {
				$albumIDs[] = $album->id;
				if ($this->readAccessFunctions->album($album->id) === 1) {
					$albumIDs = $this->albumFunctions->get_sub_albums($album, $albumIDs, true);
				}
			}
		}

		$query = Album::whereIn('id', $albumIDs);
		for ($i = 0; $i < count($escaped_terms); $i++) {
			$escaped_term = $escaped_terms[$i];
			$query = $query->Where(
				function (Builder $query) use ($escaped_term) {
					$query->where('title', 'like', '%' . $escaped_term . '%')
						->orWhere('description', 'like', '%' . $escaped_term . '%');
				});
		}
		$albums = $query->get();
		if ($albums != null) {
			$i = 0;
			foreach ($albums as $album_model) {
				$album = $album_model->prepareData();
				if ($this->readAccessFunctions->album($album_model->id) === 1) {
					$album['albums'] = $this->albumFunctions->get_albums($album_model);
					$album = $album_model->gen_thumbs($album, $this->albumFunctions->get_sub_albums($album_model, [$album_model->id]));
				}
				$return['albums'][$i] = $album;
				$i++;
			}
		}

		/*
		 * Photos.
		 *
		 * Begin by reusing the previously built list of albums.  We need to
		 * eliminate password-protected albums and subalbums from it though,
		 * since we can't access them.
		 */
		for ($i = 0; $i < count($albumIDs);) {
			if ($this->readAccessFunctions->album($albumIDs[$i]) !== 1) {
				array_splice($albumIDs, $i, 1);
			} else {
				$i++;
			}
		}
		$query = Photo::where(
			function (Builder $query) use ($albumIDs) {
				$query->whereIn('album_id', $albumIDs);
				// Add the 'Unsorted' album.
				if ($this->sessionFunctions->is_logged_in()) {
					$id = $this->sessionFunctions->id();
					$user = User::find($id);
					if ($id == 0 || $user->upload) {
						$query = $query->orWhere('album_id', '=', null);
						if ($id !== 0) {
							$query = $query->where('owner_id', '=', $id);
						}
					}
				}
			});
		for ($i = 0; $i < count($escaped_terms); $i++) {
			$escaped_term = $escaped_terms[$i];
			$query = $query->Where(
				function (Builder $query) use ($escaped_term) {
					$query->where('title', 'like', '%' . $escaped_term . '%')
						->orWhere('description', 'like', '%' . $escaped_term . '%')
						->orWhere('tags', 'like', '%' . $escaped_term . '%');
				});
		}
		$photos = $query->get();
		if ($photos != null) {
			$i = 0;
			foreach ($photos as $photo) {
				$return['photos'][$i] = $photo->prepareData();
				$i++;
			}
		}

		// Hash
		$return['hash'] = md5(json_encode($return));

		return $return;
	}
}
