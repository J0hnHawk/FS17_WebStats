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
ini_set ( 'display_errors', 1 );
ini_set ( 'log_errors', 1 );
ini_set ( 'error_log', 'error.log' );

session_start ();
define ( 'IN_NFMWS', true );

// Change next both lines if you are not Germen ;-)
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );
$language = 'de'; // there are language files for german & english in language folder. there ist also a "french-folder" but it still contains a english translation

require ('./include/smarty/Smarty.class.php');
require ('./include/language.php');
require ('./include/functions.php');

$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->assign ( 'webStatsVersion', 'Version 1.3.0 (alpha)' );
$smarty->assign ( 'languages', $languages );

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
$tpl_source = $smarty->fetch ( 'index.tpl' );
echo preg_replace_callback('/##(.+?)##/', 'prefilter_i18n', $tpl_source);




