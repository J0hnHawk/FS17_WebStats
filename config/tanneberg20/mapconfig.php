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
$mapVersion = 'Tanneberg 2.0';

if (empty($mapconfig) || ! is_array($mapconfig)) {
    $mapconfig = array();
}

$mapconfig = array_merge ( $mapconfig, array (
		'Storage_storage1' => array (
				'ProdPerHour' => 0,
				'position' => '194.64 100.736 101.567',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array ()
		),
		'Animals_cow' => array (
				'ProdPerHour' => 0,
				'position' => '120 0 150',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array (
						'milk' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillType' => 'milk',
								'showInStorage' => true
						),
						'manureFillLevel' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'manure',
								'showInStorage' => true
						),
						'liquidManureFillLevel' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'liquidManure',
								'showInStorage' => true
						)
				)
		),
		'Animals_pig' => array (
				'ProdPerHour' => 0,
				'position' => '250 0 400',
				'showInProduction' => false,
				'rawMaterial' => array ()
		),
		'Animals_sheep' => array (
				'ProdPerHour' => 0,
				'position' => '570 0 -19',
				'showInProduction' => false,
				'rawMaterial' => array (
						'grass_windrow_dryGrass_windrow' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false
						),
						'water' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'water',
								'showInStorage' => false
						)
				),
				'product' => array (
						'woolPallet' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'woolPallet',
								'palettPlaces' => 15,
								'showInStorage' => false
						)
				)
		)
) );

$mapconfig = array(
    'FabrikScript_Fabrik' => array(
        'ProdPerHour' => 3000,
        'position' => '-580.678 79.98 -752.146',
        'showInProduction' => true,
        'rawMaterial' => array(
            'fuel' => array(
                'capacity' => 50000,
                'factor' => 0.1,
                'fillTypes' => 'fuel',
                'showInStorage' => false
            ),
            'Holz' => array(
                'capacity' => 50000,
                'factor' => 1,
                'fillTypes' => 'woodChips',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'woodChips' => array(
                'capacity' => 50000,
                'factor' => 0.9,
                'fillType' => 'woodChips',
                'showInStorage' => true
            ),
            'boardwood' => array(
                'capacity' => 4000,
                'factor' => 1,
                'fillType' => 'woodChips',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_compostMaster2k17' => array(
        'ProdPerHour' => 50000,
        'position' => '-585.228 99.85 49.5958',
        'showInProduction' => true,
        'rawMaterial' => array(
            'cm_inputWaste' => array(
                'capacity' => 50000,
                'factor' => 1,
                'fillTypes' => 'compost potato sugarBeet chaff silage grass grass_windrow dryGrass_windrow woodChips manure straw',
                'showInStorage' => false
            ),
            'fuel' => array(
                'capacity' => 50000,
                'factor' => 0.1,
                'fillTypes' => 'fuel',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'cm_outputCompost' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillType' => 'compost',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Raffinerie' => array(
        'ProdPerHour' => 10000,
        'position' => '525.584 110.45 -723.93',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RS' => array(
                'capacity' => 250000,
                'factor' => 1,
                'fillTypes' => 'rape sunflower',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'RS_forage' => array(
                'capacity' => 100000,
                'factor' => 0.22,
                'fillType' => 'forage',
                'showInStorage' => true
            ),
            'RM_Output' => array(
                'capacity' => 200000,
                'factor' => 0.66,
                'fillType' => 'fuel',
                'showInStorage' => true
            ),
            'DS_digestate' => array(
                'capacity' => 100000,
                'factor' => 0.22,
                'fillType' => 'digestate',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Fertilizer' => array(
        'ProdPerHour' => 3000,
        'position' => '411.111 111 -761.788',
        'showInProduction' => true,
        'rawMaterial' => array(
            'manure' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'manure',
                'showInStorage' => false
            ),
            'liquidManure' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'liquidManure',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'fertilizer' => array(
                'capacity' => 60000,
                'factor' => 1,
                'fillType' => 'fertilizer',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_liquidFertilizer' => array(
        'ProdPerHour' => 3000,
        'position' => '484.23 111 -761.801',
        'showInProduction' => true,
        'rawMaterial' => array(
            'fertilizer' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'fertilizer',
                'showInStorage' => false
            ),
            'water' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'liquidFertilizer' => array(
                'capacity' => 50000,
                'factor' => 1.5,
                'fillType' => 'liquidFertilizer',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Seeds' => array(
        'ProdPerHour' => 3000,
        'position' => '394.758 111 -729.035',
        'showInProduction' => true,
        'rawMaterial' => array(
            'grain' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'wheat maize barley rape sunflower',
                'showInStorage' => false
            ),
            'fertilizer' => array(
                'capacity' => 20000,
                'factor' => 1,
                'fillTypes' => 'fertilizer',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'seeds' => array(
                'capacity' => 60000,
                'factor' => 1,
                'fillType' => 'seeds',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Weinberg' => array(
        'ProdPerHour' => 1,
        'position' => '274.959 103.769 110.121',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Mist' => array(
                'capacity' => 35000,
                'factor' => 1.7,
                'fillTypes' => 'manure',
                'showInStorage' => false
            ),
            'Duenger' => array(
                'capacity' => 35000,
                'factor' => 1.8,
                'fillTypes' => 'fertilizer',
                'showInStorage' => false
            ),
            'slow_soja_water' => array(
                'capacity' => 90000,
                'factor' => 3,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'grape' => array(
                'capacity' => 80000,
                'factor' => 1.5,
                'fillType' => 'grape',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Winzerei' => array(
        'ProdPerHour' => 1,
        'position' => '309.777 115 -796.872',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Trauben' => array(
                'capacity' => 50000,
                'factor' => 3,
                'fillTypes' => 'grape',
                'showInStorage' => false
            ),
            'slow_soja_water' => array(
                'capacity' => 90000,
                'factor' => 3,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Traubensaft' => array(
                'capacity' => 1500,
                'factor' => 1.632,
                'fillType' => 'Wine',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'Weinfaesser' => array(
                'capacity' => 1500,
                'factor' => 1.632,
                'fillType' => 'Wine',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_SojamilchProduktion' => array(
        'ProdPerHour' => 3000,
        'position' => '154.992 109 227.117',
        'showInProduction' => true,
        'rawMaterial' => array(
            'slow_soja_soja' => array(
                'capacity' => 50000,
                'factor' => 1,
                'fillTypes' => 'soybean',
                'showInStorage' => false
            ),
            'slow_soja_water' => array(
                'capacity' => 90000,
                'factor' => 3,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'slow_soja_fuel' => array(
                'capacity' => 25000,
                'factor' => 0.3,
                'fillTypes' => 'fuel',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'slow_soja_liquid' => array(
                'capacity' => 100000,
                'factor' => 1.5,
                'fillType' => 'liquidManure',
                'showInStorage' => true
            ),
            'slow_soja_milk' => array(
                'capacity' => 50000,
                'factor' => 1,
                'fillType' => 'milk',
                'showInStorage' => true
            ),
            'slow_soja_pig' => array(
                'capacity' => 50000,
                'factor' => 0.3,
                'fillType' => 'pigFood',
                'showInStorage' => true
            )
        )
    )
);

function getLocation($position)
{
    list ($posx, $posy, $posz) = explode(' ', $position);
    if ($posx < - 1071 || $posx > 1071 || $posy < 0 || $posy > 255 || $posz < - 1071 || $posz > 1071)
        return 'outOfMap';
    /*
     * if ($posx > - 970.0 && $posx < - 967.0 && $posz > - 829.0 && $posz < - 814.0)
     * return 'FabrikScript_Zellstoff_Fabrik';
     */
    return 'onMap';
}