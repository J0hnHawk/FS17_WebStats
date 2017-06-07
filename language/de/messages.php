<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (empty ( $lang ) || ! is_array ( $lang )) {
	$lang = array ();
}

$lang = array_merge ( $lang, array (
		'L_ERROR' => 'Fehler',
		'L_INFO' => 'Info',
		'L_SUCCESS' => 'Erfolg',
		'L_WRONGIP' => 'Die eingegebene IP Adresse ist nicht gültig.',
		'L_WRONGPORT' => 'Der eingegebene Port ist ungültig',
		'L_WRONGCODE' => 'Der eingegebene Code ist ungültig',
		'L_NOCONNECTION' => 'Server ist offline oder die IP Adresse ist falsch' 
) );