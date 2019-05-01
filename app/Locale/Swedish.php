<?php

namespace App\Locale;


final class Swedish implements LangInterface
{
	static public function code()
	{
		return 'sv';
	}

	static public function get_locale()
	{
		$locale = array(
			'USERNAME'		=> 'användarnamn',
			'PASSWORD'		=> 'lösenord',
			'ENTER'			=> 'Stig in',
			'CANCEL'		=> 'Avbryt',
			'SIGN_IN'		=> 'Logga in',
			'CLOSE'			=> 'Stäng',
			'SETTINGS'      => 'Settings',
			'SEARCH'        => 'Search ...',
			'MORE'          => 'More',

			'USERS'				=> 'Users',
			'SHARING'			=> 'Sharing',
			'CHANGE_LOGIN'		=> 'Ändra inloggning',
			'CHANGE_SORTING'	=> 'Ändra sortering',
			'SET_DROPBOX'		=> 'Ställ in Dropbox',
			'ABOUT_LYCHEE'		=> 'Om Lychee',
			'DIAGNOSTICS'		=> 'Diagnostik',
			'LOGS'				=> 'Visa logfilen',
			'SIGN_OUT'			=> 'Logga ut',
			'UPDATE_AVAILABLE'	=> 'En uppdatering finns!',
			'DEFAULT_LICENSE'	=> 'Default license for new uploads:',
			'SET_LICENSE'		=> 'Set License',
			'SET_OVERLAY_TYPE'	=> 'Set Overlay',

			'SMART_ALBUMS'		=> 'Smarta album',
			'SHARED_ALBUMS'		=> 'Shared albums',
			'ALBUMS'			=> 'Album',
			'PHOTOS'			=> 'Pictures',

			'RENAME'			=> 'Ändra namnet',
			'RENAME_ALL'		=> 'Byt namn på vald',
			'MERGE'				=> 'Slå ihop',
			'MERGE_ALL'			=> 'Sammanfoga vald',
			'MAKE_PUBLIC'		=> 'Gör publika',
			'SHARE_ALBUM'		=> 'Dela album',
			'SHARE_PHOTO'		=> 'Dela fotografi',
			'DOWNLOAD_ALBUM'	=> 'Ladda ner album',
			'ABOUT_ALBUM'		=> 'Om albumet',
			'DELETE_ALBUM'		=> 'Radera albumet',
			'MOVE_ALBUM',		=> 'Move Album',
			'FULLSCREEN_ENTER'	=> 'Enter Fullscreen',
			'FULLSCREEN_EXIT'	=> 'Exit Fullscreen',

			'DELETE_ALBUM_QUESTION'			=> 'Radera album och fotografier',
			'KEEP_ALBUM'					=> 'Behåll albumet',
			'DELETE_ALBUM_CONFIRMATION_1'	=> 'Är du säker på att du vill radera albumet',
			'DELETE_ALBUM_CONFIRMATION_2'	=> 'och alla fotografier det innehåller? Raderingen går inte att ångra!',

			'DELETE_ALBUMS_QUESTION'		=> 'Radera album och fotografier',
			'KEEP_ALBUMS'					=> 'Behåll album',
			'DELETE_ALBUMS_CONFIRMATION_1'	=> 'Är du säker på att du vill radera alla',
			'DELETE_ALBUMS_CONFIRMATION_2'	=> 'valda album och alla fotografier de innehåller? Raderingen går inte att ångra!',

			'DELETE_UNSORTED_CONFIRM'		=> 'Är du säker på att du vill radera alla fotografier från \'Osorterat\'?<br>Det här går inte att ångra!',
			'CLEAR_UNSORTED'				=> 'Rensa osorterade',
			'KEEP_UNSORTED'					=> 'Behåll osorterade',

			'EDIT_SHARING'					=> 'Redrigera delning',
			'MAKE_PRIVATE'					=> 'Gör privat',

			'CLOSE_ALBUM'					=> 'Stäng albumet',
			'CLOSE_PHOTO'					=> 'Stäng fotografiet',

			'ADD'							=> 'Lägg till',
			'MOVE'							=> 'Flytta',
			'MOVE_ALL'						=> 'Flytta valda',
			'DUPLICATE'						=> 'Kopiera',
			'DUPLICATE_ALL'					=> 'Kopiera valda',
			'COPY_TO'						=> 'Kopiera till ...',
			'COPY_ALL_TO'					=> 'Valda kopia till ...',
			'DELETE'						=> 'Radera',
			'DELETE_ALL'					=> 'Radera vald',
			'DOWNLOAD'						=> 'Ladda ner',
			'UPLOAD_PHOTO'					=> 'Ladda upp fotografi',
			'IMPORT_LINK'					=> 'Importera från länk',
			'IMPORT_DROPBOX'				=> 'Importera från Dropbox',
			'IMPORT_SERVER'					=> 'Importera från server',
			'NEW_ALBUM'						=> 'Nytt album',

			'TITLE_NEW_ALBUM'			=> 'Skriv en titel för det nya albumet:',
			'UNTITLED'					=> 'Saknar titel',
			'UNSORTED'					=> 'Osorterat',
			'STARRED'					=> 'Stjärnmärkta',
			'RECENT'					=> 'Nyligen',
			'PUBLIC'					=> 'Publika',
			'NUM_PHOTOS'				=> 'Fotografier',

			'CREATE_ALBUM'				=> 'Skapa album',

			'STAR_PHOTO'				=> 'Stjärnmärk fotografi',
			'STAR'						=> 'Stjärnmärk',
			'STAR_ALL'					=> 'Markera valda som favoriter',
			'TAGS'						=> 'Tag',
			'TAGS_ALL'					=> 'Vald taggen',
			'UNSTAR_PHOTO'				=> 'Ta bort stjärnmärke',

			'FULL_PHOTO'				=> 'Originalfotografi',
			'ABOUT_PHOTO'				=> 'Om fotografiet',
			'DIRECT_LINK'				=> 'Direktlänk',

			'ALBUM_ABOUT'				=> 'Om',
			'ALBUM_BASICS'				=> 'Grundläggande',
			'ALBUM_TITLE'				=> 'Titel',
			'ALBUM_NEW_TITLE'			=> 'Skriv en ny titel för det här albumet:',
			'ALBUMS_NEW_TITLE_1'		=> 'Skriv en ny titel för alla',
			'ALBUMS_NEW_TITLE_2'		=> 'valda album:',
			'ALBUM_SET_TITLE'			=> 'Spara titel',
			'ALBUM_DESCRIPTION'			=> 'Beskrivning',
			'ALBUM_NEW_DESCRIPTION'		=> 'Ny beskrivning för detta album:',
			'ALBUM_SET_DESCRIPTION'		=> 'Spara beskrivningen',
			'ALBUM_ALBUM'				=> 'Album',
			'ALBUM_CREATED'				=> 'Skapad',
			'ALBUM_IMAGES'				=> 'Fotografier',
			'ALBUM_VIDEOS'				=> 'Videos',
			'ALBUM_SHARING'				=> 'Dela',
			'ALBUM_SHR_YES'				=> 'Ja',
			'ALBUM_SHR_NO'				=> 'Nej',
			'ALBUM_PUBLIC'				=> 'Publikt',
			'ALBUM_HIDDEN'				=> 'Dold',
			'ALBUM_HIDDEN_EXPL'			=> 'Bara personer med korrekt länk kan se detta album.',
			'ALBUM_DOWNLOADABLE'		=> 'Nedladdningsbart',
			'ALBUM_DOWNLOADABLE_EXPL'	=> 'Besökare till din Lychee kan ladda ner detta album.',
			'ALBUM_PASSWORD'			=> 'Lösenord',
			'ALBUM_PASSWORD_PROT'		=> 'Lösenordsskyddad',
			'ALBUM_PASSWORD_PROT_EXPL'	=> 'Albumet kan bara ses med giltigt lösenord.',
			'ALBUM_PASSWORD_REQUIRED'	=> 'Albumet är skyddat med ett lösenord. Ange lösenordet nedan för att se fotografierna i albumet:',
			'ALBUM_MERGE_1'				=> 'Är du säker på att du vill sammanfoga albumet',
			'ALBUM_MERGE_2'				=> 'med albumet',
			'ALBUMS_MERGE'				=> 'Är du säker på att du vill sammanfoga samtliga valda album till albumet',
			'MERGE_ALBUM'				=> 'Sammanfoga album',
			'DONT_MERGE'				=> "Sammanfoga inte",
			'ALBUM_MOVE_1'				=> 'Are you sure you want to move the album',
			'ALBUM_MOVE_2'				=> 'into the album',
			'ALBUMS_MOVE'				=> 'Are you sure you want to move all selected albums into the album',
			'MOVE_ALBUMS'				=> "Move Albums",
			'NOT_MOVE_ALBUMS'			=> "Don't Move",
			'ROOT'						=> "Album",
			'ALBUM_REUSE'				=> "Reuse",
			'ALBUM_LICENSE'				=> 'License',
			'ALBUM_SET_LICENSE'			=> 'Set License',
			'ALBUM_LICENSE_HELP'		=> 'Need help choosing?',
			'ALBUM_LICENSE_NONE'		=> 'None',
			'ALBUM_RESERVED'			=> 'All Rights Reserved',

			'PHOTO_ABOUT'				=> 'Om',
			'PHOTO_BASICS'				=> 'Grundläggande',
			'PHOTO_TITLE'				=> 'Titel',
			'PHOTO_NEW_TITLE'			=> 'Skriv in en ny tital för det hör fotografiet:',
			'PHOTO_SET_TITLE'			=> 'Spara titeln',
			'PHOTO_UPLOADED'			=> 'Uppladdat',
			'PHOTO_DESCRIPTION'			=> 'Beskrivning',
			'PHOTO_NEW_DESCRIPTION'		=> 'Skriv en ny beskrivning för detta fotografi:',
			'PHOTO_SET_DESCRIPTION'		=> 'Spara beskrivningen',
			'PHOTO_NEW_LICENSE'			=> 'Add a License',
			'PHOTO_SET_LICENSE'			=> 'Set License',
			'PHOTO_LICENSE'				=> 'License',
			'PHOTO_REUSE'				=> 'Reuse',
			'PHOTO_LICENSE_NONE'		=> 'None',
			'PHOTO_RESERVED'			=> 'All Rights Reserved',
			'PHOTO_IMAGE'				=> 'Fotografi',
			'PHOTO_VIDEO'				=> 'Video',
			'PHOTO_SIZE'				=> 'Storlek',
			'PHOTO_FORMAT'				=> 'Filformat',
			'PHOTO_DURATION'			=> 'Duration',
			'PHOTO_FPS'				    => 'Frame rate',
			'PHOTO_RESOLUTION'			=> 'Mått',
			'PHOTO_TAGS'				=> 'Kategori',
			'PHOTO_NOTAGS'				=> 'Inga kategorier',
			'PHOTO_NEW_TAGS'			=> 'Skriv in din kategori för det här fotografier. Du kan ange flera kategori genom att separera dem med ett kommatecken:',
			'PHOTO_NEW_TAGS_1'			=> 'Ange kategori för samtliga valda bilder',
			'PHOTO_NEW_TAGS_2'			=> 'Befintliga kategorier kommer att raderas. Du kan lägga till nya kategorier genom att separera dem med kommatecken:',
			'PHOTO_SET_TAGS'			=> 'Spara kategori',
			'PHOTO_CAMERA'				=> 'Kamera',
			'PHOTO_CAPTURED'			=> 'Digitaliserad',
			'PHOTO_MAKE'				=> 'Tillverkare',
			'PHOTO_TYPE'				=> 'Typ/Modell',
			'PHOTO_SHUTTER'				=> 'Slutartid',
			'PHOTO_APERTURE'			=> 'Bländartal',
			'PHOTO_FOCAL'				=> 'Brännvidd',
			'PHOTO_ISO'					=> 'ISO',
			'PHOTO_SHARING'				=> 'Delning',
			'PHOTO_SHR_PLUBLIC'			=> 'Publik',
			'PHOTO_SHR_ALB'				=> 'Ja (Album)',
			'PHOTO_SHR_PHT'				=> 'Ja (Fotografi)',
			'PHOTO_SHR_NO'				=> 'Nej',
			'PHOTO_DELETE'				=> 'Radera fotografi',
			'PHOTO_KEEP'				=> 'Spara fotografi',
			'PHOTO_DELETE_1'			=> 'Är du säker på att du vill radera det här fotografiet?',
			'PHOTO_DELETE_2'			=> 'Raderingen går inte att ångra!',
			'PHOTO_DELETE_ALL_1'		=> 'Är du säker på att du vill radera alla',
			'PHOTO_DELETE_ALL_2'		=> 'valda fotografier? Raderingen går inte att ångra!',
			'PHOTOS_NEW_TITLE_1'		=> 'Ange en tital för alla',
			'PHOTOS_NEW_TITLE_2'		=> 'valda fotografier:',
			'PHOTO_MAKE_PRIVATE_ALBUM'	=> 'Det här fotografier finns i ett publikt album. Du kan ändra fotografiets synlighet genom att redigera egenskapen för albumet.',
			'PHOTO_SHOW_ALBUM'			=> 'Visa album',

			'LOADING'					=> 'Laddar',
			'ERROR'						=> 'Fel',
			'ERROR_TEXT'				=> 'Ojsan, något verkar ha gått lite fel. Prova att ladda om sidan och försök igen!',
			'ERROR_DB_1'				=> 'Kan inte ansluta till databasen då åtkomst nekades. Kontrollera adressen, användarnamnet och löseordet samt säkerställ att du har behörighet att ansluta mot databasen från din nuvarande adress.',
			'ERROR_DB_2'				=> 'Kunde inte skapa databasen. Kontrollera adressen, användarnamnet och löseordet samt säkerställ att du har behörighet att användarnamnet har behörighet att förändra databasen.',
			'ERROR_CONFIG_FILE'			=> "Kunde inte spara konfigureringen. Åtkomst nekades i <b>'data/'</b>. Kontrollera rättigheterna för läsning, skrivning och exekvering för andra i <b>'data/'</b> och <b>'uploads/'</b>. För mera information läs dokumentet <b>'readme'</b>.",
			'ERROR_UNKNOWN'				=> 'Något oväntat inträffade. Vänligen försök igen och kontrollera installationen av Lychee och din server. För mera information läs dokumentet <b>readme</b>.',
			'ERROR_LOGIN'				=> 'Kunde inte spara inloggningsuppgifterna. Vänligen prova med ett annat användarnamn och lösenord!',
			'SUCCESS'					=> 'OK',
			'RETRY'						=> 'Försök igen',

			'SETTINGS_SUCCESS_LOGIN'		=> 'Login Info updated.',
			'SETTINGS_SUCCESS_SORT'			=> 'Sorting order updated.',
			'SETTINGS_SUCCESS_DROPBOX'		=> 'Dropbox Key updated.',
			'SETTINGS_SUCCESS_LANG'			=> 'Language updated',
			'SETTINGS_SUCCESS_LAYOUT'		=> 'Layout updated',
			'SETTINGS_SUCCESS_IMAGE_OVERLAY'=> 'EXIF Overlay setting updated',
			'SETTINGS_SUCCESS_LICENSE'		=> 'Default license updated',

			'DB_INFO_TITLE'				=> 'Ange dina uppgifter för databasanslutninge nedan:',
			'DB_INFO_HOST'				=> 'Databasens adress (valfritt)',
			'DB_INFO_USER'				=> 'Databasens användarnamn',
			'DB_INFO_PASSWORD'			=> 'Databasens lösenord',
			'DB_INFO_TEXT'				=> 'Lychee kommer nu att skapa sin egen databas. Vill du istället ansluta till en befintlig databas anger du namnet på den:',
			'DB_NAME'					=> 'Databasens namn (valfritt)',
			'DB_PREFIX'					=> 'Tabell prefix (valfritt)',
			'DB_CONNECT'				=> 'Anslut',

			'LOGIN_TITLE'				=> 'Ange ett användarnamn och lösenord för din installation:',
			'LOGIN_USERNAME'			=> 'Nytt användarnamn',
			'LOGIN_PASSWORD'			=> 'Nytt lösenord',
			'LOGIN_PASSWORD_CONFIRM'	=> 'Confirm Password',
			'LOGIN_CREATE'				=> 'Skapa inloggning',

			'PASSWORD_TITLE'			=> 'Ange dina befintliga inloggningsuppgifter:',
			'USERNAME_CURRENT'			=> 'Befintligt användarnamn',
			'PASSWORD_CURRENT'			=> 'Befintligt lösenord',
			'PASSWORD_TEXT'				=> 'Ditt inloggningsuppgifter kommer att ändras till:',
			'PASSWORD_CHANGE'			=> 'Spara ändringar av inloggningsuppgifter',

			'EDIT_SHARING_TITLE'		=> 'Redigera delning',
			'EDIT_SHARING_TEXT'			=> 'Albumets egenskaper för delning kommer att ändras till:',
			'SHARE_ALBUM_TEXT'			=> 'Det här albumet kommer att delas ut med dessa egenskaper::',

			'SORT_ALBUM_BY_1'			=> 'Sortera album efter',
			'SORT_ALBUM_BY_2'			=> 'i en',
			'SORT_ALBUM_BY_3'			=> 'ordning.',

			'SORT_ALBUM_SELECT_1'		=> 'skapelsetid',
			'SORT_ALBUM_SELECT_2'		=> 'titel',
			'SORT_ALBUM_SELECT_3'		=> 'beskrivning',
			'SORT_ALBUM_SELECT_4'		=> 'publikt',
			'SORT_ALBUM_SELECT_5'		=> 'senaste datum',
			'SORT_ALBUM_SELECT_6'		=> 'äldsta datum',

			'SORT_PHOTO_BY_1'			=> 'Sortera fotografier efter',
			'SORT_PHOTO_BY_2'			=> 'i en',
			'SORT_PHOTO_BY_3'			=> 'ordning.',

			'SORT_PHOTO_SELECT_1'		=> 'Uppladdningstid',
			'SORT_PHOTO_SELECT_2'		=> 'Fotograferingsdatum',
			'SORT_PHOTO_SELECT_3'		=> 'Titel',
			'SORT_PHOTO_SELECT_4'		=> 'Beskrivning',
			'SORT_PHOTO_SELECT_5'		=> 'Publikt',
			'SORT_PHOTO_SELECT_6'		=> 'Stjärnmärkning',
			'SORT_PHOTO_SELECT_7'		=> 'Bildformat',

			'SORT_ASCENDING'			=> 'stigande',
			'SORT_DESCENDING'			=> 'fallande',
			'SORT_CHANGE'				=> 'Spara ändringar av sorteringsföljden',

			'DROPBOX_TITLE'				=> 'Spara nyckeln för Dropbox',
			'DROPBOX_TEXT'				=> "För att kunna importera fotografier från ditt Dropboxkonto behöver du en godkänd applikationsnyckel från <a href='https://www.dropbox.com/developers/apps/create'>Dropbox</a>.\n Skapa en personlig nyckel och ange den sedan här nedan:",

			'LANG_TEXT'					=> 'Ändra språket i Lychee till:',
			'LANG_TITLE'				=> 'Spara ändringen av språket',
			'IMAGE_OVERLAY_TEXT'		=> 'Display data overlay by default:',
			'OVERLAY_TYPE'				=> 'Data to use in image overlay:',
			'OVERLAY_EXIF'				=> 'Photo EXIF data',
			'OVERLAY_DESCRIPTION'		=> 'Photo description',
			'OVERLAY_DATE'				=> 'Photo date taken',
			'LAYOUT_TYPE'				=> 'Layout of photos:',
			'LAYOUT_SQUARES'			=> 'Square thumbnails',
			'LAYOUT_JUSTIFIED'			=> 'With aspect, justified',
			'LAYOUT_UNJUSTIFIED'		=> 'With aspect, unjustified',
			'SET_LAYOUT'				=> 'Change layout',

			'VIEW_NO_RESULT'			=> 'Inget resultat',
			'VIEW_NO_PUBLIC_ALBUMS'		=> 'Inga publika album',
			'VIEW_NO_CONFIGURATION'		=> 'Ingen konfigurering',
			'VIEW_PHOTO_NOT_FOUND'		=> 'Fotografiet hittade inte',

			'NO_TAGS'					=> 'Inga kategorier',

			'UPLOAD_MANAGE_NEW_PHOTOS'	=> 'Du kan nu hantera de nya bilderna.',
			'UPLOAD_COMPLETE'			=> 'Uppladdning klar',
			'UPLOAD_COMPLETE_FAILED'	=> 'Kunde inte ladda upp en eller flera bilder.',
			'UPLOAD_IMPORTING'			=> 'Importering',
			'UPLOAD_IMPORTING_URL'		=> 'Adress för importering',
			'UPLOAD_UPLOADING'			=> 'Uppladdning',
			'UPLOAD_FINISHED'			=> 'Klar',
			'UPLOAD_PROCESSING'			=> 'Bearbetning',
			'UPLOAD_FAILED'				=> 'Misslyckades',
			'UPLOAD_FAILED_ERROR'		=> 'Uppladdning misslyckades. Servern svarade med ett felmeddelande!',
			'UPLOAD_FAILED_WARNING'		=> 'Uppladdning misslyckades. Servern svarade med en varning!',
			'UPLOAD_SKIPPED'			=> 'Ignorerade',
			'UPLOAD_ERROR_CONSOLE'		=> 'Kontrollera din webbläsares konsoll för ytterligare information.',
			'UPLOAD_UNKNOWN'			=> 'Servern returnerade ett oklart svar. Kontrollera din webbläsares konsoll för ytterligare information.',
			'UPLOAD_ERROR_UNKNOWN'		=> 'Uppladdning misslyckades. Servern returnerade ett oklart fel!',
			'UPLOAD_IN_PROGRESS'		=> 'Lychee laddar för tillfället upp material!',
			'UPLOAD_IMPORT_WARN_ERR'	=> 'Importeringen är avslutad, men processen gav felmeddelanden. Kontrollera logfilen (Inställningar -> Visa logfilen) för ytterligare detaljer.',
			'UPLOAD_IMPORT_COMPLETE'	=> 'Importeringen klar',
			'UPLOAD_IMPORT_INSTR'		=> 'Ange den exakta länken till fotografiet du vill importera.',
			'UPLOAD_IMPORT'				=> 'Importera',
			'UPLOAD_IMPORT_SERVER'		=> 'Importera från server',
			'UPLOAD_IMPORT_SERVER_FOLD'	=> 'Mappen du angav var tom eller saknade läsbara filer. Kontrollera logfilen (Inställningar -> Visa logfilen) för ytterligare detaljer',
			'UPLOAD_IMPORT_SERVER_INSTR'=> 'Den här processen kommer att importera alla fotografier, inklusive alla mappar och undermappar från platse du angav. <b>Originalfotografierna kommer att raderas.</b> efter att importering genomförts.',
			'UPLOAD_ABSOLUTE_PATH'		=> 'Exakt sökväg till mappen',
			'UPLOAD_IMPORT_SERVER_EMPT'	=> 'Kunde inte påbörja importeringen då mappen saknade innehåll!',

			'ABOUT_SUBTITLE'			=> 'Self-hosted photo-management done right',
			'ABOUT_DESCRIPTION'			=> 'is a free photo-management tool, which runs on your server or web-space. Installing is a matter of seconds. Upload, manage and share photos like from a native application. Lychee comes with everything you need and all your photos are stored securely.',
			'FOOTER_COPYRIGHT'			=> 'Alla bilder på denna webbplats är föremål för upphovsrätt från'
		);

		return $locale;
	}
}