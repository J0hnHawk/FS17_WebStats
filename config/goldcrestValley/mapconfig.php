<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
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
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$mapVersion = 'Goldcres Valley';

if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

$mapconfig = array_merge ( $mapconfig, array (
		'Storage_storage1' => array (
				'locationType' => 'storage',
				'position' => '189 0 109',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'Storage_storage2' => array (
				'locationType' => 'storage',
				'position' => '329 0 -576',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'Storage_storage3' => array (
				'locationType' => 'storage',
				'position' => '-224 0 -151',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'Storage_storage4' => array (
				'locationType' => 'storage',
				'position' => '-587 0 129',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'Bga' => array (
				'locationType' => 'bga',
				'ProdPerHour' => 1000,
				'position' => '-74 0 -504',
				'showInProduction' => true,
				'rawMaterial' => array (
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
				'product' => array (
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
				'position' => '-45 0 -548',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'BunkerSilo_silo002' => array (
				'locationType' => 'bunker',
				'position' => '-35 0 -548',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'BunkerSilo_silo003' => array (
				'locationType' => 'bunker',
				'position' => '-25 0 -548',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'BunkerSilo_silo004' => array (
				'locationType' => 'bunker',
				'position' => '-55 0 -548',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'BunkerSilo_silo005' => array (
				'locationType' => 'bunker',
				'position' => '-65 0 -548',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'BunkerSilo_cowSilo' => array (
				'locationType' => 'bunker',
				'position' => '-506 0 668',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array () 
		),
		'Animals_cow' => array (
				'locationType' => 'animal',
				'ProdPerHour' => 0,
				'position' => '-556 0 640',
				'showInProduction' => false,
				'rawMaterial' => array (
						'water' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'straw' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'grass_windrow' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'grass_windrow',
								'showInStorage' => false 
						),
						'silage_dryGrass_windrow' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'silage dryGrass_windrow',
								'showInStorage' => false 
						),
						'powerFood' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'powerFood',
								'showInStorage' => false 
						) 
				),
				'product' => array (
						'liquidManureFillLevel' => array (
								'capacity' => '&infin;',
								'factor' => 0,
								'fillTypes' => 'liquidManure',
								'showInStorage' => true 
						),
						'manureFillLevel' => array (
								'capacity' => '&infin;',
								'factor' => 0,
								'fillTypes' => 'manure',
								'showInStorage' => true 
						),
						'milk' => array (
								'capacity' => '&infin;',
								'factor' => 0,
								'fillTypes' => 'milk',
								'showInStorage' => true 
						) 
				
				) 
		),
		'Animals_pig' => array (
				'locationType' => 'animal',
				'ProdPerHour' => 0,
				'position' => '165.5 0 -463',
				'showInProduction' => false,
				'rawMaterial' => array (
						'water' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'straw' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'maize_pigFood' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'maize pigFood',
								'showInStorage' => false 
						),
						'wheat_barley_pigFood' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'wheat barley pigFood',
								'showInStorage' => false 
						),
						'rape_sunflower_soybean_pigFood' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'rape sunflower soybean pigFood',
								'showInStorage' => false 
						),
						'potato_sugarBeet_pigFood' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'potato sugarBeet pigFood',
								'showInStorage' => false 
						) 
				),
				'product' => array (
						'liquidManure' => array (
								'capacity' => '&infin;',
								'factor' => 0,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'manure' => array (
								'capacity' => '&infin;',
								'factor' => 0,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				) 
		),
		'Animals_sheep' => array (
				'locationType' => 'animal',
				'ProdPerHour' => 1,
				'position' => '-374 0 -175',
				'showInProduction' => false,
				'rawMaterial' => array (
						'water' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'grass_windrow_dryGrass_windrow' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false 
						) 
				),
				'product' => array (
						'woolPallet' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'woolPallet',
								'palettPlaces' => 6,
								'showInStorage' => false 
						) 
				) 
		) 
) );
function getLocation($position) {
	list ( $posx, $posy, $posz ) = explode ( ' ', $position );
	if ($posx < - 1071 || $posx > 1071 || $posy < 0 || $posy > 255 || $posz < - 1071 || $posz > 1071)
		return 'outOfMap';
	if ($posx > - 379.6 && $posx < - 377.4 && $posz > - 190.1 && $posz < - 185.9)
		return 'Animals_sheep';
	return 'onMap';
}