<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (! isset ( $options ['storage'] )) {
	$options ['storage'] ['sortByName'] = true;
	$options ['storage'] ['hideZero'] = true;
	$options ['storage'] ['showVehicles'] = true;
	$options ['storage'] ['onlyPallets'] = false;
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['storage'] ['sortByName'] = filter_var ( GetParam ( 'sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['hideZero'] = filter_var ( GetParam ( 'hideZero', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['showVehicles'] = filter_var ( GetParam ( 'showVehicles', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['onlyPallets'] = filter_var ( GetParam ( 'onlyPallets', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}
$hideZero = $options ['storage'] ['hideZero'];

$commodities = $outOfMap = $sortFillLevel = array ();
$classNames = array (
		"FillablePallet",
		"Bale" 
);

// Paletten, Ballen und Wurzelfrchtlager durchsuchen
foreach ( $careerVehicles->item as $item ) {
	$fillType = false;
	$className = strval ( $item ['className'] );
	$location = getLocation ( $item ['position'] );
	$location = translate ( $location );
	if (in_array ( $className, $classNames )) {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
	}
	if ($options ['storage'] ['onlyPallets'] && $className != 'FillablePallet') {
		continue;
	}
	if ($fillType) {
		$fillLevel = intval ( $item ['fillLevel'] );
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location, $className );
		}
	}
	if ($location == '{outOfMap}') {
		$commodities [$fillType] ['outOfMap'] = true;
		// für Modal Dialog mit Edit-Vorschlag, Platzierung beim Palettenlager
		$outOfMap [] = "$fillType: {$item ['position']} -> -870 100 " . (- 560 + sizeof ( $outOfMap ) * 2);
	}
	// Platzierbares Wurzelfruchtlager
	if ($className == 'HayLoftPlaceable') {
		$location = translate ( 'HayLoftPlaceable' );
		foreach ( $item as $node ) {
			$fillType = translate ( $node ['fillType'] );
			$fillLevel = intval ( $node ['fillLevel'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			} else {
				addCommodity ( $fillType, $fillLevel, $location );
			}
		}
	}
}

// Fahrzeuge
if (! $options ['storage'] ['onlyPallets'] && $options ['storage'] ['showVehicles'] && isset ( $stats->Vehicles )) {
	foreach ( $stats->Vehicles->Vehicle as $vehicle ) {
		if (isset ( $vehicle ['fillTypes'] )) {
			$location = strval ( $vehicle ['name'] );
			$fillTypes = explode ( ' ', $vehicle ['fillTypes'] );
			$fillLevels = explode ( ' ', $vehicle ['fillLevels'] );
			foreach ( $fillTypes as $key => $fillType ) {
				$fillType = translate ( $fillType );
				$fillLevel = intval ( $fillLevels [$key] );
				if ($hideZero && $fillLevel == 0 || $fillType == '{unknown}') {
					continue;
				} else {
					addCommodity ( $fillType, $fillLevel, $location );
				}
			}
		}
	}
}

foreach ( $careerVehicles->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	
	// Hofsilo
	if (! $options ['storage'] ['onlyPallets'] && $saveId == 'Storage_storage1') {
		$location = translate ( 'farmStorage' );
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
	
	// Tankstellen/Diesellager
	if (strpos ( $saveId, 'fuelStation_' ) !== false) {
		$location = translate ( $saveId );
		$fillType = translate ( 'fuel' );
		$fillLevel = intval ( $object ['fillLevel'] );
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
	
	// Fabrikscripte laut Mapconfig
	if (isset ( $mapconfig [$saveId] )) {
		$location = translate ( $saveId );
		if ($options ['storage'] ['onlyPallets'] && strpos ( 'FabrikScript_Lager', $saveId ) === false) {
			continue;
		}
		foreach ( $object->Rohstoff as $in ) {
			$fillType = strval ( $in ['Name'] );
			$fillLevel = intval ( $in ['Lvl'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			}
			if ($mapconfig [$saveId] ['rawMaterial'] [$fillType] ['showInStorage']) {
				addCommodity ( translate ( $fillType ), $fillLevel, $location );
			}
		}
		foreach ( $object->Produkt as $out ) {
			$fillType = strval ( $out ['Name'] );
			$fillLevel = intval ( $out ['Lvl'] );
			if ($hideZero && $fillLevel == 0) {
				continue;
			}
			if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
				addCommodity ( translate ( $fillType ), $fillLevel, $location );
			}
		}
	}
}

ksort ( $commodities, SORT_LOCALE_STRING );

if (! $options ['storage'] ['sortByName']) {
	foreach ( $commodities as $commodity ) {
		$sortFillLevel [] = $commodity ['overall'];
	}
	array_multisort ( $sortFillLevel, SORT_DESC, $commodities );
}

$smarty->assign ( 'commodities', $commodities );
$smarty->assign ( 'outOfMap', $outOfMap );
$smarty->assign ( 'options', $options ['storage'] );
