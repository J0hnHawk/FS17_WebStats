<?php
include ("webStatsInclude.php");
$xml = getServerStatsSimpleXML ( 'http://176.57.155.146:8080/feed/dedicated-server-savegame.html?code=QIWF5Osq&file=vehicles' );
/*
 * foreach ( $xml->item as $item ) {
 * echo $item['position']."<br>";
 * }
 */
$farmStorage = $paletStorage = array ();
foreach ( $xml->onCreateLoadedObject as $object ) {
	if ($object ['saveId'] == 'Storage_storage1') {
		foreach ( $object->node as $node ) {
			$farmStorage [strval ( $node ['fillType'] )] = intval ( $node ['fillLevel'] );
		}
	}
	if (strpos ( $object ['saveId'], 'FabrikScript_Lager' ) !== false) {
		$in = $object->Rohstoff;
		$out = $object->Produkt;
		$paletStorage [strval ( $in ['Name'] )] = $in ['Lvl'] + $out ['Lvl'];
	}
}
$smarty->assign ( 'farmStorage', $farmStorage );
$smarty->assign ( 'paletStorage', $paletStorage );
/* foreach ( $xml['onCreateLoadedObject']['Storage_storage1'] as $node ) {
	echo $node['fillType']."<br>";
} */