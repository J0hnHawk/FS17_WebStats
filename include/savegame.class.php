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
class savegame {
	private $serverAdress;
	private $stats;
	private $careerVehicles;
	private $careerSavegame;
	public $commodities = array ();
	public $production = array ();
	public $bales = array ();
	public $pallets = array ();
	public function __construct($serverAddress) {
		$this->serverAdress = $serverAddress;
		$this->stats = getServerStatsSimpleXML ( sprintf ( $this->serverAdress, 'dedicated-server-stats.xml?' ) );
		$this->careerVehicles = getServerStatsSimpleXML ( sprintf ( $this->serverAdress, 'dedicated-server-savegame.html?file=vehicles&' ) );
		$this->careerSavegame = getServerStatsSimpleXML ( sprintf ( $this->serverAdress, 'dedicated-server-savegame.html?file=careerSavegame&' ) );
	}
	public function serverIsOnline() {
		if (! isset ( $this->careerVehicles->item ))
			return false;
		if (! isset ( $this->careerSavegame->environment->currentDay ))
			return false;
		if (! isset ( $this->stats->Vehicles ))
			return false;
		return true;
	}
	public function getSavegameTime() {
		$currentDay = $this->careerSavegame->environment->currentDay;
		$dayTime = $this->careerSavegame->environment->dayTime * 60;
		$dayTime = gmdate ( "H:i", $dayTime );
		return array (
				'currentDay' => $currentDay,
				'dayTime' => $dayTime 
		);
	}
	public function getCommodities($sortByName = true, $onlyPallets = false, $hideZero = true, $showVehicles = true) {
		$positions = $outOfMap = $sortFillLevel = array ();
		self::vehicles();
	}
	private function vehicles($hideZero = true) {
		foreach ( $this->stats->Vehicles->Vehicle as $vehicle ) {
			if (isset ( $vehicle ['fillTypes'] )) {
				$vehicleName = strval ( $vehicle ['name'] );
				$fillTypes = explode ( ' ', $vehicle ['fillTypes'] );
				$fillLevels = explode ( ' ', $vehicle ['fillLevels'] );
				foreach ( $fillTypes as $key => $fillType ) {
					$fillType = strval ( $fillType );
					$fillLevel = intval ( $fillLevels [$key] );
					if ($hideZero && $fillLevel == 0 || $fillType == 'unknown') {
						continue;
					} else {
						self::addCommodity ( $fillType, $fillLevel, $vehicleName );
					}
				}
			}
		}
	}
	private function addCommodity($fillType, $fillLevel, $location, $className = 'none') {
		$l_fillType = translate ( $fillType );
		$l_location = translate ( $location );
		if (! isset ( $this->commodities [$l_fillType] )) {
			$this->commodities [$l_fillType] = array (
					'overall' => $fillLevel,
					'i3dName' => $fillType,
					'locations' => array () 
			);
		} else {
			$this->commodities [$l_fillType] ['overall'] += $fillLevel;
		}
		if (! isset ( $this->commodities [$l_fillType] ['locations'] [$l_location] )) {
			$this->commodities [$l_fillType] ['locations'] += array (
					$l_location => array (
							'i3dName' => $location,
							$className => 1,
							'fillLevel' => $fillLevel 
					) 
			);
		} else {
			$this->commodities [$l_fillType] ['locations'] [$l_location] [$className] ++;
			$this->commodities [$l_fillType] ['locations'] [$l_location] ['fillLevel'] += $fillLevel;
		}
	}
}

$commodities = $outOfMap = $sortFillLevel = $positions = array ();
$plants = $sort_name = $sort_fillLevel = $sort_name = array ();

// Paletten, Ballen und Wurzelfrchtlager durchsuchen
foreach ( $careerVehicles->item as $item ) {
	$className = strval ( $item ['className'] );
	if ($options ['storage'] ['onlyPallets'] && $className != 'FillablePallet') {
		continue;
	}
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
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location, $className );
		}
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
			if ($hideZero && $fillLevel == 0) {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
	}
}

// Fahrzeuge
if (! $options ['storage'] ['onlyPallets'] && $options ['storage'] ['showVehicles'] && isset ( $stats->Vehicles )) {
}

foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	
	// Hofsilo
	if (! $options ['storage'] ['onlyPallets'] && $saveId == 'Storage_storage1') {
		$location = strval ( $saveId );
		foreach ( $object->node as $node ) {
			$fillType = strval ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
	}
	
	// Kuh- und Schweinestall
	if (! $options ['storage'] ['onlyPallets'] && ($saveId == 'Animals_cow' || $saveId == 'Animals_pig')) {
		$location = strval ( $saveId );
		$manureFillLevel = intval ( $object ['manureFillLevel'] );
		if ($hideZero && $manureFillLevel == 0) {
			continue;
		} else {
			addCommodity ( 'manure', $manureFillLevel, $location );
		}
		$liquidManureFillLevel = intval ( $object ['liquidManureFillLevel'] );
		if ($hideZero && $liquidManureFillLevel == 0) {
			continue;
		} else {
			addCommodity ( 'liquidManure', $liquidManureFillLevel, $location );
		}
		$fillLevelMilk = intval ( $object->fillLevelMilk ['fillLevel'] );
		if ($hideZero && $fillLevelMilk == 0) {
			continue;
		} else {
			addCommodity ( 'milk', $fillLevelMilk, $location );
		}
	}
	
	// Tankstellen/Diesellager
	if (! $options ['storage'] ['onlyPallets'] && strpos ( $saveId, 'fuelStation_' ) !== false) {
		$location = strval ( $saveId );
		$fillType = 'fuel';
		$fillLevel = intval ( $object ['fillLevel'] );
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
	
	// Fabrikscripte laut Mapconfig
	if (isset ( $mapconfig [$saveId] )) {
		$location = strval ( $saveId );
		if ($options ['storage'] ['onlyPallets'] && strpos ( 'FabrikScript_Lager', $saveId ) === false) {
			continue;
		}
		foreach ( $object->Rohstoff as $in ) {
			$fillType = strval ( $in ['Name'] );
			$fillLevel = intval ( $in ['Lvl'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			}
			if ($mapconfig [$saveId] ['rawMaterial'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
		foreach ( $object->Produkt as $out ) {
			$fillType = strval ( $out ['Name'] );
			$fillLevel = intval ( $out ['Lvl'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			}
			if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
	}
}

ksort ( $commodities, SORT_LOCALE_STRING );

if (! $options ['storage'] ['sortByName']) {
	foreach ( $commodities as $commodity ) {
		$sortFillLevel [] = $commodity ['overall'];
	}
	array_multisort ( $sortFillLevel, SORT_DESC, $commodities );
}

// Fabriken suchen
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	if (isset ( $mapconfig [$saveId] ) && $mapconfig [$saveId] ['showInProduction']) {
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

if (! $options ['production'] ['sortByName']) {
	array_multisort ( $sort_fillLevel, SORT_DESC, $sort_name, SORT_ASC, $plants );
} else {
	uksort ( $plants, "strnatcasecmp" );
}
