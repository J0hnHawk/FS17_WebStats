<?php
$xmlStr = file_get_contents ( './config/map01.i3d' );
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
	$produktion [intval ( $item ['nodeId'] )] ['name'] = strval ( $item ['name'] );
	foreach ( $item->TransformGroup as $TransformGroup1 ) {
		foreach ( $TransformGroup1->TransformGroup as $TransformGroup ) {
			if (strpos ( $TransformGroup ['name'], 'Rohstoff' ) !== false || strpos ( $TransformGroup ['name'], 'Produkt' ) !== false) {
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
			if ($Attribute ['name'] == 'name') {
				$AttributeValues [$nodeId] ['name'] = strval ( $Attribute ['value'] );
			}
		}
	}
}

// Rohstoff- und Produktdetails mit Produktionsanlagen "verheiraten"
foreach ( $produktion as $prodId => $prodDetails ) {
	foreach ( $prodDetails as $item => $value ) {
		if (strpos ( $item, 'Rohstoff' ) !== false || strpos ( $item, 'Produkt' ) !== false) {
			$produktion [$prodId] [$item] = $AttributeValues [$value ['nodeId']];
		}
	}
}

var_dump ( $produktion );