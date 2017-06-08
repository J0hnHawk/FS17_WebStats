<?php
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
$smarty->setTemplateDir ( "./styles/bootstrap/templates" );
$smarty->assign ( 'webStatsVersion', '1.0-2' );

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
$smarty->assign ( 'style', 'bootstrap' );
$smarty->display ( 'index.tpl', 'bootstrap', 'bootstrap' );
