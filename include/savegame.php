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

// Daten laden
if ($isDediServer) {
	$serverAddress = "http://$dSrvIp:$dSrvPort/feed/%scode=$dSrvCode";
	$stats = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-stats.xml?' ) );
	$careerVehicles = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=vehicles&' ) );
	$careerSavegame = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=careerSavegame&' ) );
} else {
	$stats = 1;
	$careerVehicles = simplexml_load_file ( $savegame . 'vehicles.xml' );
	$careerSavegame = simplexml_load_file ( $savegame . 'careerSavegame.xml' );
}
if ($stats) {
	$serverOnline = true;
} else {
	$serverOnline = false;
	echo ("<h1>" . ($careerVehicles) . "</h1>");
	return;
}

$commodities = $outOfMap = $positions = $plants = $placeables = $tipTrigger = $prices = array ();

// Stand der Daten ermitteln (Ingame-Zeitpunkt der Speicherung)
$currentDay = $careerSavegame->environment->currentDay;
$dayTime = $careerSavegame->environment->dayTime * 60;
$dayTime = gmdate ( "H:i", $dayTime );
$smarty->assign ( 'currentDay', $currentDay );
$smarty->assign ( 'dayTime', $dayTime );

// Platzierbare Objekte suchen, mapconfig ergänzen
foreach ( $careerVehicles->item as $item ) {
	$filename = cleanFileName ( $item ['filename'] );
	if (! isset ( $placeableObjects [$filename] ['locationType'] )) {
		continue;
	}
	if (isset ( $placeables [$filename] )) {
		$placeables [$filename] ++;
	} else {
		$placeables [$filename] = 1;
	}
	$placeableKey = $filename . str_replace ( array (
			" ",
			".",
			"-" 
	), "", $item ['position'] );
	$mapconfig [$placeableKey] = $placeableObjects [$filename];
	$mapconfig [$placeableKey] ['position'] = strval ( $item ['position'] );
	if (isset ( $mapconfig [$placeableKey] ['output'] )) {
		list ( $px, $py, $pz ) = explode ( ' ', $mapconfig [$placeableKey] ['position'] );
		foreach ( $mapconfig [$placeableKey] ['output'] as $trigger => $triggerData ) {
			if (isset ( $mapconfig [$placeableKey] ['output'] [$trigger] ['palettArea'] )) {
				list ( $x1, $z1, $x2, $z2 ) = explode ( ' ', $mapconfig [$placeableKey] ['output'] [$trigger] ['palettArea'] );
				$x1 = $x1 + $px;
				$x2 = $x2 + $px;
				$z1 = $z1 + $pz;
				$z2 = $z2 + $pz;
				$mapconfig [$placeableKey] ['output'] [$trigger] ['palettArea'] = "$x1 $z1 $x2 $z2";
			}
		}
	}
	$lang [$placeableKey] = $placeablesLang [$filename] . " #" . $placeables [$filename];
}

// Paletten, Ballen
foreach ( $careerVehicles->item as $item ) {
	$className = strval ( $item ['className'] );
	$fillType = false;
	$location = getLocation ( $item ['position'] );
	if ($className == 'FillablePallet' || $className == 'Bale') {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = cleanFileName ( $item ['i3dFilename'] );
		} else {
			$fillType = cleanFileName ( $item ['filename'] );
		}
		if ($fillType) {
			$fillLevel = intval ( $item ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $location, $className );
			if ($location == 'outOfMap') {
				$commodities [translate ( $fillType )] ['outOfMap'] = true;
				// für Modal Dialog mit Edit-Vorschlag, Platzierung beim Palettenlager
				$outOfMap [] = array (
						$className,
						$fillType,
						strval ( $item ['position'] ),
						'-870 100 ' . (- 560 + sizeof ( $outOfMap ) * 2) 
				);
			} else {
				$positions [$className] [translate ( $fillType )] [] = array (
						'name' => $className,
						'position' => explode ( ' ', $item ['position'] ) 
				);
			}
		}
	}
	$filename = cleanFileName ( $item ['filename'] );
	if (! isset ( $placeableObjects [$filename] ['locationType'] )) {
		continue;
	}
	$position = strval ( $item ['position'] );
	$placeableKey = $filename . str_replace ( array (
			" ",
			".",
			"-" 
	), "", $position );
	readMapObject ( $item, $placeableKey, $plants, $mapconfig );
}

// Fahrzeuge aus $careerVehicles
foreach ( $careerVehicles->vehicle as $vehicle ) {
	if (isset ( $vehicle ['fillTypes'] )) {
		$location = cleanFileName ( $vehicle ['filename'] );
		$position = $vehicle->component1 ['position'];
		$fillTypes = explode ( ' ', $vehicle ['fillTypes'] );
		$fillLevels = explode ( ' ', $vehicle ['fillLevels'] );
		foreach ( $fillTypes as $key => $fillType ) {
			$fillType = strval ( $fillType );
			$fillLevel = intval ( $fillLevels [$key] );
			if ($fillType == 'unknown') {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location, 'isVehicle' );
				$positions ['vehicle'] [translate ( $fillType )] [] = array (
						'name' => $location,
						'position' => explode ( ' ', $position ) 
				);
			}
		}
	}
}

// Analysierung von CreateLoadedObjects
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$location = strval ( $object ['saveId'] );
	// Verkaufspreise ermitteln
	if ((strstr ($location, 'TipTrigger' ) !== false || $location == "Bga") && $location != 'TipTrigger_FARM_SILO') {
		$foreach = $object->stats;
		$l_location = translate ( $location );
		$tipTrigger [$l_location] = $location;
		if ($location == 'Bga') {
			$foreach = $object->tipTrigger->stats;
		}
		foreach ( $foreach as $triggerStats ) {
			$fillType = strval ( $triggerStats ['fillType'] );
			$l_fillType = translate ( $fillType );
			if (! isset ( $prices [$l_fillType] )) {
				$prices [$l_fillType] = array (
						'i3dName' => $fillType,
						'locations' => array () 
				);
			}
			$curve0 = $triggerStats->curveBaseCurve;
			$curve1 = $triggerStats->curve1;
			$sin1 = floatval ( $curve0 ['amplitude'] ) * sin ( (2 * pi () / floatval ( $curve0 ['period'] )) * floatval ( $curve0 ['time'] ) );
			$sin2 = floatval ( $curve1 ['amplitude'] ) * sin ( (2 * pi () / floatval ( $curve1 ['period'] )) * floatval ( $curve1 ['time'] ) ) + floatval ( $curve1 ['nominalAmplitude'] ) * 10;
			$price = intval ( ($sin1 + $sin2) * 1000 );
			$prices [$l_fillType] ['locations'] [$l_location] = array (
					'price' => $price,
					'i3dName' => $location 
			);
		}
	}
	// Lager, Fabriken usw. analysieren
	if (! isset ( $mapconfig [$location] ['locationType'] )) {
		continue;
	} else {
		readMapObject ( $object, $location, $plants, $mapconfig );
	}
}
function readMapObject($object, $location, &$plants, &$mapconfig) {
	global $commodities;
	switch ($mapconfig [$location] ['locationType']) {
		case 'storage' :
			// Farmsilo und andere Lager Goldcrest Valley
			foreach ( $object->node as $node ) {
				$fillType = strval ( $node ['fillType'] );
				$fillLevel = intval ( $node ['fillLevel'] );
				addCommodity ( $fillType, $fillLevel, $location );
			}
			break;
		case 'fuelStation' :
			// Tankstellen
			$fillType = 'fuel';
			$fillLevel = intval ( $object ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $location );
			break;
		case 'bunker' :
			// Fahrsilos
			$state = intval ( $object ['state'] );
			$fillLevel = intval ( $object ['fillLevel'] );
			if ($state < 2) {
				$fillType = 'chaff';
			} else {
				$fillType = 'silage';
			}
			addCommodity ( $fillType, $fillLevel, $location );
			break;
		case 'bga' :
			$fillType = 'digestate';
			if ($mapconfig [$location] ['output'] [$fillType] ['showInStorage']) {
				$fillLevel = intval ( $object ['digestateSiloFillLevel'] );
				addCommodity ( $fillType, $fillLevel, $location );
			}
			if ($mapconfig [$location] ['showInProduction']) {
				$plant = translate ( $location );
				$prodPerHour = $mapconfig [$location] ['ProdPerHour'];
				$plants [$plant] = array (
						'i3dName' => $location,
						'position' => $mapconfig [$location] ['position'],
						'state' => 0,
						'input' => array (),
						'output' => array () 
				);
				foreach ( $mapconfig [$location] ['input'] as $fillType => $fillTypeData ) {
					$fillLevel = intval ( $object [$fillTypeData ['fillTypes']] );
					$l_fillType = translate ( $fillType );
					$fillMax = $mapconfig [$location] ['input'] [$fillType] ['capacity'];
					$state = 0;
					if (is_numeric ( $fillMax )) {
						$state = getState ( $fillLevel, $fillMax );
						if ($state > $plants [$plant] ['state']) {
							$plants [$plant] ['state'] = $state;
						}
					} elseif ($fillLevel == 0) {
						$state = 2;
					}
					$plants [$plant] ['input'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $mapconfig [$location] ['input'] [$fillType] ['factor'], $state );
				}
				foreach ( $mapconfig [$location] ['output'] as $fillType => $fillTypeData ) {
					$fillLevel = intval ( $object [$fillTypeData ['fillTypes']] );
					$l_fillType = translate ( $fillType );
					$fillMax = $mapconfig [$location] ['output'] [$fillType] ['capacity'];
					$state = 0;
					if (is_numeric ( $fillMax )) {
						$state = getState ( $fillMax - $fillLevel, $fillMax );
					}
					$plants [$plant] ['output'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $mapconfig [$location] ['output'] [$fillType] ['factor'], $state );
				}
			}
			break;
		case 'animal' :
			// Viehhaltung
			$numAnimals = intval ( $object ['numAnimals0'] );
			addCommodity ( substr ( $location, 8, 99 ), $numAnimals, $location );
			$cleanlinessFactor = floatval ( $object ['cleanlinessFactor'] );
			$ProdPerHour = $numAnimals / 24;
			$plant = translate ( $location );
			$plants [$plant] = array (
					'i3dName' => $location,
					'position' => $mapconfig [$location] ['position'],
					'state' => 0,
					'nameAnimals' => substr ( $location, 8, 99 ),
					'numAnimals' => $numAnimals,
					'cleanlinessFactor' => intval ( $cleanlinessFactor * 100 ) 
			);
			// Futtertröge zusammenrechnen
			$fillTypes = array ();
			foreach ( $object->tipTriggerFillLevel as $tipTrigger ) {
				foreach ( $mapconfig [$location] ['input'] as $combineFillType => $fillTypeData ) {
					if (! isset ( $fillTypes [$combineFillType] ))
						$fillTypes [$combineFillType] = 0;
					if (strpos ( $fillTypeData ['fillTypes'], strval ( $tipTrigger ['fillType'] ) ) !== false) {
						$fillTypes [$combineFillType] += intval ( $tipTrigger ['fillLevel'] );
					}
				}
			}
			// Kapazitäten & Produktivität errechnen
			$tipTriggers = '';
			foreach ( $fillTypes as $combineFillType => $fillLevel ) {
				if ($fillLevel != 0) {
					$tipTriggers .= $combineFillType;
				}
				$l_fillType = translate ( $combineFillType );
				$trough_factor = $mapconfig [$location] ['input'] [$combineFillType] ['trough_factor'];
				$usage_factor = $mapconfig [$location] ['input'] [$combineFillType] ['consumption_factor'];
				$fillMax = getMaxForage ( $trough_factor, $numAnimals );
				if ($fillMax < $fillLevel) {
					$fillMax = $fillLevel;
				}
				$state = getState ( $fillLevel, $fillMax );
				if ($state > $plants [$plant] ['state']) {
					$plants [$plant] ['state'] = $state;
				}
				$plants [$plant] ['input'] [$l_fillType] = addFillType ( $combineFillType, $fillLevel, $fillMax, $ProdPerHour, $usage_factor, $state );
			}
			if ($numAnimals == 0) {
				$productivity = 0;
			} else {
				$productivity = getAnimalProductivity ( $location, $tipTriggers ) * (($cleanlinessFactor < 0.1) ? 0.9 : 1);
			}
			$plants [$plant] ['productivity'] = $productivity;
			if ($numAnimals > 1) {
				$reproRate = $mapconfig [$location] ['reproRate'] / $numAnimals * 3600 * 100 / $productivity;
			} else {
				$reproRate = 0;
			}
			$plants [$plant] ['reproRate'] = gmdate ( "H:i", $reproRate );
			$plants [$plant] ['nextAnimal'] = gmdate ( "H:i", $reproRate * (1 - floatval ( $object ['newAnimalPercentage'] )) );
			// Produktion
			$output = array ();
			switch ($location) {
				case 'Animals_sheep' :
					// Wolle
					$fillType = 'woolPallet';
					$l_fillType = translate ( $fillType );
					$factor = $mapconfig [$location] ['output'] [$fillType] ['production_factor'];
					$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
					$fillMax = $mapconfig [$location] ['output'] [$fillType] ['palettPlaces'] * $mapconfig [$location] ['output'] [$fillType] ['capacity'];
					$state = getState ( $fillMax - $fillLevel, $fillMax );
					$plants [$plant] ['output'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $ProdPerHour, $factor, $state );
					break;
				case 'Animals_cow' :
					// Milch
					$output ['milk'] = intval ( $object->fillLevelMilk ['fillLevel'] );
				case 'Animals_pig' :
					// Gülle & Mist
					$output ['manure'] = intval ( $object ['manureFillLevel'] );
					$output ['liquidManure'] = intval ( $object ['liquidManureFillLevel'] );
					foreach ( $output as $fillType => $fillLevel ) {
						addCommodity ( $fillType, $fillLevel, $location );
						$factor = $mapconfig [$location] ['output'] [$fillType] ['production_factor'];
						$plants [$plant] ['output'] [translate ( $fillType )] = addFillType ( $fillType, $fillLevel, '&infin;', $ProdPerHour, $factor, 0 );
					}
					break;
			}
			break;
		case 'FabrikScript' :
			// Factoryscript Lager in Commodities aufnehmen
			foreach ( $object->Rohstoff as $in ) {
				$fillType = strval ( $in ['Name'] );
				$fillLevel = getPositiveInt ( $in ['Lvl'] );
				if ($mapconfig [$location] ['input'] [$fillType] ['showInStorage']) {
					addCommodity ( $fillType, $fillLevel, $location );
				}
			}
			foreach ( $object->Produkt as $out ) {
				$fillType = strval ( $out ['Name'] );
				$fillLevel = getPositiveInt ( $out ['Lvl'] );
				if ($mapconfig [$location] ['output'] [$fillType] ['showInStorage']) {
					addCommodity ( $fillType, $fillLevel, $location );
				}
			}
			// Fabriken für Produktionsübersicht
			if ($mapconfig [$location] ['showInProduction']) {
				$plant = translate ( $location );
				$plantstate = 0;
				$prodPerHour = $mapconfig [$location] ['ProdPerHour'];
				$plants [$plant] = array (
						'i3dName' => $location,
						'position' => $mapconfig [$location] ['position'],
						'state' => 0,
						'input' => array (),
						'output' => array () 
				);
				foreach ( $object->Rohstoff as $rohstoff ) {
					$fillType = strval ( $rohstoff ['Name'] );
					$l_fillType = translate ( $fillType );
					$fillLevel = getPositiveInt ( $rohstoff ['Lvl'] );
					$factor = $mapconfig [$location] ['input'] [$fillType] ['factor'];
					$fillMax = $mapconfig [$location] ['input'] [$fillType] ['capacity'];
					$state = getState ( $fillLevel, $fillMax );
					if ($state > $plants [$plant] ['state']) {
						$plants [$plant] ['state'] = $state;
					}
					$plants [$plant] ['input'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $factor, $state );
				}
				foreach ( $object->Produkt as $product ) {
					$fillType = strval ( $product ['Name'] );
					$l_fillType = translate ( $fillType );
					$factor = $mapconfig [$location] ['output'] [$fillType] ['factor'];
					if ($mapconfig [$location] ['output'] [$fillType] ['showInStorage']) {
						$fillLevel = getPositiveInt ( $product ['Lvl'] );
						$fillMax = $mapconfig [$location] ['output'] [$fillType] ['capacity'];
					} else {
						$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
						$capacity = $mapconfig [$location] ['output'] [$fillType] ['capacity'];
						$fillMax = $mapconfig [$location] ['output'] [$fillType] ['palettPlaces'] * $capacity;
					}
					$state = getState ( $fillMax - $fillLevel, $fillMax );
					$plants [$plant] ['output'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $factor, $state );
				}
			}
			break;
	}
}
// "Kombi-Rohstoffe ermitteln (Abfall, Brennstoffe, usw.)
foreach ( $mapconfig as $plantName => $plant ) {
	if (isset ( $plant ['input'] )) {
		foreach ( $plant ['input'] as $combineFillType => $data ) {
			$l_combineFillType = translate ( $combineFillType );
			$fillTypes = explode ( ' ', $data ['fillTypes'] );
			if (! isset ( $commodities [$l_combineFillType] )) { // && sizeof ( $fillTypes ) > 1
				foreach ( $fillTypes as $fillType ) {
					$l_fillType = translate ( $fillType );
					if (! isset ( $commodities [$l_fillType] )) {
						addCommodity ( $fillType, 0, NULL, NULL, true );
					}
					$fillLevel = $commodities [$l_fillType] ['overall'];
					addCommodity ( $combineFillType, $fillLevel, NULL, NULL, true );
				}
			}
		}
	}
}
//var_dump ( $mapconfig );

