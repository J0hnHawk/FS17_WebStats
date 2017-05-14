<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}
$xml = getServerStatsSimpleXML ( 'http://176.57.155.146:8080/feed/dedicated-server-savegame.html?code=QIWF5Osq&file=vehicles' );

$items = $farmStorage = $paletStorage = array ();
function getFillType($uri) {
	$split = explode ( '/', strval ( $uri ) );
	return translate ( substr ( array_pop ( $split ), 0, - 4 ) );
}

foreach ( $xml->item as $item ) {
	$fillType = false;
	if ($item ['className'] == "FillablePallet")
		$fillType = getFillType ( $item ['i3dFilename'] );
	if ($item ['className'] == "Bale")
		$fillType = getFillType ( $item ['filename'] );
	if ($fillType) {
		$fillLevel = $item ['fillLevel'];
		if (isset ( $items [$fillType] )) {
			$items [$fillType] ['count'] ++;
			$items [$fillType] ['fillLevel'] += intval ( $fillLevel );
		} else {
			$items [$fillType] = array (
					'count' => 1,
					'fillLevel' => intval ( $fillLevel ) 
			);
		}
	}
}
ksort ( $items );
$smarty->assign ( 'items', $items );

foreach ( $xml->onCreateLoadedObject as $object ) {
	if ($object ['saveId'] == 'Storage_storage1') {
		foreach ( $object->node as $node ) {
			$fillType = translate ( $node ['fillType'] );
			$farmStorage [$fillType] = intval ( $node ['fillLevel'] );
		}
	}
	if (strpos ( $object ['saveId'], 'FabrikScript_Lager' ) !== false) {
		$in = $object->Rohstoff;
		$out = $object->Produkt;
		$fillType = translate ( $in ['Name'] );
		$paletStorage [$fillType] = intval ( $in ['Lvl'] + $out ['Lvl'] );
	}
}
ksort ( $farmStorage );
ksort ( $paletStorage );
$smarty->assign ( 'farmStorage', $farmStorage );
$smarty->assign ( 'paletStorage', $paletStorage );
