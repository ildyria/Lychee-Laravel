<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App;

use App\SymLink;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Storage;

/**
 * App\Album.
 *
 * @property int         $id
 * @property string      $title
 * @property int         $owner_id
 * @property int|null    $parent_id
 * @property string      $description
 * @property Carbon|null $min_takestamp
 * @property Carbon|null $max_takestamp
 * @property int         $public
 * @property int         $visible_hidden
 * @property int         $downloadable
 * @property string|null $password
 * @property string      $license
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Album[]     $children
 * @property User        $owner
 * @property Album       $parent
 * @property Photo[]     $photos
 *
 * @method static Builder|Album newModelQuery()
 * @method static Builder|Album newQuery()
 * @method static Builder|Album query()
 * @method static Builder|Album whereCreatedAt($value)
 * @method static Builder|Album whereDescription($value)
 * @method static Builder|Album whereDownloadable($value)
 * @method static Builder|Album whereId($value)
 * @method static Builder|Album whereLicense($value)
 * @method static Builder|Album whereMaxTakestamp($value)
 * @method static Builder|Album whereMinTakestamp($value)
 * @method static Builder|Album whereOwnerId($value)
 * @method static Builder|Album whereParentId($value)
 * @method static Builder|Album wherePassword($value)
 * @method static Builder|Album wherePublic($value)
 * @method static Builder|Album whereTitle($value)
 * @method static Builder|Album whereUpdatedAt($value)
 * @method static Builder|Album whereVisibleHidden($value)
 * @mixin Eloquent
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\User[] $shared_with
 */
class Album extends Model
{
	protected $dates = [
		'created_at',
		'updated_at',
		'min_takestamp',
		'max_takestamp',
	];

	protected $casts = [
		'public' => 'int',
		'visible_hidden' => 'int',
		'downloadable' => 'int',
	];

	/**
	 * Return the relationship between Photos and their Album.
	 *
	 * @return HasMany
	 */
	public function photos()
	{
		return $this->hasMany('App\Photo', 'album_id', 'id');
	}

	/**
	 * Return the relationship between an album and its owner.
	 *
	 * @return BelongsTo
	 */
	public function owner()
	{
		return $this->belongsTo('App\User', 'owner_id', 'id')->withDefault([
			'id' => 0,
			'username' => 'Admin',
		]);
	}

	/**
	 * Return the relationship between an album and its sub albums.
	 *
	 * @return HasMany
	 */
	public function children()
	{
		return $this->hasMany('App\Album', 'parent_id', 'id');
	}

	/**
	 * Return the relationship between a sub album and its parent.
	 *
	 * @return BelongsTo
	 */
	public function parent()
	{
		return $this->belongsTo('App\Album', 'parent_id', 'id');
	}

	/**
	 * @return BelongsToMany
	 */
	public function shared_with()
	{
		return $this->belongsToMany('App\User', 'user_album', 'album_id', 'user_id');
	}

	/**
	 * Returns album-attributes into a front-end friendly format. Note that some attributes remain unchanged.
	 *
	 * @return array
	 */
	public function prepareData()
	{
		// Init
		$album = array();

		// Set unchanged attributes
		$album['id'] = $this->id;
		$album['title'] = $this->title;
		$album['public'] = strval($this->public);
		$album['hidden'] = strval($this->visible_hidden);
		$album['parent_id'] = $this->parent_id;

		// Additional attributes
		// Only part of $album when available
		$album['description'] = strval($this->description);
		$album['visible'] = strval($this->visible_hidden);
		$album['downloadable'] = strval($this->downloadable);

		// Parse date
		$album['sysdate'] = $this->created_at->format('F Y');
		$album['min_takestamp'] = $this->min_takestamp == null ? '' : $this->min_takestamp->format('M Y');
		$album['max_takestamp'] = $this->max_takestamp == null ? '' : $this->max_takestamp->format('M Y');

		// Parse password
		$album['password'] = ($this->password == '' ? '0' : '1');

		$album['license'] = $this->license == 'none' ? Configs::get_value('default_license') : $this->license;

		$album['owner'] = $this->owner->username;

		$album['thumbs'] = array();
		$album['thumbs2x'] = array();
		$album['types'] = array();

		return $album;
	}

	/**
	 * get the thumbs of an album.
	 *
	 * @param array $return
	 * @param array $album_list
	 *
	 * @return array
	 */
	public function gen_thumbs($return, $album_list)
	{
		$photos = Photo::whereIn('album_id', $album_list)
			->orderBy('star', 'DESC')
			->orderBy(Configs::get_value('sortingPhotos_col'), Configs::get_value('sortingPhotos_order'))
			->limit(3)->get();

		// For each thumb
		$k = 0;
		foreach ($photos as $photo) {
			$sym = null;
			if (Storage::getDefaultDriver() != 's3') {
				$sym = SymLink::where('photo_id', $photo->id)->orderBy('created_at', 'DESC')->first();
				if ($sym == null) {
					$sym = new SymLink();
					$sym->set($photo);
					$sym->save();
				}
			}
			$return['thumbs'][$k] = ($sym !== null ?  $sym->get('thumb') : Storage::url('thumb/' . $photo->thumbUrl));
			if ($photo->thumb2x == '1') {
				if ($sym !== null) {
					$return['thumbs2x'][$k] = $sym->get('thumb2x');
				} else {
					$thumbUrl2x = explode('.', $photo->thumbUrl);
					$thumbUrl2x = $thumbUrl2x[0] . '@2x.' . $thumbUrl2x[1];
					$return['thumbs2x'][$k] = Storage::url('thumb/' . $thumbUrl2x);
				}
			} else {
				$return['thumbs2x'][$k] = '';
			}
			$return['types'][$k] = $photo->type;
			$k++;
		}

		return $return;
	}

	/**
	 * Recursively go through each sub album and build a list of them.
	 *
	 * @param array $return
	 *
	 * @return array
	 */
	private function get_all_sub_albums($return = array())
	{
		foreach ($this->children as $album) {
			$return[] = $album->id;
			$return = $album->get_all_sub_albums($return);
		}

		return $return;
	}

	/**
	 * Given a password, check if it matches albums password.
	 *
	 * @param string $password
	 *
	 * @return bool returns when album is public
	 */
	public function checkPassword(string $password)
	{
		// album password is empty or input is correct.
		return $this->password == '' || Hash::check($password, $this->password);
	}

	/**
	 * Go through each sub album and update the minimum and maximum takestamp of the pictures.
	 * This is expensive and not normally necessary so we only use it
	 * during migration.
	 */
	private function update_min_max_takestamp()
	{
		$album_list = $this->get_all_sub_albums([$this->id]);

		$min = Photo::whereIn('album_id', $album_list)->min('takestamp');
		$max = Photo::whereIn('album_id', $album_list)->max('takestamp');
		$this->min_takestamp = $min;
		$this->max_takestamp = $max;
	}

	/**
	 * Update album's min_takestamp and max_takestamp based on changes made
	 * to the album content.  If needed, recursively updates parent album(s).
	 *
	 * @param array $takestamps: an array with the takestamps of changed
	 *                           elements; for albums needs to include both min and max takestamps
	 *                           (including null elements in the array is safe)
	 * @param bool  $adding:     true if adding new content, false if removing
	 *
	 * @return bool: true if successful
	 */
	public function update_takestamps(array $takestamps, bool $adding)
	{
		// Begin by calculating min and max takestamps from the array.
		// The array may contain null values, which is why we can't use the
		// built-in min() function for this (it will always return null if
		// present).  For consistency, we don't use the built-in max()
		// either.
		$minTS = $maxTS = null;
		foreach ($takestamps as $takestamp) {
			if ($takestamp !== null) {
				if ($minTS === null || $minTS > $takestamp) {
					$minTS = $takestamp;
				}
				if ($maxTS === null || $maxTS < $takestamp) {
					$maxTS = $takestamp;
				}
			}
		}
		if ($minTS === null || $maxTS === null) {
			return true;
		}

		$no_error = true;
		$changed = false;

		if ($adding) {
			// Adding is easy: essentially a single operation per takestamp.
			if ($this->min_takestamp === null || $this->min_takestamp > $minTS) {
				$this->min_takestamp = $minTS;
				$changed = true;
			}
			if ($this->max_takestamp === null || $this->max_takestamp < $maxTS) {
				$this->max_takestamp = $maxTS;
				$changed = true;
			}
		} else {
			// We're removing.  That can be more complicated, requiring us
			// to rescan the content at the current level to find the new
			// min/max.
			if ($this->min_takestamp == $minTS) {
				$min_photos = Photo::where('album_id', '=', $this->id)->whereNotNull('takestamp')->min('takestamp');
				$min_albums = Album::where('parent_id', '=', $this->id)->whereNotNull('min_takestamp')->min('min_takestamp');
				if ($min_photos !== null && $min_albums !== null) {
					$this->min_takestamp = min($min_photos, $min_albums);
				} elseif ($min_photos !== null) {
					$this->min_takestamp = $min_photos;
				} else {
					$this->min_takestamp = $min_albums;
				}
				$changed = true;
			}
			if ($this->max_takestamp == $maxTS) {
				$max_photos = Photo::where('album_id', '=', $this->id)->whereNotNull('takestamp')->max('takestamp');
				$max_albums = Album::where('parent_id', '=', $this->id)->whereNotNull('max_takestamp')->max('max_takestamp');
				if ($max_photos !== null && $max_albums !== null) {
					$this->max_takestamp = max($max_photos, $max_albums);
				} elseif ($max_photos !== null) {
					$this->max_takestamp = $max_photos;
				} else {
					$this->max_takestamp = $max_albums;
				}
				$changed = true;
			}
		}

		if ($changed) {
			$no_error &= $this->save();

			// Since we changed our takestamps, we need to recursively ascend
			// up the album tree to give the parent albums a chance to
			// update their takestamps as well.
			if ($this->parent_id !== null) {
				$no_error &= $this->parent->update_takestamps([$minTS, $maxTS], $adding);
			}
		}

		return $no_error;
	}

	/**
	 * Recalculate takestamps of all albums in the database.
	 * This is expensive and not normally necessary so we only use it
	 * during migration.
	 */
	public static function reset_takestamp()
	{
		$albums = Album::all();
		foreach ($albums as $album) {
			$album->update_min_max_takestamp();
			$album->save();
		}
	}

	/**
	 * Given a user, retrieve all the shared albums it can see.
	 * TODO: Move this function to another file.
	 *
	 * @param $id
	 *
	 * @return Album[]
	 */
	public static function get_albums_user($id)
	{
		return Album::with([
			'owner',
			'children',
		])
			->where('owner_id', '<>', $id)
			->where('parent_id', '=', null)
			->Where(
				function (Builder $query) use ($id) {
					// album is shared with user
					$query->whereIn('id', function (QBuilder $query) use ($id) {
						$query->select('album_id')
							->from('user_album')
							->where('user_id', '=', $id);
					})
						// or album is visible to user
						->orWhere(
							function (Builder $query) {
								$query->where('public', '=', true)->where('visible_hidden', '=', true);
							});
				})
			->orderBy('owner_id', 'ASC')
			->orderBy(Configs::get_value('sortingAlbums_col'), Configs::get_value('sortingAlbums_order'))
			->get();
	}

	/**
	 * Given two list of albums, merge them without duplicates.
	 * Current complexity is in O(n^2)
	 * TODO: Move this function to another file.
	 * FIXME: Is this function even used anywhere?  AlbumController has its
	 * own merge()...
	 *
	 * @param Album[] $albums1
	 * @param Album[] $albums2
	 *
	 * @return array
	 */
	public static function merge(array $albums1, array $albums2)
	{
		$return = $albums1;

		foreach ($albums2 as $album2_t) {
			$found = false;
			foreach ($albums1 as $album1_t) {
				if ($album1_t->id == $album2_t->id) {
					$found = true;
					break;
				}
			}

			if (!$found) {
				$return[] = $album2_t;
			}
		}

		return $return;
	}

	/**
	 * Before calling delete() to remove the album from the database
	 * we need to go through each sub album and delete it.
	 * Idem we also delete each pictures inside an album (recursively).
	 *
	 * @return bool|null
	 *
	 * @throws Exception
	 */
	public function predelete()
	{
		$no_error = true;
		$albums = $this->children;

		foreach ($albums as $album) {
			$no_error &= $album->predelete();
			$no_error &= $album->delete();
		}

		$photos = $this->photos;
		foreach ($photos as $photo) {
			$no_error &= $photo->predelete();
			$no_error &= $photo->delete();
		}

		return $no_error;
	}
}
