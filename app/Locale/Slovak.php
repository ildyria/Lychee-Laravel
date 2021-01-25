<?php

namespace App\Locale;

use App\Contracts\Language;

final class Slovak implements Language
{
	public function code(): string
	{
		return 'sk';
	}

	public function get_locale(): array
	{
		$locale = [
			'USERNAME' => 'Meno užívateľa',
			'PASSWORD' => 'Heslo',
			'ENTER' => 'Zadať',
			'CANCEL' => 'Prerušiť',
			'SIGN_IN' => 'Prihlásiť',
			'CLOSE' => 'Zatvoriť',
			'SETTINGS' => 'Nastavenia',
			'SEARCH' => 'Hľadaj ...',
			'MORE' => 'Viac',
			'DEFAULT' => 'Default',

			'USERS' => 'Užívatelia',
			'U2F' => 'U2F',
			'SHARING' => 'Zdieľanie',
			'CHANGE_LOGIN' => 'Zmena prihlásenia',
			'CHANGE_SORTING' => 'Zmena zoraďovania',
			'SET_DROPBOX' => 'Dropbox nastaviť',
			'ABOUT_LYCHEE' => 'O Lychee',
			'DIAGNOSTICS' => 'Diagnostika',
			'DIAGNOSTICS_GET_SIZE' => 'Request space usage',
			'LOGS' => 'Protokoly',
			'SIGN_OUT' => 'Odhlásiť',
			'UPDATE_AVAILABLE' => 'Update je k dispozícii!',
			'MIGRATION_AVAILABLE' => 'Migration available!',
			'DEFAULT_LICENSE' => 'Predvolená licencia pre nové',
			'SET_LICENSE' => 'Použiť licenciu',
			'SET_OVERLAY_TYPE' => 'Nastaviť typ overlay',
			'SET_MAP_PROVIDER' => 'Set OpenStreetMap tiles provider',
			'SAVE_RISK' => 'Zmeny uložiť, riziko je známe!',

			'SMART_ALBUMS' => 'Inteligentné albumy',
			'SHARED_ALBUMS' => 'Zdieľané albumy',
			'ALBUMS' => 'Albumy',
			'PHOTOS' => 'Obrázky',
			'SEARCH_RESULTS' => 'Search results',

			'RENAME' => 'Premenovať',
			'RENAME_ALL' => 'Premenovať vybrané',
			'MERGE' => 'Zlúčiť',
			'MERGE_ALL' => 'Zlúčiť vybrané',
			'MAKE_PUBLIC' => 'Publikovať',
			'SHARE_ALBUM' => 'Album zdieľať',
			'SHARE_PHOTO' => 'Foto zdieľať',
			'VISIBILITY_ALBUM' => 'Album Visibility',
			'VISIBILITY_PHOTO' => 'Photo Visibility',
			'DOWNLOAD_ALBUM' => 'Album stiahnuť',
			'ABOUT_ALBUM' => 'O Albume',
			'DELETE_ALBUM' => 'Album zmazať',
			'MOVE_ALBUM' => 'Album presunúť',
			'FULLSCREEN_ENTER' => 'Celá obrazovka',
			'FULLSCREEN_EXIT' => 'Opustiť celú obrazovku',

			'SHARING_ALBUM_USERS' => 'Share this album with users',
			'WAIT_FETCH_DATA' => 'Please wait while we get the data.',
			'SHARING_ALBUM_USERS_NO_USERS' => "There's no user to share the album with.",
			'SHARING_ALBUM_USERS_LONG_MESSAGE' => 'Select the users to share this album with them',

			'DELETE_ALBUM_QUESTION' => 'Album a obrázky zmazať',
			'KEEP_ALBUM' => 'Album ponechať',
			'DELETE_ALBUM_CONFIRMATION_1' => 'Ste si istý, že chcete album',
			'DELETE_ALBUM_CONFIRMATION_2' => 'a všetky obrázky v ňom zmazať? Táto akcia je nevratná!',

			'DELETE_ALBUMS_QUESTION' => 'Všetky albumy a obrázky zmazať',
			'KEEP_ALBUMS' => 'Albumy ponechať',
			'DELETE_ALBUMS_CONFIRMATION_1' => 'Ste si istý, že chcete všetky',
			'DELETE_ALBUMS_CONFIRMATION_2' => 'vybrané albumy a všetky obrázky v nich zmazať? Táto akcia je nevratná!',

			'DELETE_UNSORTED_CONFIRM' => 'Ste si istý, že chcete všetky obrázky z \'Netriedené\' zmazať?<br>Táto akcia je nevratná!',
			'CLEAR_UNSORTED' => 'Netriedené zmazať',
			'KEEP_UNSORTED' => 'Netriedené ponechať',

			'EDIT_SHARING' => 'Upraviť zdieľanie',
			'MAKE_PRIVATE' => 'Súkromné',

			'CLOSE_ALBUM' => 'Album zavrieť',
			'CLOSE_PHOTO' => 'Foto Zavrieť',
			'CLOSE_MAP' => 'Close Map',

			'ADD' => 'Pridať',
			'MOVE' => 'Presunúť',
			'MOVE_ALL' => 'Presunúť vybrané',
			'DUPLICATE' => 'Duplikovať',
			'DUPLICATE_ALL' => 'Duplikovať vybrané',
			'COPY_TO' => 'Kopírovať do...',
			'COPY_ALL_TO' => 'Kopírovať vybrané do...',
			'DELETE' => 'Zmazať',
			'DELETE_ALL' => 'Zmazať vybrané',
			'DOWNLOAD' => 'Stiahnuť',
			'DOWNLOAD_ALL' => 'Stiahnuť vybrané',
			'UPLOAD_PHOTO' => 'Foto nahrať',
			'IMPORT_LINK' => 'Importovať z linku',
			'IMPORT_DROPBOX' => 'Importovať z Dropbox',
			'IMPORT_SERVER' => 'Importovať zo servera',
			'NEW_ALBUM' => 'Nový album',
			'NEW_TAG_ALBUM' => 'New Tag Album',

			'TITLE_NEW_ALBUM' => 'Zadajte názov pre nový album:',
			'UNTITLED' => 'Bez názvu',
			'UNSORTED' => 'Netriedený',
			'STARRED' => 'Obľúbený',
			'RECENT' => 'Naposledy použitý',
			'PUBLIC' => 'Verejný',
			'NUM_PHOTOS' => 'obrázkov',

			'CREATE_ALBUM' => 'Album vytvoriť',
			'CREATE_TAG_ALBUM' => 'Create Tag Album',

			'STAR_PHOTO' => 'Obrázok označiť ako obľúbený',
			'STAR' => 'označiť ako obľúbené',
			'STAR_ALL' => 'všetky označiť ako obľúbené',
			'TAGS' => 'Štítky',
			'TAGS_ALL' => 'Štítky pre všetky',
			'UNSTAR_PHOTO' => 'Obrázok odstrániť z obľúbených',
			'SET_COVER' => 'Set Album Cover',
			'REMOVE_COVER' => 'Remove Album Cover',

			'FULL_PHOTO' => 'Otvoriť originál',
			'ABOUT_PHOTO' => 'O tomto obrázku',
			'DISPLAY_FULL_MAP' => 'Map',
			'DIRECT_LINK' => 'Priamy link',
			'DIRECT_LINKS' => 'Priame linky',

			'ALBUM_ABOUT' => 'O albume',
			'ALBUM_BASICS' => 'Základné informácie',
			'ALBUM_TITLE' => 'Názov',
			'ALBUM_NEW_TITLE' => 'Zadajte nový názov pre tento album:',
			'ALBUMS_NEW_TITLE_1' => 'Zadajte názov pre všetky',
			'ALBUMS_NEW_TITLE_2' => 'vybrané albumy:',
			'ALBUM_SET_TITLE' => 'Názov uložiť',
			'ALBUM_DESCRIPTION' => 'Popis',
			'ALBUM_SHOW_TAGS' => 'Tags to show',
			'ALBUM_NEW_DESCRIPTION' => 'Zadajte nový popis pre tento album:',
			'ALBUM_SET_DESCRIPTION' => 'Popis uložiť',
			'ALBUM_NEW_SHOWTAGS' => 'Enter tags of photos that will be visible in this album:',
			'ALBUM_SET_SHOWTAGS' => 'Set tags to show',
			'ALBUM_ALBUM' => 'Album',
			'ALBUM_CREATED' => 'Vytvorené',
			'ALBUM_IMAGES' => 'Obrázky',
			'ALBUM_VIDEOS' => 'Videá',
			'ALBUM_SUBALBUMS' => 'Subalbumy',
			'ALBUM_SHARING' => 'Zdieľanie',
			'ALBUM_SHR_YES' => 'Áno',
			'ALBUM_SHR_NO' => 'Nie',
			'ALBUM_PUBLIC' => 'Verejný',
			'ALBUM_PUBLIC_EXPL' => 'Album je viditeľný pre iných, podlieha nasledovným obmedzeniam.',
			'ALBUM_FULL' => 'Originál',
			'ALBUM_FULL_EXPL' => 'K dispozícii aj v plnom rozlíšení.',
			'ALBUM_HIDDEN' => 'Skrytý',
			'ALBUM_HIDDEN_EXPL' => 'Album viditeľný len cez priamy link.',
			'ALBUM_MARK_NSFW' => 'Mark album as sensitive',
			'ALBUM_UNMARK_NSFW' => 'Unmark album as sensitive',
			'ALBUM_NSFW' => 'Sensitive',
			'ALBUM_NSFW_EXPL' => 'Album is marked to contain sensitive content.',
			'ALBUM_DOWNLOADABLE' => 'Stiahnuteľný',
			'ALBUM_DOWNLOADABLE_EXPL' => 'Návštevníci môžu album stiahnuť.',
			'ALBUM_SHARE_BUTTON_VISIBLE' => 'Share button is visible',
			'ALBUM_SHARE_BUTTON_VISIBLE_EXPL' => 'Display social media sharing links.',
			'ALBUM_PASSWORD' => 'Heslo',
			'ALBUM_PASSWORD_PROT' => 'Chránené heslom',
			'ALBUM_PASSWORD_PROT_EXPL' => 'Album viditeľný len s platným heslom.',
			'ALBUM_PASSWORD_REQUIRED' => 'Tento album je chránený heslom. Zadajte heslo:',
			'ALBUM_MERGE_1' => 'Ste si istý, že chcete album',
			'ALBUM_MERGE_2' => 's týmto albumom zlúčiť?',
			'ALBUMS_MERGE' => 'Ste si istý, že chcete všetky vybrané albumy s týmto albumom zlúčiť?',
			'MERGE_ALBUM' => 'Albumy zlúčiť',
			'DONT_MERGE' => 'Nezlučovať',
			'ALBUM_MOVE_1' => 'Ste si istý, že chcete album',
			'ALBUM_MOVE_2' => 'presunúť do nasledujúceho albumu?',
			'ALBUMS_MOVE' => 'Ste si istý, že chcete všetky vybrané albumy presunúť do nasledovného albumu?',
			'MOVE_ALBUMS' => 'Albumy presunúť',
			'NOT_MOVE_ALBUMS' => 'Nepresúvať',
			'ROOT' => 'Albumy',
			'ALBUM_REUSE' => 'Použiť znova',
			'ALBUM_LICENSE' => 'Licencia',
			'ALBUM_SET_LICENSE' => 'Licenciu určiť',
			'ALBUM_LICENSE_HELP' => 'Potrebujete pomoc pri výbere?',
			'ALBUM_LICENSE_NONE' => 'Žiadna',
			'ALBUM_RESERVED' => 'Všetky práva vyhradené',
			'ALBUM_SET_ORDER' => 'Set Order',
			'ALBUM_ORDERING' => 'Order by',

			'PHOTO_ABOUT' => 'O obrázku',
			'PHOTO_BASICS' => 'Základné informácie',
			'PHOTO_TITLE' => 'Názov',
			'PHOTO_NEW_TITLE' => 'Zadajte nový názov pre tento obrázok:',
			'PHOTO_SET_TITLE' => 'Názov uložiť',
			'PHOTO_UPLOADED' => 'Nahratie',
			'PHOTO_DESCRIPTION' => 'Popis',
			'PHOTO_NEW_DESCRIPTION' => 'Zadajte nový popis pre tento obrázok:',
			'PHOTO_SET_DESCRIPTION' => 'Popis uložiť',
			'PHOTO_NEW_LICENSE' => 'Pridať novú licenciu',
			'PHOTO_SET_LICENSE' => 'Určiť licenciu',
			'PHOTO_LICENSE' => 'Licencia',
			'PHOTO_REUSE' => 'Opakované použitie',
			'PHOTO_LICENSE_NONE' => 'žiadne',
			'PHOTO_RESERVED' => 'Všetky práva vyhradené',
			'PHOTO_LATITUDE' => 'Zemepisná šírka',
			'PHOTO_LONGITUDE' => 'Zemepisná dĺžka',
			'PHOTO_ALTITUDE' => 'Nadmorská výška',
			'PHOTO_IMGDIRECTION' => 'Smer',
			'PHOTO_LOCATION' => 'Location',
			'PHOTO_IMAGE' => 'Obrázok',
			'PHOTO_VIDEO' => 'Video',
			'PHOTO_SIZE' => 'Veľkosť',
			'PHOTO_FORMAT' => 'Formát',
			'PHOTO_RESOLUTION' => 'Rozlíšenie',
			'PHOTO_DURATION' => 'Trvanie',
			'PHOTO_FPS' => 'Počet snímkov/s',
			'PHOTO_TAGS' => 'Štítky',
			'PHOTO_NOTAGS' => 'Žiadne štítky',
			'PHOTO_NEW_TAGS' => 'Zadajte štítky pre tento obrázok. Jednotlivé štítky oddeľte čiarkou:',
			'PHOTO_NEW_TAGS_1' => 'Zadajte štítky pre všetky',
			'PHOTO_NEW_TAGS_2' => 'vybrané obrázky. Doterajšie štítky budú prepísané.Jednotlivé štítky oddeľte čiarkou:',
			'PHOTO_SET_TAGS' => 'Štítky uložiť',
			'PHOTO_CAMERA' => 'Kamera',
			'PHOTO_CAPTURED' => 'Zosnímané',
			'PHOTO_MAKE' => 'Značka',
			'PHOTO_TYPE' => 'Typ/Model',
			'PHOTO_LENS' => 'Objektív',
			'PHOTO_SHUTTER' => 'Uzávierka',
			'PHOTO_APERTURE' => 'Clona',
			'PHOTO_FOCAL' => 'Fokus',
			'PHOTO_ISO' => 'ISO',
			'PHOTO_SHARING' => 'Zdieľať',
			'PHOTO_SHR_PLUBLIC' => 'Verejný',
			'PHOTO_SHR_ALB' => 'Ano (album)',
			'PHOTO_SHR_PHT' => 'Ano (obrázok)',
			'PHOTO_SHR_NO' => 'Nie',
			'PHOTO_DELETE' => 'Zmazať obrázok',
			'PHOTO_KEEP' => 'Obrázok ponechať',
			'PHOTO_DELETE_1' => 'Ste si istý, že chcete obrázok',
			'PHOTO_DELETE_2' => 'zmazať?  Táto akcia je nevratná!',
			'PHOTO_DELETE_ALL_1' => 'Ste si istý, že chcete všetky',
			'PHOTO_DELETE_ALL_2' => 'vybrané obrázky zmazať?  Táto akcia je nevratná!',
			'PHOTOS_NEW_TITLE_1' => 'Zadaje nový názov pre všetky',
			'PHOTOS_NEW_TITLE_2' => 'vybrané obrázky:',
			'PHOTO_MAKE_PRIVATE_ALBUM' => 'Tento obrázok sa nachádza vo verejnom albume. Označenie obrázku ako verejný alebo súkromný musíte nastaviť na albume, v ktorom sa nachádza.',
			'PHOTO_SHOW_ALBUM' => 'Album zobraziť',
			'PHOTO_PUBLIC' => 'Verejný',
			'PHOTO_PUBLIC_EXPL' => 'Obrázok viditeľný iným, podlieha nasledovným obmedzeniam.',
			'PHOTO_FULL' => 'Originál',
			'PHOTO_FULL_EXPL' => 'K dispozícii je obrázok v plnom rozlíšení.',
			'PHOTO_HIDDEN' => 'Skrytý',
			'PHOTO_HIDDEN_EXPL' => 'Obrázok viditeľný len pomocou priameho linku.',
			'PHOTO_DOWNLOADABLE' => 'Stiahnuteľný',
			'PHOTO_DOWNLOADABLE_EXPL' => 'Návšetvníci vašej galérie môžu tento obrázok stiahnuť.',
			'PHOTO_SHARE_BUTTON_VISIBLE' => 'Share button is visible',
			'PHOTO_SHARE_BUTTON_VISIBLE_EXPL' => 'Display social media sharing links.',
			'PHOTO_PASSWORD_PROT' => 'Chránené heslom',
			'PHOTO_PASSWORD_PROT_EXPL' => 'Obrázok dostupný len s platným heslom.',
			'PHOTO_EDIT_SHARING_TEXT' => 'Vlastnosti zdieľania tejto fotografie sa zmenia na nasledujúce:',
			'PHOTO_NO_EDIT_SHARING_TEXT' => 'Pretože je táto fotografia umiestnená vo verejnom albume, zdedí nastavenie viditeľnosti daného albumu. Jeho aktuálna viditeľnosť je uvedená len na informačné účely.',
			'PHOTO_EDIT_GLOBAL_SHARING_TEXT' => 'Viditeľnosť tejto fotografie je možné doladiť pomocou globálnych nastavení. Jeho aktuálna viditeľnosť je uvedená len na informačné účely.',
			'PHOTO_SHARING_CONFIRM' => 'Uložiť',

			'LOADING' => 'Nahráva sa',
			'ERROR' => 'Chyba',
			'ERROR_TEXT' => 'Asi sa niečo pokazilo. Obnovte stránku a skúste znova!',
			'ERROR_DB_1' => 'Nedá sa pripojiť na databázu, prístup zamietnutý. Preverte nastavenie Host, užívateľské meno a heslo a overte si prístup k databáze zo súčasnej lokality.',
			'ERROR_DB_2' => 'Nedá sa vytvoriť databáza. Preverte nastavenie Host, užívateľské meno a heslo a overte si, že daný užívateľ má právo modifikovať databázu.',
			'ERROR_CONFIG_FILE' => "Túto konfiguráciu nemožno uložiť. Prístup zamietnutý k <b>'data/'</b>. Nastavte práva zápisu na <b>'data/'</b> a <b>'uploads/'</b>. Ďalšie informácie nájdete v súbore README.",
			'ERROR_UNKNOWN' => 'Vyskytla sa neočakávaná chyba. Skúste to znova a skontrolujte inštaláciu na vašom serveri. Ďalšie informácie nájdete v súbore README.',
			'ERROR_LOGIN' => 'Nemožno uložiť Login. Skúste to s iným menom a heslom!',
			'ERROR_MAP_DEACTIVATED' => 'Map functionality has been deactivated under settings.',
			'ERROR_SEARCH_DEACTIVATED' => 'Search functionality has been deactivated under settings.',
			'SUCCESS' => 'OK',
			'RETRY' => 'Opakovať',

			'SETTINGS_WARNING' => 'Zmena rozšírených nastavení môže mať negatívny vplyv na stabilitu, bezpečnosť a rýchlosť tejto aplikácie. Upravujte len to, o čom presne viete, čo robíte.',
			'SETTINGS_SUCCESS_LOGIN' => 'Užívateľské dáta aktualizované',
			'SETTINGS_SUCCESS_SORT' => 'Triedenie aktualizované',
			'SETTINGS_SUCCESS_DROPBOX' => 'Kľúč Dropbox aktualizovaný',
			'SETTINGS_SUCCESS_LANG' => 'Jazyk aktualizovaný',
			'SETTINGS_SUCCESS_LAYOUT' => 'Layout aktualizovaný',
			'SETTINGS_SUCCESS_IMAGE_OVERLAY' => 'EXIF-Overlay nastavenia aktualizované',
			'SETTINGS_SUCCESS_PUBLIC_SEARCH' => 'Verejné vyhľadávanie bolo aktualizované',
			'SETTINGS_SUCCESS_LICENSE' => 'Prednastavená licencia aktualizovaná',
			'SETTINGS_SUCCESS_CSS' => 'CSS aktualizované',
			'SETTINGS_SUCCESS_UPDATE' => 'Nastavenia úspešne aktualizované',
			'SETTINGS_SUCCESS_MAP_DISPLAY' => 'Nastavenie zobrazenia mapy aktualizované',
			'SETTINGS_SUCCESS_MAP_DISPLAY_PUBLIC' => 'Map display settings for public albums updated',
			'SETTINGS_SUCCESS_MAP_PROVIDER' => 'Map provider settings updated',

			'U2F_NOT_SUPPORTED' => 'U2F not supported. Sorry.',
			'U2F_NOT_SECURE' => 'Environment not secured. U2F not available.',
			'U2F_REGISTER_KEY' => 'Register new device.',
			'U2F_REGISTRATION_SUCCESS' => 'Registration successful!',
			'U2F_AUTHENTIFICATION_SUCCESS' => 'Authentication successful!',
			'U2F_CREDENTIALS' => 'Credentials',
			'U2F_CREDENTIALS_DELETED' => 'Credentials deleted!',

			'DB_INFO_TITLE' => 'Zadajte prístupové údaje k databáze:',
			'DB_INFO_HOST' => 'Názov databázového servera (voliteľné)',
			'DB_INFO_USER' => 'Užívateľ databázy',
			'DB_INFO_PASSWORD' => 'Heslo databázy',
			'DB_INFO_TEXT' => 'Lychee nastaví vlastnú databázu. Pokiaľ je potrebné, možno zadať názov existujúcej databázy:',
			'DB_NAME' => 'Názov databázy (voliteľné)',
			'DB_PREFIX' => 'Tabuľkový prefix (voliteľný)',
			'DB_CONNECT' => 'Pripojiť',

			'LOGIN_TITLE' => 'Zadajte meno a heslo pre vašu inštaláciu:',
			'LOGIN_USERNAME' => 'Nový užívateľ',
			'LOGIN_PASSWORD' => 'Nové heslo',
			'LOGIN_PASSWORD_CONFIRM' => 'Heslo potvrdiť',
			'LOGIN_CREATE' => 'Založiť užívateľa',

			'PASSWORD_TITLE' => 'Zadajte vaše heslo:',
			'USERNAME_CURRENT' => 'Vaše pôvodné meno',
			'PASSWORD_CURRENT' => 'Vaše pôvodné heslo',
			'PASSWORD_TEXT' => 'Vaše meno a heslo bolo zmenené nasledovne:',
			'PASSWORD_CHANGE' => 'Prihlásenie zmeniť',

			'EDIT_SHARING_TITLE' => 'Zdieľanie spracovať',
			'EDIT_SHARING_TEXT' => 'Nastavenie zdieľania pre tento album bolo zmenené nasledovne:',
			'SHARE_ALBUM_TEXT' => 'Tento album bude zdieľaný s nasledovnými vlastnosťami:',
			'ALBUM_SHARING_CONFIRM' => 'Save',

			'SORT_ALBUM_BY_1' => 'Triediť albumy podľa',
			'SORT_ALBUM_BY_2' => 'v',
			'SORT_ALBUM_BY_3' => 'rade.',

			'SORT_ALBUM_SELECT_1' => 'Čas vytvorenia',
			'SORT_ALBUM_SELECT_2' => 'Titul',
			'SORT_ALBUM_SELECT_3' => 'Popis',
			'SORT_ALBUM_SELECT_4' => 'Verejný',
			'SORT_ALBUM_SELECT_5' => 'Najnovšia zmena',
			'SORT_ALBUM_SELECT_6' => 'Najstaršia zmena',

			'SORT_PHOTO_BY_1' => 'Obrázky triediť podľa',
			'SORT_PHOTO_BY_2' => 'v',
			'SORT_PHOTO_BY_3' => 'rade.',

			'SORT_PHOTO_SELECT_1' => 'Čas nahratia',
			'SORT_PHOTO_SELECT_2' => 'čas snímku',
			'SORT_PHOTO_SELECT_3' => 'Titul',
			'SORT_PHOTO_SELECT_4' => 'Popis',
			'SORT_PHOTO_SELECT_5' => 'Verejný',
			'SORT_PHOTO_SELECT_6' => 'Obľúbený',
			'SORT_PHOTO_SELECT_7' => 'Formát',

			'SORT_ASCENDING' => 'vzostupnej',
			'SORT_DESCENDING' => 'zostupnej',
			'SORT_CHANGE' => 'Zmeniť triedenie',

			'DROPBOX_TITLE' => 'Nastaviť kľúč Dropbox',
			'DROPBOX_TEXT' => "Aby ste mohli importovať obrázky z Dropbox, potrebujete platný API-Key zo <a href='https://www.dropbox.com/developers/apps/create'>stránky Dropbox</a>. Vytvorte personal key a zadajte ho:",

			'LANG_TEXT' => 'Zmeniť jazyk Lychee na:',
			'LANG_TITLE' => 'Zmena jazyka',

			'CSS_TEXT' => 'Vlastné CSS:',
			'CSS_TITLE' => 'CSS zmeniť',
			'PUBLIC_SEARCH_TEXT' => 'Verejné vyhľadávanie povolené:',
			'IMAGE_OVERLAY_TEXT' => 'Predvolené zobrazenie rozmiestnenia:',
			'OVERLAY_TYPE' => 'Dáta použité pre overlay:',
			'OVERLAY_EXIF' => 'EXIF dáta obrázku',
			'OVERLAY_DESCRIPTION' => 'Popis obrázku',
			'OVERLAY_DATE' => 'Obrázok snímaný dňa',
			'MAP_DISPLAY_TEXT' => 'Enable maps (provided by OpenStreetMap):',
			'MAP_DISPLAY_PUBLIC_TEXT' => 'Enable maps for public albums (provided by OpenStreetMap):',
			'MAP_PROVIDER' => 'Provider of OpenStreetMap tiles:',
			'MAP_PROVIDER_WIKIMEDIA' => 'Wikimedia',
			'MAP_PROVIDER_OSM_ORG' => 'OpenStreetMap.org (no HiDPI)',
			'MAP_PROVIDER_OSM_DE' => 'OpenStreetMap.de (no HiDPI)',
			'MAP_PROVIDER_OSM_FR' => 'OpenStreetMap.fr (no HiDPI)',
			'MAP_PROVIDER_RRZE' => 'University of Erlangen, Germany (only HiDPI)',
			'MAP_INCLUDE_SUBALBUMS_TEXT' => 'Include photos of subalbums on map:',
			'LOCATION_DECODING' => 'Decode GPS data into location name',
			'LOCATION_SHOW' => 'Show location name',
			'LOCATION_SHOW_PUBLIC' => 'Show location name for public mode',
			'LAYOUT_TYPE' => 'Rozmiestnenie obrázkov:',
			'LAYOUT_SQUARES' => 'Štvorcové náhľady',
			'LAYOUT_JUSTIFIED' => 'Zachovaný pomer strán, zarovnané',
			'LAYOUT_UNJUSTIFIED' => 'Zachovaný pomer strán, nezarovnané',
			'SET_LAYOUT' => 'Zmeniť rozmiestnenie',

			'NSFW_VISIBLE_TEXT_1' => 'Make Sensitive albums visible by default.',
			'NSFW_VISIBLE_TEXT_2' => 'If the album is public, it is still accessible, just hidden from the view and <b>can be revealed by pressing <hkb>H</hkb></b>.',
			'SETTINGS_SUCCESS_NSFW_VISIBLE' => 'Default sensitive album visibility updated with success.',

			'VIEW_NO_RESULT' => 'Žiadny výsledok',
			'VIEW_NO_PUBLIC_ALBUMS' => 'Žiadne verejné albumy',
			'VIEW_NO_CONFIGURATION' => 'Žiadna konfigurácia',
			'VIEW_PHOTO_NOT_FOUND' => 'Žiadny obrázok',

			'NO_TAGS' => 'Žiadne štítky',

			'UPLOAD_MANAGE_NEW_PHOTOS' => 'Môžete spravovať vaše nové obrázky.',
			'UPLOAD_COMPLETE' => 'Nahrávanie ukončené',
			'UPLOAD_COMPLETE_FAILED' => 'Chyba pri nahrávaní jedného alebo viacerých obrázkov.',
			'UPLOAD_IMPORTING' => 'Importovať',
			'UPLOAD_IMPORTING_URL' => 'Importovať URL',
			'UPLOAD_UPLOADING' => 'Nahrať',
			'UPLOAD_FINISHED' => 'Ukončené',
			'UPLOAD_PROCESSING' => 'Spracováva sa',
			'UPLOAD_FAILED' => 'Zlyhanie',
			'UPLOAD_FAILED_ERROR' => 'Nahrávanie zlyhalo. Server ohlásil chybu!',
			'UPLOAD_FAILED_WARNING' => 'Nahrávanie zlyhalo. Server ohlásil varovanie!',
			'UPLOAD_SKIPPED' => 'Preskočiť',
			'UPLOAD_ERROR_CONSOLE' => 'Skontrolujte konzolu prehliadača, pre zistenie ďalších podrobností.',
			'UPLOAD_UNKNOWN' => 'Server vrátil neznámu odpoveď.Skontrolujte konzolu prehliadača, pre zistenie ďalších podrobností.',
			'UPLOAD_ERROR_UNKNOWN' => 'Nahrávanie zlyhalo. Server ohlásil neznámu chybu!',
			'UPLOAD_ERROR_POSTSIZE' => 'Upload failed. The PHP post_max_size limit is too small!',
			'UPLOAD_ERROR_FILESIZE' => 'Upload failed. The PHP upload_max_filesize limit is too small!',
			'UPLOAD_IN_PROGRESS' => 'Lychee práve nahráva!',
			'UPLOAD_IMPORT_WARN_ERR' => 'Import je hotový, vyskytli sa ale chyby alebo varovania. Skontrolujte protokoly (Nastavenia/ Protokoly).',
			'UPLOAD_IMPORT_COMPLETE' => 'Import hotový',
			'UPLOAD_IMPORT_INSTR' => 'Pre import zadajte priamy link:',
			'UPLOAD_IMPORT' => 'Import',
			'UPLOAD_IMPORT_SERVER' => 'Import zo servera',
			'UPLOAD_IMPORT_SERVER_FOLD' => 'Priečinok je prázdny alebo obsahuje nečitateľný obsah pre spracovanie. Skontrolujte protokoly (Nastavenia/ Protokoly) pre zistenie ďalších podrobností.',
			'UPLOAD_IMPORT_SERVER_INSTR' => 'Táto akcia naimportuje všetky obrázky, priečinky a podpriečinky, ktoré sa v danom adresári nachádzajú.</b>',
			'UPLOAD_ABSOLUTE_PATH' => 'Absolútna cesta k adresáru',
			'UPLOAD_IMPORT_SERVER_EMPT' => 'Import sa nedá spustiť, priečinok je prázdny.',
			'UPLOAD_IMPORT_DELETE_ORIGINALS' => 'Zmazať originály',
			'UPLOAD_IMPORT_DELETE_ORIGINALS_EXPL' => 'Ak je možné, budú pôvodné súbory po importe zmazané.',
			'UPLOAD_IMPORT_LOW_MEMORY' => 'Málo pamäte!',
			'UPLOAD_IMPORT_LOW_MEMORY_EXPL' => 'Proces importu na serveri sa blíži k limitu pamäte a môže skončiť predčasným ukončením.',
			'UPLOAD_WARNING' => 'Varovanie',
			'UPLOAD_IMPORT_NOT_A_DIRECTORY' => 'Adresaár nie je čitateľný!',
			'UPLOAD_IMPORT_PATH_RESERVED' => 'Zadaná cesta je rezervovaná pre Lychee!',
			'UPLOAD_IMPORT_UNREADABLE' => 'Súbor sa nedá čítať!',
			'UPLOAD_IMPORT_FAILED' => 'Súbor sa nedá naimportovať!',
			'UPLOAD_IMPORT_UNSUPPORTED' => 'Nepodporovaný typ súboru!',
			'UPLOAD_IMPORT_ALBUM_FAILED' => 'Nemožno vytvoriť album!',

			'ABOUT_SUBTITLE' => 'Vlastný hostovaný manažment obrázkov!',
			'ABOUT_DESCRIPTION' => 'je open-source nástroj, bežiaci na vašom vlastnom serveri alebo v cloude. Inštalácia je otázkou sekúnd. Nahrať, spravovať a zdieľať obrázky ako v natívnej aplikácii. Lychee ponúka všetko čo potrebujete vy a vaše obrázky pre bezpečné uloženie.',
			'FOOTER_COPYRIGHT' => 'Všetky obrázky na tejto webovej stránke sú chránené autorským právom ',
			'HOSTED_WITH_LYCHEE' => 'Hostované s Lychee',

			'URL_COPY_TO_CLIPBOARD' => 'Skopírovať do schránky',
			'URL_COPIED_TO_CLIPBOARD' => 'URL skopírované do schránky!',
			'PHOTO_DIRECT_LINKS_TO_IMAGES' => 'Priame linky k súborom obrázkov:',
			'PHOTO_MEDIUM' => 'Medium',
			'PHOTO_MEDIUM_HIDPI' => 'Medium HiDPI',
			'PHOTO_SMALL' => 'Náhľad',
			'PHOTO_SMALL_HIDPI' => 'Náhľad HiDPI',
			'PHOTO_THUMB' => 'Štvorcový náhľad',
			'PHOTO_THUMB_HIDPI' => 'Štvorcový náhľad HiDPI',
			'PHOTO_LIVE_VIDEO' => 'Video part of live-photo',
			'PHOTO_VIEW' => 'Zobrazenie foto Lychee:',

			'PHOTO_EDIT_ROTATECWISE' => 'Rotate clockwise',
			'PHOTO_EDIT_ROTATECCWISE' => 'Rotate counter-clockwise',
		];

		return $locale;
	}
}
