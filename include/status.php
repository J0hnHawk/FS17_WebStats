<?php
$mode = GetParam ( 'mode', 'G' );
$modes = array (
		'game',
		'player',
		'mods',
		'vehicles',
		'map' 
);
if (! in_array ( $mode, $modes )) {
	$mode = 'game';
}
include ("webStatsInclude.php");
$xml = getServerStatsSimpleXML ( $serverAddress );
$error = false;
if ($xml) {
	
	// -------------------------------------------------------------------------
	// game
	$game = array (
			'game' => $xml ["game"],
			'version' => $xml ["version"],
			'server' => $xml ["server"],
			'name' => $xml ["name"],
			'mapName' => $xml ["mapName"],
			'mapSize' => $xml ["mapSize"],
			'money' => $xml ["money"],
			'dayTime' => $xml ["dayTime"] 
	);
	$smarty->assign ( 'game', $game );
	
	// -------------------------------------------------------------------------
	// player
	$players = array ();
	foreach ( $xml->Slots->Player as $player ) {
		if ($player ["isUsed"] == "true") {
			$hours = floor ( $player ["uptime"] / 60 );
			$minutes = floor ( $player ["uptime"] - ($hours * 60) );
			// Position of the player, may not exist on certain occasions, e.g. when the player has entered a vehicle
			// In that case the entered vehicle has a "controller" field set to the name of this player
			$x = $player ["x"];
			$y = $player ["y"];
			$z = $player ["z"];
			if (isset ( $x ) && isset ( $y ) && isset ( $z )) {
				$position = $x . " " . $y . " " . $z;
			} else {
				$position = 'im Fahrzeug';
			}
			$players [] = array (
					'name' => $player,
					'online' => $hours . ":" . sprintf ( "%02d", $minutes ),
					'isAdmin' => $player ["isAdmin"],
					'position' => $position 
			);
		}
	}
	$smarty->assign ( 'players', $players );
	
	// -------------------------------------------------------------------------
	// mods
	$mods = array ();
	foreach ( $xml->Mods->Mod as $mod ) {
		$mods [] = array (
				'name' => $mod /*['name']*/,
				'author' => $mod ["author"],
				'version' => $mod ["version"],
				'hash' => $mod ["hash"] 
		);
	}
	$smarty->assign ( 'mods', $mods );
	
	// -------------------------------------------------------------------------
	// vehicles
	$vehicles = array ();
	foreach ( $xml->Vehicles->Vehicle as $veh ) {
		$position = $veh ["x"] . " " . $veh ["y"] . " " . $veh ["z"];
		$vehicles [] = array (
				'name' => $veh ["name"],
				'category' => $veh ["category"],
				'type' => $veh ["type"],
				'fillTypes' => $veh ["fillTypes"],
				'fillLevels' => $veh ["fillLevels"],
				'position' => $position,
				'controller' => $veh ["controller"] 
		);
	}
	$smarty->assign ( 'vehicles', $vehicles );
	
	// -------------------------------------------------------------------------
	// map image with vehicles
	/*
	 * echo "<h2>Map</h2>\n";
	 *
	 * $linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
	 * $imageQuality = 90; // 60, 75, 90
	 * $imageSize = 1024; // 256, 512, 1024, 2048
	 * $mapSize = floatval ( $xml ["mapSize"] );
	 * $mapSizeHalf = $mapSize / 2.0;
	 * $linkToImage = sprintf ( "%s&quality=%s&size=%s", $linkToServer, $imageQuality, $imageSize );
	 *
	 * $machineIconSize = 10;
	 *
	 * echo "<div id=\"mapContainer\" style=\"position:relative; width:1024px; height:1024px; overflow:auto\" >";
	 * echo "<img src=\"" . $linkToImage . "\"/>";
	 *
	 * echo "<div id=\"mapElementsContainer\" >";
	 *
	 * $i = 0;
	 * foreach ( $xml->Vehicles->Vehicle as $veh ) {
	 * $i ++;
	 *
	 * $x = ($veh ["x"] + $mapSizeHalf) / ($mapSize / $imageSize);
	 * $z = ($veh ["z"] + $mapSizeHalf) / ($mapSize / $imageSize);
	 *
	 * $x = $x - ($machineIconSize - 1) / 2;
	 * $z = $z - ($machineIconSize - 1) / 2;
	 *
	 * $vehicleGroup = getVehicleClass ( $veh ["category"], $veh ["type"] );
	 *
	 * $icon = "icons/" . $vehicleGroup . ".png";
	 * $iconHover = "icons/" . $vehicleGroup . "_selected.png";
	 * $backgroundColor = "#4dafd7";
	 *
	 * printf ( "<div id=\"vehicle%dContainer\" style=\"position:absolute; left: %dpx; top: %dpx;\" onmouseout=\"document.getElementById('vehicle%d').style.display='none'; document.getElementById('vehicle%dImage').src='%s'; document.getElementById('vehicle%dContainer').style.zIndex=1;\" onmouseover=\"document.getElementById('vehicle%d').style.display='block'; document.getElementById('vehicle%dImage').src='%s'; document.getElementById('vehicle%dContainer').style.zIndex=10; \" >
	 * <image id=\"vehicle%dImage\" src=\"%s\" width=\"%d\" height=\"%d\" />
	 * <div id=\"vehicle%d\" style=\"display:none; position:absolute; bottom:0px; left:%dpx; background:%s; padding-left:8px; padding-right:8px; color: #ffffff; \">
	 * <nobr>%s</nobr>
	 * </div>
	 * </div>", $i, $x, $z, $i, $i, $icon, $i, $i, $i, $iconHover, $i, $i, $icon, $machineIconSize, $machineIconSize, $i, $machineIconSize + 1, $backgroundColor, $veh ["name"] );
	 * }
	 *
	 * echo "</div>";
	 * echo "</div>";
	 */
} else {
	$error = true;
}
