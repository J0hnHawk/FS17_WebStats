<?php
$xmlStr = file_get_contents ( './map01.i3d' );
$xml = simplexml_load_string ( $xmlStr );
$i = 0;
$produktion = $AttributeNodes = array ();

// Zuerst alle Fabrikscripte finden
foreach ( $xml->UserAttributes->UserAttribute as $UserAttribute ) {
	$ProduktPerHour = $nodeId = false;
	foreach ( $UserAttribute as $Attribute ) {
		if ($Attribute ['name'] == 'ProduktPerHour') {
			$ProduktPerHour = intval ( $Attribute ['value'] );
		}
		if ($Attribute ['value'] == 'modOnCreate.FabrikScript') {
			$nodeId = intval ( $UserAttribute ['nodeId'] );
		}
	}
	if ($ProduktPerHour && $nodeId) {
		$produktion [$nodeId] = array (
				'ProdPerHour' => $ProduktPerHour 
		);
	}
}

// Nun die Datei nach den NodeIds der Produktionsanlagen durchsuchen
foreach ( $xml->Scene as $item1 ) {
	if (in_array ( $item1 ['nodeId'], array_keys ( $produktion ) ))
		analyze ( $item1 );
	foreach ( $item1 as $item2 ) {
		if (in_array ( $item2 ['nodeId'], array_keys ( $produktion ) ))
			analyze ( $item2 );
		foreach ( $item2 as $item3 ) {
			if (in_array ( $item3 ['nodeId'], array_keys ( $produktion ) ))
				analyze ( $item3 );
			foreach ( $item3 as $item4 ) {
				if (in_array ( $item4 ['nodeId'], array_keys ( $produktion ) ))
					analyze ( $item4 );
				foreach ( $item4 as $item5 ) {
					if (in_array ( $item5 ['nodeId'], array_keys ( $produktion ) ))
						analyze ( $item5 );
				}
			}
		}
	}
}

// innerhalb der Produktionsanlage nach Rohstoffen und Produkten suchen
function analyze($item) {
	global $produktion, $AttributeNodes;
	$produktion [intval ( $item ['nodeId'] )] += array (
			'name' => strval ( $item ['name'] ),
			'position' => strval ( $item ['translation'] ) 
	);
	foreach ( $item->TransformGroup as $TransformGroup1 ) {
		foreach ( $TransformGroup1->TransformGroup as $TransformGroup ) {
			if (strpos ( $TransformGroup ['name'], 'Rohstoff' ) !== false || strpos ( $TransformGroup ['name'], 'Produkt' ) !== false || strpos ( $TransformGroup ['name'], 'Output' ) !== false) {
				$nodeId = intval ( $TransformGroup ['nodeId'] );
				$produktion [intval ( $item ['nodeId'] )] [strval ( $TransformGroup ['name'] )] = array (
						'nodeId' => $nodeId 
				);
				$AttributeNodes [] = $nodeId;
				continue;
			}
		}
	}
}

// nun die Details zu Rohstoffen und Produkten suchen
$AttributeValues = array ();
foreach ( $xml->UserAttributes->UserAttribute as $UserAttribute ) {
	unset ( $capacity, $factor, $fillTypes, $name );
	$nodeId = intval ( $UserAttribute ['nodeId'] );
	if (in_array ( $nodeId, $AttributeNodes )) {
		$AttributeValues [$nodeId] = array ();
		foreach ( $UserAttribute as $Attribute ) {
			if ($Attribute ['name'] == 'capacity') {
				$AttributeValues [$nodeId] ['capacity'] = intval ( $Attribute ['value'] );
			}
			if ($Attribute ['name'] == 'factor') {
				$AttributeValues [$nodeId] ['factor'] = floatval ( $Attribute ['value'] );
			}
			if ($Attribute ['name'] == 'fillTypes') {
				$AttributeValues [$nodeId] ['fillTypes'] = strval ( $Attribute ['value'] );
			}
			if ($Attribute ['name'] == 'fillType') {
				$AttributeValues [$nodeId] ['fillType'] = strval ( $Attribute ['value'] );
			}
			if ($Attribute ['name'] == 'name') {
				$AttributeValues [$nodeId] ['name'] = strval ( $Attribute ['value'] );
			}
		}
	}
}

// Rohstoff- und Produktdetails mit Produktionsanlagen "verheiraten"
foreach ( $produktion as $prodId => $prodDetails ) {
	foreach ( $prodDetails as $item => $value ) {
		if (strpos ( $item, 'Rohstoff' ) !== false || strpos ( $item, 'Produkt' ) !== false || strpos ( $item, 'Output' ) !== false) {
			$produktion [$prodId] [$item] = $AttributeValues [$value ['nodeId']];
		}
	}
}

// var_dump ( $produktion );
echo ('&lt;?php<br>');
echo ('$mapconfig = array(');
foreach ( $produktion as $item ) {
	$showInStorage = 'false';
	$showInProduction = 'true';
	if (strpos ( strval ( $item ['name'] ), 'Lager_' ) !== false) {
		$showInStorage = 'true';
		$showInProduction = 'false';
	}
	echo ("'FabrikScript_{$item['name']}' => array (");
	echo ("'ProdPerHour' => {$item['ProdPerHour']},");
	echo ("'position' => '{$item['position']}',");
	echo ("'showInProduction' => $showInProduction,");
	echo ("'rawMaterial' => array(");
	for($i = 1; $i < 6; $i ++) {
		if (isset ( $item ["Rohstoff$i"] )) {
			$name = strval ( $item ["Rohstoff$i"] ['name'] );
			echo ("'$name' => array (");
			echo ("'capacity' => {$item["Rohstoff$i"]['capacity']},");
			if (isset ( $item ["Rohstoff$i"] ['factor'] )) {
				echo ("'factor' => {$item["Rohstoff$i"]['factor']},");
			} else {
				echo ("'factor' => 1,");
			}
			echo ("'fillTypes' => '{$item["Rohstoff$i"]['fillTypes']}',");
			echo ("'showInStorage' => $showInStorage");
			echo ('),');
		}
	}
	echo ('),');
	echo ("'product' => array(");
	if (isset ( $item ["Produkt1"] )) {
		$output = 'Produkt';
	} else {
		$output = 'Output';
	}
	for($i = 1; $i < 6; $i ++) {
		if (isset ( $item ["$output$i"] )) {
			$name = strval ( $item ["$output$i"] ['name'] );
			echo ("'$name' => array (");
			echo ("'capacity' => {$item["$output$i"]['capacity']},");
			if (isset ( $item ["$output$i"] ['factor'] )) {
				echo ("'factor' => {$item["$output$i"]['factor']},");
			} else {
				echo ("'factor' => 1,");
			}
			echo ("'fillType' => '{$item["$output$i"]['fillType']}',");
			$showInStorage = 'true';
			// if (strpos ( $name, 'pallet' ) !== false || strpos ( $name, 'palett' ) !== false)
			if ($item ["$output$i"] ['capacity'] <= '10000') {
				echo ("'palettPlaces' => 999,");
				$showInStorage = 'false';
			}
			echo ("'showInStorage' => $showInStorage");
			echo ('),');
		}
	}
	echo ('),');
	echo ('),');
}
echo (');');

echo ('$show = array(');
foreach ( $produktion as $item ) {
	echo ("'FabrikScript_{$item['name']}' => array(");
	echo ("'inputInStorage' => false,");
	echo ("'outputInStorage' => false,");
	echo ("'objectInProduction' => true),");
}
echo (');');


