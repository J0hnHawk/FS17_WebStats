<?php
// Kartendaten laden
require ('./include/savegame.php');
$object = GetParam ( 'object', 'G' );
if (is_array ( $object ))
	$object = 'Brot';
$smarty->assign ( 'object', $object );

$linkToServer = sprintf ( $serverAddress, 'dedicated-server-stats-map.jpg?' );
// $linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
$imageQuality = 90; // 60, 75, 90
$imageSize = 256; // 256, 512, 1024, 2048
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
					'name' => $object,
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
