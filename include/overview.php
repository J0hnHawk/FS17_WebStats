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

// Serverstats
if ($stats) {
	// -------------------------------------------------------------------------
	// game
	$game = array (
			'game' => $stats ["game"],
			'version' => $stats ["version"],
			'server' => $stats ["server"],
			'name' => $stats ["name"],
			'mapName' => $stats ["mapName"],
			'mapSize' => $stats ["mapSize"],
			'money' => $stats ["money"],
			'dayTime' => gmdate("H:i:s",($stats ["dayTime"]+0)/1000)
			//'dayTime' => $stats ["dayTime"] 
	);
	$smarty->assign ( 'game', $game );
	
	// -------------------------------------------------------------------------
	// player
	$players = array ();
	foreach ( $stats->Slots->Player as $player ) {
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
					'isAdmin' => ($player ["isAdmin"] == 'true' ? true : false),
					'position' => $position 
			);
		}
	}
	$smarty->assign ( 'players', $players );
	
	// -------------------------------------------------------------------------
	// mods
	$mods = array ();
	foreach ( $stats->Mods->Mod as $mod ) {
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
	if (isset ( $stats->Vehicles )) {
		foreach ( $stats->Vehicles->Vehicle as $veh ) {
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
	}
	$smarty->assign ( 'vehicles', $vehicles );
	
	// -------------------------------------------------------------------------
	// map image with vehicles
	$linkToServer = sprintf ( $serverAddress, 'dedicated-server-stats-map.jpg?' );
	// $linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
	$imageQuality = 90; // 60, 75, 90
	$imageSize = 1024; // 256, 512, 1024, 2048
	$mapSize = floatval ( $stats ["mapSize"] );
	$mapSizeHalf = $mapSize / 2.0;
	$linkToImage = sprintf ( "%s&quality=%s&size=%s", $linkToServer, $imageQuality, $imageSize );
	$machineIconSize = 10;
	$backgroundColor = "#4dafd7";
	$i = 0;
	$mapEntries = array ();
	if (isset ( $stats->Vehicles )) {
		foreach ( $stats->Vehicles->Vehicle as $veh ) {
			$i ++;
			$x = ($veh ["x"] + $mapSizeHalf) / ($mapSize / $imageSize);
			$z = ($veh ["z"] + $mapSizeHalf) / ($mapSize / $imageSize);
			$x = intval ( $x - ($machineIconSize - 1) / 2 );
			$z = intval ( $z - ($machineIconSize - 1) / 2 );
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
	}
	$smarty->assign ( 'linkToImage', $linkToImage );
	$smarty->assign ( 'backgroundColor', $backgroundColor );
	$smarty->assign ( 'machineIconSize', $machineIconSize );
	$smarty->assign ( 'mapEntries', $mapEntries );
}
