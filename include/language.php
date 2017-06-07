<?php
// if (! defined ( 'IN_NFMWS' )) {
// exit ();
// }
$languages = array ();
$langDir = dir ( 'language' );
while ( ($entry = $langDir->read ()) != false ) {
	if ($entry != "." && $entry != ".." && is_dir ( 'language/' . $entry )) {
		if (file_exists ( 'language/' . $entry . '/language.txt' )) {
			$langFile = file ( 'language/' . $entry . '/language.txt' );
			$languages [] = array (
					'path' => $entry,
					'englishName' => trim ( $langFile [0] ),
					'localName' => trim ( $langFile [1] ) 
			);
		}
	}
}
$langDir->close ();
$defaultLanguage = 'en';		