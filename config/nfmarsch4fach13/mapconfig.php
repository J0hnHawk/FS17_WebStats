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
$mapVersion = 'NF Marsch 4fach 1.3';

if (empty($mapconfig) || ! is_array($mapconfig)) {
    $mapconfig = array();
}

// Farmsilo und Ställe
$mapconfig = array_merge($mapconfig, array(
    'TipTrigger_BAHNHOF' => array(
        'locationType' => 'TipTrigger',
        'position' => '-459 0 -110'
    ),
    'TipTrigger_HAFEN' => array(
        'locationType' => 'TipTrigger',
        'position' => '-948 0 -989'
    ),
    'TipTrigger_DEPOT' => array(
        'locationType' => 'TipTrigger',
        'position' => '847 0 460'
    ),
    'TipTrigger_RAIFFEISEN' => array(
        'locationType' => 'TipTrigger',
        'position' => '467 0 -232'
    ),
    'TipTrigger_GETREIDEHANDEL' => array(
        'locationType' => 'TipTrigger',
        'position' => '270 0 -732'
    ),
    'TipTrigger_SUPERMARKT' => array(
        'locationType' => 'TipTrigger',
        'position' => '-511 0 -567'
    ),
    'TipTrigger_SUPERMARKT1' => array(
        'locationType' => 'TipTrigger',
        'position' => '-248 0 -658'
    ),
    'TipTrigger_STADION' => array(
        'locationType' => 'TipTrigger',
        'position' => '-156 0 -741'
    ),
    'TipTrigger_WOLLEVERKAUF' => array(
        'locationType' => 'TipTrigger',
        'position' => '824 0 315'
    ),
    'TipTrigger_WOLLEVERKAUF1' => array(
        'locationType' => 'TipTrigger',
        'position' => '-916 0 -960'
    ),
    'TipTrigger_SAWMILL' => array(
        'locationType' => 'TipTrigger',
        'position' => '-867 0 723'
    ),
    'TipTrigger_WASSERKAUF' => array(
        'locationType' => 'TipTrigger',
        'position' => '-420 0 -342'
    ),
    'TipTrigger_HEIZWERK' => array(
        'locationType' => 'TipTrigger',
        'position' => '-746 0 758'
    ),
    'TipTrigger_WINDROW_SALE' => array(
        'locationType' => 'TipTrigger',
        'position' => '251 0 112'
    ),
    'TipTrigger_BIOGAS' => array(
        'locationType' => 'TipTrigger',
        'position' => '-145 0 -952'
    ),
    'TipTrigger_TANKE' => array(
        'locationType' => 'TipTrigger',
        'position' => '-191 0 -299'
    ),
    'TipTrigger_TANKE2' => array(
        'locationType' => 'TipTrigger',
        'position' => '782 0 -850'
    ),
    'TipTrigger_BANK' => array(
        'locationType' => 'TipTrigger',
        'position' => '-405 0 -470'
    ),
    
    'Storage_storage1' => array(
        'locationType' => 'storage',
        'position' => '210 0 120'
    ),
    'Bga' => array(
        'locationType' => 'bga',
        'ProdPerHour' => 1000,
        'position' => '-250 0 650',
        'showInProduction' => true,
        'input' => array(
            'silage' => array(
                'capacity' => 50000,
                'factor' => 360,
                'fillTypes' => 'bunkerFillLevel',
                'showInStorage' => false
            ),
            'liquidManure' => array(
                'capacity' => '&infin;',
                'factor' => 180,
                'fillTypes' => 'liquidManureFillLevel',
                'showInStorage' => false
            )
        ),
        'output' => array(
            'digestate' => array(
                'capacity' => 800000,
                'factor' => 87,
                'fillTypes' => 'digestateSiloFillLevel',
                'showInStorage' => true
            )
        )
    ),
    'BunkerSilo_silo001' => array(
        'locationType' => 'bunker',
        'position' => '-346 0 682'
    ),
    'BunkerSilo_silo002' => array(
        'locationType' => 'bunker',
        'position' => '-346 0 672'
    ),
    'BunkerSilo_silo003' => array(
        'locationType' => 'bunker',
        'position' => '-346 0 662'
    ),
    'BunkerSilo_silo004' => array(
        'locationType' => 'bunker',
        'position' => '-346 0 692'
    ),
    'BunkerSilo_silo005' => array(
        'locationType' => 'bunker',
        'position' => '-346 0 702'
    ),
    'BunkerSilo_cowSilo' => array(
        'locationType' => 'bunker',
        'position' => '-506 0 668'
    ),
    'BunkerSilo_Silo1' => array(
        'locationType' => 'bunker',
        'position' => '-66 0 -992'
    ),
    'BunkerSilo_Silo2' => array(
        'locationType' => 'bunker',
        'position' => '-66 0 -963'
    ),
    'Animals_cow' => array(
        'locationType' => 'animal',
        'position' => '36 0 200',
        'reproRate' => 1200,
        'input' => array(
            'water' => array(
                'trough_factor' => 35,
                'consumption_factor' => 35,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'straw' => array(
                'trough_factor' => 70,
                'consumption_factor' => 70,
                'fillTypes' => 'straw',
                'showInStorage' => false
            ),
            'grass_windrow' => array(
                'trough_factor' => 70,
                'consumption_factor' => 100,
                'fillTypes' => 'grass_windrow',
                'showInStorage' => false
            ),
            'silage_dryGrass_windrow' => array(
                'trough_factor' => 175,
                'consumption_factor' => 175,
                'fillTypes' => 'silage dryGrass_windrow',
                'showInStorage' => false
            ),
            'powerFood' => array(
                'trough_factor' => 105,
                'consumption_factor' => 105,
                'fillTypes' => 'powerFood',
                'showInStorage' => false
            )
        ),
        'output' => array(
            'liquidManure' => array(
                'production_factor' => 250,
                'fillType' => 'liquidManure',
                'showInStorage' => true
            ),
            'manure' => array(
                'production_factor' => 200,
                'fillType' => 'manure',
                'showInStorage' => true
            ),
            'milk' => array(
                'production_factor' => 714,
                'fillType' => 'milk',
                'showInStorage' => true
            )
        
        ),
        'productivity' => array(
            'straw' => 10,
            'grass_windrow' => 18,
            'silage_dryGrass_windrow' => 45,
            'powerFood' => 27
        )
    ),
    'Animals_pig' => array(
        'locationType' => 'animal',
        'position' => '250 0 400',
        'reproRate' => 144,
        'input' => array(
            'water' => array(
                'trough_factor' => 10,
                'consumption_factor' => 10,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'straw' => array(
                'trough_factor' => 20,
                'consumption_factor' => 20,
                'fillTypes' => 'straw',
                'showInStorage' => false
            ),
            'maize_pigFood' => array(
                'trough_factor' => 45,
                'consumption_factor' => 61,
                'fillTypes' => 'maize pigFood',
                'showInStorage' => false
            ),
            'wheat_barley_pigFood' => array(
                'trough_factor' => 25,
                'consumption_factor' => 23,
                'fillTypes' => 'wheat barley pigFood',
                'showInStorage' => false
            ),
            'rape_sunflower_soybean_pigFood' => array(
                'trough_factor' => 18,
                'consumption_factor' => 18,
                'fillTypes' => 'rape sunflower soybean pigFood',
                'showInStorage' => false
            ),
            'potato_sugarBeet_pigFood' => array(
                'trough_factor' => 4.5,
                'consumption_factor' => 5,
                'fillTypes' => 'potato sugarBeet pigFood',
                'showInStorage' => false
            )
        ),
        'output' => array(
            'liquidManure' => array(
                'production_factor' => 65,
                'fillType' => 'liquidManure',
                'showInStorage' => true
            ),
            'manure' => array(
                'production_factor' => 50,
                'fillType' => 'manure',
                'showInStorage' => true
            )
        ),
        'productivity' => array(
            'straw' => 9.8,
            'maize_pigFood' => 44.8,
            'wheat_barley_pigFood' => 22.8,
            'rape_sunflower_soybean_pigFood' => 17.8,
            'potato_sugarBeet_pigFood' => 4.8
        )
    ),
    'Animals_sheep' => array(
        'locationType' => 'animal',
        'position' => '570 0 -19',
        'reproRate' => 960,
        'input' => array(
            'water' => array(
                'trough_factor' => 15,
                'consumption_factor' => 15,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'grass_windrow_dryGrass_windrow' => array(
                'trough_factor' => 30,
                'consumption_factor' => 36,
                'fillTypes' => 'grass_windrow dryGrass_windrow',
                'showInStorage' => false
            )
        ),
        'output' => array(
            'woolPallet' => array(
                'production_factor' => 24,
                'capacity' => 2000,
                'fillType' => 'woolPallet',
                'palettArea' => '578.3 -25.7 594.8 -21.3',
                'palettPlaces' => 15,
                'showInStorage' => false
            )
        ),
        'productivity' => array(
            'grass_windrow_dryGrass_windrow' => 90
        )
    )
));

// Fabrikscripte
$mapconfig = array (
		'FabrikScript_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 16000,
				'position' => '940.896 99.956 681.96',
				'showInProduction' => true,
				'input' => array (
						'Brennstoffe' => array (
								'capacity' => 75000,
								'factor' => 0.4,
								'fillTypes' => 'straw woodChips wool',
								'showInStorage' => false 
						),
						'Holz' => array (
								'capacity' => 600000,
								'factor' => 1,
								'fillTypes' => 'woodChips',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'woodChips' => array (
								'capacity' => 150000,
								'factor' => 0.9,
								'fillType' => 'woodChips',
								'showInStorage' => true 
						),
						'boardwood' => array (
								'capacity' => 8000,
								'factor' => 1,
								'fillType' => 'woodChips',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Holzhacker' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000,
				'position' => '905.352 99.4625 648.442',
				'showInProduction' => true,
				'input' => array (
						'Holz' => array (
								'capacity' => 400000,
								'factor' => 1,
								'fillTypes' => 'woodChips',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'woodChips' => array (
								'capacity' => 150000,
								'factor' => 0.9,
								'fillType' => 'woodChips',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_compostMaster2k17' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000,
				'position' => '-3.48832 99.822 -714.664',
				'showInProduction' => true,
				'input' => array (
						'cm_inputWaste' => array (
								'capacity' => 300000,
								'factor' => 2,
								'fillTypes' => 'compost potato sugarBeet chaff silage grass grass_windrow dryGrass_windrow woodChips manure straw rye oat wheat barley rape',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'cm_outputCompost' => array (
								'capacity' => 300000,
								'factor' => 1,
								'fillType' => 'compost',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Klaerwerk' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 40000,
				'position' => '-153.801 100 795.944',
				'showInProduction' => true,
				'input' => array (
						'Tip_RS1' => array (
								'capacity' => 600000,
								'factor' => 1,
								'fillTypes' => 'liquidManure digestate',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'RS_compost1' => array (
								'capacity' => 500000,
								'factor' => 0.26,
								'fillType' => 'compost',
								'showInStorage' => true 
						),
						'RM_Output2' => array (
								'capacity' => 800000,
								'factor' => 0.65,
								'fillType' => 'water',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_WeizenMehlfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-812.292 100.879 -9.2273',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSwheat' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'wheat',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'mehlpalette' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'mehl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_GersteMehlfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-820.29 100.879 -9.2273',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSbarley' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'barley',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'mehlpalette' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'mehl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_RoggenMehlfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-828.294 100.879 -9.2273',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSrye' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rye',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'mehlpalette' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'mehl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Zuckerfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 15000,
				'position' => '-820.656 101.945 -873.396',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSzucker' => array (
								'capacity' => 2000000,
								'factor' => 1,
								'fillTypes' => 'sugarBeet',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'zuckerpalette' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'zucker',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Paletten_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 25000,
				'position' => '877.617 100.01 614.069',
				'showInProduction' => true,
				'input' => array (
						'boardwood' => array (
								'capacity' => 352000,
								'factor' => 0.5,
								'fillTypes' => 'woodChips',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'woodChips' => array (
								'capacity' => 150000,
								'factor' => 0.25,
								'fillType' => 'woodChips',
								'showInStorage' => true 
						),
						'emptypallet' => array (
								'capacity' => 7000,
								'factor' => 1,
								'fillType' => 'emptypallet',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_BrauereiKasten' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-846.326 99.961 499.743',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSbarley' => array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'barley',
								'showInStorage' => false 
						),
						'hops' => array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'hops',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.4,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'bierpalettekasten' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'beer',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_BrauereiFass' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-821.824 99.961 499.743',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSwheat' => array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'wheat',
								'showInStorage' => false 
						),
						'hops' => array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'hops',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.4,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'bierpalettefass' => array (
								'capacity' => 5000,
								'factor' => 0.5,
								'fillType' => 'beerf',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Molkerei' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-441.172 99.961 337.698',
				'showInProduction' => true,
				'input' => array (
						'Tip_RSmilk' => array (
								'capacity' => 300000,
								'factor' => 0.75,
								'fillTypes' => 'milk',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palettepapier' => array (
								'capacity' => 100000,
								'factor' => 0.5,
								'fillTypes' => 'papier',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'palettebutter' => array (
								'capacity' => 5000,
								'factor' => 0.25,
								'fillType' => 'butter',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palettemilch' => array (
								'capacity' => 5000,
								'factor' => 0.25,
								'fillType' => 'milch',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palettesahne' => array (
								'capacity' => 5000,
								'factor' => 0.25,
								'fillType' => 'sahne',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palettequark' => array (
								'capacity' => 5000,
								'factor' => 0.25,
								'fillType' => 'quark',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'paletteyogurt' => array (
								'capacity' => 5000,
								'factor' => 0.25,
								'fillType' => 'yogurt',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Zellstoff_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 12500,
				'position' => '-900.044 99.9937 -802.387',
				'showInProduction' => true,
				'input' => array (
						'Hackschnitzel' => array (
								'capacity' => 500000,
								'factor' => 0.5,
								'fillTypes' => 'woodChips',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 150000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'palettepapier' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'papier',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'karton',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_obst_apfel' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 600,
				'position' => '877.012 100 -751.388',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Apfelpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'apfel',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_obst_birne' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 600,
				'position' => '877.012 100 -811.391',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Birnenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'birne',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_obst_kirsche' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 600,
				'position' => '877.012 100 -871.043',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Kirschpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kirsche',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_obst_pflaume' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 600,
				'position' => '877.012 100 -930.202',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Pflaumenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'pflaume',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Kartoffelfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 7500,
				'position' => '-600.478 100.641 886.48',
				'showInProduction' => true,
				'input' => array (
						'washedPotato' => array (
								'capacity' => 600000,
								'factor' => 0.6,
								'fillTypes' => 'washedPotato',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 280000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 175000,
								'factor' => 0.15,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						),
						'palettespeiseoel' => array (
								'capacity' => 225000,
								'factor' => 0.15,
								'fillTypes' => 'oel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'palettechips' => array (
								'capacity' => 5000,
								'factor' => 0.35,
								'fillType' => 'chips',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palettepommes' => array (
								'capacity' => 5000,
								'factor' => 0.35,
								'fillType' => 'pommes',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'palettekartoffelsack' => array (
								'capacity' => 5000,
								'factor' => 0.35,
								'fillType' => 'kartoffelsack',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Brennerei_Korn' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 400,
				'position' => '-124.52 100 -796.704',
				'showInProduction' => true,
				'input' => array (
						'Getreide' => array (
								'capacity' => 250000,
								'factor' => 0.4,
								'fillTypes' => 'wheat rye oat barley',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.5,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 120000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 70000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						),
						'zuckerpalette' => array (
								'capacity' => 70000,
								'factor' => 0.2,
								'fillTypes' => 'zucker',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'palettekorn' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'korn',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Brennerei_Obstler' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 400,
				'position' => '-98.1 100 -818.784',
				'showInProduction' => true,
				'input' => array (
						'Obstpalette' => array (
								'capacity' => 90000,
								'factor' => 0.4,
								'fillTypes' => 'apfel kirsche pflaume birne',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.5,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 120000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 70000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						),
						'zuckerpalette' => array (
								'capacity' => 70000,
								'factor' => 0.2,
								'fillTypes' => 'zucker',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'paletteobstler' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'obstler',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_HofladenApfel' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '223.977 100 78.6882',
				'showInProduction' => true,
				'input' => array (
						'Apfel' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'apfel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_HofladenBirne' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '223.977 100 81.3477',
				'showInProduction' => true,
				'input' => array (
						'Birne' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'birne',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_HofladenPflaume' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '224.645 100 85.1752',
				'showInProduction' => true,
				'input' => array (
						'Pflaumen' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'pflaume',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Hofladenkirsche' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '224.645 100 82.5263',
				'showInProduction' => true,
				'input' => array (
						'Kirschen' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'kirsche',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Hofladentomaten' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '215.801 100 82.5263',
				'showInProduction' => true,
				'input' => array (
						'Tomaten' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'tomaten',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Hofladensalat' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '215.801 100 85.2447',
				'showInProduction' => true,
				'input' => array (
						'Salat' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'salat',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_HofladenBlumenkohl' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '214.971 100 78.6882',
				'showInProduction' => true,
				'input' => array (
						'Blumenkohl' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'blumenkohl',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_HofladenRotkohl' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60,
				'position' => '214.971 100 81.3267',
				'showInProduction' => true,
				'input' => array (
						'Rotkohl' => array (
								'capacity' => 15000,
								'factor' => 1,
								'fillTypes' => 'rotkohl',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 25000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_geldboxen' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 100000,
				'position' => '298.646 100 98.5848',
				'showInProduction' => true,
				'input' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'geld',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Pellets_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 7500,
				'position' => '877.617 100.01 625.812',
				'showInProduction' => true,
				'input' => array (
						'Stroh_Hackschnitzel' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'straw woodChips',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 240000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'pellets' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'pellets',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_sand' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1713.5 103.084 208.773',
				'showInProduction' => true,
				'input' => array (
						'cm_inputFuel' => array (
								'capacity' => 200000,
								'factor' => 0.1,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Sand' => array (
								'capacity' => 2000000,
								'factor' => 1,
								'fillType' => 'sand',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_kies' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1647.82 103.084 191.86',
				'showInProduction' => true,
				'input' => array (
						'cm_inputFuel' => array (
								'capacity' => 200000,
								'factor' => 0.1,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Kies' => array (
								'capacity' => 2000000,
								'factor' => 1,
								'fillType' => 'gravel',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Zementverkauf' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1691.54 100 -940.22',
				'showInProduction' => true,
				'input' => array (
						'Zement' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'cement',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 250000,
								'factor' => 3,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Sandverkauf' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1691.93 100 -886.787',
				'showInProduction' => true,
				'input' => array (
						'Sand' => array (
								'capacity' => 300000,
								'factor' => 1,
								'fillTypes' => 'sand',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 250000,
								'factor' => 0.4,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Kiesverkauf' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1704.69 100 -956.3',
				'showInProduction' => true,
				'input' => array (
						'Kies' => array (
								'capacity' => 300000,
								'factor' => 1,
								'fillTypes' => 'gravel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Geldkassette' => array (
								'capacity' => 250000,
								'factor' => 0.4,
								'fillType' => 'geld',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Duenger_Prod' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '-3.163 0 -14.2899',
				'showInProduction' => true,
				'input' => array (
						'manure' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'manure',
								'showInStorage' => false 
						),
						'liquidManure' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'liquidManure',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'fertilizer' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'fertilizer',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Saat_Prod' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '-3.15 4.01462e-14 17.5367',
				'showInProduction' => true,
				'input' => array (
						'grain' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'wheat maize barley rape',
								'showInStorage' => false 
						),
						'fertilizer' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'seeds' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'seeds',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Fertilizer' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2147483647,
				'position' => '6.21052 0.260554 -9.09314',
				'showInProduction' => true,
				'input' => array (
						'FS_fertilizer' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'FS_fertilizer' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'fertilizer',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Saatgut' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2147483647,
				'position' => '5.87823 0.265491 22.8234',
				'showInProduction' => true,
				'input' => array (
						'FS_Seeds' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'seeds',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'FS_Seeds' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'seeds',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Schweinefutter' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2147483647,
				'position' => '-66.7724 0.261 -45.7668',
				'showInProduction' => true,
				'input' => array (
						'Schweinefutter' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'pigFood',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Schweinefutter' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'pigFood',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_kartoffellager' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000000000,
				'position' => '-481.765 0.0500031 -874.563',
				'showInProduction' => true,
				'input' => array (
						'potato' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'potato' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'potato',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_kartoffellager2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000000000,
				'position' => '44.9181 0.0499822 -43.7428',
				'showInProduction' => true,
				'input' => array (
						'potato' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'potato' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'potato',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_zuckerrueben' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000000000,
				'position' => '28.259 0.0499862 -24.1173',
				'showInProduction' => true,
				'input' => array (
						'sugarBeet' => array (
								'capacity' => 600000,
								'factor' => 1,
								'fillTypes' => 'sugarBeet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'sugarBeet' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillType' => 'sugarBeet',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Duenger_Prod2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '-1369.72 0.0499635 335.776',
				'showInProduction' => true,
				'input' => array (
						'manure' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'manure',
								'showInStorage' => false 
						),
						'liquidManure' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'liquidManure',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'fertilizer' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'fertilizer',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Saat_Prod2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '-1334.85 0.0500043 335.575',
				'showInProduction' => true,
				'input' => array (
						'grain' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'wheat maize barley rape',
								'showInStorage' => false 
						),
						'fertilizer' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'fertilizer',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'seeds' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'seeds',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Schweinefutterstation' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 30000,
				'position' => '-76.8797 1.15196 25.771',
				'showInProduction' => true,
				'input' => array (
						'Getreide' => array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'wheat barley maize oat rye',
								'showInStorage' => false 
						),
						'Raps Sonnenblume Soja' => array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'rape sunflower soybean',
								'showInStorage' => false 
						),
						'Erdfruechten' => array (
								'capacity' => 100000,
								'factor' => 0.5,
								'fillTypes' => 'potato sugarBeet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Schweinefutter' => array (
								'capacity' => 250000,
								'factor' => 0.935,
								'fillType' => 'pigFood',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_potatoWasher' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 6000,
				'position' => '-699.617 99.9871 766.891',
				'showInProduction' => true,
				'input' => array (
						'Kartoffeln' => array (
								'capacity' => 75000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'showInStorage' => false 
						),
						'Wasser' => array (
								'capacity' => 25000,
								'factor' => 0.01,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'Diesel' => array (
								'capacity' => 5000,
								'factor' => 0.01,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'washedPotato' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'washedPotato',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_potatoWasher2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 6000,
				'position' => '-698.768 99.9407 752.973',
				'showInProduction' => true,
				'input' => array (
						'Kartoffeln' => array (
								'capacity' => 75000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'showInStorage' => false 
						),
						'Wasser' => array (
								'capacity' => 25000,
								'factor' => 0.01,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'Diesel' => array (
								'capacity' => 5000,
								'factor' => 0.01,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'washedPotato' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'washedPotato',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Schlachterei' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50,
				'position' => '-634.491 99.3027 -94.9426',
				'showInProduction' => true,
				'input' => array (
						'Tier_Anlieferung' => array (
								'capacity' => 400,
								'factor' => 0.4,
								'fillTypes' => 'pig cow sheep',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 260000,
								'factor' => 3,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 170000,
								'factor' => 3,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Wurst' => array (
								'capacity' => 5000,
								'factor' => 200,
								'fillType' => 'sausage',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Fleisch' => array (
								'capacity' => 5000,
								'factor' => 200,
								'fillType' => 'meat',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Tomatenzucht' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '-509.492 89.5874 581.372',
				'showInProduction' => true,
				'input' => array (
						'water' => array (
								'capacity' => 30000,
								'factor' => 0.7,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'compost' => array (
								'capacity' => 80000,
								'factor' => 0.5,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 45000,
								'factor' => 0.142857,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'tomaten' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'tomaten',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Salatzucht' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '-540.967 89.6469 606.976',
				'showInProduction' => true,
				'input' => array (
						'water' => array (
								'capacity' => 30000,
								'factor' => 0.7,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'compost' => array (
								'capacity' => 80000,
								'factor' => 0.5,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 45000,
								'factor' => 0.142857,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'salat' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'salat',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Rotkohlzucht' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '-510.072 89.5945 608.427',
				'showInProduction' => true,
				'input' => array (
						'water' => array (
								'capacity' => 30000,
								'factor' => 0.7,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'compost' => array (
								'capacity' => 80000,
								'factor' => 0.5,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 45000,
								'factor' => 0.142857,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'rotkohl' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'rotkohl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Blumenkohlzucht' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '-541.626 89.5798 634.097',
				'showInProduction' => true,
				'input' => array (
						'water' => array (
								'capacity' => 30000,
								'factor' => 0.7,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'compost' => array (
								'capacity' => 80000,
								'factor' => 0.5,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 45000,
								'factor' => 0.142857,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'blumenkohl' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'blumenkohl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Kuerbisfeld' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '1478.13 89.807 2151.41',
				'showInProduction' => true,
				'input' => array (
						'compost' => array (
								'capacity' => 200000,
								'factor' => 0.5,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						),
						'Stroh' => array (
								'capacity' => 200000,
								'factor' => 0.25,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 100000,
								'factor' => 0.15,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'kuerbis' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kuerbis',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Weberei' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '23.441 -0.004 -9.551',
				'showInProduction' => true,
				'input' => array (
						'Wolle' => array (
								'capacity' => 200000,
								'factor' => 0.13,
								'fillTypes' => 'wool',
								'showInStorage' => false 
						),
						'Wasser' => array (
								'capacity' => 150000,
								'factor' => 0.5,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'stoffrolleMK' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'stoffrolleMK',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Mischfutterstation' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 10000,
				'position' => '603.933 99.7183 1666.86',
				'showInProduction' => true,
				'input' => array (
						'Stroh' => array (
								'capacity' => 200000,
								'factor' => 0.35,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'Silage' => array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'silage',
								'showInStorage' => false 
						),
						'Gras' => array (
								'capacity' => 200000,
								'factor' => 0.35,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Mischfutter' => array (
								'capacity' => 300000,
								'factor' => 0.96,
								'fillType' => 'forage',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_compostlager' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2147483647,
				'position' => '895.541 100.289 -942.435',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 800000,
								'factor' => 1,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Compost' => array (
								'capacity' => 800000,
								'factor' => 1,
								'fillType' => 'compost',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_compostlager2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2147483647,
				'position' => '809.88 100.24 648.854',
				'showInProduction' => true,
				'input' => array (
						'Compost' => array (
								'capacity' => 800000,
								'factor' => 1,
								'fillTypes' => 'compost',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Compost' => array (
								'capacity' => 800000,
								'factor' => 1,
								'fillType' => 'compost',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Speiseoel_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 7500,
				'position' => '-887.736 99.996 524.547',
				'showInProduction' => true,
				'input' => array (
						'Tip_RS' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rape sunflower',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 120000,
								'factor' => 0.15,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palette_karton' => array (
								'capacity' => 100000,
								'factor' => 0.15,
								'fillTypes' => 'karton',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'RS_compost' => array (
								'capacity' => 500000,
								'factor' => 0.3,
								'fillType' => 'compost',
								'showInStorage' => true 
						),
						'palettespeiseoel' => array (
								'capacity' => 5000,
								'factor' => 0.3,
								'fillType' => 'oel',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Diesel_Raffinerie' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 7500,
				'position' => '-887.736 99.996 524.547',
				'showInProduction' => true,
				'input' => array (
						'Tip_RS' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rape sunflower',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'RS_compost' => array (
								'capacity' => 500000,
								'factor' => 0.3,
								'fillType' => 'compost',
								'showInStorage' => true 
						),
						'RM_Output' => array (
								'capacity' => 300000,
								'factor' => 0.6,
								'fillType' => 'fuel',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_KraftFutterHerstellung' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 60000,
				'position' => '592.522 90.021 -239.126',
				'showInProduction' => true,
				'input' => array (
						'Stroh' => array (
								'capacity' => 600000,
								'factor' => 0.3,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'Silage' => array (
								'capacity' => 600000,
								'factor' => 0.4,
								'fillTypes' => 'silage',
								'showInStorage' => false 
						),
						'Gras' => array (
								'capacity' => 600000,
								'factor' => 0.3,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Mischfutter' => array (
								'capacity' => 1000000,
								'factor' => 1,
								'fillType' => 'forage',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Backerei_Brot' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-909.99 103.256 56.1265',
				'showInProduction' => true,
				'input' => array (
						'emptypallet' => array (
								'capacity' => 120000,
								'factor' => 0.15,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'Tip_mehl' => array (
								'capacity' => 120000,
								'factor' => 0.8,
								'fillTypes' => 'mehl',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 200000,
								'factor' => 0.9,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'brotpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'brot',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Backerei_Backwaren' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-910.47 103.256 45.3266',
				'showInProduction' => true,
				'input' => array(
						'emptypallet' => array(
								'capacity' => 120000,
								'factor' => 0.12,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false
						),
						'palette_karton' => array(
								'capacity' => 120000,
								'factor' => 0.12,
								'fillTypes' => 'karton',
								'showInStorage' => false
						),
						'Tip_mehl' => array(
								'capacity' => 120000,
								'factor' => 0.3,
								'fillTypes' => 'mehl',
								'showInStorage' => false
						),
						'zuckerpalette' => array(
								'capacity' => 120000,
								'factor' => 0.3,
								'fillTypes' => 'zucker',
								'showInStorage' => false
						),
						'Milchpalette' => array(
								'capacity' => 120000,
								'factor' => 0.2,
								'fillTypes' => 'milch',
								'showInStorage' => false
						),
						'Butterpalette' => array(
								'capacity' => 120000,
								'factor' => 0.15,
								'fillTypes' => 'butter',
								'showInStorage' => false
						)
				),
				'output' => array (
						'Backwaren' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'backwaren',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Backerei_Kuchen' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-910.95 103.256 34.52',
				'showInProduction' => true,
				'input' => array(
						'emptypallet' => array(
								'capacity' => 120000,
								'factor' => 0.12,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false
						),
						'palette_karton' => array(
								'capacity' => 120000,
								'factor' => 0.12,
								'fillTypes' => 'karton',
								'showInStorage' => false
						),
						'Tip_mehl' => array(
								'capacity' => 120000,
								'factor' => 0.3,
								'fillTypes' => 'mehl',
								'showInStorage' => false
						),
						'Obstpalette' => array(
								'capacity' => 120000,
								'factor' => 0.3,
								'fillTypes' => 'apfel kirsche pflaume birne',
								'showInStorage' => false
						),
						'Zuckerpalette' => array(
								'capacity' => 120000,
								'factor' => 0.3,
								'fillTypes' => 'zucker',
								'showInStorage' => false
						),
						'Quarkpalette' => array(
								'capacity' => 120000,
								'factor' => 0.2,
								'fillTypes' => 'quark',
								'showInStorage' => false
						),
						'Sahnepalette' => array(
								'capacity' => 120000,
								'factor' => 0.15,
								'fillTypes' => 'sahne',
								'showInStorage' => false
						)
				),
				'output' => array (
						'Kuchen' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kuchen',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Backwaren' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-879.97 99.955 -746.65',
				'showInProduction' => false,
				'input' => array (
						'Backwaren' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'backwaren',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Backwaren' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'backwaren',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Kuchen' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-880.353 99.955 -734.012',
				'showInProduction' => false,
				'input' => array (
						'Kuchen' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'kuchen',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Kuchen' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kuchen',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Papier' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000000,
				'position' => '-845.096 99.955 -551.867',
				'showInProduction' => false,
				'input' => array (
						'palettepapier' => array (
								'capacity' => 340000,
								'factor' => 1,
								'fillTypes' => 'papier',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettepapier' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'papier',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Karton' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000000,
				'position' => '-885.891 99.955 -477.953',
				'showInProduction' => false,
				'input' => array (
						'palette_karton' => array (
								'capacity' => 330000,
								'factor' => 1,
								'fillTypes' => 'karton',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palette_karton' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'karton',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Leerpaletten' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-888.526 99.955 -471.539',
				'showInProduction' => false,
				'input' => array (
						'emptypallet' => array (
								'capacity' => 335000,
								'factor' => 1,
								'fillTypes' => 'emptypallet',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'emptypallet' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'emptypallet',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Apfel' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.6 99.955 -477.953',
				'showInProduction' => false,
				'input' => array (
						'Apfelpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'apfel',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Apfelpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'apfel',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Birne' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.7 99.955 -490.701',
				'showInProduction' => false,
				'input' => array (
						'Birnenpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'birne',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Birnenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'birne',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Kirsche' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.68 99.955 -459.32',
				'showInProduction' => false,
				'input' => array (
						'Kirschpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'kirsche',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Kirschpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kirsche',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Pflaume' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.6 99.955 -471.658',
				'showInProduction' => false,
				'input' => array (
						'Pflaumenpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'pflaume',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Pflaumenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'pflaume',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Bierkasten' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.6 99.955 -531.733',
				'showInProduction' => false,
				'input' => array (
						'bierpalettekasten' => array (
								'capacity' => 465000,
								'factor' => 1,
								'fillTypes' => 'beer',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'bierpalettekasten' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'beer',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Bierfass' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.588 99.955 -519.388',
				'showInProduction' => false,
				'input' => array (
						'bierpalettefass' => array (
								'capacity' => 465000,
								'factor' => 1,
								'fillTypes' => 'beerf',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'bierpalettefass' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'beerf',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Zucker' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.714 99.955 -599.055',
				'showInProduction' => false,
				'input' => array (
						'zuckerpalette' => array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'zucker',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'zuckerpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'zucker',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Mehl' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.714 99.955 -611.621',
				'showInProduction' => false,
				'input' => array (
						'mehlpalette' => array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'mehl',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'mehlpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'mehl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Milch' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-885.573 99.955 -611.621',
				'showInProduction' => false,
				'input' => array (
						'palettemilch' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'milch',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettemilch' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'milch',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Butter' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-885.573 99.955 -598.991',
				'showInProduction' => false,
				'input' => array (
						'palettebutter' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'butter',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettebutter' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'butter',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Quark' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-888.15 99.955 -580.32',
				'showInProduction' => false,
				'input' => array (
						'palettequark' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'quark',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettequark' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'quark',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Sahne' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.269 99.955 -580.32',
				'showInProduction' => false,
				'input' => array (
						'palettesahne' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'sahne',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettesahne' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'sahne',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Yogurt' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-888.223 99.955 -592.881',
				'showInProduction' => false,
				'input' => array (
						'paletteyogurt' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'yogurt',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'paletteyogurt' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'yogurt',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Brot' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-933.233 99.955 -592.881',
				'showInProduction' => false,
				'input' => array (
						'brotpalette' => array (
								'capacity' => 480000,
								'factor' => 1,
								'fillTypes' => 'brot',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'brotpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'brot',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_kartoffelsack' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-944.192 99.955 -692.864',
				'showInProduction' => false,
				'input' => array (
						'palettekartoffelsack' => array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'kartoffelsack',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettekartoffelsack' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'kartoffelsack',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Chips' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-946.992 99.955 -674.129',
				'showInProduction' => false,
				'input' => array (
						'palettechips' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'chips',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettechips' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'chips',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_pommes' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-946.872 99.955 -661.57',
				'showInProduction' => false,
				'input' => array (
						'palettepommes' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'pommes',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettepommes' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'pommes',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_washedPotato' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-944.192 99.955 -692.862',
				'showInProduction' => false,
				'input' => array (
						'washedPotato' => array (
								'capacity' => 660000,
								'factor' => 1,
								'fillTypes' => 'washedPotato',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'washedPotato' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'washedPotato',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_oel' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-882.855 99.955 -715.35',
				'showInProduction' => false,
				'input' => array (
						'palettespeiseoel' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'oel',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'palettespeiseoel' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'oel',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Wurst' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-880.353 99.955 -680.221',
				'showInProduction' => false,
				'input' => array (
						'Wurst' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'sausage',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Wurst' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'sausage',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Fleisch' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-879.978 99.955 -692.857',
				'showInProduction' => false,
				'input' => array (
						'Fleisch' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'meat',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Fleisch' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'meat',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_obstler' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.413 99.955 -550.58',
				'showInProduction' => false,
				'input' => array (
						'Obstler' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'obstler',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Obstler' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'obstler',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Korn' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-930.783 99.955 -537.926',
				'showInProduction' => false,
				'input' => array (
						'Korn' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'korn',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Korn' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'korn',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Blumenkohl' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-942.432 99.955 -734.118',
				'showInProduction' => false,
				'input' => array (
						'Blumenkohl' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'blumenkohl',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Blumenkohl' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'blumenkohl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Tomaten' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-945.382 99.955 -727.818',
				'showInProduction' => false,
				'input' => array (
						'Tomatenpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'tomaten',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Tomatenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'tomaten',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Salat' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-945.46 99.955 -715.471',
				'showInProduction' => false,
				'input' => array (
						'Salatpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'salat',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Salatpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'salat',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Rotkohl' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-942.545 99.955 -746.861',
				'showInProduction' => false,
				'input' => array (
						'Rotkohlpalette' => array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rotkohl',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Rotkohlpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'rotkohl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Pellets' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-888.5 99.955 -459.2',
				'showInProduction' => false,
				'input' => array (
						'Pelletspalette' => array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'pellets',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Pelletspalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'pellets',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_kaufleerpalette' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-514.317 99.9572 -591.976',
				'showInProduction' => true,
				'input' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'geld',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'emptypallet' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'emptypallet',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_kaufkartonpalette' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-514.317 99.9572 -589.682',
				'showInProduction' => true,
				'input' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'geld',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'palette_karton' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'karton',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_kaufbretterpalette' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-514.317 99.9572 -585.781',
				'showInProduction' => true,
				'input' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'geld',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'boardwood' => array (
								'capacity' => 8000,
								'factor' => 1.1,
								'fillType' => 'woodChips',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Fisch' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-882.695 99.955 -674.11',
				'showInProduction' => false,
				'input' => array (
						'Fischpalette' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'fisch',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Fischpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'fisch',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_kaufstahlpalette' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-514.317 99.9572 -587.786',
				'showInProduction' => true,
				'input' => array (
						'geld' => array (
								'capacity' => 250000,
								'factor' => 1,
								'fillTypes' => 'geld',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Stahlpalette' => array (
								'capacity' => 5000,
								'factor' => 0.4,
								'fillType' => 'stahl',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Fischerei' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '-909.99 103.256 -919.441',
				'showInProduction' => true,
				'input' => array (
						'emptypallet' => array (
								'capacity' => 120000,
								'factor' => 0.1,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'cm_inputFuel' => array (
								'capacity' => 200000,
								'factor' => 0.75,
								'fillTypes' => 'fuel',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Krabben' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'krabben',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Fisch' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'fisch',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Lager_Krabben' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 14400001,
				'position' => '-882.695 99.955 -686.78',
				'showInProduction' => false,
				'input' => array (
						'Krabbenpalette' => array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'krabben',
								'showInStorage' => true 
						) 
				),
				'output' => array (
						'Krabbenpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'krabben',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Cementfabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '1638.66 102.448 254.597',
				'showInProduction' => true,
				'input' => array (
						'Sand' => array (
								'capacity' => 500000,
								'factor' => 0.4,
								'fillTypes' => 'sand',
								'showInStorage' => false 
						),
						'Kies' => array (
								'capacity' => 500000,
								'factor' => 0.4,
								'fillTypes' => 'gravel',
								'showInStorage' => false 
						),
						'Wasser' => array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 500000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'palettepapier' => array (
								'capacity' => 350000,
								'factor' => 0.2,
								'fillTypes' => 'papier',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Cement' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'cement',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Rinderzucht' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2,
				'position' => '675.578 100 1554.08',
				'showInProduction' => true,
				'input' => array (
						'Mischfutter' => array (
								'capacity' => 500000,
								'factor' => 1000,
								'fillTypes' => 'forage',
								'showInStorage' => false 
						),
						'Silage' => array (
								'capacity' => 500000,
								'factor' => 1000,
								'fillTypes' => 'silage',
								'showInStorage' => false 
						),
						'Stroh' => array (
								'capacity' => 500000,
								'factor' => 500,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 500000,
								'factor' => 100,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Rinder' => array (
								'capacity' => 500,
								'factor' => 1,
								'fillType' => 'cow',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Guelle' => array (
								'capacity' => 800000,
								'factor' => 75,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'Mist' => array (
								'capacity' => 500000,
								'factor' => 75,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Rinderzucht2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 2,
				'position' => '675.578 100 1579.92',
				'showInProduction' => true,
				'input' => array (
						'Mischfutter' => array (
								'capacity' => 500000,
								'factor' => 1000,
								'fillTypes' => 'forage',
								'showInStorage' => false 
						),
						'Silage' => array (
								'capacity' => 500000,
								'factor' => 1000,
								'fillTypes' => 'silage',
								'showInStorage' => false 
						),
						'Stroh' => array (
								'capacity' => 500000,
								'factor' => 500,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 500000,
								'factor' => 100,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Rinder' => array (
								'capacity' => 500,
								'factor' => 1,
								'fillType' => 'cow',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Guelle' => array (
								'capacity' => 800000,
								'factor' => 75,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						),
						'Mist' => array (
								'capacity' => 500000,
								'factor' => 75,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_brueckenbau' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 5000,
				'position' => '-2632.86 -7.11299 -963.198',
				'showInProduction' => true,
				'input' => array (
						'Sand' => array (
								'capacity' => 200000,
								'factor' => 1,
								'fillTypes' => 'sand',
								'showInStorage' => false 
						),
						'Kies' => array (
								'capacity' => 200000,
								'factor' => 1,
								'fillTypes' => 'gravel',
								'showInStorage' => false 
						),
						'Zement' => array (
								'capacity' => 100000,
								'factor' => 0.5,
								'fillTypes' => 'cement',
								'showInStorage' => false 
						),
						'Stahl' => array (
								'capacity' => 100000,
								'factor' => 0.5,
								'fillTypes' => 'stahl',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Brueckenbau' => array (
								'capacity' => 200000,
								'factor' => 1,
								'fillType' => 'sand',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Eierhof' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '0 1.18749 0',
				'showInProduction' => true,
				'input' => array (
						'Getreide' => array (
								'capacity' => 300000,
								'factor' => 0.6,
								'fillTypes' => 'wheat barley oat rye sunflower maize',
								'showInStorage' => false 
						),
						'Stroh' => array (
								'capacity' => 300000,
								'factor' => 0.2,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 150000,
								'factor' => 0.1,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 150000,
								'factor' => 0.1,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'palettepapier' => array (
								'capacity' => 240000,
								'factor' => 0.15,
								'fillTypes' => 'papier',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Eierpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'eier',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Mist' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				) 
		),
		'FabrikScript_Eierhof2' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 1000,
				'position' => '0 1.18749 0',
				'showInProduction' => true,
				'input' => array (
						'Getreide' => array (
								'capacity' => 300000,
								'factor' => 0.6,
								'fillTypes' => 'wheat barley oat rye sunflower maize',
								'showInStorage' => false 
						),
						'Stroh' => array (
								'capacity' => 300000,
								'factor' => 0.2,
								'fillTypes' => 'straw',
								'showInStorage' => false 
						),
						'emptypallet' => array (
								'capacity' => 150000,
								'factor' => 0.1,
								'fillTypes' => 'emptypallet',
								'showInStorage' => false 
						),
						'Tip_RSwater' => array (
								'capacity' => 150000,
								'factor' => 0.1,
								'fillTypes' => 'water',
								'showInStorage' => false 
						),
						'palettepapier' => array (
								'capacity' => 240000,
								'factor' => 0.15,
								'fillTypes' => 'papier',
								'showInStorage' => false 
						) 
				),
				'output' => array (
						'Eierpalette' => array (
								'capacity' => 5000,
								'factor' => 1,
								'fillType' => 'eier',
								'palettArea' => '0 0 1 1',
								'palettPlaces' => 999,
								'showInStorage' => false 
						),
						'Mist' => array (
								'capacity' => 100000,
								'factor' => 1,
								'fillType' => 'manure',
								'showInStorage' => true 
						) 
				) 
		) 
);