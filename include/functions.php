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
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

// GET & POST Parameter holen
function GetParam($ParamName, $Method = "P", $DefaultValue = "") {
	if ($Method == "P") {
		if (isset ( $_POST [$ParamName] ))
			return $_POST [$ParamName];
		else
			return $DefaultValue;
	} else if ($Method == "G") {
		if (isset ( $_GET [$ParamName] ))
			return $_GET [$ParamName];
		else
			return $DefaultValue;
	}
}

// Übersetzung
function translate($text) {
	global $lang;
	$text = strval ( $text );
	if (isset ( $lang [$text] )) {
		return $lang [$text];
	} else {
		return '{' . $text . '}';
	}
}

// mehrere Strings (Array) in einem Text suchen
function strposa($haystack, $needle, $offset = 0) {
	if (! is_array ( $needle ))
		$needle = array (
				$needle 
		);
	foreach ( $needle as $query ) {
		if (strpos ( $haystack, $query, $offset ) !== false)
			return true; // stop on first true result
	}
	return false;
}

// Palettenart aus Dateiname extrahieren
function getFillType($uri) {
	$split = explode ( '/', strval ( $uri ) );
	$filename = substr ( array_pop ( $split ), 0, - 4 );
	return translate ( $filename );
}

// Waren anlegen und/oder addieren
function addCommodity($fillType, $fillLevel, $location, $className = 'none') {
	global $commodities;
	if (! isset ( $commodities [$fillType] )) {
		$commodities [$fillType] = array (
				'overall' => $fillLevel
		);
	} else {
		$commodities [$fillType] ['overall'] += $fillLevel;
	}
	if (! isset ( $commodities [$fillType] [$location] )) {
		$commodities [$fillType] += array (
				$location => array (
						$className => 1,
						'fillLevel' => $fillLevel
				)
		);
	} else {
		$commodities [$fillType] [$location] [$className] ++;
		$commodities [$fillType] [$location] ['fillLevel'] += $fillLevel;
	}
}

