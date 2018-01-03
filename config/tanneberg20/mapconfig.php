<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017-2018 John Hawk <john.hawk@gmx.net>
 *
 * "FS17 Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "FS17 Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$mapVersion = 'Tanneberg 2.0';

if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

$mapconfig = array_merge ( $mapconfig, array (
		'Storage_storage1' => array (
				'locationType' => 'storage',
				'position' => '-36 0 -400'
		),
		'Storage_storage3' => array (
				'locationType' => 'storage',
				'position' => '-34 0 235'
		),
		'Bga' => array (
				'locationType' => 'bga',
				'ProdPerHour' => 1000,
				'position' => '-54 0 -112',
				'showInProduction' => true,
				'input' => array (
						'silage' => array (
								'capacity' => 50000,
								'factor' => 360,
								'fillTypes' => 'bunkerFillLevel',
								'showInStorage' => false
						),
						'liquidManure' => array (
								'capacity' => '&infin;',
								'factor' => 180,
								'fillTypes' => 'liquidManureFillLevel',
								'showInStorage' => false
						)
				),
				'output' => array (
						'digestate' => array (
								'capacity' => 800000,
								'factor' => 87,
								'fillTypes' => 'digestateSiloFillLevel',
								'showInStorage' => true
						)
				)
		),
		'BunkerSilo_silo001' => array (
				'locationType' => 'bunker',
				'position' => '-82.1 0 -76.0' 
		),
		'BunkerSilo_silo002' => array (
				'locationType' => 'bunker',
				'position' => '-66.8 0 -68' 
		),
		'BunkerSilo_silo003' => array (
				'locationType' => 'bunker',
				'position' => '-67.1 0 -450' 
		),
		'BunkerSilo_silo004' => array (
				'locationType' => 'bunker',
				'position' => '274.1 0 -524.2' 
		),
		'Animals_cow' => array (
				'locationType' => 'animal',
				'position' => '-21 0 -436',
				'reproRate' => 1200,
				'input' => array (
						'water' => array (
								'trough_factor' => 35,
								'consumption_factor' => 35,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'straw' => array (
								'trough_factor' => 70,
								'consumption_factor' => 70,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'grass_windrow' => array (
								'trough_factor' => 70,
								'consumption_factor' => 100,
								'fillTypes' => 'grass_windrow',
								'showInStorage' => false 
						),
						'silage_dryGrass_windrow' => array (
								'trough_factor' => 175,
								'consumption_factor' => 175,
								'fillTypes' => 'silage dryGrass_windrow',
								'showInStorage' => false 
						),
						'powerFood' => array (
								'trough_factor' => 105,
								'consumption_factor' => 105,
								'fillTypes' => 'powerFood',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'liquidManure' => array (
								'production_factor' => 250,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'manure' => array (
								'production_factor' => 200,
								'fillType' => 'manure',
								'showInStorage' => true 
						),
						'milk' => array (
								'production_factor' => 714,
								'fillType' => 'milk',
								'showInStorage' => true 
						) 
				
				),
				'productivity' => array (
						'straw' => 10,
						'grass_windrow' => 18,
						'silage_dryGrass_windrow' => 45,
						'powerFood' => 27 
				) 
		),
		'Animals_pig' => array (
				'locationType' => 'animal',
				'position' => '238 0 -560',
				'reproRate' => 144,
				'input' => array (
						'water' => array (
								'trough_factor' => 10,
								'consumption_factor' => 10,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'straw' => array (
								'trough_factor' => 20,
								'consumption_factor' => 20,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'maize_pigFood' => array (
								'trough_factor' => 45,
								'consumption_factor' => 61,
								'fillTypes' => 'maize pigFood',
								'showInStorage' => false 
						),
						'wheat_barley_pigFood' => array (
								'trough_factor' => 25,
								'consumption_factor' => 23,
								'fillTypes' => 'wheat barley pigFood',
								'showInStorage' => false 
						),
						'rape_sunflower_soybean_pigFood' => array (
								'trough_factor' => 18,
								'consumption_factor' => 18,
								'fillTypes' => 'rape sunflower soybean pigFood',
								'showInStorage' => false 
						),
						'potato_sugarBeet_pigFood' => array (
								'trough_factor' => 4.5,
								'consumption_factor' => 5,
								'fillTypes' => 'potato sugarBeet pigFood',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'liquidManure' => array (
								'production_factor' => 65,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'manure' => array (
								'production_factor' => 50,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				),
				'productivity' => array (
						'straw' => 9.8,
						'maize_pigFood' => 44.8,
						'wheat_barley_pigFood' => 22.8,
						'rape_sunflower_soybean_pigFood' => 17.8,
						'potato_sugarBeet_pigFood' => 4.8 
				) 
		),
		'Animals_sheep' => array (
				'locationType' => 'animal',
				'position' => '157 0 -248',
				'reproRate' => 960,
				'input' => array (
						'water' => array (
								'trough_factor' => 15,
								'consumption_factor' => 15,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'grass_windrow_dryGrass_windrow' => array (
								'trough_factor' => 30,
								'consumption_factor' => 36,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'woolPallet' => array (
								'production_factor' => 24,
								'capacity' => 2000,
								'fillType' => 'woolPallet',
								'palettArea' => '134.9 -274.0 143.4 -266.0',
								'palettPlaces' => 6,
								'showInStorage' => false 
						) 
				),
				'productivity' => array (
						'grass_windrow_dryGrass_windrow' => 90 
				) 
		) 
) );

$mapconfig = array_merge ( $mapconfig, array (
		'FabrikScript_Diesellager' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 987654321,
				'position' => '-186.855 -29.9992 -702.259',
				'showInProduction' => false,
				'input' => array (
						'HFUIN' => array (
								'capacity' => 999999,
								'factor' => 1,
								'fillTypes' => 'fuel',
								'showInStorage' => true
						)
				),
				'output' => array (
						'FUOUT' => array (
								'capacity' => 999999,
								'factor' => 1,
								'fillType' => 'fuel',
								'showInStorage' => true
						)
				)
		),
		'FabrikScript_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 3000,
				'position' => '-580.678 79.98 -752.146',
				'showInProduction' => true,
				'input' => array (
						'fuel' => array (
								'capacity' => 50000,
								'factor' => 0.1,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						),
						'Holz' => array (
								'capacity' => 50000,
								'factor' => 1,
								'fillTypes' => 'woodChips',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'woodChips' => array (
								'capacity' => 50000,
								'factor' => 0.9,
								'fillType' => 'woodChips',
								'showInStorage' => true 
						),
						'boardwood' => array (
								'capacity' => 4000,
								'factor' => 1,
								'fillType' => 'boardwood',
								'palettArea' => '-192 231 -187 240',
								'palettPlaces' => 5,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_compostMaster2k17' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000,
				'position' => '-585.228 99.85 49.5958',
				'showInProduction' => true,
				'input' => array (
						'cm_inputWaste' => array (
								'capacity' => 50000,
								'factor' => 1,
								'fillTypes' => 'compost potato sugarBeet chaff silage grass grass_windrow dryGrass_windrow woodChips manure straw',
								'showInStorage' => false 
						),
						'fuel' => array (
								'capacity' => 50000,
								'factor' => 0.1,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'cm_outputCompost' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'compost',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Raffinerie' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '525.584 110.45 -723.93',
				'showInProduction' => true,
				'input' => array (
						'Tip_RS' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'rape sunflower',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'RS_forage' => array (
								'capacity' => 100000,
								'factor' => 0.22,
								'fillType' => 'forage',
								'showInStorage' => true 
						),
						'RM_Output' => array (
								'capacity' => 200000,
								'factor' => 0.66,
								'fillType' => 'fuel',
								'showInStorage' => true 
						),
						'DS_digestate' => array (
								'capacity' => 100000,
								'factor' => 0.22,
								'fillType' => 'digestate',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Fertilizer' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 3000,
				'position' => '411.111 111 -761.788',
				'showInProduction' => true,
				'input' => array (
						'manure' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'manure',
								'showInStorage' => false 
						),
						'liquidManure' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'liquidManure',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'fertilizer' => array (
								'capacity' => 60000,
								'factor' => 1,
								'fillType' => 'fertilizer',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_liquidFertilizer' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 3000,
				'position' => '484.23 111 -761.801',
				'showInProduction' => true,
				'input' => array (
						'fertilizer' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						),
						'water' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'liquidFertilizer' => array (
								'capacity' => 50000,
								'factor' => 1.5,
								'fillType' => 'liquidFertilizer',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Seeds' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 3000,
				'position' => '394.758 111 -729.035',
				'showInProduction' => true,
				'input' => array (
						'grain' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'wheat maize barley rape sunflower',
								'showInStorage' => false 
						),
						'fertilizer' => array (
								'capacity' => 20000,
								'factor' => 1,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'seeds' => array (
								'capacity' => 60000,
								'factor' => 1,
								'fillType' => 'seeds',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Weinberg' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '274.959 103.769 110.121',
				'showInProduction' => true,
				'input' => array (
						'Mist' => array (
								'capacity' => 35000,
								'factor' => 1.7,
								'fillTypes' => 'manure',
								'showInStorage' => false 
						),
						'Duenger' => array (
								'capacity' => 35000,
								'factor' => 1.8,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						),
						'slow_soja_water' => array (
								'capacity' => 90000,
								'factor' => 3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'grape' => array (
								'capacity' => 80000,
								'factor' => 1.5,
								'fillType' => 'grape',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Winzerei' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '309.777 115 -796.872',
				'showInProduction' => true,
				'input' => array (
						'Trauben' => array (
								'capacity' => 50000,
								'factor' => 3,
								'fillTypes' => 'grape',
								'showInStorage' => false 
						),
						'slow_soja_water' => array (
								'capacity' => 90000,
								'factor' => 3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Traubensaft' => array (
								'capacity' => 1500,
								'factor' => 1.632,
								'fillType' => 'Wine',
								'palettArea' => '313.2 -779.6 323.6 -777.3',
								'palettPlaces' => 5,
								'showInStorage' => false 
						),
						'Weinfaesser' => array (
								'capacity' => 1500,
								'factor' => 1.632,
								'fillType' => 'Wine',
								'palettArea' => '307.3 -775.8 317.6 -773.5',
								'palettPlaces' => 5,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_SojamilchProduktion' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 3000,
				'position' => '154.992 109 227.117',
				'showInProduction' => true,
				'input' => array (
						'slow_soja_soja' => array (
								'capacity' => 50000,
								'factor' => 1,
								'fillTypes' => 'soybean',
								'showInStorage' => false 
						),
						'slow_soja_water' => array (
								'capacity' => 90000,
								'factor' => 3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'slow_soja_fuel' => array (
								'capacity' => 25000,
								'factor' => 0.3,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'slow_soja_liquid' => array (
								'capacity' => 100000,
								'factor' => 1.5,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'slow_soja_milk' => array (
								'capacity' => 50000,
								'factor' => 1,
								'fillType' => 'milk',
								'showInStorage' => true 
						),
						'slow_soja_pig' => array (
								'capacity' => 50000,
								'factor' => 0.3,
								'fillType' => 'pigFood',
								'showInStorage' => true 
						) 
				) 
		) 
) );
