<?php
/**
 *
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

// ausgewählte Ware ermitteln
$default = current ( $commodities );
if ($options ['defaultView'] ['commodities']) {
	if (isset ( $commodities [$options ['defaultView'] ['commodities']] )) {
		$default = $commodities [$options ['defaultView'] ['commodities']];
	}
}
$object = GetParam ( 'object', 'G', $default ['i3dName'] );
$l_object = translate ( $object );
if (! isset ( $commodities [$l_object] )) {
	$objectFound = false;
	$l_object = translate ( $default ['i3dName'] );
} else {
	$objectFound = true;
}
if ($options ['defaultView'] ['commodities'] != $l_object) {
	$options ['defaultView'] ['commodities'] = $l_object;
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}

// Übersichtskarte
$linkToImage = "./config/$mapPath/pda_map_H.jpg";
$imageSize = 512;
$mapSize = intval($map ['Size']);
$mapSizeHalf = $mapSize / 2.0;
$machineIconSize = 10;
$backgroundColor = "#4dafd7";
$storage = $mapEntries = array ();

// Positionen der Paletten und Ballen für die Karte
foreach($positions as $className => $fillTypes) {
    foreach ( $fillTypes as $fillType => $items ) {
        if ($fillType == $l_object) {
            foreach ( $items as $position ) {
                if (stristr($className, 'pallet') !== false) {                    
                    $mapEntries [] = addEntry ( $position ['position'], '##PALLET##', 'tool.png' );
                } elseif($className == 'Bale') {
                    $mapEntries [] = addEntry ( $position ['position'], '##BALE##', 'tool.png' );
                } elseif($className == 'vehicle') {
                    $mapEntries [] = addEntry ( $position ['position'], '##' . $position ['name'] . '##', 'trailer.png' );
                }
            }
        }
    }
    
}

// Warengruppe
if ($commodities [$l_object] ['isCombine']) {
	$combineCommodities = array ();
	foreach ( $mapconfig as $plantName => $plant ) {
		if (isset ( $plant ['input'] )) {
			foreach ( $plant ['input'] as $combineFillType => $data ) {
				if (translate ( $combineFillType ) == $l_object) {
					$fillTypes = explode ( ' ', $data ['fillTypes'] );
					foreach ( $fillTypes as $fillType ) {
						$l_fillType = translate ( $fillType );
						$combineCommodities [$l_fillType] = $l_fillType;
					}
				}
			}
		}
	}
	ksort ( $combineCommodities );
} else {
	$combineCommodities = false;
	// Lagerorte merken für Karte
	$commodity = $commodities [$l_object];
	if (isset ( $prices [$l_object] )) {
		foreach ( $prices [$l_object] ['locations'] as $tipTrigger => $tipTriggerData ) {
			if(isset($mapconfig [$tipTriggerData ['i3dName']] ['position'])) {
				$position = $mapconfig [$tipTriggerData ['i3dName']] ['position'];
				$mapEntries [] = addEntry ( $position, $tipTrigger, 'tiptrigger.png' );
			}
		}
	}
	foreach ( $commodity ['locations'] as $location => $locationData ) {
		if ($options ['storage'] ['hideZero'] && $locationData ['fillLevel'] == 0) {
			unset ( $commodities [$l_object] ['locations'] [$location] );
			continue;
		}
		if ($locationData ['fillLevel'] == 0 || isset ( $locationData ['isVehicle'] ) || isset ( $locationData ['Bale'] ) || isset ( $locationData ['FillablePallet'] )) {
			continue;
		} else {
			if (isset ( $mapconfig [$locationData ['i3dName']] ['position'] )) {
				$position = $mapconfig [$locationData ['i3dName']] ['position'];
				$mapEntries [] = addEntry ( $position, translate ( $locationData ['i3dName'] ), 'vehicle.png' );
			} else {
				// echo ($location ['i3dName'].'<br>');
			}
		}
	}
}

// Positionen der Fabriken ermitteln und Warenbedarf ermitteln
$demand = array ();
$demandSum = 0;
foreach ( $plants as $plantName => $plant ) {
	if (in_array ( $plant ['i3dName'], $storage )) {
		$mapEntries [] = addEntry ( $plant ['position'], $plantName, 'vehicle.png' );
	}
	if (isset ( $plant ['input'] )) {
		foreach ( $plant ['input'] as $fillTypeName => $fillTypeDetails ) {
			if ($commodities [$l_object] ['isCombine']) {
				if ($fillTypeName == $l_object) {
					$fillMax = $fillTypeDetails ['fillMax'];
					$prodPerDay = $fillTypeDetails ['prodPerDay'];
					$demandValue = $fillMax - $fillTypeDetails ['fillLevel'];
					if ($demandValue < $prodPerDay && $fillMax > $prodPerDay) {
						// if ($options['storage']['hideZero'] && $demandValue == 0) {
						continue;
					} else {
						$demandSum += $demandValue;
						if (isset ( $demand [$plantName] )) {
							$demand [$plantName] += $demandValue;
						} else {
							$demand [$plantName] = $demandValue;
						}
						$mapEntries [] = addEntry ( $plant ['position'], $plantName, 'harvester.png' );
					}
				}
			} else {
				$fillTypes = $mapconfig [$plant ['i3dName']] ['input'] [$fillTypeDetails ['i3dName']] ['fillTypes'];
				$fillTypes = explode ( ' ', $fillTypes );
				foreach ( $fillTypes as $fillType ) {
					if ($l_object == translate ( $fillType )) {
						$fillMax = $fillTypeDetails ['fillMax'];
						$prodPerDay = $fillTypeDetails ['prodPerDay'];
						$demandValue = $fillMax - $fillTypeDetails ['fillLevel'];
						if ($demandValue < $prodPerDay && $fillMax > $prodPerDay) {
							// if ($options['storage']['hideZero'] && $demandValue == 0) {
							continue;
						} else {
							$demandSum += $demandValue;
							if (is_numeric ( $fillMax )) {
								if (isset ( $demand [$plantName] )) {
									$demand [$plantName] += $demandValue;
								} else {
									$demand [$plantName] = $demandValue;
								}
							} else {
								$demand [$plantName] = $fillMax;
							}
							$mapEntries [] = addEntry ( $plant ['position'], $plantName, 'harvester.png' );
						}
					}
				}
			}
		}
	}
}
arsort ( $demand );
uksort ( $commodities, "strnatcasecmp" );
// Übergabe der Variabeln
$smarty->assign ( 'selectedCommodity', $object );
$smarty->assign ( 'l_object', $l_object );
$smarty->assign ( 'combineCommodities', $combineCommodities );
$smarty->assign ( 'commodities', $commodities );
$smarty->assign ( 'demand', $demand );
$smarty->assign ( 'demandSum', $demandSum );
$smarty->assign ( 'prices', $prices );
$smarty->assign ( 'plants', $plants );
$smarty->assign ( 'linkToImage', $linkToImage );
$smarty->assign ( 'backgroundColor', $backgroundColor );
$smarty->assign ( 'machineIconSize', $machineIconSize );
$smarty->assign ( 'mapEntries', $mapEntries );
$smarty->assign ( 'objectFound', $objectFound );

// Karteneinträge
function addEntry($position, $name, $icon) {
	global $mapSizeHalf, $mapSize, $imageSize, $machineIconSize;
	if (! is_array ( $position )) {
		$position = explode ( ' ', $position );
	}
	list ( $x, $y, $z ) = $position;
	$x = ($x + $mapSizeHalf) / ($mapSize / $imageSize);
	$z = ($z + $mapSizeHalf) / ($mapSize / $imageSize);
	$x = intval ( $x - ($machineIconSize - 1) / 2 );
	$z = intval ( $z - ($machineIconSize - 1) / 2 );
	return array (
			'name' => $name,
			'xpos' => $x,
			'zpos' => $z,
			'icon' => $icon 
	);
}
