<?php
/**
 *
 * This file is part of the "NF Marsch Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
 * 
 * "NF Marsch Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *  
 * "NF Marsch Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );

session_start ();
define ( 'IN_NFMWS', true );

date_default_timezone_set ( 'Europe/Lisbon' );
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );

require ('./smarty/Smarty.class.php');
require ('./include/functions.php');
require ('./include/xmlTools.php');

$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->assign ( 'webStatsVersion', '1.1.0 alpha' );

// Serverkonfiguration laden - wenn nicht vorhanden Instalation starten
$configFile = './server/server.conf';
if (file_exists ( $configFile )) {
	$server = file ( $configFile );
	list ( $dSrvIp, $dSrvPort, $dSrvCode ) = unserialize ( $server [0] );
	$serverAddress = "http://$dSrvIp:$dSrvPort/feed/%scode=$dSrvCode";
} else {
	define ( 'IN_INSTALL', true );
	include ('./include/install.php');
	exit ();
}


// Cookie mit Einstellungen laden
include ('./include/coockie.php');

// Kartendetails laden
require ('./server/map26/production.php');
require ('./server/map26/translation.php');
$smarty->assign ( 'mapVersion', $mapVersion );

// Erlaubte Seiten
$pages = array (
		'overview',
		'storage',
		'production',
		'details',
		'options' 
);
$page = GetParam ( 'page', 'G' );
if (! in_array ( $page, $pages ))
	$page = 'production';
$smarty->assign ( 'page', $page );
include ("./include/$page.php");
$mapdata = new savegame($serverAddress);

$smarty->assign ( 'serverOnline', $mapdata->serverIsOnline() );
$smarty->display ( 'index.tpl' );
