<?php
/**
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
ini_set ( 'error_reporting', E_ALL );
ini_set ( 'display_errors', 1 );
ini_set ( 'log_errors', 1 );
ini_set ( 'error_log', 'error.log' );

session_start ();
define ( 'IN_NFMWS', true );

// Change next lines if you are not Germen ;-)
if (function_exists ( 'date_default_timezone_set' )) {
	date_default_timezone_set ( 'Europe/Berlin' );
}
setlocale ( LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge' );
$defaultLanguage = 'de'; // if you change the default language make sure the language file exists

$defaultStyle = 'fs17';

require ('./include/smarty/Smarty.class.php');
require ('./include/functions.php');
require ('./include/language.php');

// Cookie mit Einstellungen laden
include ('./include/coockie.php');
$style = $options ['general'] ['style'];

$smarty = new Smarty ();
$smarty->debugging = true;
$smarty->caching = false;
$smarty->setTemplateDir ( "./styles/$style/templates" );
$smarty->assign ( 'webStatsVersion', 'Version 1.4.0 (alpha)' );

include ('./include/loadConfig.php');

require ('./include/savegame.php');

// Erlaubte Seiten
$pages = array (
		'overview',
		'husbandry',
		'storage',
		'production',
		'commodity',
		'options',
		'lizenz',
		'prices',
		'factories' 
);
$page = GetParam ( 'page', 'G' );
if (! in_array ( $page, $pages )) {
	$page = 'production';
}
$smarty->assign ( 'page', $page );
if ($serverOnline) {
	include ("./include/$page.php");
}
$smarty->assign ( 'reloadPage', $options ['general'] ['reload'] );
$smarty->assign ( 'serverOnline', $serverOnline );
$smarty->assign ( 'style', $style );
// $smarty->display ( 'index.htpl', $style, $style );
$tpl_source = $smarty->fetch ( 'index.tpl', $style, $style );

echo preg_replace_callback ( '/##(.+?)##/', 'prefilter_i18n', $tpl_source );




