<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}
/*
$hidePlant = GetParam('hide','G',false);
if($hidePlant && !is_array($hidePlant)){
	echo ('Verarbeiten');
}
*/
if (! isset ( $options ['production'] )) {
	$options ['production'] ['sortByName'] = true;
	$options ['production'] ['sortFullProducts'] = true;
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['production'] ['sortByName'] = filter_var ( GetParam ( 'sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['production'] ['sortFullProducts'] = filter_var ( GetParam ( 'sortFullProducts', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}

$plants = $sort_name = $sort_fillLevel = $sort_name = $commodities = array ();

// Paletten suchen
foreach ( $savegame->item as $item ) {
	$fillType = false;
	$className = strval ( $item ['className'] );
	$location = getLocation ( $item ['position'] );
	$location = translate ( $location );
	if ($className == 'FillablePallet') {
		if (isset ( $item ['i3dFilename'] )) {
			$fillType = getFillType ( $item ['i3dFilename'] );
		} else {
			$fillType = getFillType ( $item ['filename'] );
		}
	}
	if ($fillType) {
		$fillLevel = intval ( $item ['fillLevel'] );
		addCommodity ( $fillType, $fillLevel, $location, $className );
	}
}

// Fabriken suchen
foreach ( $savegame->onCreateLoadedObject as $object ) {
	$saveId = strval ( $object ['saveId'] );
	if (isset ( $mapconfig [$saveId] ) && $mapconfig [$saveId] ['showInProduction']) {
		$plant = translate ( $saveId );
		$sort_name [] = strtolower ( $plant );
		$plantstate = 0;
		$plants [$plant] = array (
				'class' => 'success',
				'input' => array (),
				'output' => array () 
		);
		foreach ( $object->Rohstoff as $rohstoff ) {
			$fillType = translate ( $rohstoff ['Name'] );
			$fillLevel = intval ( $rohstoff ['Lvl'] );
			$fillMax = $mapconfig [$saveId] ['rawMaterial'] [strval ( $rohstoff ['Name'] )] ['capacity'];
			$state = 0;
			if ($fillLevel == 0) {
				$state = 2;
			} elseif ($fillLevel / $fillMax < 0.1) {
				$state = 1;
			}
			if ($state > $plantstate)
				$plantstate = $state;
			$plants [$plant] ['input'] [$fillType] = array (
					'fillLevel' => $fillLevel,
					'fillMax' => $fillMax,
					'state' => $state 
			);
		}
		foreach ( $object->Produkt as $product ) {
			$fillType = strval ( $product ['Name'] );
			$fillTypeLang = translate ( $fillType );
			if ($mapconfig [$saveId] ['product'] [$fillType] ['showInStorage']) {
				$fillLevel = intval ( $product ['Lvl'] );
				$fillMax = $mapconfig [$saveId] ['product'] [$fillType] ['capacity'];
			} else {
				$fillLevel = isset ( $commodities [$fillTypeLang] [$plant] ['fillLevel'] ) ? $commodities [$fillTypeLang] [$plant] ['fillLevel'] : 0;
				$capacity = $mapconfig [$saveId] ['product'] [$fillType] ['capacity'];
				$fillMax = $mapconfig [$saveId] ['product'] [$fillType] ['palettPlaces'] * $capacity;
			}
			$state = 0;
			if ($fillLevel == $fillMax) {
				$state = 2;
			} elseif ($fillLevel / $fillMax > 0.8) {
				$state = 1;
			}
			if ($options ['production'] ['sortFullProducts'] && $state > $plantstate)
				$plantstate = $state;
			$plants [$plant] ['output'] [$fillTypeLang] = array (
					'fillLevel' => $fillLevel,
					'fillMax' => $fillMax,
					'state' => $state 
			);
		}
		$plants[$plant]['state'] = $plantstate;
		if ($plantstate == 2) {
			$plants [$plant] ['class'] = 'danger';
		} elseif ($plantstate == 1) {
			$plants [$plant] ['class'] = 'warning';
		}
		$sort_fillLevel [] = $plantstate;
	}
}
// ksort ( $plants, SORT_NATURAL );

if (! $options ['production'] ['sortByName']) {
	array_multisort ( $sort_fillLevel, SORT_DESC, $sort_name, SORT_ASC, $plants );
} else {
	uksort ( $plants, "strnatcasecmp" );
}
$smarty->registerPlugin("modifier",'base64_encode',  'base64_encode');
$smarty->assign ( 'plants', $plants );
$smarty->assign ( 'options', $options ['production'] );