<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
include ("webStatsInclude.php");
echo "<h1>Server Stats</h1>\n";
$serverAddress = "http://176.57.155.146:8080/feed/dedicated-server-stats.xml?code=QIWF5Osq";
$xml = getServerStatsSimpleXML ( $serverAddress );
if ($xml) {
	echo "<h2>Game</h2>\n";
	echo "Game: " . $xml ["game"] . "<br />\n";
	echo "Server: " . $xml ["server"] . "<br />\n";
	echo "Name: " . $xml ["name"] . "<br />\n";
	echo "Map: " . $xml ["mapName"] . "<br />\n";
	echo "Map size: " . $xml ["mapSize"] . "<br />\n";
	echo "Money: " . $xml ["money"] . "<br />\n";
	echo "<br />\n";
	echo "<h2>Players</h2>\n";
	$slotCount = 1;
	foreach ( $xml->Slots->Player as $player ) {
		if ($player ["isUsed"] == "true") {
			$hours = floor ( $player ["uptime"] / 60 );
			$minutes = floor ( $player ["uptime"] - ($hours * 60) );
			// Position of the player, may not exist on certain occasions, e.g. when the player has entered a vehicle
			// In that case the entered vehicle has a "controller" field set to the name of this player
			$x = $player ["x"];
			$y = $player ["y"];
			$z = $player ["z"];
			echo "Slot " . $slotCount . ": " . $player . " " . $hours . ":" . sprintf ( "%02d", $minutes ) . "h " . (($player ["isAdmin"] == "true") ? "Admin" : "");
			if (isset ( $x ) && isset ( $y ) && isset ( $z )) {
				echo " @(" . $x . " " . $y . " " . $z . ")";
			}
			echo "<br/>\n";
		} else {
			echo "Slot " . $slotCount . ": ---Empty---<br />\n";
		}
		$slotCount ++;
	}
	echo "<br />\n";
	echo "<h2>Mods</h2>\n";
	foreach ( $xml->Mods->Mod as $mod ) {
		echo $mod . " / " . $mod ["author"] . " / " . $mod ["version"] . " / " . $mod ["hash"] . "<br />\n";
	}
	echo "<br />\n";
	// -------------------------------------------------------------------------
	// vehicles
	echo "<h2>Vehicles</h2>\n";
	echo "<table border=\"0\" cellspacing=\"7\">";
	printf ( "<tr><th align=\"left\">Name</th><th align=\"left\">Category<th><th align=\"left\">Type</th><th align=\"left\">Fill levels</th><th align=\"left\">Fill types</th><th align=\"left\">Position</th><th align=\"left\">Controller</th></tr>" );
	foreach ( $xml->Vehicles->Vehicle as $veh ) {
		printf ( "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%f %f %f</td><td>%s</td></tr>", $veh ["name"], $veh ["category"], $veh ["type"], $veh ["fillTypes"], $veh ["fillLevels"], $veh ["x"], $veh ["y"], $veh ["z"], $veh ["controller"] );
	}
	echo "</table>";
	echo "<br />\n";
	// -------------------------------------------------------------------------
	// map image with vehicles
	echo "<h2>Map</h2>\n";
	$linkToServer = str_replace ( "dedicated-server-stats.xml", "dedicated-server-stats-map.jpg", $serverAddress );
	$imageQuality = 90; // 60, 75, 90
	$imageSize = 1024; // 256, 512, 1024, 2048
	$mapSize = floatval ( $xml ["mapSize"] );
	$mapSizeHalf = $mapSize / 2.0;
	$linkToImage = sprintf ( "%s&quality=%s&size=%s", $linkToServer, $imageQuality, $imageSize );
	$machineIconSize = 10;
	echo "<div id=\"mapContainer\" style=\"position:relative; width:1024px; height:1024px; overflow:auto\"  >";
	echo "<img src=\"" . $linkToImage . "\"/>";
	echo "<div id=\"mapElementsContainer\" >";
	$i = 0;
	foreach ( $xml->Vehicles->Vehicle as $veh ) {
		$i ++;
		$x = ($veh ["x"] + $mapSizeHalf) / ($mapSize / $imageSize);
		$z = ($veh ["z"] + $mapSizeHalf) / ($mapSize / $imageSize);
		$x = $x - ($machineIconSize - 1) / 2;
		$z = $z - ($machineIconSize - 1) / 2;
		$vehicleGroup = getVehicleClass ( $veh ["category"], $veh ["type"] );
		$icon = "icons/" . $vehicleGroup . ".png";
		$iconHover = "icons/" . $vehicleGroup . "_selected.png";
		$backgroundColor = "#4dafd7";
		printf ( "<div id=\"vehicle%dContainer\" style=\"position:absolute; left: %dpx; top: %dpx;\" onmouseout=\"document.getElementById('vehicle%d').style.display='none'; document.getElementById('vehicle%dImage').src='%s'; document.getElementById('vehicle%dContainer').style.zIndex=1;\" onmouseover=\"document.getElementById('vehicle%d').style.display='block'; document.getElementById('vehicle%dImage').src='%s'; document.getElementById('vehicle%dContainer').style.zIndex=10; \" >
                        <image id=\"vehicle%dImage\" src=\"%s\" width=\"%d\" height=\"%d\" />
                        <div id=\"vehicle%d\" style=\"display:none; position:absolute; bottom:0px; left:%dpx; background:%s; padding-left:8px; padding-right:8px; color: #ffffff; \">
                        <nobr>%s</nobr>
                        </div>
                        </div>", $i, $x, $z, $i, $i, $icon, $i, $i, $i, $iconHover, $i, $i, $icon, $machineIconSize, $machineIconSize, $i, $machineIconSize + 1, $backgroundColor, $veh ["name"] );
	}
	echo "</div>";
	echo "</div>";
} else {
	echo "<p>Server stats feed unavailable</p>\n";
}
echo "<br />\n";
echo "Powered By <a href=\"http://www.giants-software.com/\">GIANTS Software</a>\n";
?>
</body>
</html>