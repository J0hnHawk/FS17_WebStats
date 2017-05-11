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
// @todo Benachrichtigung verschönern, wenn Daten nicht geladen werden konnten.
if (! $xml)
	die ( 'XML konnte nicht geladen werden' );
switch ($mode) {
	case 'game' :
		/*
		 * game="Farming Simulator 17" 
		 * version="1.4.4.0" 
		 * server="Deutschland" 
		 * name="Genesis" 
		 * mapName="Nordfriesische Marsch mod map V2.4" 
		 * money="169491" 
		 * dayTime="79110095" 
		 * mapOverviewFilename="" 
		 * mapSize="2048">
		 */
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
		break;
	case 'player' :
		break;
	case 'mods' :
		break;
	case 'vehicles' :
		break;
	case 'map' :
		break;
}