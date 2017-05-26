<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

$hideZero = true;
$commodities = array ();
$classNames = array (
		"FillablePallet",
		"Bale" 
);
$storages = array (
		'FabrikScript_Saatgut',
		'FabrikScript_zuckerrueben',
		'FabrikScript_kartoffellager',
		'FabrikScript_kartoffellager2',
		'FabrikScript_Fertilizer',
		'FabrikScript_Lager'
);
function getFillType($uri) {
	$split = explode ( '/', strval ( $uri ) );
	$filename = substr ( array_pop ( $split ), 0, - 4 );
	return translate ( $filename );
}
function strposa($haystack, $needle, $offset = 0) {
	if (! is_array ( $needle ))
		$needle = array (
				$needle 
		);
	foreach ( $needle as $query ) {
		if (strpos ( $haystack, $query, $offset ) !== false)
			return true; // stop on first true result
	}
	return false;
}
function addCommodity($fillType, $fillLevel, $location, $className = 'none') {
	global $commodities;
	if (! isset ( $commodities [$fillType] )) {
		$commodities [$fillType] = array (
				'overall' => $fillLevel 
		);
	} 
	if (! isset ( $commodities [$fillType] [$location] )) {
		$commodities [$fillType] ['overall'] += $fillLevel;
		$commodities [$fillType] += array (
				$location => array (
						$className => 1,
						'fillLevel' => $fillLevel 
				) 
		);
	} else {
		$commodities [$fillType] ['overall'] += $fillLevel;
		$commodities [$fillType] [$location] [$className] ++;
		$commodities [$fillType] [$location] ['fillLevel'] += $fillLevel;
	}
}

foreach ( $savegame->item as $item ) {
	$fillType = false;
	$className = strval ( $item ['className'] );
	$location = translate('onMap');
	if (in_array ( $className, $classNames )) {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
	}
	if ($fillType) {
		$fillLevel = intval ( $item ['fillLevel'] );
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location, $className );
		}
	}
}

foreach ( $savegame->onCreateLoadedObject as $object ) {
	$saveId = $object ['saveId'];
	$location = translate('farmStorage');
	if ($saveId == 'Storage_storage1') {
		foreach ( $object->node as $node ) {
			$fillType = translate ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
	}
	if (strposa ( $saveId, $storages ) !== false) {
		$in = $object->Rohstoff;
		$out = $object->Produkt;
		$fillType = translate ( $in ['Name'] );
		$fillLevel = intval ( $in ['Lvl'] + $out ['Lvl'] );
		$location = translate($saveId);
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
}
//var_dump ( $commodities );
ksort ( $commodities, SORT_LOCALE_STRING );
$smarty->assign ( 'commodities', $commodities );
/*
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
*/