<?php
$plants = array (
		'Paletten_Fabrik' => array (
				'ProduktPerHour' => 15000,
				'factroyName' => 'Palettenwerk',
				'Rohstoff1' => array (
						'capacity' => 0,
						'factor' => 1,
						'fillTypes' => 'woodChips',
						'name' => 'boardwood' 
				),
				'Produkt1' => array (
						'capacity' => 150000,
						'factor' => 0.25,
						'fillTypes' => 'woodChips',
						'name' => 'woodChips' 
				) 
		) 
);
function createCommodity() {
	return array (
			'overall' => 0,
			'farmStorage' => 0,
			'palletStorage' => 0,
			'palletOnMap' => 0,
			'plants' => array () 
	);
}
/*
 * $commodities = array (
 * 'Warenname' => array (
 * 'farmStorage' => 0,
 * 'palletStorage' => 0,
 * 'palletOnMap' => 0,
 * 'plants' => array (
 * 'plant1' => 0,
 * 'plant2' => 0
 * )
 * )
 * );
 */
