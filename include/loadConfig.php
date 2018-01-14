<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017-2018 John Hawk <john.hawk@gmx.net>
 *
 * "FS17 Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "FS17 Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}
// Serverkonfiguration laden - wenn nicht vorhanden Instalation starten
$configFile = './config/server.conf';
if (file_exists ( $configFile )) {
	$server = file ( $configFile );
	$serverConfig = unserialize ( $server [0] );
	list ( $dSrvIp, $dSrvPort, $dSrvCode, $savegame, $isDediServer, $mapPath ) = $serverConfig;
	if ($mapPath == '') {
		$mapPath = 'nfmarsch29';
	}
	$smarty->assign ( 'isDediServer', $isDediServer );
} else {
	define ( 'IN_INSTALL', true );
	include ('./include/install.php');
	exit ();
}

// load Styles
$styles = array ();
$stylesDir = dir ( 'styles' );
while ( ($entry = $stylesDir->read ()) != false ) {
	if ($entry != "." && $entry != ".." && is_dir ( './styles/' . $entry )) {
		if (file_exists ( './styles/' . $entry . '/style.cfg' )) {
			$styleFile = file ( './styles/' . $entry . '/style.cfg' );
			$keyValuePair = explode ( '=', $styleFile [0] );
			$styles [$entry] = array (
					'path' => $entry,
					'name' => trim ( $keyValuePair [1] ) 
			);
		}
	}
}
$stylesDir->close ();

// Kartendetails laden
list ( $mapName, $mapShort, $mapVersion, $mapLink, $mapCopyright, $mapSize, $configBy, $configVersion, $configFormat ) = file ( "./config/$mapPath/map.txt" );

$map = array (
		'Name' => $mapName,
		'Path' => $mapPath,
		'Short' => $mapShort,
		'Version' => $mapVersion,
		'Link' => $mapLink,
		'Copyright' => $mapCopyright,
		'Size' => $mapSize,
		'configBy' => $configBy,
		'configVersion' => $configVersion,
		'configFormat' => $configFormat 
);
$smarty->assign ( 'map', $map );
$userLang = $_SESSION ['language'];

if (trim($configFormat) != 'xml') {
	require ("./config/$mapPath/mapconfig.php");
	if (! file_exists ( "./config/$mapPath/translation/{$_SESSION ['language']}.php" )) {
		require ("./config/$mapPath/translation/$defaultLanguage.php");
	} else {
		require ("./config/$mapPath/translation/{$_SESSION ['language']}.php");
	}
} else {
	// Kartenkonfiguration aus XML Dateien laden
	$lang = $mapconfig = array ();
	foreach ( glob ( "./config/$mapPath/*.xml" ) as $filename ) {
		$object = simplexml_load_file ( $filename );
		if (isset ( $object->item )) {
			foreach ( $object->item as $item ) {
				$className = strval ( $item ['name'] );
				$mapconfig = array_merge ( $mapconfig, array (
						$className => array () 
				) );
				foreach ( $item->attributes () as $attribute => $value ) {
					if ($attribute != 'filename') {
						$mapconfig [$className] [$attribute] = get_bool ( $value );
					}
				}
				foreach ( $item->children () as $childName => $childData ) {
					if (empty ( $mapconfig [$className] [$childName] ) || ! is_array ( $mapconfig [$className] [$childName] )) {
						$mapconfig [$className] [$childName] = array ();
					}
					$fillType = strval ( $childData ['name'] );
					$mapconfig [$className] [$childName] [$fillType] = array ();
					foreach ( $childData->attributes () as $attribute => $value ) {
						if ($attribute != 'name') {
							$mapconfig [$className] [$childName] [$fillType] [$attribute] = get_bool ( $value );
						}
					}
				}
			}
		}
		if (isset ( $object->l10n )) {
			foreach ( $object->l10n->text as $text ) {
				$key = strval ( $text ['name'] );
				$value = strval ( $text->$userLang );
				$lang = array_merge ( $lang, array (
						$key => $value 
				) );
			}
		}
	}
}
$lang = array_merge ( $lang, getVehicleNames () );

// load installed placeables
$placeableObjects = $placeablesLang = array ();

foreach ( glob ( './config/placeables/*.xml' ) as $filename ) {
	$placeable = simplexml_load_file ( $filename );
	foreach ( $placeable->item as $item ) {
		$className = strval ( $item ['filename'] );
		$placeableObjects = array_merge ( $placeableObjects, array (
				$className => array () 
		) );
		foreach ( $item->attributes () as $attribute => $value ) {
			if ($attribute != 'filename') {
				$placeableObjects [$className] [$attribute] = get_bool ( $value );
			}
		}
		foreach ( $item->children () as $childName => $childData ) {
			if (empty ( $placeableObjects [$className] [$childName] ) || ! is_array ( $placeableObjects [$className] [$childName] )) {
				$placeableObjects [$className] [$childName] = array ();
			}
			$fillType = strval ( $childData ['name'] );
			$placeableObjects [$className] [$childName] [$fillType] = array ();
			foreach ( $childData->attributes () as $attribute => $value ) {
				if ($attribute != 'name') {
					$placeableObjects [$className] [$childName] [$fillType] [$attribute] = get_bool ( $value );
				}
			}
		}
	}
	foreach ( $placeable->l10n->text as $text ) {
		$key = strval ( $text ['name'] );
		$value = strval ( $text->$userLang );
		$placeablesLang = array_merge ( $placeablesLang, array (
				$key => $value 
		) );
	}
}
