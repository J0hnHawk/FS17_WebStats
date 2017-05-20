<?php
define ( 'IN_NFMWS', true );
session_start ();
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
date_default_timezone_set ( 'Europe/Lisbon' );
// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ... | E_NOTICE)
error_reporting ( E_ERROR | E_WARNING | E_PARSE );
error_reporting ( E_ALL );
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );
require ('./include/xmlTools.php');
require ("./include/config.php");
require ('./include/smarty/Smarty.class.php');
require ('./include/functions.php');
include ("./language/de.php");
$stats = getServerStatsSimpleXML ( $serverAddress );
$savegame = getServerStatsSimpleXML('http://176.57.155.146:8080/feed/dedicated-server-savegame.html?code=QIWF5Osq&file=vehicles');

$style = 'bootstrap';
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
$smarty->assign ( 'page', $page );
include ("./include/$page.php");
$smarty->assign ( 'style', $style );
$smarty->display ( 'index.tpl', $style, $style );
