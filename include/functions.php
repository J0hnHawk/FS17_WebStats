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

// Fabrikskripte liefern manchmal negative Zahlen
function getPositiveInt($value) {
	$int = intval ( $value );
	if ($int < 0) {
		return 0;
	}
	return $int;
}

// Produktionsstatus (savegame.php)
function getState($fillLevel, $fillMax) {
	if ($fillMax == 0) {
		return 0;
	}
	if ($fillLevel == 0) {
		return 2;
	} elseif ($fillLevel / $fillMax < 0.1) {
		return 1;
	}
	return 0;
}

// Array hinzufügen (savegame.php)
function addFillType($i3dName, $fillLevel, $fillMax, $prodPerHour, $factor, $state) {
	return array (
			'i3dName' => $i3dName,
			'fillLevel' => $fillLevel,
			'fillMax' => $fillMax,
			'prodPerHour' => $prodPerHour * $factor,
			'prodPerDay' => $prodPerHour * $factor * 24,
			'state' => $state 
	);
}
// convert values while reading xml files
function get_bool($value) {
	$value = strval ( $value );
	switch (strtolower ( $value )) {
		case 'true' :
			return true;
		case 'false' :
			return false;
		default :
			if (is_numeric ( $value )) {
				return $value + 0;
			}
	}
	return $value;
}

// Karten laden
function getMaps() {
	$maps = array ();
	// Dateien die im Kartenordner vorhanden sein müssen
	$mapFiles = array (
			'map.txt',
			'mapconfig.php',
			'pda_map_H.jpg',
			'translation',
			'translation/de.php' 
	);
	// Verzeichnis mit Karten druchsuchen
	if (is_dir ( './config' )) {
		if ($dh = opendir ( './config/' )) {
			while ( ($mapDir = readdir ( $dh )) !== false ) {
				if ($mapDir != "." && $mapDir != ".." && is_dir ( "./config/$mapDir" )) {
					$mapIsOK = true;
					foreach ( $mapFiles as $mapFile ) {
						if (! file_exists ( "./config/$mapDir/$mapFile" )) {
							$mapIsOK = false;
						}
					}
					if ($mapIsOK) {
						list ( $mapName, $mapShort, $mapVersion, $mapLink, $mapCopyright ) = file ( "./config/$mapDir/map.txt" );
						$maps [$mapDir] = array (
								'Name' => $mapName,
								'Path' => $mapDir,
								'Short' => $mapShort,
								'Version' => $mapVersion,
								'Link' => $mapLink,
								'Copyright' => $mapCopyright 
						);
					}
				}
			}
			closedir ( $dh );
		}
	}
	return $maps;
}

// Übersetzung
function translate($text) {
	global $lang, $placeablesLang;
	$text = strval ( $text );
	if (isset ( $lang [$text] )) {
		return $lang [$text];
	} elseif (isset ( $placeablesLang [$text] )) {
		return $placeablesLang [$text];
	} else {
		return '{' . $text . '}';
		return $text;
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

// Fahrzeugnamen
function getVehicleNames() {
	$vehicles = array ();
	if (file_exists ( './config/vehicles.conf' )) {
		$entries = file ( './config/vehicles.conf' );
		foreach ( $entries as $row ) {
			if (substr ( ltrim ( $row ), 0, 2 ) == '//' || trim ( $row ) == '') { // ignore comments and emtpty rows
				continue;
			}
			$keyValuePair = explode ( '=', $row );
			$key = trim ( $keyValuePair [0] );
			$value = $keyValuePair [1];
			if (! empty ( $key )) {
				$vehicles [$key] = chop ( $value );
			}
		}
	}
	return $vehicles;
}

// Palettenart aus Dateiname extrahieren
function cleanFileName($uri) {
	$split = explode ( '/', strval ( $uri ) );
	$filename = substr ( array_pop ( $split ), 0, - 4 );
	return $filename;
}

// Waren anlegen und/oder addieren
function addCommodity($fillType, $fillLevel, $location, $className = 'none', $isCombine = false) {
	global $commodities;
	$l_fillType = translate ( $fillType );
	$l_location = translate ( $location );
	if (! isset ( $commodities [$l_fillType] )) {
		$commodities [$l_fillType] = array (
				'overall' => $fillLevel,
				'i3dName' => $fillType,
				'isCombine' => $isCombine,
				'locations' => array () 
		);
	} else {
		$commodities [$l_fillType] ['overall'] += $fillLevel;
	}
	if (! isset ( $commodities [$l_fillType] ['locations'] [$l_location] )) {
		$commodities [$l_fillType] ['locations'] += array (
				$l_location => array (
						'i3dName' => $location,
						$className => 1,
						'fillLevel' => $fillLevel 
				) 
		);
	} else {
		$commodities [$l_fillType] ['locations'] [$l_location] [$className] ++;
		$commodities [$l_fillType] ['locations'] [$l_location] ['fillLevel'] += $fillLevel;
	}
}

// Positionen von Paletten ermitteln
function getLocation($position) {
	list ( $posx, $posy, $posz ) = explode ( ' ', $position );
	global $map, $mapconfig;
	$mapSize = intval($map ['Size']) / 2;
	if ($posx < (0 - $mapSize) || $posx > $mapSize || $posy < 0 || $posy > 255 || $posz < (0 - $mapSize) || $posz > $mapSize) {
		return 'outOfMap';
	}
	foreach ( $mapconfig as $plant => $plantData ) {
		if (isset ( $plantData ['output'] )) {
			foreach ( $plantData ['output'] as $fillType => $fillTypeData ) {
				if (isset ( $fillTypeData ['palettArea'] )) {
					list ( $x1, $z1, $x2, $z2 ) = explode ( ' ', $fillTypeData ['palettArea'] );
					if ($posx > $x1 && $posx < $x2 && $posz > $z1 && $posz < $z2) {
						return $plant;
					}
				}
			}
		}
	}
	return 'onMap';
}

// Futtertroggröße und Produktivität der Tiere ermitteln
function getMaxForage($forage, $numAnimals) {
	return $forage * ($numAnimals > 0 && $numAnimals < 15 ? 15 : $numAnimals) * 6;
}
function getAnimalProductivity($location, $tipTriggers) {
	if (strpos ( $tipTriggers, 'water' ) === false) {
		return 0;
	}
	global $mapconfig;
	$productivity = 0;
	if ($location == 'Animals_sheep') {
		$productivity = 10;
	}
	foreach ( $mapconfig [$location] ['productivity'] as $trigger => $value ) {
		if (strpos ( $tipTriggers, $trigger ) !== false) {
			$productivity += $value;
		}
	}
	return $productivity;
}

// Funktionen aus der xmlTools.php des WebstatsSDK von Giants
function loadFileHTTPSocket($domain, $port, $path, $timeout) {
	/**
	 * Copyright (c) 2008-2013 GIANTS Software GmbH, Confidential, All Rights Reserved.
	 * Copyright (c) 2003-2013 Christian Ammann and Stefan Geiger, Confidential, All Rights Reserved.
	 */
	$fp = fsockopen ( $domain, $port, $errno, $errstr, $timeout );
	if ($fp) {
		// Make request
		$out = "GET " . $path . " HTTP/1.0\r\n";
		$out .= "Host: " . $domain . "\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite ( $fp, $out );
		// Get response
		$resp = "";
		while ( ! feof ( $fp ) ) {
			$resp .= fgets ( $fp, 256 );
		}
		fclose ( $fp );
		// Check status is 200
		if (preg_match ( "/HTTP\/1\.\d\s(\d+)/", $resp, $matches ) && $matches [1] == 200) {
			// Load xml as object
			$parts = explode ( "\r\n\r\n", $resp );
			$temp = "";
			for($i = 1; $i < count ( $parts ); $i ++) {
				$temp .= $parts [$i];
			}
			return $temp;
		}
	}
	return false;
}
function getServerStatsSimpleXML($url) {
	/**
	 * Copyright (c) 2008-2013 GIANTS Software GmbH, Confidential, All Rights Reserved.
	 * Copyright (c) 2003-2013 Christian Ammann and Stefan Geiger, Confidential, All Rights Reserved.
	 */
	$urlParts = parse_url ( $url );
	// cacheFile für auch savegame ergänzt
	$pathParts = pathinfo ( $urlParts ['path'] );
	parse_str ( $urlParts ["query"], $pathQuery );
	if (! file_exists ( './cache' )) {
		mkdir ( './cache' );
	}
	$cacheFile = './cache/' . $pathParts ['filename'] . (isset ( $pathQuery ['file'] ) ? '-' . $pathQuery ['file'] : '') . '.cached';
	$cacheTimeout = 60;
	if (file_exists ( $cacheFile ) && filemtime ( $cacheFile ) > (time () - ($cacheTimeout) + rand ( 0, 10 ))) {
		$xmlStr = file_get_contents ( $cacheFile );
	} else {
		error_reporting ( 0 );
		$xmlStr = loadFileHTTPSocket ( $urlParts ["host"], $urlParts ["port"], $urlParts ["path"] . "?" . $urlParts ["query"], 4 );
		error_reporting ( E_ALL );
		if ($xmlStr) {
			$fp = fopen ( $cacheFile, "w" );
			fwrite ( $fp, $xmlStr );
			fclose ( $fp );
		}
	}
	return simplexml_load_string ( $xmlStr );
}
function getVehicleClass($category, $type) {
	/**
	 * Copyright (c) 2008-2013 GIANTS Software GmbH, Confidential, All Rights Reserved.
	 * Copyright (c) 2003-2013 Christian Ammann and Stefan Geiger, Confidential, All Rights Reserved.
	 */
	if ($category == 'vehicle') {
		return 'vehicle';
	} else if ($category == 'harvester') {
		return 'harvester';
	} else if ($category == 'tool') {
		return 'tool';
	} else if ($category == 'trailer') {
		return 'trailer';
	} else if ($category == 'tractors') {
		return 'vehicle';
	} else if ($category == 'trucks') {
		return 'vehicle';
	} else if ($category == 'wheelLoaders') {
		if ($type == 'dynamicMountAttacherImplement') {
			return 'tool';
		} else if ($type == 'shovel_animated') {
			return 'tool';
		} else if ($type == 'shovel_dynamicMountAttacher') {
			return 'tool';
		} else {
			return 'vehicle';
		}
	} else if ($category == 'teleLoaders') {
		if ($type == 'dynamicMountAttacherImplement') {
			return 'tool';
		} else if ($type == 'baleGrab') {
			return 'tool';
		} else if ($type == 'shovel_dynamicMountAttacher') {
			return 'tool';
		} else if ($type == 'shovel_animated') {
			return 'tool';
		} else {
			return 'vehicle';
		}
	} else if ($category == 'skidSteers') {
		if ($type == 'dynamicMountAttacherImplement') {
			return 'tool';
		} else if ($type == 'shovel') {
			return 'tool';
		} else if ($type == 'shovel_dynamicMountAttacher') {
			return 'tool';
		} else if ($type == 'stumpCutter') {
			return 'tool';
		} else if ($type == 'treeSaw') {
			return 'tool';
		} else {
			return 'vehicle';
		}
	} else if ($category == 'cars') {
		return 'vehicle';
	} else if ($category == 'harvesters') {
		return 'harvester';
	} else if ($category == 'forageHarvesters') {
		if ($type == 'attachableCombine') {
			return 'tool';
		} else {
			return 'harvester';
		}
	} else if ($category == 'potatoHarvesting') {
		if ($type == 'defoliator_animated') {
			return 'tool';
		} else {
			return 'harvester';
		}
	} else if ($category == 'beetHarvesting') {
		if ($type == 'defoliater_cutter_animated') {
			return 'tool';
		} else {
			return 'harvester';
		}
	} else if ($category == 'frontLoaders') {
		if ($type == 'wheelLoader') {
			return 'vehicle';
		} else {
			return 'tool';
		}
	} else if ($category == 'forageHarvesterCutters') {
		return 'tool';
	} else if ($category == 'cutters') {
		return 'tool';
	} else if ($category == 'plows') {
		return 'tool';
	} else if ($category == 'cultivators') {
		return 'tool';
	} else if ($category == 'sowingMachines') {
		return 'tool';
	} else if ($category == 'sprayers') {
		if ($type == 'selfPropelledSprayer') {
			return 'vehicle';
		} else {
			return 'tool';
		}
	} else if ($category == 'fertilizerSpreaders') {
		return 'tool';
	} else if ($category == 'weeders') {
		return 'tool';
	} else if ($category == 'mowers') {
		return 'tool';
	} else if ($category == 'tedders') {
		return 'tool';
	} else if ($category == 'windrowers') {
		return 'tool';
	} else if ($category == 'baling') {
		if ($type == 'transportTrailer') {
			return 'trailer';
		} else if ($type == 'baleLoader') {
			return 'trailer';
		} else if ($type == 'baler') {
			return 'trailer';
		} else {
			return 'tool';
		}
	} else if ($category == 'chainsaws') {
		return 'tool';
	} else if ($category == 'wood') {
		if ($type == 'transportTrailer') {
			return 'trailer';
		} else if ($type == 'forwarderTrailer_steerable') {
			return 'trailer';
		} else if ($type == 'woodCrusherTrailer') {
			return 'trailer';
		} else if ($type == 'combine_animated') {
			return 'vehicle';
		} else if ($type == 'forwarder') {
			return 'vehicle';
		} else if ($type == 'woodHarvester') {
			return 'vehicle';
		} else {
			return 'tool';
		}
	} else if ($category == 'animals') {
		if ($type == 'selfPropelledMixerWagon') {
			return 'vehicle';
		} else {
			return 'trailer';
		}
	} else if ($category == 'leveler') {
		return 'tool';
	} else if ($category == 'misc') {
		if ($type == 'fuelTrailer') {
			return 'trailer';
		} else {
			return 'tool';
		}
	} else if ($category == 'dollys') {
		return 'trailer';
	} else if ($category == 'weights') {
		return 'tool';
	} else if ($category == 'pallets') {
		return 'tool';
	} else if ($category == 'belts') {
		return 'tool';
	} else if ($category == 'placeables') {
		return 'tool';
	} else if ($category == 'tippers') {
		return 'trailer';
	} else if ($category == 'augerWagons') {
		return 'trailer';
	} else if ($category == 'slurryTanks') {
		if ($type == 'manureBarrelCultivator') {
			return 'tool';
		} else {
			return 'trailer';
		}
	} else if ($category == 'manureSpreaders') {
		return 'trailer';
	} else if ($category == 'loaderWagons') {
		return 'trailer';
	} else if ($category == 'lowloaders') {
		return 'trailer';
	} else if ($category == 'cutterTrailers') {
		return 'trailer';
	} else {
		return 'tool';
	}
}
