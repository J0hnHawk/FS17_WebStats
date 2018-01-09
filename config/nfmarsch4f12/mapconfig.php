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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Mapconfig NF Marsch 4 Fach 1.3 by alex83we 
 * 
 */
$mapVersion = 'NF Marsch 4 Fach 1.3';

if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

// Farmsilo und Ställe
$mapconfig = array_merge ( $mapconfig, array (
        'TipTrigger_BAHNHOF' => array (
            'locationType' => 'TipTrigger',
            'position' => '-459 0 -100'
        ),
		'TipTrigger_HAFEN' => array (
				'locationType' => 'TipTrigger',
				'position' => '-922.415 0 -987.603'
		),
		'TipTrigger_DEPOT' => array (
				'locationType' => 'TipTrigger',
				'position' => '847 0 460'
		),
		'TipTrigger_RAIFFEISEN' => array (
				'locationType' => 'TipTrigger',
				'position' => '467 0 -232'
		),
		'TipTrigger_GETREIDEHANDEL' => array (
				'locationType' => 'TipTrigger',
				'position' => '270 0 -732'
		),
		'TipTrigger_SUPERMARKT' =>array (
				'locationType' => 'TipTrigger',
				'position' => '-511 0 -567'
		),
		'TipTrigger_SUPERMARKT1' => array (
				'locationType' => 'TipTrigger',
				'position' => '-248 0 -658'
		),
		'TipTrigger_SUPERMARKT2' => array (
			'locationType' => 'TipTrigger',
			'position' => '1387 0 1280'
		),
		'TipTrigger_GETREIDEAG' => array (
			'locationType' => 'TipTrigger',
			'position' => '-349 0 1379'
		),
		'TipTrigger_STADION' => array (
				'locationType' => 'TipTrigger',
				'position' => '-156 0 -741'
		),
		'TipTrigger_WOLLEVERKAUF' => array (
				'locationType' => 'TipTrigger',
				'position' => '824 0 315'
		),
		'TipTrigger_WOLLEVERKAUF1' =>array (
				'locationType' => 'TipTrigger',
				'position' => '-892.735 0 -956.924'
		),
		'TipTrigger_SAWMILL' => array (
				'locationType' => 'TipTrigger',
				'position' => '-867 0 723'
		),
		'TipTrigger_WASSERKAUF' => array (
				'locationType' => 'TipTrigger',
				'position' => '-420 0 -342'
		),
		'TipTrigger_HEIZWERK' => array (
				'locationType' => 'TipTrigger',
				'position' => '-746 0 758'
		),
		'TipTrigger_WINDROW_SALE' => array (
				'locationType' => 'TipTrigger',
				'position' => '251 0 112'
		),
		'TipTrigger_BIOGAS' => array (
				'locationType' => 'TipTrigger',
				'position' => '-145 0 -952'
		),
		'TipTrigger_TANKE' =>array (
				'locationType' => 'TipTrigger',
				'position' => '-191 0 -299'
		),
		'TipTrigger_TANKE2' => array (
				'locationType' => 'TipTrigger',
				'position' => '782 0 -850'
		),
		'TipTrigger_TANKE3' => array (
				'locationType' => 'TipTrigger',
				'position' => '1368 0 1126'
		),
		'TipTrigger_BANK' => array (
				'locationType' => 'TipTrigger',
				'position' => '-405 0 -470'
        ),
        'TipTrigger_STROHKRAFTWERK' => array (
                'locationType' => 'TipTrigger',
                'position' => '1426 0 -366'
        ),
        'TipTrigger_PFERDEHOF' => array (
                'locationType' => 'TipTrigger',
                'position' => '947 0 -1621'
        ),
        'Storage_storage1' => array (
            'locationType' => 'storage',
            'position' => '210 0 120' 
        ),
		'Storage_storage3' => array (
            'locationType' => 'storage',
            'position' => '625 0 1672' 
        ),
        'Storage_storage5' => array (
            'locationType' => 'storage',
            'position' => '1390 0 -667'
        ),        
		'Animals_cow' => array (
            'locationType' => 'animal',
            'position' => '36 0 200',
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
				'position' => '250 0 400',
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
				'position' => '570 0 -19',
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
								'palettArea' => '578.3 -25.7 594.8 -21.3',
								'palettPlaces' => 15,
								'showInStorage' => false 
						) 
				),
				'productivity' => array (
						'grass_windrow_dryGrass_windrow' => 90 
				) 
		),
		'Bga' => array (
				'locationType' => 'bga',
				'ProdPerHour' => 1000,
				'position' => '-250 0 650',
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
				'position' => '-346 0 682' 
		),
		'BunkerSilo_silo002' => array (
				'locationType' => 'bunker',
				'position' => '-346 0 672' 
		),
		'BunkerSilo_silo003' => array (
				'locationType' => 'bunker',
				'position' => '-346 0 662' 
		),
		'BunkerSilo_silo004' => array (
				'locationType' => 'bunker',
				'position' => '-346 0 692' 
		),
		'BunkerSilo_silo005' => array (
				'locationType' => 'bunker',
				'position' => '-346 0 702' 
		),
		'BunkerSilo_cowSilo' => array (
				'locationType' => 'bunker',
				'position' => '-506 0 668' 
		),
		'BunkerSilo_Silo1' => array (
				'locationType' => 'bunker',
				'position' => '-66 0 -992' 
		),
		'BunkerSilo_Silo2' => array (
				'locationType' => 'bunker',
				'position' => '-66 0 -963' 
        ), 
		'BGASued' => array (
				'locationType' => 'bga',
				'ProdPerHour' => 1000,
				'position' => '722 0 1657',
				'showInProduction' => true,
				'input' => array (
						'silage' => array (
								'capacity' => 50000,
								'factor' => 360,
								'fillTypes' => 'bunkerFillLevel',
								'showInStorage' => false 
						),
						'liquidManure' => array (
								'capacity' => 1500000,
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
        // BGA Süd Fahrsilos
		'BGASuedklein1' => array (
				'locationType' => 'bunker',
				'position' => '673.947 0 1640.135' 
        ),
		'BGASuedklein2' => array (
				'locationType' => 'bunker',
				'position' => '673.947 0 1630.579' 
        ), 
		'BGASuedklein3' => array (
				'locationType' => 'bunker',
				'position' => '673.947 0 1620.346' 
        ),
		'BGASued1' => array (
				'locationType' => 'bunker',
				'position' => '673.947 0 1687.588' 
        ),
		'BGASued2' => array (
				'locationType' => 'bunker',
				'position' => '673.947 0 1661.456' 
        ),         
) );

// Fabrikscripte
$mapconfig = array_merge ( $mapconfig, array ( 
        'FabrikScript_KraftFutterHerstellung' => array (
                'locationType' => 'FabrikScript',
                'ProdPerHour' => 60000,
                'position' => '578 0 -208',
                'showInProduction' => true,
                'input' => array (
                        'Stroh' => array (
                                'capacity' => 300000,
                                'factor' => 0.3,
                                'fillTypes' => 'straw',
                                'showInStorage' => false 
                        ),
                        'Silage' => array (
                                'capacity' => 300000,
                                'factor' => 0.4,
                                'fillTypes' => 'silage',
                                'showInStorage' => false 
                        ),
                        'Gras' => array (
                                'capacity' => 300000,
                                'factor' => 0.3,
                                'fillTypes' => 'grass_windrow dryGrass_windrow',
                                'showInStorage' => false 
                        ) 
                ),
                'output' => array (
                        'Mischfutter' => array (
                                'capacity' => 300000,
                                'factor' => 1,
                                'fillType' => 'forage',
                                'showInStorage' => true 
                        ) 
                ) 
        ),
		'FabrikScript_Fabrik' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 16000,
				'position' => '990 0 680',
				'showInProduction' => true,
				'input' => array (
						'Brennstoffe' => array (
								'capacity' => 75000,
								'factor' => 0.4,
								'fillTypes' => 'straw woodChips wool',
								'showInStorage' => false 
						),
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
						),
						'boardwood' => array (
								'capacity' => 8000,
								'factor' => 1,
								'fillType' => 'boardwood',
								'palettArea' => '960.1 663.1 961.7 683.3',
								'palettPlaces' => 10,
								'showInStorage' => false 
						) 
				) 
		),
		'FabrikScript_Holzhacker' => array (
				'locationType' => 'FabrikScript',
				'ProdPerHour' => 50000,
				'position' => '940 0 650',
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
        // Palettenlager
		'FabrikScript_Lager_Apfel' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -475',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Birne' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -475',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Pflaume' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -475',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Kirsche' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -475',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Bierkasten' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -535',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Bierfass' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -535',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_obstler' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -535',
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
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
		'FabrikScript_Lager_Korn' => array (
			'locationType' => 'FabrikScript',
			'ProdPerHour' => 14400001,
			'position' => '-932 0 -535',
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
							'factor' => 0.9,
							'fillType' => 'korn',
							'palettPlaces' => 999,
							'showInStorage' => false 
					) 
				) 
		),
        'FabrikScript_Lager_Papier' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 50000000,
            'position' => '-887.075 0 -475.602',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Karton' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 50000000,
            'position' => '-887.075 0 -475.602',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Leerpaletten' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887.075 0 -475.602',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Pellets' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887.075 0 -475.602',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Zucker' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Mehl' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Sahne' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Brot' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Milch' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Butter' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Quark' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Yogurt' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -596',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_kartoffelsack' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Chips' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_pommes' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_washedPotato' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Fisch' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Krabben' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
		),
        'FabrikScript_Lager_Wurst' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Fleisch' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -676',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Blumenkohl' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Tomaten' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Salat' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Rotkohl' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-932 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Backwaren' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_Kuchen' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Lager_oel' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-887 0 -729',
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
                    'palettPlaces' => 999,
                    'showInStorage' => false
                )
            )
        ),
        // Zellstoff, Brückenbaustelle, Fischerei, Zuckerfabrik, Kürbisfeld
        'FabrikScript_Zellstoff_Fabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 12500,
            'position' => '-920.242 0 -829.986',
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
                    'palettArea' => '-966.681 -852.848 -962.675 -836.786',
                    'palettPlaces' => 22,
                    'showInStorage' => false
                ),
                'palette_karton' => array (
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'karton',
                    'palettArea' => '-966.602 -829.921 -972.684 -813.915',
                    'palettPlaces' => 22,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Zuckerfabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 15000,
            'position' => '-794.264 0 -927.494',
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
                    'palettArea' => '-774.577 -929.294 -752.415 -925.181',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Fischerei' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000,
            'position' => '-963 0 -963',
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
                    'palettArea' => '-984.65 -991.154 -962.353 987.149',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                ),
                'Fisch' => array (
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'fisch',
                    'palettArea' => '-984.65 -978.865 -962.353 -974.934',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_brueckenbau' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-1006.191 0 -777.625',
            'showInProduction' => true,
            'input' => array (
                'Kies' => array (
                    'capacity' => 200000,
                    'factor' => 1,
                    'fillTypes' => 'gravel',
                    'showInStorage' => false
                ),
                'Stahl' => array (
                    'capacity' => 100000,
                    'factor' => 0.5,
                    'fillTypes' => 'stahl',
                    'showInStorage' => false
                ),
                'Sand' => array (
                    'capacity' => 200000,
                    'factor' => 1,
                    'fillTypes' => 'sand',
                    'showInStorage' => false
                ),
                'Zement' => array (
                    'capacity' => 100000,
                    'factor' => 0.5,
                    'fillTypes' => 'cement',
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
        'FabrikScript_Kuerbisfeld' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000,
            'position' => '-1186.536 0 -886.479',
            'showInProduction' => true,
            'input' => array (
                'Stroh' => array (
                    'capacity' => 200000,
                    'factor' => 0.25,
                    'fillTypes' => 'straw',
                    'showInStorage' => false
                ),
                'compost' => array (
                    'capacity' => 200000,
                    'factor' => 0.5,
                    'fillTypes' => 'compost',
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
                    'palettArea' => '-1181.038 -905.916 -962.353 -1197.085 -911.844',
                    'palettPlaces' => 22,
                    'showInStorage' => false
                )
            )
        ),
        // Kuchen, Mehlfabrik, Metzgerei
        'FabrikScript_Backerei_Kuchen' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-924.299 0 -1.427',
            'showInProduction' => true,
            'input' => array (
                'emptypallet' => array (
                    'capacity' => 120000,
                    'factor' => 0.12,
                    'fillTypes' => 'emptypallet',
                    'showInStorage' => false
                ),
                'palette_karton' => array (
                    'capacity' => 120000,
                    'factor' => 0.12,
                    'fillTypes' => 'karton',
                    'showInStorage' => false
                ),
                'Tip_mehl' => array (
                    'capacity' => 120000,
                    'factor' => 0.3,
                    'fillTypes' => 'mehl',
                    'showInStorage' => false
                ),
                'Obstpalette' => array (
                    'capacity' => 120000,
                    'factor' => 0.3,
                    'fillTypes' => 'apfel kirsche pflaume birne',
                    'showInStorage' => false
                ),
                'Zuckerpalette' => array (
                    'capacity' => 120000,
                    'factor' => 0.3,
                    'fillTypes' => 'zucker',
                    'showInStorage' => false
                ),
                'Quarkpalette' => array (
                    'capacity' => 120000,
                    'factor' => 0.2,
                    'fillTypes' => 'quark',
                    'showInStorage' => false
                ),
                'Sahnepalette' => array (
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
                    'palettArea' => '-923.846 -36.808 -926.628 -14.438',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Backerei_Brot' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-924.299 0 -1.427',
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
                    'palettArea' => '-940.412 -35.769 -943.275 -13.573',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Backerei_Backwaren' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-924.299 0 -1.427',
            'showInProduction' => true,
            'input' => array (
                'emptypallet' => array (
                    'capacity' => 120000,
                    'factor' => 0.12,
                    'fillTypes' => 'emptypallet',
                    'showInStorage' => false
                ),
                'palette_karton' => array (
                    'capacity' => 120000,
                    'factor' => 0.12,
                    'fillTypes' => 'karton',
                    'showInStorage' => false
                ),
                'Tip_mehl' => array (
                    'capacity' => 120000,
                    'factor' => 0.3,
                    'fillTypes' => 'mehl',
                    'showInStorage' => false
                ),
                'zuckerpalette' => array (
                    'capacity' => 120000,
                    'factor' => 0.3,
                    'fillTypes' => 'zucker',
                    'showInStorage' => false
                ),
                'Milchpalette' => array (
                    'capacity' => 120000,
                    'factor' => 0.2,
                    'fillTypes' => 'milch',
                    'showInStorage' => false
                ),
                'Butterpalette' => array (
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
                    'palettArea' => '-932.235 -36.318 935.099 -13.998',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_WeizenMehlfabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-844.762 0 -80.583',
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
                    'palettArea' => '-836.101 -98.75 -837.643 -82.721',
                    'palettPlaces' => 8,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_GersteMehlfabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-844.762 0 -80.583',
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
                    'palettArea' => '-844.222 -98.735 -845.646 -82.717',
                    'palettPlaces' => 8,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_RoggenMehlfabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-844.762 0 -80.583',
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
                    'palettArea' => '-852.268 -98.763 -853.681 -82.701',
                    'palettPlaces' => 8,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Schlachterei' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 50,
            'position' => '-597.573 0 -91.558',
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
                    'palettArea' => '-617.909 -112.91 -601.946 -108.831',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                ),
                'Fleisch' => array (
                    'capacity' => 5000,
                    'factor' => 200,
                    'fillType' => 'meat',
                    'palettArea' => '-617.909 -118.328 -601.946 -114.321',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        // Brauerei, Raffinerie, Dieselproduktion
        'FabrikScript_BrauereiKasten' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-950.976 0 465.115',
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
                    'palettArea' => '-935.382 427.685 -945.41 417.693',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_BrauereiFass' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-950.976 0 465.115',
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
                    'palettArea' => '-913.151 457.149 -923.191 467.512',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Speiseoel_Fabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 7500,
            'position' => '-921.561 0 561.889',
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
                    'palettArea' => '-921.972 585.858 -931.981 595.864',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Diesel_Raffinerie' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 7500,
            'position' => '-921.561 0 561.889',
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
        // Molkerei, Baumarkt
        'FabrikScript_Molkerei' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '-543.739 0 323.553',
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
                    'palettArea' => '-519.359 263.98 -529.369 271.991',
                    'palettPlaces' => 16,
                    'showInStorage' => false
                ),
                'palettemilch' => array (
                    'capacity' => 5000,
                    'factor' => 0.25,
                    'fillType' => 'milch',
                    'palettArea' => '-531.425 263.98 -541.398 271.991',
                    'palettPlaces' => 16,
                    'showInStorage' => false
                ),
                'palettesahne' => array (
                    'capacity' => 5000,
                    'factor' => 0.25,
                    'fillType' => 'sahne',
                    'palettArea' => '-543.764 263.98 -553.773 271.991',
                    'palettPlaces' => 16,
                    'showInStorage' => false
                ),
                'palettequark' => array (
                    'capacity' => 5000,
                    'factor' => 0.25,
                    'fillType' => 'quark',
                    'palettArea' => '-555.925 263.98 -565.935 271.991',
                    'palettPlaces' => 16,
                    'showInStorage' => false
                ),
                'paletteyogurt' => array (
                    'capacity' => 5000,
                    'factor' => 0.25,
                    'fillType' => 'yogurt',
                    'palettArea' => '-568.152 263.98 -578.159 271.991',
                    'palettPlaces' => 16,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_kaufbretterpalette' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-527.941 0 -569.763',
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
                    'palettPlaces' => 31,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_kaufkartonpalette' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-527.941 0 -569.763',
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
                    'palettPlaces' => 50,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_kaufleerpalette' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-527.941 0 -569.763',
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
                    'palettPlaces' => 50,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_kaufstahlpalette' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 14400001,
            'position' => '-527.941 0 -569.763',
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
                    'palettPlaces' => 50,
                    'showInStorage' => true
                )
            )
        ),
        // Kartoffelfabrik und Kartoffelwaschanlage 
        'FabrikScript_Kartoffelfabrik' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 7500,
            'position' => '-693.474 0 805.203',
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
                    'palettArea' => '-675.809 823.512 -671.801 807.507',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                ),
                'palettepommes' => array (
                    'capacity' => 5000,
                    'factor' => 0.35,
                    'fillType' => 'pommes',
                    'palettArea' => '-694.898 823.512 -690.889 807.468',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                ),
                'palettekartoffelsack' => array (
                    'capacity' => 5000,
                    'factor' => 0.35,
                    'fillType' => 'kartoffelsack',
                    'palettArea' => '-713.141 823.49 -709.131 807.468',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_kartoffellager2' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000000000,
            'position' => '-670.29 0 769.079',
            'showInProduction' => false,
            'input' => array (
                'potato' => array (
                    'capacity' => 500000,
                    'factor' => 1,
                    'fillTypes' => 'potato',
                    'showInStorage' => true
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
        'FabrikScript_potatoWasher' => array(
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 6000,
            'position' => '-700 0 780',
            'showInProduction' => true,
            'input' => array(
                'Kartoffeln' => array(
                    'capacity' => 75000,
                    'factor' => 1,
                    'fillTypes' => 'potato',
                    'showInStorage' => false
                ),
                'Wasser' => array(
                    'capacity' => 25000,
                    'factor' => 0.01,
                    'fillTypes' => 'water',
                    'showInStorage' => false
                ),
                'Diesel' => array(
                    'capacity' => 5000,
                    'factor' => 0.01,
                    'fillTypes' => 'fuel',
                    'showInStorage' => false
                )
            ),
            'output' => array(
                'washedPotato' => array(
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'washedPotato',
                    'palettArea' => '-726.5 763.2 -710.3 767.8',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_potatoWasher2' => array(
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 6000,
            'position' => '-700 0 750',
            'showInProduction' => true,
            'input' => array(
                'Kartoffeln' => array(
                    'capacity' => 75000,
                    'factor' => 1,
                    'fillTypes' => 'potato',
                    'showInStorage' => false
                ),
                'Wasser' => array(
                    'capacity' => 25000,
                    'factor' => 0.01,
                    'fillTypes' => 'water',
                    'showInStorage' => false
                ),
                'Diesel' => array(
                    'capacity' => 5000,
                    'factor' => 0.01,
                    'fillTypes' => 'fuel',
                    'showInStorage' => false
                )
            ),
            'output' => array(
                'washedPotato' => array(
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'washedPotato',
                    'palettArea' => '-725.7 749.4 -709.3 754.0',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        // Kläranlage    
        'FabrikScript_Klaerwerk' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 40000,
            'position' => '-160 0 750',
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
        // Haupthof Produktionen
        'FabrikScript_kartoffellager' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000000000,
            'position' => '162.139 0 257.929',
            'showInProduction' => false,
            'input' => array (
                'potato' => array (
                    'capacity' => 500000,
                    'factor' => 1,
                    'fillTypes' => 'potato',
                    'showInStorage' => true
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
            'position' => '179.084 0 263.557',
            'showInProduction' => false,
            'input' => array (
                'sugarBeet' => array (
                    'capacity' => 600000,
                    'factor' => 1,
                    'fillTypes' => 'sugarBeet',
                    'showInStorage' => true
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
        'FabrikScript_Duenger_Prod' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 10000,
            'position' => '169.246 0 296.481',
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
            'position' => '229.554 0 296.481',
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
            'position' => '205.038 0 288.965',
            'showInProduction' => false,
            'input' => array (
                'FS_fertilizer' => array (
                    'capacity' => 500000,
                    'factor' => 1,
                    'fillTypes' => 'fertilizer',
                    'showInStorage' => true
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
            'position' => '235.911 0 289.532',
            'showInProduction' => false,
            'input' => array (
                'FS_Seeds' => array (
                    'capacity' => 500000,
                    'factor' => 1,
                    'fillTypes' => 'seeds',
                    'showInStorage' => true
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
        'FabrikScript_Schweinefutterstation' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 30000,
            'position' => '179.159 0 335.085',
            'showInProduction' => true,
            'input' => array (
                'Getreide' => array (
                    'capacity' => 100000,
                    'factor' => 0.4,
                    'fillTypes' => 'wheat barley maize oat rye',
                    'showInStorage' => false
                ),
                'Raps Sonnenblume Soja' => array (
                    'capacity' => 100000,
                    'factor' => 0.3,
                    'fillTypes' => 'rape sunflower soybean',
                    'showInStorage' => false
                ),
                'Erdfruechten' => array (
                    'capacity' => 100000,
                    'factor' => 0.1,
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
        'FabrikScript_Schweinefutter' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 2147483647,
            'position' => '179.163 0 365.591',
            'showInProduction' => false,
            'input' => array (
                'Schweinefutter' => array (
                    'capacity' => 500000,
                    'factor' => 1,
                    'fillTypes' => 'pigFood',
                    'showInStorage' => true
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
        'FabrikScript_HofladenApfel' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '223.861 0 81.651',
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
                    'palettArea' => '220.7 80.5 220.9 80.7',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_HofladenBirne' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '223.861 0 81.651',
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
                    'palettArea' => '220.7 83.2 220.9 83.4',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_HofladenPflaume' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '223.861 0 81.651',
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
                    'palettArea' => '227.7 83.2 227.9 83.4',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Hofladenkirsche' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '223.861 0 81.651',
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
                    'palettArea' => '227.7 80.5 227.9 80.7',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Hofladentomaten' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '215.54 0 81.651',
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
                    'palettArea' => '218.7 80.5 218.9 80.7',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Hofladensalat' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '215.54 0 81.651',
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
                    'palettArea' => '218.7 83.2 218.9 83.4',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_HofladenBlumenkohl' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '215.54 0 81.651',
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
                    'palettArea' => '211.9 80.5 212.1 80.7',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_HofladenRotkohl' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 60,
            'position' => '215.54 0 81.651',
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
                    'palettArea' => '211.9 83.1 212.1 83.3',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_geldboxen' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 100000,
            'position' => '290 0 110',
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
                    'palettArea' => '0 0 1 1',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        // Brennerei
        'FabrikScript_Brennerei_Korn' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 400,
            'position' => '-135 0 -807',
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
                    'palettArea' => '-144.2 -814.3 -139.9 -798.1',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Brennerei_Obstler' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 400,
            'position' => '-85 0 -807',
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
                    'palettArea' => '-83.4 -815.2 -79.1 -798.8',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        // Komposter
        'FabrikScript_compostMaster2k17' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 50000,
            'position' => '2.436 0 -725.253',
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
        // Obstplantage
        'FabrikScript_obst_apfel' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 800,
            'position' => '925.391 0 -791.175',
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
                    'palettArea' => '877.6 -880.3 893.8 -876.1',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_obst_birne' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 800,
            'position' => '925.332 0 -851.349',
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
                    'palettArea' => '877.5 -893.1 893.8 -888.9',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_obst_kirsche' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 800,
            'position' => '925.755 0 -911.122',
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
                    'palettArea' => '877.6 -906.3 893.8 -902.0',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_obst_pflaume' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 800,
            'position' => '925.697 0 -970.193',
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
                    'palettArea' => '877.6 -918.4 893.8 -914.2',
                    'palettPlaces' => 15,
                    'showInStorage' => false
                )
            )
        ),
        // Baustelle
        'FabrikScript_Kiesverkauf' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '1721.425 0 -966.909',
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
                    'palettArea' => '0 0 1 1',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Sandverkauf' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '1703.198 0 -873.27',
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
                    'factor' => 1,
                    'fillType' => 'geld',
                    'palettArea' => '0 0 1 1',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        'FabrikScript_Zementverkauf' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '1692.588 0 -940.479',
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
                    'palettArea' => '0 0 1 1',
                    'palettPlaces' => 1,
                    'showInStorage' => false
                )
            )
        ),
        // Eierhof
        'FabrikScript_Eierhof' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000,
            'position' => '1429.528 0 -672.529',
            'showInProduction' => true,
            'input' => array (
                'emptypallet' => array (
                    'capacity' => 150000,
                    'factor' => 0.1,
                    'fillTypes' => 'emptypallet',
                    'showInStorage' => false
                ),
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
                'Mist' => array (
                    'capacity' => 100000,
                    'factor' => 1,
                    'fillType' => 'manure',
                    'showInStorage' => true
                ),
                'Eierpalette' => array (
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'eier',
                    'palettArea' => '1433.5 -602.8 1411.3 -606.9',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ), 
        'FabrikScript_Eierhof2' => array (
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 1000,
            'position' => '1429.528 0 -672.529',
            'showInProduction' => true,
            'input' => array (
                'emptypallet' => array (
                    'capacity' => 150000,
                    'factor' => 0.1,
                    'fillTypes' => 'emptypallet',
                    'showInStorage' => false
                ),
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
                'Mist' => array (
                    'capacity' => 100000,
                    'factor' => 1,
                    'fillType' => 'manure',
                    'showInStorage' => true
                ),
                'Eierpalette' => array (
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'eier',
                    'palettArea' => '1410.45 -688.85 1406.26 -666.63',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ), 
        // Cementfabrik
        'FabrikScript_Cementfabrik' => array(
            'locationType' => 'FabrikScript',
            'ProdPerHour' => 5000,
            'position' => '1575 0 228',
            'showInProduction' => true,
            'input' => array(
                'Kies' => array(
                    'capacity' => 500000,
                    'factor' => 0.4,
                    'fillTypes' => 'gravel',
                    'showInStorage' => false
                ),
                'Wasser' => array(
                    'capacity' => 200000,
                    'factor' => 0.3,
                    'fillTypes' => 'water',
                    'showInStorage' => false
                ),
                'Sand' => array(
                    'capacity' => 500000,
                    'factor' => 0.4,
                    'fillTypes' => 'sand',
                    'showInStorage' => false
                ),
                'emptypallet' => array(
                    'capacity' => 500000,
                    'factor' => 0.2,
                    'fillTypes' => 'emptypallet',
                    'showInStorage' => false
                ),
                'palettepapier' => array(
                    'capacity' => 350000,
                    'factor' => 0.2,
                    'fillTypes' => 'papier',
                    'showInStorage' => false
                )
            ),
            'output' => array(
                'Cement' => array(
                    'capacity' => 5000,
                    'factor' => 1,
                    'fillType' => 'cement',
                    'palettArea' => '1571.6 208 1576.05 185.89',
                    'palettPlaces' => 21,
                    'showInStorage' => false
                )
            )
        ),       
) );
// AdBlue Tankstellen und AdBlue Hoftankstellen 
$mapconfig = array_merge ($mapconfig, array ( 
        'adBlueStation_adBlueStationFarm_INSEL' => array (
            'locationType' => 'AdBlue',
            'position' => '-1418.386 0 -866.475'
        ),
        'adBlueStation_adBlueStationFarm_BGANORD' => array (
            'locationType' => 'AdBlue',
            'position' => '-181.312 0 -894.624'
        ),
        'adBlueStation_adBlueStationFarm_RINDERHOF' => array (
            'locationType' => 'AdBlue',
            'position' => '523.632 0 1607.84'
        ),
        'adBlueStation_adBlueStationFarm_HOFTANKSTELLE' => array (
            'locationType' => 'AdBlue',
            'position' => '135.05 0 194.973'
        ),
        'adBlueStation_adBlueStationFarm_EIERHOF' => array (
            'locationType' => 'AdBlue',
            'position' => '1458.802 0 -793.084'
        ),
        'adBlueStation_adBlueStationFarm_SandKies' => array (
            'locationType' => 'AdBlue',
            'position' => '1611.274 0 280.069'
        ),
        'adBlueStation_adBlueStationFarm_RAFFINERIE' => array (
            'locationType' => 'AdBlue',
            'position' => '-933.346 0 609.323'
        ),
        'adBlueStation_adBlueStationFarm_BGAMITTE' => array (
            'locationType' => 'AdBlue',
            'position' => '-404.266 0 624.61'
        ),
) );
// Hoftankstellen
$mapconfig = array_merge ($mapconfig, array (
    'fuelStation_Hoftankstelle' => array (
        'locationType' => 'fuelStation',
        'position' => '180 0 200'
    ),
    'fuelStation_Tankstelle_Raffinerie' => array (
        'locationType' => 'fuelStation',
        'position' => '-920 0 630'
    ),
    'fuelStation_Tankstelle_BGA_Nord' => array (
        'locationType' => 'fuelStation',
        'position' => '-180 0 -890'
    ),
    'fuelStation_Tankstelle_BGA_Sued' => array (
        'locationType' => 'fuelStation',
        'position' => '-400 0 630'
    ),
    'fuelStation_Hoftankstelle' => array (
        'locationType' => 'fuelStation',
        'position' => '180 0 200'
    ),
    'fuelStation_Tankstelle_Raffinerie' => array (
        'locationType' => 'fuelStation',
        'position' => '-920 0 630'
    ),
    'fuelStation_Tankstelle_BGA_Nord' => array (
        'locationType' => 'fuelStation',
        'position' => '-180 0 -890'
    ),
    'fuelStation_Tankstelle_BGA_Sued' => array (
        'locationType' => 'fuelStation',
        'position' => '-400 0 630'
    )
));