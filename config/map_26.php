<?php
$mapconfig = array (
		array (
				'name' => 'FabrikScript_KraftFutterHerstellung',
				'ProdPerHour' => 60000,
				'rawMaterial' => array (
						array (
								'capacity' => 300000,
								'factor' => 0.3,
								'fillTypes' => 'straw',
								'name' => 'Stroh',
								'showin' => '' 
						),
						array (
								'capacity' => 300000,
								'factor' => 0.4,
								'fillTypes' => 'silage',
								'name' => 'Silage',
								'showin' => '' 
						),
						array (
								'capacity' => 300000,
								'factor' => 0.3,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'name' => 'Gras',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 300000,
								'factor' => 1,
								'name' => 'Mischfutter',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Fabrik',
				'ProdPerHour' => 16000,
				'rawMaterial' => array (
						array (
								'capacity' => 75000,
								'factor' => 0.4,
								'fillTypes' => 'straw woodChips wool',
								'name' => 'Brennstoffe',
								'showin' => '' 
						),
						array (
								'capacity' => 400000,
								'factor' => 1,
								'fillTypes' => 'woodChips',
								'name' => 'Holz',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 150000,
								'factor' => 0.9,
								'name' => 'woodChips',
								'showin' => '' 
						),
						array (
								'capacity' => 8000,
								'factor' => 1,
								'name' => 'boardwood',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Holzhacker',
				'ProdPerHour' => 50000,
				'rawMaterial' => array (
						array (
								'capacity' => 400000,
								'factor' => 1,
								'fillTypes' => 'woodChips',
								'name' => 'Holz',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 150000,
								'factor' => 0.9,
								'name' => 'woodChips',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_compostMaster2k17',
				'ProdPerHour' => 50000,
				'rawMaterial' => array (
						array (
								'capacity' => 200000,
								'factor' => 2,
								'fillTypes' => 'compost potato sugarBeet chaff silage grass grass_windrow dryGrass_windrow woodChips manure straw',
								'name' => 'cm_inputWaste',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 200000,
								'factor' => 1,
								'name' => 'cm_outputCompost',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Oel_Raffinerie_Raps',
				'ProdPerHour' => 20000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rape sunflower',
								'name' => 'Tip_RS',
								'showin' => '' 
						),
						array (
								'capacity' => 120000,
								'factor' => 0.15,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.15,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 0.3,
								'name' => 'RS_compost',
								'showin' => '' 
						),
						array (
								'capacity' => 300000,
								'factor' => 0.6,
								'name' => 'RM_Output',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.4,
								'name' => 'palettespeiseoel',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Klaerwerk',
				'ProdPerHour' => 40000,
				'rawMaterial' => array (
						array (
								'capacity' => 600000,
								'factor' => 1,
								'fillTypes' => 'liquidManure digestate',
								'name' => 'Tip_RS1',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 400000,
								'factor' => 0.26,
								'name' => 'RS_compost1',
								'showin' => '' 
						),
						array (
								'capacity' => 400000,
								'factor' => 0.65,
								'name' => 'RM_Output2',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_WeizenMehlfabrik',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'wheat',
								'name' => 'Tip_RSwheat',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'mehlpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_GersteMehlfabrik',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'barley',
								'name' => 'Tip_RSbarley',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'mehlpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_RoggenMehlfabrik',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'rye',
								'name' => 'Tip_RSrye',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'mehlpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Zuckerfabrik',
				'ProdPerHour' => 15000,
				'rawMaterial' => array (
						array (
								'capacity' => 2000000,
								'factor' => 1,
								'fillTypes' => 'sugarBeet',
								'name' => 'Tip_RSzucker',
								'showin' => '' 
						),
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'zuckerpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Backerei',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 120000,
								'factor' => 1,
								'fillTypes' => 'mehl',
								'name' => 'Tip_mehl',
								'showin' => '' 
						),
						array (
								'capacity' => 200000,
								'factor' => 1,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'brotpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Paletten_Fabrik',
				'ProdPerHour' => 20000,
				'rawMaterial' => array (
						array (
								'capacity' => 352000,
								'factor' => 0.5,
								'fillTypes' => 'woodChips',
								'name' => 'boardwood',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 150000,
								'factor' => 0.25,
								'name' => 'woodChips',
								'showin' => '' 
						),
						array (
								'capacity' => 7000,
								'factor' => 1,
								'name' => 'emptypallet',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_BrauereiKasten',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'barley',
								'name' => 'Tip_RSbarley',
								'showin' => '' 
						),
						array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'hops',
								'name' => 'hops',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 200000,
								'factor' => 0.4,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'bierpalettekasten',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_BrauereiFass',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'wheat',
								'name' => 'Tip_RSwheat',
								'showin' => '' 
						),
						array (
								'capacity' => 500000,
								'factor' => 0.8,
								'fillTypes' => 'hops',
								'name' => 'hops',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 200000,
								'factor' => 0.4,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.5,
								'name' => 'bierpalettefass',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Molkerei',
				'ProdPerHour' => 5000,
				'rawMaterial' => array (
						array (
								'capacity' => 300000,
								'factor' => 0.75,
								'fillTypes' => 'milk',
								'name' => 'Tip_RSmilk',
								'showin' => '' 
						),
						array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.5,
								'fillTypes' => 'papier',
								'name' => 'palettepapier',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.25,
								'name' => 'palettebutter',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.25,
								'name' => 'palettemilch',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.25,
								'name' => 'palettesahne',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.25,
								'name' => 'palettequark',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.25,
								'name' => 'paletteyogurt',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Zellstoff_Fabrik',
				'ProdPerHour' => 12500,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 0.5,
								'fillTypes' => 'woodChips',
								'name' => 'Hackschnitzel',
								'showin' => '' 
						),
						array (
								'capacity' => 200000,
								'factor' => 0.3,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 150000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettepapier',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_obst_apfel',
				'ProdPerHour' => 600,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'name' => 'Compost',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Apfelpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_obst_birne',
				'ProdPerHour' => 600,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'name' => 'Compost',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Birnenpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_obst_kirsche',
				'ProdPerHour' => 600,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'name' => 'Compost',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Kirschpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_obst_pflaume',
				'ProdPerHour' => 600,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'compost',
								'name' => 'Compost',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'water',
								'name' => 'Tip_RSwater',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.2,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Pflaumenpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Kartoffelfabrik',
				'ProdPerHour' => 10000,
				'rawMaterial' => array (
						array (
								'capacity' => 600000,
								'factor' => 0.6,
								'fillTypes' => 'washedPotato',
								'name' => 'washedPotato',
								'showin' => '' 
						),
						array (
								'capacity' => 280000,
								'factor' => 0.25,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 175000,
								'factor' => 0.15,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						),
						array (
								'capacity' => 225000,
								'factor' => 0.15,
								'fillTypes' => 'oel',
								'name' => 'palettespeiseoel',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 0.35,
								'name' => 'palettechips',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.35,
								'name' => 'palettepommes',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.35,
								'name' => 'palettekartoffelsack',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Papier',
				'ProdPerHour' => 50000000,
				'rawMaterial' => array (
						array (
								'capacity' => 340000,
								'factor' => 1,
								'fillTypes' => 'papier',
								'name' => 'palettepapier',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettepapier',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Karton',
				'ProdPerHour' => 50000000,
				'rawMaterial' => array (
						array (
								'capacity' => 330000,
								'factor' => 1,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Leerpaletten',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 335000,
								'factor' => 1,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'emptypallet',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Apfel',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'apfel',
								'name' => 'Apfelpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Apfelpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Birne',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'birne',
								'name' => 'Birnenpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Birnenpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Kirsche',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'kirsche',
								'name' => 'Kirschpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Kirschpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Pflaume',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'pflaume',
								'name' => 'Pflaumenpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Pflaumenpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Bierkasten',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 465000,
								'factor' => 1,
								'fillTypes' => 'beer',
								'name' => 'bierpalettekasten',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'bierpalettekasten',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Bierfass',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 465000,
								'factor' => 1,
								'fillTypes' => 'beerf',
								'name' => 'bierpalettefass',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'bierpalettefass',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Zucker',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'zucker',
								'name' => 'zuckerpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'zuckerpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Mehl',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'mehl',
								'name' => 'mehlpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'mehlpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Milch',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'milch',
								'name' => 'palettemilch',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettemilch',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Butter',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'butter',
								'name' => 'palettebutter',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettebutter',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Quark',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'quark',
								'name' => 'palettequark',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettequark',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Sahne',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'sahne',
								'name' => 'palettesahne',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettesahne',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Yogurt',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'yogurt',
								'name' => 'paletteyogurt',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'paletteyogurt',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Brot',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 480000,
								'factor' => 1,
								'fillTypes' => 'brot',
								'name' => 'brotpalette',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'brotpalette',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_kartoffelsack',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 355000,
								'factor' => 1,
								'fillTypes' => 'kartoffelsack',
								'name' => 'palettekartoffelsack',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettekartoffelsack',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Chips',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'chips',
								'name' => 'palettechips',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettechips',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_pommes',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'pommes',
								'name' => 'palettepommes',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettepommes',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_washedPotato',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 660000,
								'factor' => 1,
								'fillTypes' => 'washedPotato',
								'name' => 'washedPotato',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'washedPotato',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_oel',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'oel',
								'name' => 'palettespeiseoel',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'palettespeiseoel',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Wurst',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'sausage',
								'name' => 'Wurst',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Wurst',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Lager_Fleisch',
				'ProdPerHour' => 14400001,
				'rawMaterial' => array (
						array (
								'capacity' => 625000,
								'factor' => 1,
								'fillTypes' => 'meat',
								'name' => 'Fleisch',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'Fleisch',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Duenger_Prod',
				'ProdPerHour' => 10000,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'manure',
								'name' => 'manure',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'liquidManure',
								'name' => 'liquidManure',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 100000,
								'factor' => 1,
								'name' => 'fertilizer',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Saat_Prod',
				'ProdPerHour' => 10000,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'wheat maize barley rape',
								'name' => 'grain',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 1,
								'fillTypes' => 'fertilizer',
								'name' => 'fertilizer',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 100000,
								'factor' => 1,
								'name' => 'seeds',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Fertilizer',
				'ProdPerHour' => 2147483647,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'fertilizer',
								'name' => 'FS_fertilizer',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'FS_fertilizer',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Saatgut',
				'ProdPerHour' => 2147483647,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'seeds',
								'name' => 'FS_Seeds',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'FS_Seeds',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Schweinefutter',
				'ProdPerHour' => 2147483647,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'pigFood',
								'name' => 'Schweinefutter',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'Schweinefutter',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_kartoffellager',
				'ProdPerHour' => 1000000000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'name' => 'potato',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'potato',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_kartoffellager2',
				'ProdPerHour' => 1000000000,
				'rawMaterial' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'name' => 'potato',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'potato',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_zuckerrueben',
				'ProdPerHour' => 1000000000,
				'rawMaterial' => array (
						array (
								'capacity' => 600000,
								'factor' => 1,
								'fillTypes' => 'sugarBeet',
								'name' => 'sugarBeet',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 500000,
								'factor' => 1,
								'name' => 'sugarBeet',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Schweinefutterstation',
				'ProdPerHour' => 30000,
				'rawMaterial' => array (
						array (
								'capacity' => 100000,
								'factor' => 0.6,
								'fillTypes' => 'wheat barley maize oat rye',
								'name' => 'Getreide',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.3,
								'fillTypes' => 'rape sunflower soybean',
								'name' => 'Proteine',
								'showin' => '' 
						),
						array (
								'capacity' => 100000,
								'factor' => 0.1,
								'fillTypes' => 'potato sugarBeet',
								'name' => 'Erdfruechten',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 250000,
								'factor' => 0.935,
								'name' => 'Schweinefutter',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_potatoWasher',
				'ProdPerHour' => 7500,
				'rawMaterial' => array (
						array (
								'capacity' => 75000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'name' => 'Kartoffeln',
								'showin' => '' 
						),
						array (
								'capacity' => 25000,
								'factor' => 0.01,
								'fillTypes' => 'water',
								'name' => 'Wasser',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.01,
								'fillTypes' => 'fuel',
								'name' => 'Diesel',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'washedPotato',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_potatoWasher2',
				'ProdPerHour' => 7500,
				'rawMaterial' => array (
						array (
								'capacity' => 75000,
								'factor' => 1,
								'fillTypes' => 'potato',
								'name' => 'Kartoffeln',
								'showin' => '' 
						),
						array (
								'capacity' => 25000,
								'factor' => 0.01,
								'fillTypes' => 'water',
								'name' => 'Wasser',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 0.01,
								'fillTypes' => 'fuel',
								'name' => 'Diesel',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 1,
								'name' => 'washedPotato',
								'showin' => '' 
						) 
				) 
		),
		array (
				'name' => 'FabrikScript_Schlachterei',
				'ProdPerHour' => 50,
				'rawMaterial' => array (
						array (
								'capacity' => 400,
								'factor' => 0.4,
								'fillTypes' => 'pig cow sheep',
								'name' => 'Tier_Anlieferung',
								'showin' => '' 
						),
						array (
								'capacity' => 260000,
								'factor' => 3,
								'fillTypes' => 'emptypallet',
								'name' => 'emptypallet',
								'showin' => '' 
						),
						array (
								'capacity' => 170000,
								'factor' => 3,
								'fillTypes' => 'karton',
								'name' => 'palette_karton',
								'showin' => '' 
						) 
				),
				'product' => array (
						array (
								'capacity' => 5000,
								'factor' => 200,
								'name' => 'Wurst',
								'showin' => '' 
						),
						array (
								'capacity' => 5000,
								'factor' => 200,
								'name' => 'Fleisch',
								'showin' => '' 
						) 
				) 
		) 
);