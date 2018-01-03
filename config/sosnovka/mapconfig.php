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
$mapVersion = 'Sosnovka';

if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

$mapconfig = array_merge ( $mapconfig, array (
		'Storage_storage1' => array (
				'locationType' => 'storage',
				'position' => '382 0 -236'
		),
		'Bga' => array (
				'locationType' => 'bga',
				'ProdPerHour' => 1000,
				'position' => '-646 0 -299',
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
		'BunkerSilo_silo1' => array (
				'locationType' => 'bunker',
				'position' => '428.9 0 -281.7'
		),
		'BunkerSilo_silo2' => array (
				'locationType' => 'bunker',
				'position' => '279.0 0 843.7'
		),
		'BunkerSilo_silo3' => array (
				'locationType' => 'bunker',
				'position' => '-641 0 -251'
		),
		'BunkerSilo_silo4' => array (
				'locationType' => 'bunker',
				'position' => '-651 0 -251'
		),
		'BunkerSilo_silo5' => array (
				'locationType' => 'bunker',
				'position' => '-661 0 -251'
		),
		'BunkerSilo_silo6' => array (
				'locationType' => 'bunker',
				'position' => '-631 0 -251'
		),
		'BunkerSilo_silo7' => array (
				'locationType' => 'bunker',
				'position' => '-621 0 -251'
		),
		'BunkerSilo_silo8' => array (
				'locationType' => 'bunker',
				'position' => '-255.5 0 -794.0'
		),
		'BunkerSilo_silo9' => array (
				'locationType' => 'bunker',
				'position' => '-445.3 0 234.5'
		),
		'BunkerSilo_silo10' => array (
				'locationType' => 'bunker',
				'position' => '674.3 0 310.8'
		),
		'Animals_cow' => array (
				'locationType' => 'animal',
				'position' => '464 0 -318',
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
				'position' => '-476.5 0 -303.5',
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
				'position' => '221 0 891',
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
								'palettArea' => '-379.6 -190.1 -377.4 -185.9',
								'palettPlaces' => 15,
								'showInStorage' => false 
						) 
				),
				'productivity' => array (
						'grass_windrow_dryGrass_windrow' => 90 
				) 
		) 
) );