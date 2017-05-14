<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}
$xml = getServerStatsSimpleXML ( 'http://176.57.155.146:8080/feed/dedicated-server-savegame.html?code=QIWF5Osq&file=vehicles' );

$onCreateLoadedObjects = array (
		'FabrikScript_Backerei',
		'FabrikScript_BrauereiFass',
		'FabrikScript_BrauereiKasten',
		'FabrikScript_compostMaster2k17',
		'FabrikScript_Duenger_Prod',
		'FabrikScript_Fabrik',
		'FabrikScript_GersteMehlfabrik',
		'FabrikScript_Holzhacker',
		'FabrikScript_Klaerwerk',
		'FabrikScript_KraftFutterHerstellung',
		'FabrikScript_Molkerei',
		'FabrikScript_obst_apfel',
		'FabrikScript_obst_birne',
		'FabrikScript_obst_kirsche',
		'FabrikScript_obst_pflaume',
		'FabrikScript_Oel_Raffinerie_Raps',
		'FabrikScript_Paletten_Fabrik',
		'FabrikScript_RoggenMehlfabrik',
		'FabrikScript_Saat_Prod',
		'FabrikScript_Schweinefutterstation',
		'FabrikScript_WeizenMehlfabrik',
		'FabrikScript_Zellstoff_Fabrik',
		'FabrikScript_Zuckerfabrik' 
);
$plants = array ();
foreach ( $xml->onCreateLoadedObject as $object ) {
	$saveId = $object ['saveId'];
	if (in_array ( $saveId, $onCreateLoadedObjects )) {
		$plant = translate ( $saveId );
		$plants [$plant] = array (
				'input' => array (),
				'output' => array () 
		);
		foreach ($object->Rohstoff as $rohstoff) {
			$fillType = translate($rohstoff['Name']);
			$plants [$plant]['input'][$fillType] = $rohstoff['Lvl'];
		}
		foreach ($object->Produkt as $product) {
			$fillType = translate($product['Name']);
			$plants [$plant]['output'][$fillType] = $product['Lvl'];
		}
	}
	
	// switch ($saveId) {
	// case ''
	// }
	// if ($object ['saveId'] == 'Storage_storage1') {
	// foreach ( $object->node as $node ) {
	// $fillType = translate ( $node ['fillType'] );
	// $farmStorage [$fillType] = intval ( $node ['fillLevel'] );
	// }
	// }
	// if (strpos ( $object ['saveId'], 'FabrikScript_Lager' ) !== false) {
	// $in = $object->Rohstoff;
	// $out = $object->Produkt;
	// $fillType = translate ( $in ['Name'] );
	// $paletStorage [$fillType] = $in ['Lvl'] + $out ['Lvl'];
	// }
}
var_dump($plants);