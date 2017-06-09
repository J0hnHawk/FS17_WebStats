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

if (! isset ( $options ['production'] )) {
	$options ['production'] ['sortByName'] = true;
	$options ['production'] ['sortFullProducts'] = true;
	$options ['production'] ['hidePlant'] = array();
}

$hidePlant = GetParam('hide','G',false);
if($hidePlant && !is_array($hidePlant)){
	$plant = base64_decode($hidePlant);
	foreach($lang as $term => $translation) {
		if($translation == $plant) {
			$options ['production'] ['hidePlant'][$plant] = true;
			$options ['version'] = $cookieVersion;
			setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
			break;
		}
	}
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['production'] ['sortByName'] = filter_var ( GetParam ( 'sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['production'] ['sortFullProducts'] = filter_var ( GetParam ( 'sortFullProducts', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$showPlant = GetParam('showPlant','P',false);
	if($showPlant && is_array($showPlant)) {
		foreach($showPlant as $plant) {
			$plant = base64_decode($plant);
			if(isset($options ['production'] ['hidePlant'][$plant])) {
				unset($options ['production'] ['hidePlant'][$plant]);
			}
		}		
	}
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}

$plants = $sort_name = $sort_fillLevel = $sort_name = $commodities = array ();

// Paletten suchen
foreach ( $careerVehicles->item as $item ) {
	$fillType = false;
	$className = strval ( $item ['className'] );
	$location = getLocation ( $item ['position'] );
	$location = translate ( $location );
	if ($className == 'FillablePallet') {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
	}
	if ($fillType) {
		$fillLevel = intval ( $item ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $location, $className );
	}
}

// Fabriken suchen
foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	if (isset ( $mapconfig [$saveId] ) && $mapconfig [$saveId] ['showInProduction']) {
		$plant = translate ( $saveId );
		if(isset($options ['production'] ['hidePlant'][$plant])) {
			continue;
		}
		$sort_name [] = strtolower ( $plant );
		$plantstate = 0;
		$plants [$plant] = array (
				'class' => 'success',
				'input' => array (),
				'output' => array () 
		);
		foreach ( $object->Rohstoff as $rohstoff ) {
			$fillType = translate ( $rohstoff ['Name'] );
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
			$plants [$plant] ['input'] [$fillType] = array (
					'fillLevel' => $fillLevel,
					'fillMax' => $fillMax,
					'state' => $state 
			);
		}
		foreach ( $object->Produkt as $product ) {
			$fillType = strval ( $product ['Name'] );
			$fillTypeLang = translate ( $fillType );
			if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
				$fillLevel = intval ( $product ['Lvl'] );
				$fillMax = $mapconfig [$saveId] ['product'] [$fillType] ['capacity'];
			} else {
				$fillLevel = isset ( $commodities [$fillTypeLang] [$plant] ['fillLevel'] ) ? $commodities [$fillTypeLang] [$plant] ['fillLevel'] : 0;
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
			$plants [$plant] ['output'] [$fillTypeLang] = array (
					'fillLevel' => $fillLevel,
					'fillMax' => $fillMax,
					'state' => $state 
			);
		}
		$plants[$plant]['state'] = $plantstate;
		if ($plantstate == 2) {
			$plants [$plant] ['class'] = 'danger';
		} elseif ($plantstate == 1) {
			$plants [$plant] ['class'] = 'warning';
		}
		$sort_fillLevel [] = $plantstate;
	}
}
// ksort ( $plants, SORT_NATURAL );

if (! $options ['production'] ['sortByName']) {
	array_multisort ( $sort_fillLevel, SORT_DESC, $sort_name, SORT_ASC, $plants );
} else {
	uksort ( $plants, "strnatcasecmp" );
}
$smarty->registerPlugin("modifier",'base64_encode',  'base64_encode');
$smarty->assign ( 'plants', $plants );
$smarty->assign ( 'options', $options ['production'] );