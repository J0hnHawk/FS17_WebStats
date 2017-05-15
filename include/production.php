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
$plants = $sort_name = $sort_fillLevel = array ();

foreach ( $xml->onCreateLoadedObject as $object ) {
	$saveId = $object ['saveId'];
	if (in_array ( $saveId, $onCreateLoadedObjects )) {
		$plant = translate ( $saveId );
		$sort_name[] = strtolower ($plant);
		$sort_state = 0;
		$plants [$plant] = array (
				'class'=> 'success',
				'input' => array (),
				'output' => array () 
		);
		foreach ( $object->Rohstoff as $rohstoff ) {
			$fillType = translate ( $rohstoff ['Name'] );
			$fillLevel = intval ( $rohstoff ['Lvl'] );
			if($fillLevel == 0) {
				$plants[$plant]['class'] = 'danger';
				$sortstate = 2;
			}
			$plants [$plant] ['input'] [$fillType] = $fillLevel;
		}
		foreach ( $object->Produkt as $product ) {
			$fillType = translate ( $product ['Name'] );
			$plants [$plant] ['output'] [$fillType] = intval ( $product ['Lvl'] );
		}
		$sort_fillLevel[] = $sort_state;
	}
}
ksort($plants);
//array_multisort($sort_fillLevel, SORT_DESC, $plants);
$smarty->assign ( 'plants', $plants );