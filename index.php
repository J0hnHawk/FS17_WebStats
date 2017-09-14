<?php
/**
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017 John Hawk <john.hawk@gmx.net>
 *
 * "FS17 Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "FS17 Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar. If not, see <http://www.gnu.org/licenses/>.
 */
ini_set ( 'error_reporting', E_ALL );
ini_set ( 'display_errors', 0 );
ini_set ( 'log_errors', 1 );
ini_set ( 'error_log', 'error.log' );

session_start ();
define ( 'IN_NFMWS', true );

setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );

require ('./include/smarty/Smarty.class.php');
require ('./include/functions.php');

$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->assign ( 'webStatsVersion', 'Version 1.3.0 (alpha)' );

// Serverkonfiguration laden - wenn nicht vorhanden Instalation starten
$configFile = './config/server.conf';
if (file_exists ( $configFile )) {
	$server = file ( $configFile );
	$serverConfig = unserialize ( $server[0] );
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

// Cookie mit Einstellungen laden
include ('./include/coockie.php');

// Kartendetails laden
list ( $mapName, $mapShort, $mapVersion, $mapLink, $mapCopyright ) = file ( "./config/$mapPath/map.txt" );
$map = array (
		'Name' => $mapName,
		'Path' => $mapPath,
		'Short' => $mapShort,
		'Version' => $mapVersion,
		'Link' => $mapLink,
		'Copyright' => $mapCopyright 
);
$smarty->assign ( 'map', $map );
require ("./config/$mapPath/mapconfig.php");
require ("./config/$mapPath/translation.php");
require ("./config/$mapPath/common.php");
require ('./include/savegame.php');

// Erlaubte Seiten
$pages = array (
		'overview',
		'storage',
		'production',
		'commodity',
		'options',
		'lizenz',
		'factories' 
);
$page = GetParam ( 'page', 'G' );
if (! in_array ( $page, $pages ))
	$page = 'production';

$smarty->assign ( 'page', $page );
if ($serverOnline)
	include ("./include/$page.php");

$smarty->assign ( 'reloadPage', $options ['general'] ['reload'] );
$smarty->assign ( 'serverOnline', $serverOnline );
$smarty->display ( 'index.tpl' );
