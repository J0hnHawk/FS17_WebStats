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

// Daten vom Dedi-Server laden
$stats = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-stats.xml?' ) );
$careerVehicles = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=vehicles&' ) );
$careerSavegame = getServerStatsSimpleXML ( sprintf ( $serverAddress, 'dedicated-server-savegame.html?file=careerSavegame&' ) );

$serverOnline = true;

$commodities = $outOfMap = $positions = array ();
$plants = $sort_name = $sort_fillLevel = $sort_name = array ();

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
		if ($location != 'outOfMap') {
			$positions [$className] [translate ( $fillType )] [] = explode ( ' ', $item ['position'] );
		}
	}
	if ($fillType) {
		$fillLevel = intval ( $item ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $location, $className );
	}
	if ($location == 'outOfMap') {
		$commodities [translate ( $fillType )] ['outOfMap'] = true;
		// für Modal Dialog mit Edit-Vorschlag, Platzierung beim Palettenlager
		$outOfMap [] = array (
				$className,
				$fillType,
				strval ( $item ['position'] ),
				'-870 100 ' . (- 560 + sizeof ( $outOfMap ) * 2) 
		);
	}
	// Platzierbares Wurzelfruchtlager
	if ($className == 'HayLoftPlaceable') {
		$location = 'HayLoftPlaceable';
		foreach ( $item as $node ) {
			$fillType = strval ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
}

// Fahrzeuge
foreach ( $stats->Vehicles->Vehicle as $vehicle ) {
	if (isset ( $vehicle ['fillTypes'] )) {
		$location = strval ( $vehicle ['name'] );
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

// Lagerstätten, Produktionsanlagen und Viehställe
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	
	// Hofsilo
	if ($saveId == 'Storage_storage1') {
		foreach ( $object->node as $node ) {
			$fillType = strval ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			addCommodity ( $fillType, $fillLevel, $saveId );
		}
	}
	
	// Kuh- und Schweinestall
	if ($saveId == 'Animals_cow' || $saveId == 'Animals_pig') {
		$manureFillLevel = intval ( $object ['manureFillLevel'] );
		addCommodity ( 'manure', $manureFillLevel, $saveId );
		$liquidManureFillLevel = intval ( $object ['liquidManureFillLevel'] );
		addCommodity ( 'liquidManure', $liquidManureFillLevel, $saveId );
		$fillLevelMilk = intval ( $object->fillLevelMilk ['fillLevel'] );
		addCommodity ( 'milk', $fillLevelMilk, $saveId );
	}
	
	// Tankstellen/Diesellager
	if (strpos ( $saveId, 'fuelStation_' ) !== false) {
		$fillType = 'fuel';
		$fillLevel = intval ( $object ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $saveId );
	}
	
	// Fabrikscripte laut Mapconfig
	if (isset ( $mapconfig [$saveId] )) {
		// Lager in Commodities aufnehmen
		foreach ( $object->Rohstoff as $in ) {
			$fillType = strval ( $in ['Name'] );
			$fillLevel = intval ( $in ['Lvl'] );
			if ($mapconfig [$saveId] ['rawMaterial'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $saveId );
			}
		}
		foreach ( $object->Produkt as $out ) {
			$fillType = strval ( $out ['Name'] );
			$fillLevel = intval ( $out ['Lvl'] );
			if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $saveId );
			}
		}
		// Fabriken für Produktionsübersicht
		if ($mapconfig [$saveId] ['showInProduction']) {
			$plant = translate ( $saveId );
			if (isset ( $options ['production'] ['hidePlant'] [$plant] )) {
				continue;
			}
			$sort_name [] = strtolower ( $plant );
			$plantstate = 0;
			$plants [$plant] = array (
					'i3dName' => $saveId,
					'class' => 'success',
					'input' => array (),
					'output' => array () 
			);
			foreach ( $object->Rohstoff as $rohstoff ) {
				$fillType = strval ( $rohstoff ['Name'] );
				$l_fillType = translate ( $fillType );
				$fillLevel = intval ( $rohstoff ['Lvl'] );
				$fillMax = $mapconfig [$saveId] ['rawMaterial'] [strval ( $rohstoff ['Name'] )] ['capacity'];
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
				if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
					$fillLevel = intval ( $product ['Lvl'] );
					$fillMax = $mapconfig [$saveId] ['product'] [$fillType] ['capacity'];
				} else {
					$fillLevel = isset ( $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] ) ? $commodities [$l_fillType] ['locations'] [$plant] ['fillLevel'] : 0;
					$capacity = $mapconfig [$saveId] ['product'] [$fillType] ['capacity'];
					$fillMax = $mapconfig [$saveId] ['product'] [$fillType] ['palettPlaces'] * $capacity;
				}
				$state = 0;
				if ($fillLevel == $fillMax) {
					$state = 2;
				} elseif ($fillLevel / $fillMax > 0.8) {
					$state = 1;
				}
				if ($options ['production'] ['sortFullProducts'] && $state > $plantstate)
					$plantstate = $state;
				$plants [$plant] ['output'] [$l_fillType] = array (
						'i3dName' => $fillType,
						'fillLevel' => $fillLevel,
						'fillMax' => $fillMax,
						'state' => $state 
				);
			}
			$plants [$plant] ['state'] = $plantstate;
			if ($plantstate == 2) {
				$plants [$plant] ['class'] = 'danger';
			} elseif ($plantstate == 1) {
				$plants [$plant] ['class'] = 'warning';
			}
			$sort_fillLevel [] = $plantstate;
		}
	}
}