<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

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
				'group' => getVehicleClass ( $veh ["category"], $veh ["type"] ),
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
	$linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
	$imageQuality = 90; // 60, 75, 90
	$imageSize = 1024; // 256, 512, 1024, 2048
	$mapSize = floatval ( $xml ["mapSize"] );
	$mapSizeHalf = $mapSize / 2.0;
	$linkToImage = sprintf ( "%s&quality=%s&size=%s", $linkToServer, $imageQuality, $imageSize );
	$machineIconSize = 10;
	$backgroundColor = "#4dafd7";
	$i = 0;
	$mapEntry = array ();
	foreach ( $xml->Vehicles->Vehicle as $veh ) {
		$i ++;
		$x = ($veh ["x"] + $mapSizeHalf) / ($mapSize / $imageSize);
		$z = ($veh ["z"] + $mapSizeHalf) / ($mapSize / $imageSize);
		$x = intval($x - ($machineIconSize - 1) / 2);
		$z = intval($z - ($machineIconSize - 1) / 2);
		$vehicleGroup = getVehicleClass ( $veh ["category"], $veh ["type"] );
		$icon = $vehicleGroup . ".png";
		$iconHover = $vehicleGroup . "_selected.png";
		$mapEntries [$i] = array (
				'name' => $veh ["name"],
				'xpos' => $x,
				'zpos' => $z,
				'icon' => $icon,
				'iconHover' => $iconHover 
		);
	}
	$smarty->assign ( 'linkToImage', $linkToImage );
	$smarty->assign ( 'backgroundColor', $backgroundColor );
	$smarty->assign ( 'machineIconSize', $machineIconSize );
	$smarty->assign ( 'mapEntries', $mapEntries );
} else {
	$error = true;
}
