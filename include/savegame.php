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
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
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

$commodities = $outOfMap = $positions = array ();
$plants = array ();

// Stand der Daten ermitteln (Ingame-Zeitpunkt der Speicherung)
$currentDay = $careerSavegame->environment->currentDay;
$dayTime = $careerSavegame->environment->dayTime * 60;
$dayTime = gmdate ( "H:i", $dayTime );
$smarty->assign ( 'currentDay', $currentDay );
$smarty->assign ( 'dayTime', $dayTime );

// Paletten, Ballen und Wurzelfrchtlager durchsuchen
foreach ( $careerVehicles->item as $item ) {
	$className = strval ( $item ['className'] );
	$fillType = false;
	$location = getLocation ( $item ['position'] );
	if ($className == 'FillablePallet' || $className == 'Bale') {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
		if ($fillType == 'geldkassette') {
			/*
			 * Geldkassetten experimentell entfernt.
			 * Vorteil: Das Geld wird nicht doppelt gezählt wenn sich die Kassetten noch im Hofladen befinden
			 * Nachteil: Die Kassetten werden nicht mehr auf der Karte angezeigt
			 * Lösung: Gelkassetten dürften nur ausserhalb des Hofladens gezählt werden
			 */
			continue;
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
				$positions [$className] [translate ( $fillType )] [] = explode ( ' ', $item ['position'] );
			}
		}
	}
	// Platzierbares Wurzelfruchtlager
	if ($className == 'HayLoftPlaceable') {
		$location = 'HayLoftPlaceable';
		foreach ( $item as $node ) {
			$fillType = strval ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $location );
			$mapconfig = array_merge ( $mapconfig, array (
					'HayLoftPlaceable' => array (
							'position' => '-550 0 750',
							'showInProduction' => false,
							'rawMaterial' => array (),
							'product' => array () 
					) 
			) );
		}
	}
}

// Fahrzeuge aus $careerVehicles
foreach ( $careerVehicles->vehicle as $vehicle ) {
	if (isset ( $vehicle ['fillTypes'] )) {
		$location = getFillType ( $vehicle ['filename'] );
		$fillTypes = explode ( ' ', $vehicle ['fillTypes'] );
		$fillLevels = explode ( ' ', $vehicle ['fillLevels'] );
		foreach ( $fillTypes as $key => $fillType ) {
			$fillType = strval ( $fillType );
			$fillLevel = intval ( $fillLevels [$key] );
			if ($fillType == 'unknown') {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location, 'isVehicle' );
			}
		}
	}
}
function getState($fillLevel, $fillMax) {
	if ($fillLevel == 0) {
		return 2;
	} elseif ($fillLevel / $fillMax < 0.1) {
		return 1;
	}
	return 0;
}
function addFillType($i3dName, $fillLevel, $fillMax, $state) {
	return array (
			'i3dName' => $i3dName,
			'fillLevel' => $fillLevel,
			'fillMax' => $fillMax,
			'state' => $state 
	);
}

// Lagerstätten, Produktionsanlagen und Viehställe
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$location = strval ( $object ['saveId'] );
	
	// Hofsilo
	if ($location == 'Storage_storage1') {
		foreach ( $object->node as $node ) {
			$fillType = strval ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
	
	// BGA
	if ($location == 'Bga') {
		$fillLevel = strval ( $object ['digestateSiloFillLevel'] );
		addCommodity ( 'digestate', $fillLevel, $location );
	}
	
	// Animals
	if ($location == 'Animals_cow' || $location == 'Animals_pig' || $location == 'Animals_sheep') {
		$numAnimals = intval ( $object ['numAnimals0'] );
		addCommodity ( substr ( $location, 8, 99 ), $numAnimals, $location );
		$cleanlinessFactor = floatval ( $object ['cleanlinessFactor'] );
		$mapconfig [$location] ['ProdPerHour'] = $numAnimals / 24;
		$plant = translate ( $location );
		$plants [$plant] = array (
				'i3dName' => $location,
				'position' => $mapconfig [$location] ['position'],
				'nameAnimals' => substr ( $location, 8, 99 ),
				'numAnimals' => $numAnimals,
				'cleanlinessFactor' => intval ( $cleanlinessFactor * 100 ),
				'state' => 0 
		);
		// Trigger zusammenrechnen
		$fillTypes = array ();
		foreach ( $object->tipTriggerFillLevel as $tipTrigger ) {
			foreach ( $mapconfig [$location] ['rawMaterial'] as $combineFillType => $fillTypeData ) {
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
			$factor = $animals [$location] ['input'] [$combineFillType];
			$fillMax = getMaxForage ( $factor, $numAnimals );
			$mapconfig [$location] ['rawMaterial'] [$combineFillType] ['factor'] = $factor;
			$state = getState ( $fillLevel, $fillMax );
			if ($state > $plants [$plant] ['state']) {
				$plants [$plant] ['state'] = $state;
			}
			$plants [$plant] ['input'] [$l_fillType] = addFillType ( $combineFillType, $fillLevel, $fillMax, $state );
		}
		$productivity = getAnimalProductivity ( $location, $tipTriggers ) * (($cleanlinessFactor < 0.1) ? 0.9 : 1);
		$plants [$plant] ['productivity'] = $productivity;
		$reproRate = $animals [$location] ['reproRate'] / $numAnimals * 3600 * 100 / $productivity;
		$plants [$plant] ['reproRate'] = gmdate ( "H:i", $reproRate );
		$plants [$plant] ['nextAnimal'] = gmdate ( "H:i", $reproRate * (1 - floatval ( $object ['newAnimalPercentage'] )) );
		// Produktion
		$output = array ();
		switch ($location) {
			case 'Animals_sheep' :
				// Wolle
				$l_fillType = translate ( 'woolPallet' );
				$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
				$capacity = $mapconfig [$location] ['product'] ['woolPallet'] ['capacity'];
				$fillMax = $mapconfig [$location] ['product'] ['woolPallet'] ['palettPlaces'] * $capacity;
				$state = getState ( $fillLevel, $fillMax );
				if ($state > $plants [$plant] ['state']) {
					$plants [$plant] ['state'] = $state;
				}
				$plants [$plant] ['output'] [$l_fillType] = addFillType ( 'woolPallet', $fillLevel, $fillMax, $state );
				$mapconfig [$location] ['product'] ['woolPallet'] ['factor'] = 2000 / 88;
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
					$mapconfig [$location] ['product'] [$fillType] ['factor'] = $animals [$location] ['output'] [$fillType];
					$plants [$plant] ['output'] [translate ( $fillType )] = addFillType ( $fillType, $fillLevel, '&infin;', 0 );
				}
				break;
		}
	}
	
	// Tankstellen/Diesellager
	if (strpos ( $location, 'fuelStation_' ) !== false) {
		$fillType = 'fuel';
		$fillLevel = intval ( $object ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $location );
	}
	
	// Fabrikscripte laut Mapconfig
	if (isset ( $mapconfig [$location] )) {
		// Lager in Commodities aufnehmen
		foreach ( $object->Rohstoff as $in ) {
			$fillType = strval ( $in ['Name'] );
			$fillLevel = intval ( $in ['Lvl'] );
			if ($mapconfig [$location] ['rawMaterial'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
		foreach ( $object->Produkt as $out ) {
			$fillType = strval ( $out ['Name'] );
			$fillLevel = intval ( $out ['Lvl'] );
			if ($mapconfig [$location] ['product'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
		// Fabriken für Produktionsübersicht
		if ($mapconfig [$location] ['showInProduction']) {
			$plant = translate ( $location );
			$plantstate = 0;
			$plants [$plant] = array (
					'i3dName' => $location,
					'position' => $mapconfig [$location] ['position'],
					'input' => array (),
					'output' => array () 
			);
			foreach ( $object->Rohstoff as $rohstoff ) {
				$fillType = strval ( $rohstoff ['Name'] );
				$l_fillType = translate ( $fillType );
				$fillLevel = intval ( $rohstoff ['Lvl'] );
				$fillMax = $mapconfig [$location] ['rawMaterial'] [strval ( $rohstoff ['Name'] )] ['capacity'];
				$state = 0;
				if ($fillLevel == 0) {
					$state = 2;
				} elseif ($fillLevel / $fillMax < 0.1) {
					$state = 1;
				}
				if ($state > $plantstate)
					$plantstate = $state;
				$plants [$plant] ['input'] [$l_fillType] = array (
						'i3dName' => $fillType,
						'fillLevel' => $fillLevel,
						'fillMax' => $fillMax,
						'state' => $state 
				);
			}
			foreach ( $object->Produkt as $product ) {
				$fillType = strval ( $product ['Name'] );
				$l_fillType = translate ( $fillType );
				if ($mapconfig [$location] ['product'] [$fillType] ['showInStorage']) {
					$fillLevel = intval ( $product ['Lvl'] );
					$fillMax = $mapconfig [$location] ['product'] [$fillType] ['capacity'];
				} else {
					$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
					$capacity = $mapconfig [$location] ['product'] [$fillType] ['capacity'];
					$fillMax = $mapconfig [$location] ['product'] [$fillType] ['palettPlaces'] * $capacity;
				}
				$state = 0;
				if ($fillLevel == $fillMax) {
					$state = 2;
				} elseif ($fillLevel / $fillMax > 0.8) {
					$state = 1;
				}
				$plants [$plant] ['output'] [$l_fillType] = array (
						'i3dName' => $fillType,
						'fillLevel' => $fillLevel,
						'fillMax' => $fillMax,
						'state' => $state 
				);
			}
			$plants [$plant] ['state'] = $plantstate;
		}
	}
}
// "Kombi-Rohstoffe ermitteln (Abfall, Brennstoffe, usw.)
foreach ( $mapconfig as $plantName => $plant ) {
	foreach ( $plant ['rawMaterial'] as $combineFillType => $data ) {
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