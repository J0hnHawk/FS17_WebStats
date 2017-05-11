<?php
session_start ();
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
date_default_timezone_set ( 'Europe/Lisbon' );
// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ... | E_NOTICE)
error_reporting ( E_ERROR | E_WARNING | E_PARSE );
error_reporting ( E_ALL );
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );
require ("./include/config.php");
require ('./include/smarty/Smarty.class.php');
require ('./include/functions.php');

$style = 'bootstrap';

$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir ( "./styles/$style/templates" );
$smarty->assign ( 'page', 'index' );
$smarty->assign ( 'style', $style );
$smarty->display ( 'index.htpl', $style, $style );
