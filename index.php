<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ERROR | E_WARNING | E_PARSE );
error_reporting ( E_ALL );

session_start ();
define ( 'IN_NFMWS', true );

date_default_timezone_set ( 'Europe/Lisbon' );
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );

require ('./include/xmlTools.php');
require ("./config/config.php");
require ("./config/map_26.php");
require ('./smarty/Smarty.class.php');
require ('./include/functions.php');
include ("./language/de.php");

$stats = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-stats.xml?' ) );
$savegame = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=vehicles&' ) );

$style = 'bootstrap';

// Cookie mit Einstellungen laden
$cookieVersion = 1; 
$options = array ();
if (isset ( $_COOKIE ['nfmarsch'] )) {
	$options = json_decode ( $_COOKIE ['nfmarsch'], true );
	if (isset($options ['version']) && $options ['version'] != $cookieVersion) {
		$options = array ();
	}
}
// Erlaubte Seiten
$pages = array (
		'status',
		'storage',
		'production',
		'options' 
);
$page = GetParam ( 'page', 'G' );
if (! in_array ( $page, $pages ))
	$page = 'status';
$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir ( "./styles/$style/templates" );
$smarty->assign('siteTitle',$siteTitle);
$smarty->assign ( 'page', $page );
include ("./include/$page.php");
$smarty->assign ( 'style', $style );
$smarty->display ( 'index.tpl', $style, $style );
