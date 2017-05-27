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
function getLocation($position) {
	list ( $posx, $posy, $posz ) = explode ( ' ', $position );
	if ($posx < - 1071 || $posx > 1071 || $posy < 0 || $posy > 255 || $posz < - 1071 || $posz > 1071)
		return 'outOfMap';
	if ($posx > - 970.0 && $posx < - 967.0 && $posz > - 829.0 && $posz < - 814.0)
		return 'FabrikScript_Zellstoff_Fabrik';
	if ($posx > - 970.0 && $posx < - 967.0 && $posz > - 852.0 && $posz < - 837.0)
		return 'FabrikScript_Zellstoff_Fabrik';
	if ($posx > - 942.1 && $posx < - 939.9 && $posz > - 35.8 && $posz < - 19.6)
		return 'FabrikScript_Backerei';
	if ($posx > - 578.2 && $posx < - 568.0 && $posz > 264.0 && $posz < 272.0)
		return 'FabrikScript_Molkerei';
	if ($posx > - 566.0 && $posx < - 556.0 && $posz > 264.0 && $posz < 272.0)
		return 'FabrikScript_Molkerei';
	if ($posx > - 553.8 && $posx < - 543.8 && $posz > 264.0 && $posz < 272.0)
		return 'FabrikScript_Molkerei';
	if ($posx > - 542.4 && $posx < - 531.4 && $posz > 264.0 && $posz < 272.0)
		return 'FabrikScript_Molkerei';
	if ($posx > - 529.4 && $posx < - 519.4 && $posz > 264.0 && $posz < 272.0)
		return 'FabrikScript_Molkerei';
	if ($posx > - 945.5 && $posx < - 935.3 && $posz > 417.6 && $posz < 427.7)
		return 'FabrikScript_BrauereiKasten';
	if ($posx > - 923.3 && $posx < - 913.0 && $posz > 457.0 && $posz < 467.3)
		return 'FabrikScript_BrauereiFass';
	if ($posx > - 945.5 && $posx < - 935.3 && $posz > 417.6 && $posz < 427.7)
		return 'FabrikScript_BrauereiFass';
	if ($posx > - 772.2 && $posx < - 710.0 && $posz > 765.5 && $posz < 767.8)
		return 'FabrikScript_potatoWasher';
	if ($posx > - 721.4 && $posx < - 709.1 && $posz > 751.5 && $posz < 753.9)
		return 'FabrikScript_potatoWasher2';
	if ($posx > - 713.2 && $posx < - 709.0 && $posz > 807.4 && $posz < 823.5)
		return 'FabrikScript_Kartoffelfabrik';
	if ($posx > - 695.1 && $posx < - 690.8 && $posz > 807.4 && $posz < 823.6)
		return 'FabrikScript_Kartoffelfabrik';
	if ($posx > - 675.9 && $posx < - 671.7 && $posz > 807.4 && $posz < 823.6)
		return 'FabrikScript_Kartoffelfabrik';
	if ($posx > - 853.8 && $posx < - 852.2 && $posz > - 98.8 && $posz < - 82.7)
		return 'FabrikScript_RoggenMehlfabrik';
	if ($posx > - 845.7 && $posx < - 844.2 && $posz > - 98.8 && $posz < - 82.7)
		return 'FabrikScript_GersteMehlfabrik';
	if ($posx > - 837.7 && $posx < - 836.2 && $posz > - 98.8 && $posz < - 82.7)
		return 'FabrikScript_WeizenMehlfabrik';
	if ($posx > 578.5 && $posx < 592.7 && $posz > - 25.3 && $posz < - 23.4)
		return 'Schafweide';
	if ($posx > 866.4 && $posx < 882.6 && $posz > 618.5 && $posz < 622.7)
		return 'FabrikScript_Paletten_Fabrik';
	if ($posx > 960.1 && $posx < 961.7 && $posz > 663.1 && $posz < 683.3)
		return 'FabrikScript_Fabrik';
	
	if ($posx > 877.6 && $posx < 893.8 && $posz > - 880.3 && $posz < - 876.1)
		return 'FabrikScript_obst_apfel';
	if ($posx > 877.5 && $posx < 893.8 && $posz > - 893.1 && $posz < - 888.9)
		return 'FabrikScript_obst_birne';
	if ($posx > 877.6 && $posx < 893.8 && $posz > - 906.3 && $posz < - 902.0)
		return 'FabrikScript_obst_kirsche';
	if ($posx > 877.6 && $posx < 893.8 && $posz > - 918.4 && $posz < - 914.2)
		return 'FabrikScript_obst_pflaume';
	return 'onMap';
}
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
	} else {
		$commodities [$fillType] ['overall'] += $fillLevel;
	}
	if (! isset ( $commodities [$fillType] [$location] )) {
		$commodities [$fillType] += array (
				$location => array (
						$className => 1,
						'fillLevel' => $fillLevel 
				) 
		);
	} else {
		$commodities [$fillType] [$location] [$className] ++;
		$commodities [$fillType] [$location] ['fillLevel'] += $fillLevel;
	}
}

foreach ( $savegame->item as $item ) {
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
	$location = translate ( 'farmStorage' );
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
		if (strpos ( $saveId, 'FabrikScript_Lager' ) !== false) {
			$location = translate ( 'FabrikScript_Lager' );
		} else {
			$location = translate ( $saveId );
		}
		if ($hideZero && $fillLevel == 0) {
			continue;
		} else {
			addCommodity ( $fillType, $fillLevel, $location );
		}
	}
}
ksort ( $commodities, SORT_LOCALE_STRING );
$smarty->assign ( 'commodities', $commodities );
