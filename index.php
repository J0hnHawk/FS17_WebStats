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
//error_reporting ( E_ERROR | E_WARNING | E_PARSE );
error_reporting ( E_ALL );

session_start ();
define ( 'IN_NFMWS', true );

date_default_timezone_set ( 'Europe/Lisbon' );
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );

require ('./smarty/Smarty.class.php');
require ('./include/functions.php');

$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->assign ( 'webStatsVersion', '1.0.0' );

$configFile = './server/server.conf';
if (file_exists ( $configFile )) {
	$server = file ( $configFile );
	list ( $dSrvIp, $dSrvPort, $dSrvCode) = unserialize ( $server [0] );
	$serverAddress = "http://$dSrvIp:$dSrvPort/feed/%scode=$dSrvCode";
} else {
	define ( 'IN_INSTALL', true );
	include ('./include/install.php');
	exit ();
}

require ('./server/map26/production.php');
require ('./server/map26/translation.php');
$smarty->assign ( 'mapVersion', $mapVersion );

require ('./include/xmlTools.php');

$stats = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-stats.xml?' ) );
$careerVehicles = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=vehicles&' ) );
$careerSavegame = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=careerSavegame&' ) );
//$economy = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=economy&' ) );

// Stand der Daten ermitteln (Ingame-Zeitpunkt der Speicherung)
$currentDay = $careerSavegame->environment->currentDay;
$dayTime = $careerSavegame->environment->dayTime * 60;
$dayTime = gmdate("H:i",$dayTime);
$smarty->assign('currentDay', $currentDay);
$smarty->assign('dayTime', $dayTime);

// Cookie mit Einstellungen laden
$cookieVersion = 3;
$options = array ();
if (isset ( $_COOKIE ['nfmarsch'] )) {
	$options = json_decode ( $_COOKIE ['nfmarsch'], true );
	if (isset ( $options ['version'] ) && $options ['version'] != $cookieVersion) {
		$options = array ();
	}
}
// Erlaubte Seiten
$pages = array (
		'overview',
		'storage',
		'production',
		'options' 
);
$page = GetParam ( 'page', 'G' );
if (! in_array ( $page, $pages ))
	$page = 'production';
$smarty->assign ( 'page', $page );
include ("./include/$page.php");
$smarty->display ( 'index.tpl');
