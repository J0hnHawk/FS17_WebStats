<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
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

// Coockie laden, wenn vorhanden
$cookieVersion = 9;
$options = array ();
if (isset ( $_COOKIE ['nfmarsch'] )) {
	$options = json_decode ( $_COOKIE ['nfmarsch'], true );
	if (isset ( $options ['version'] ) && $options ['version'] != $cookieVersion) {
		$options = array ();
	}
}

if (! isset ( $options ['general'] )) {
	$options ['general'] ['reload'] = true;
	$options ['general'] ['language'] = $defaultLanguage;
	$options ['general'] ['style'] = $defaultStyle;
}

if (! isset ( $options ['storage'] )) {
	$options ['storage'] ['sortByName'] = true;
	$options ['storage'] ['hideZero'] = true;
	$options ['storage'] ['showVehicles'] = true;
	$options ['storage'] ['onlyPallets'] = false;
	$options ['storage'] ['3column'] = true;
}

if (! isset ( $options ['production'] )) {
	$options ['production'] ['sortByName'] = true;
	$options ['production'] ['sortFullProducts'] = true;
	$options ['production'] ['showTooltip'] = false;
	$options ['production'] ['hidePlant'] = array();
}

if (! isset ( $options ['defaultView'] )) {
	$options ['defaultView'] ['factories'] = false;
	$options ['defaultView'] ['commodities'] = false;
}

$_SESSION ['language'] = $options ['general'] ['language'];
