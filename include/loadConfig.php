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

// Load server configuration - start install if it does not exists
$configFile = './config/server.conf';
if (file_exists ( $configFile )) {
	$server = file ( $configFile );
	$serverConfig = unserialize ( $server [0] );
	list ( $dSrvIp, $dSrvPort, $dSrvCode, $savegame, $isDediServer, $mapPath ) = $serverConfig;
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

// Load map infomations
$map = loadMapCFGfile ( $mapPath );
$smarty->assign ( 'map', $map );

// Load map config
$userLang = $_SESSION ['language'];
// Kartenkonfiguration aus XML Dateien laden
$loadedConfig = loadXMLMapConfig ( '_gameOwn', $userLang );
$mapconfig = $loadedConfig [0];
$lang = $loadedConfig [1];
if (trim ( $map ['configFormat'] ) != 'xml') {
	require ("./config/$mapPath/mapconfig.php");
	if (! file_exists ( "./config/$mapPath/translation/{$_SESSION ['language']}.php" )) {
		require ("./config/$mapPath/translation/$defaultLanguage.php");
	} else {
		require ("./config/$mapPath/translation/{$_SESSION ['language']}.php");
	}
} else {
	// Kartenkonfiguration aus XML Dateien laden
	$loadedConfig = loadXMLMapConfig ( $mapPath, $userLang );
	$mapconfig = array_merge ( $mapconfig, $loadedConfig [0] );
	$lang = array_merge ( $lang, $loadedConfig [1] );
}

// load installed mods
$loadedConfig = loadXMLMapConfig ( '_mods', $userLang );
$placeableObjects = $loadedConfig [0];
$placeablesLang = $loadedConfig [1];

