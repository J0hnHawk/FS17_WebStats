<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

$commodities = array ();
$classNames = array (
		"FillablePallet",
		"Bale" 
);
function getFillType($uri) {
	$split = explode ( '/', strval ( $uri ) );
	$filename = substr ( array_pop ( $split ), 0, - 4 );
	return translate ( $filename );
}

foreach ( $savegame->item as $item ) {
	$fillType = false;
	if (in_array ( $item ['className'], $classNames )) {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
	}
	if ($fillType) {
		$fillLevel = $item ['fillLevel'];
		if (!isset ( $items [$fillType] )) {
			$commodities = new commodity();
		}
	}
}

$items = $farmStorage = $paletStorage = array ();
foreach ( $savegame->item as $item ) {
	$fillType = false;
	if (in_array ( $item ['className'], $classNames )) {
		if (isset ( $item ['i3dFilename'] ))
			$fillType = getFillType ( $item ['i3dFilename'] );
		else
			$fillType = getFillType ( $item ['filename'] );
	}
	if ($fillType) {
		$fillLevel = $item ['fillLevel'];
		if (isset ( $items [$fillType] )) {
			$items [$fillType] ['count'] ++;
			$items [$fillType] ['fillLevel'] += intval ( $fillLevel );
		} else {
			$items [$fillType] = array (
					'count' => 1,
					'fillLevel' => intval ( $fillLevel ),
					'outOfMap' => false 
			);
		}
		// Schauen, ob Ballen oder Paletten ausserhalb der Karte
		list ( $posx, $posy, $posz ) = explode ( ' ', $item ['position'] );
		if ($posx < - 1071 || $posx > 1071)
			$items [$fillType] ['outOfMap'] = true;
		if ($posy < 0 || $posy > 255)
			$items [$fillType] ['outOfMap'] = true;
		if ($posz < - 1071 || $posz > 1071)
			$items [$fillType] ['outOfMap'] = true;
	}
}
ksort ( $items );
$smarty->assign ( 'items', $items );

foreach ( $savegame->onCreateLoadedObject as $object ) {
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
