<?php
// Kartendaten laden
require ('./include/savegame.php');
$object = GetParam ( 'object', 'G' );
if (is_array ( $object ))
	$object = 'Brot';
$l_object = translate ( $object );
$smarty->assign ( 'commodities', $commodities );
$smarty->assign ( 'l_object', $l_object );
$demand = array ();
$demandSum = 0;
foreach ( $plants as $plantName => $plant ) {
	foreach ( $plant ['input'] as $fillTypeName => $fillTypeDetails ) {
		$fillTypes = $mapconfig [$plant ['i3dName']] ['rawMaterial'] [$fillTypeDetails ['i3dName']] ['fillTypes'];
		$fillTypes = explode ( ' ', $fillTypes );
		foreach ( $fillTypes as $fillType ) {
			if ($l_object == translate ( $fillType )) {
				$demandValue = $fillTypeDetails ['fillMax'] - $fillTypeDetails ['fillLevel'];
				if ($options ['storage'] ['hideZero'] && $demandValue == 0) {
					continue;
				} else {
					$demandSum += $demandValue;
					$demand [$plantName] = $demandValue;
				}
			}
		}
	}
}
arsort ( $demand );
$smarty->assign ( 'demand', $demand );
$smarty->assign ( 'demandSum', $demandSum );

$linkToServer = sprintf ( $serverAddress, 'dedicated-server-stats-map.jpg?' );
// $linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
$imageQuality = 90; // 60, 75, 90
$imageSize = 512; // 256, 512, 1024, 2048
$mapSize = floatval ( $stats ["mapSize"] );
$mapSizeHalf = $mapSize / 2.0;
$linkToImage = sprintf ( "%s&quality=%s&size=%s", $linkToServer, $imageQuality, $imageSize );
$machineIconSize = 10;

$backgroundColor = "#4dafd7";
$i = 0;
$mapEntries = array ();
foreach ( $positions ['FillablePallet'] as $fillType => $items ) {
	if ($fillType == $object) {
		foreach ( $items as $position ) {
			$i ++;
			$x = ($position [0] + $mapSizeHalf) / ($mapSize / $imageSize);
			$z = ($position [2] + $mapSizeHalf) / ($mapSize / $imageSize);
			$x = intval ( $x - ($machineIconSize - 1) / 2 );
			$z = intval ( $z - ($machineIconSize - 1) / 2 );
			$icon = "tool.png";
			$iconHover = "tool_selected.png";
			$mapEntries [$i] = array (
					'name' => 'Palette',
					'xpos' => $x,
					'zpos' => $z,
					'icon' => $icon,
					'iconHover' => $iconHover 
			);
		}
	}
}
/*
 * Test von zusätzlichen MapMarkern
 * $i++;
 * $x = (- 153.801 + $mapSizeHalf) / ($mapSize / $imageSize);
 * $z = (795.944 + $mapSizeHalf) / ($mapSize / $imageSize);
 * $x = intval ( $x - ($machineIconSize - 1) / 2 );
 * $z = intval ( $z - ($machineIconSize - 1) / 2 );
 * $mapEntries [$i] = array (
 * 'name' => 'Klärwerk',
 * 'xpos' => $x,
 * 'zpos' => $z,
 * 'icon' => 'placeholder-tool.png',
 * 'iconHover' => 'placeholder-tool.png'
 * );
 */
foreach ( $positions ['Bale'] as $fillType => $items ) {
	if ($fillType == $object) {
		foreach ( $items as $position ) {
			$i ++;
			$x = ($position [0] + $mapSizeHalf) / ($mapSize / $imageSize);
			$z = ($position [2] + $mapSizeHalf) / ($mapSize / $imageSize);
			$x = intval ( $x - ($machineIconSize - 1) / 2 );
			$z = intval ( $z - ($machineIconSize - 1) / 2 );
			$icon = "tool.png";
			$iconHover = "tool_selected.png";
			$mapEntries [$i] = array (
					'name' => 'Ballen',
					'xpos' => $x,
					'zpos' => $z,
					'icon' => $icon,
					'iconHover' => $iconHover 
			);
		}
	}
}
$smarty->assign ( 'linkToImage', $linkToImage );
$smarty->assign ( 'backgroundColor', $backgroundColor );
$smarty->assign ( 'machineIconSize', $machineIconSize );
$smarty->assign ( 'mapEntries', $mapEntries );
