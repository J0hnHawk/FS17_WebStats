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
				$positions [$className] [translate ( $fillType )] [] = array (
						'name' => $className,
						'position' => explode ( ' ', $item ['position'] ) 
				);
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

// Analysierung von CreateLoadedObjects, Lager, Vieh, BGA, Fabrikskripte
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$location = strval ( $object ['saveId'] );
	if (! isset ( $mapconfig [$location] ['locationType'] )) {
		continue;
	}
	switch ($mapconfig [$location] ['locationType']) {
		case 'animal' :
			// Grunddaten
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
				$trough_factor = $animals [$location] ['input'] [$combineFillType];
				$usage_factor = $mapconfig [$location] ['rawMaterial'] [$combineFillType]['factor'];
				$fillMax = getMaxForage ( $trough_factor, $numAnimals );
				$state = getState ( $fillLevel, $fillMax );
				if ($state > $plants [$plant] ['state']) {
					$plants [$plant] ['state'] = $state;
				}
				$plants [$plant] ['input'] [$l_fillType] = addFillType ( $combineFillType, $fillLevel, $fillMax, $ProdPerHour, $usage_factor, $state );
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
					$fillType = 'woolPallet';
					$l_fillType = translate ( $fillType );
					$factor = $animals [$location] ['output'] [$fillType];
					$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
					$fillMax = $mapconfig [$location] ['product'] [$fillType] ['palettPlaces'] * $mapconfig [$location] ['product'] [$fillType] ['capacity'];
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
						$factor = $animals [$location] ['output'] [$fillType];
						$plants [$plant] ['output'] [translate ( $fillType )] = addFillType ( $fillType, $fillLevel, '&infin;', $ProdPerHour, $factor, 0 );
					}
					break;
			}
			break;
		case 'storage' :
			foreach ( $object->node as $node ) {
				$fillType = strval ( $node ['fillType'] );
				$fillLevel = intval ( $node ['fillLevel'] );
				addCommodity ( $fillType, $fillLevel, $location );
			}
			break;
		case 'bga' :
			$fillType = 'digestate';
			if ($mapconfig [$location] ['product'] [$fillType] ['showInStorage']) {
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
				foreach ( $mapconfig [$location] ['rawMaterial'] as $fillType => $fillTypeData ) {
					$fillLevel = intval ( $object [$fillTypeData ['fillTypes']] );
					$l_fillType = translate ( $fillType );
					$fillMax = $mapconfig [$location] ['rawMaterial'] [$fillType] ['capacity'];
					$state = 0;
					if (is_numeric ( $fillMax )) {
						$state = getState ( $fillLevel, $fillMax );
						if ($state > $plants [$plant] ['state']) {
							$plants [$plant] ['state'] = $state;
						}
					} elseif ($fillLevel == 0) {
						$state = 2;
					}
					$plants [$plant] ['input'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $mapconfig [$location] ['rawMaterial'] [$fillType] ['factor'], $state );
				}
				foreach ( $mapconfig [$location] ['product'] as $fillType => $fillTypeData ) {
					$fillLevel = intval ( $object [$fillTypeData ['fillTypes']] );
					$l_fillType = translate ( $fillType );
					$fillMax = $mapconfig [$location] ['product'] [$fillType] ['capacity'];
					$state = 0;
					if (is_numeric ( $fillMax )) {
						$state = getState ( $fillMax - $fillLevel, $fillMax );
					}
					$plants [$plant] ['output'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $mapconfig [$location] ['product'] [$fillType] ['factor'], $state );
				}
			}
			break;
		case 'bunker' :
			/**
			 * state="0" - 0 = chaff abgeladen, 1 = chaff abgedeckt, 2 = silage fertig, 3 = silage abgedeckt
			 * fillLevel="0"
			 * compactedFillLevel="0"
			 * fermentingTime="0" - start bei 0, ende bei 43200
			 * openedAtFront="false" openedAtBack="false"/>
			 */
			$state = intval ( $object ['state'] );
			$fillLevel = intval ( $object ['fillLevel'] );
			if ($state < 2) {
				$fillType = 'chaff';
			} else {
				$fillType = 'silage';
			}
			addCommodity ( $fillType, $fillLevel, $location );
			break;
		case 'factory_script' :
			// Factoryscript Lager in Commodities aufnehmen
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
					$fillLevel = intval ( $rohstoff ['Lvl'] );
					$factor = $mapconfig [$location] ['rawMaterial'] [$fillType] ['factor'];
					$fillMax = $mapconfig [$location] ['rawMaterial'] [$fillType] ['capacity'];
					$state = getState ( $fillLevel, $fillMax );
					if ($state > $plants [$plant] ['state']) {
						$plants [$plant] ['state'] = $state;
					}
					$plants [$plant] ['input'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $factor, $state );
				}
				foreach ( $object->Produkt as $product ) {
					$fillType = strval ( $product ['Name'] );
					$l_fillType = translate ( $fillType );
					$factor = $mapconfig [$location] ['product'] [$fillType] ['factor'];
					if ($mapconfig [$location] ['product'] [$fillType] ['showInStorage']) {
						$fillLevel = intval ( $product ['Lvl'] );
						$fillMax = $mapconfig [$location] ['product'] [$fillType] ['capacity'];
					} else {
						$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
						$capacity = $mapconfig [$location] ['product'] [$fillType] ['capacity'];
						$fillMax = $mapconfig [$location] ['product'] [$fillType] ['palettPlaces'] * $capacity;
					}
					$state = getState ( $fillMax - $fillLevel, $fillMax );
					$plants [$plant] ['output'] [$l_fillType] = addFillType ( $fillType, $fillLevel, $fillMax, $prodPerHour, $factor, $state );
				}
			}
			break;
	}
	
	// Tankstellen/Diesellager
	if (strpos ( $location, 'fuelStation_' ) !== false) {
		$fillType = 'fuel';
		$fillLevel = intval ( $object ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $location );
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