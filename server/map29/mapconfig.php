<?php
/**
 *
 * This file is part of the "NF Marsch Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
 *
 * "NF Marsch Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "NF Marsch Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$mapVersion = '2.9';

$mapconfig = array(
    'FabrikScript_KraftFutterHerstellung' => array(
        'ProdPerHour' => 60000,
        'position' => '592.522 90.021 -239.126',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Stroh' => array(
                'capacity' => 300000,
                'factor' => 0.3,
                'fillTypes' => 'straw',
                'showInStorage' => false
            ),
            'Silage' => array(
                'capacity' => 300000,
                'factor' => 0.4,
                'fillTypes' => 'silage',
                'showInStorage' => false
            ),
            'Gras' => array(
                'capacity' => 300000,
                'factor' => 0.3,
                'fillTypes' => 'grass_windrow dryGrass_windrow',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Mischfutter' => array(
                'capacity' => 300000,
                'factor' => 1,
                'fillType' => 'forage',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Fabrik' => array(
        'ProdPerHour' => 16000,
        'position' => '940.896 99.956 681.96',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Brennstoffe' => array(
                'capacity' => 75000,
                'factor' => 0.4,
                'fillTypes' => 'straw woodChips wool',
                'showInStorage' => false
            ),
            'Holz' => array(
                'capacity' => 400000,
                'factor' => 1,
                'fillTypes' => 'woodChips',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'woodChips' => array(
                'capacity' => 150000,
                'factor' => 0.9,
                'fillType' => 'woodChips',
                'showInStorage' => true
            ),
            'boardwood' => array(
                'capacity' => 8000,
                'factor' => 1,
                'fillType' => 'woodChips',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Holzhacker' => array(
        'ProdPerHour' => 50000,
        'position' => '905.352 99.4625 648.442',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Holz' => array(
                'capacity' => 400000,
                'factor' => 1,
                'fillTypes' => 'woodChips',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'woodChips' => array(
                'capacity' => 150000,
                'factor' => 0.9,
                'fillType' => 'woodChips',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_compostMaster2k17' => array(
        'ProdPerHour' => 50000,
        'position' => '-3.48832 99.822 -714.664',
        'showInProduction' => true,
        'rawMaterial' => array(
            'cm_inputWaste' => array(
                'capacity' => 300000,
                'factor' => 2,
                'fillTypes' => 'compost potato sugarBeet chaff silage grass grass_windrow dryGrass_windrow woodChips manure straw rye oat wheat barley rape',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'cm_outputCompost' => array(
                'capacity' => 300000,
                'factor' => 1,
                'fillType' => 'compost',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Oel_Raffinerie_Raps' => array(
        'ProdPerHour' => 7500,
        'position' => '-887.736 99.996 524.547',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RS' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'rape sunflower',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 120000,
                'factor' => 0.15,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 100000,
                'factor' => 0.15,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'RS_compost' => array(
                'capacity' => 500000,
                'factor' => 0.3,
                'fillType' => 'compost',
                'showInStorage' => true
            ),
            'RM_Output' => array(
                'capacity' => 300000,
                'factor' => 0.6,
                'fillType' => 'fuel',
                'showInStorage' => true
            ),
            'palettespeiseoel' => array(
                'capacity' => 5000,
                'factor' => 0.4,
                'fillType' => 'oel',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Klaerwerk' => array(
        'ProdPerHour' => 40000,
        'position' => '-153.801 100 795.944',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RS1' => array(
                'capacity' => 600000,
                'factor' => 1,
                'fillTypes' => 'liquidManure digestate',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'RS_compost1' => array(
                'capacity' => 500000,
                'factor' => 0.26,
                'fillType' => 'compost',
                'showInStorage' => true
            ),
            'RM_Output2' => array(
                'capacity' => 800000,
                'factor' => 0.65,
                'fillType' => 'water',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_WeizenMehlfabrik' => array(
        'ProdPerHour' => 5000,
        'position' => '-812.292 100.879 -9.2273',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSwheat' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'wheat',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'mehlpalette' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'mehl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_GersteMehlfabrik' => array(
        'ProdPerHour' => 5000,
        'position' => '-820.29 100.879 -9.2273',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSbarley' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'barley',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'mehlpalette' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'mehl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_RoggenMehlfabrik' => array(
        'ProdPerHour' => 5000,
        'position' => '-828.294 100.879 -9.2273',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSrye' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'rye',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'mehlpalette' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'mehl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Zuckerfabrik' => array(
        'ProdPerHour' => 15000,
        'position' => '-820.656 101.945 -873.396',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSzucker' => array(
                'capacity' => 2000000,
                'factor' => 1,
                'fillTypes' => 'sugarBeet',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'zuckerpalette' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'zucker',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Backerei' => array(
        'ProdPerHour' => 5000,
        'position' => '-909.99 103.256 56.1265',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_mehl' => array(
                'capacity' => 120000,
                'factor' => 1,
                'fillTypes' => 'mehl',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 1,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'brotpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'brot',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Paletten_Fabrik' => array(
        'ProdPerHour' => 25000,
        'position' => '877.617 100.01 614.069',
        'showInProduction' => true,
        'rawMaterial' => array(
            'boardwood' => array(
                'capacity' => 352000,
                'factor' => 0.5,
                'fillTypes' => 'woodChips',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'woodChips' => array(
                'capacity' => 150000,
                'factor' => 0.25,
                'fillType' => 'woodChips',
                'showInStorage' => true
            ),
            'emptypallet' => array(
                'capacity' => 7000,
                'factor' => 1,
                'fillType' => 'emptypallet',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_BrauereiKasten' => array(
        'ProdPerHour' => 5000,
        'position' => '-846.326 99.961 499.743',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSbarley' => array(
                'capacity' => 500000,
                'factor' => 0.8,
                'fillTypes' => 'barley',
                'showInStorage' => false
            ),
            'hops' => array(
                'capacity' => 500000,
                'factor' => 0.8,
                'fillTypes' => 'hops',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.25,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.4,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'bierpalettekasten' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'beer',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_BrauereiFass' => array(
        'ProdPerHour' => 5000,
        'position' => '-821.824 99.961 499.743',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSwheat' => array(
                'capacity' => 500000,
                'factor' => 0.8,
                'fillTypes' => 'wheat',
                'showInStorage' => false
            ),
            'hops' => array(
                'capacity' => 500000,
                'factor' => 0.8,
                'fillTypes' => 'hops',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.25,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.4,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'bierpalettefass' => array(
                'capacity' => 5000,
                'factor' => 0.5,
                'fillType' => 'beerf',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Molkerei' => array(
        'ProdPerHour' => 5000,
        'position' => '-441.172 99.961 337.698',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tip_RSmilk' => array(
                'capacity' => 300000,
                'factor' => 0.75,
                'fillTypes' => 'milk',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.3,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.25,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palettepapier' => array(
                'capacity' => 100000,
                'factor' => 0.5,
                'fillTypes' => 'papier',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'palettebutter' => array(
                'capacity' => 5000,
                'factor' => 0.25,
                'fillType' => 'butter',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palettemilch' => array(
                'capacity' => 5000,
                'factor' => 0.25,
                'fillType' => 'milch',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palettesahne' => array(
                'capacity' => 5000,
                'factor' => 0.25,
                'fillType' => 'sahne',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palettequark' => array(
                'capacity' => 5000,
                'factor' => 0.25,
                'fillType' => 'quark',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'paletteyogurt' => array(
                'capacity' => 5000,
                'factor' => 0.25,
                'fillType' => 'yogurt',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Zellstoff_Fabrik' => array(
        'ProdPerHour' => 12500,
        'position' => '-900.044 99.9937 -802.387',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Hackschnitzel' => array(
                'capacity' => 500000,
                'factor' => 0.5,
                'fillTypes' => 'woodChips',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.3,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 150000,
                'factor' => 0.25,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'palettepapier' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'papier',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'karton',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_obst_apfel' => array(
        'ProdPerHour' => 600,
        'position' => '877.012 100 -751.388',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Compost' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Apfelpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'apfel',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_obst_birne' => array(
        'ProdPerHour' => 600,
        'position' => '877.012 100 -811.391',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Compost' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Birnenpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'birne',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_obst_kirsche' => array(
        'ProdPerHour' => 600,
        'position' => '877.012 100 -871.043',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Compost' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Kirschpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'kirsche',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_obst_pflaume' => array(
        'ProdPerHour' => 600,
        'position' => '877.012 100 -930.202',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Compost' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 100000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Pflaumenpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'pflaume',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Kartoffelfabrik' => array(
        'ProdPerHour' => 7500,
        'position' => '-600.478 100.641 886.48',
        'showInProduction' => true,
        'rawMaterial' => array(
            'washedPotato' => array(
                'capacity' => 600000,
                'factor' => 0.6,
                'fillTypes' => 'washedPotato',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 280000,
                'factor' => 0.25,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 175000,
                'factor' => 0.15,
                'fillTypes' => 'karton',
                'showInStorage' => false
            ),
            'palettespeiseoel' => array(
                'capacity' => 225000,
                'factor' => 0.15,
                'fillTypes' => 'oel',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'palettechips' => array(
                'capacity' => 5000,
                'factor' => 0.35,
                'fillType' => 'chips',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palettepommes' => array(
                'capacity' => 5000,
                'factor' => 0.35,
                'fillType' => 'pommes',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'palettekartoffelsack' => array(
                'capacity' => 5000,
                'factor' => 0.35,
                'fillType' => 'kartoffelsack',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Brennerei_Korn' => array(
        'ProdPerHour' => 400,
        'position' => '-124.52 100 -796.704',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Getreide' => array(
                'capacity' => 250000,
                'factor' => 0.4,
                'fillTypes' => 'wheat rye oat barley',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.5,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 120000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 70000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            ),
            'zuckerpalette' => array(
                'capacity' => 70000,
                'factor' => 0.2,
                'fillTypes' => 'zucker',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'palettekorn' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'korn',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Brennerei_Obstler' => array(
        'ProdPerHour' => 400,
        'position' => '-98.1 100 -818.784',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Obstpalette' => array(
                'capacity' => 90000,
                'factor' => 0.4,
                'fillTypes' => 'apfel kirsche pflaume birne',
                'showInStorage' => false
            ),
            'Tip_RSwater' => array(
                'capacity' => 200000,
                'factor' => 0.5,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 120000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 70000,
                'factor' => 0.2,
                'fillTypes' => 'karton',
                'showInStorage' => false
            ),
            'zuckerpalette' => array(
                'capacity' => 70000,
                'factor' => 0.2,
                'fillTypes' => 'zucker',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'paletteobstler' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'obstler',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_HofladenApfel' => array(
        'ProdPerHour' => 60,
        'position' => '223.977 100 78.6882',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Apfel' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'apfel',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_HofladenBirne' => array(
        'ProdPerHour' => 60,
        'position' => '223.977 100 81.3477',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Birne' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'birne',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_HofladenPflaume' => array(
        'ProdPerHour' => 60,
        'position' => '224.645 100 85.1752',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Pflaumen' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'pflaume',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Hofladenkirsche' => array(
        'ProdPerHour' => 60,
        'position' => '224.645 100 82.5263',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Kirschen' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'kirsche',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Hofladentomaten' => array(
        'ProdPerHour' => 60,
        'position' => '215.801 100 82.5263',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tomaten' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'tomaten',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Hofladensalat' => array(
        'ProdPerHour' => 60,
        'position' => '215.801 100 85.2447',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Salat' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'salat',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_HofladenBlumenkohl' => array(
        'ProdPerHour' => 60,
        'position' => '214.971 100 78.6882',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Blumenkohl' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'blumenkohl',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_HofladenRotkohl' => array(
        'ProdPerHour' => 60,
        'position' => '214.971 100 81.3267',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Rotkohl' => array(
                'capacity' => 15000,
                'factor' => 1,
                'fillTypes' => 'rotkohl',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Geldkassette' => array(
                'capacity' => 25000,
                'factor' => 3,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_geldboxen' => array(
        'ProdPerHour' => 100000,
        'position' => '298.646 100 98.5848',
        'showInProduction' => true,
        'rawMaterial' => array(
            'geld' => array(
                'capacity' => 250000,
                'factor' => 1,
                'fillTypes' => 'geld',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'geld' => array(
                'capacity' => 250000,
                'factor' => 1,
                'fillType' => 'geld',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Pellets_Fabrik' => array(
        'ProdPerHour' => 7500,
        'position' => '877.617 100.01 625.812',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Stroh_Hackschnitzel' => array(
                'capacity' => 500000,
                'factor' => 0.5,
                'fillTypes' => 'straw woodChips',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 240000,
                'factor' => 0.2,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'pellets' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'pellets',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Papier' => array(
        'ProdPerHour' => 50000000,
        'position' => '-845.096 99.955 -551.867',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettepapier' => array(
                'capacity' => 340000,
                'factor' => 1,
                'fillTypes' => 'papier',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettepapier' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'papier',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Karton' => array(
        'ProdPerHour' => 50000000,
        'position' => '-885.891 99.955 -477.953',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palette_karton' => array(
                'capacity' => 330000,
                'factor' => 1,
                'fillTypes' => 'karton',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palette_karton' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'karton',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Leerpaletten' => array(
        'ProdPerHour' => 14400001,
        'position' => '-888.526 99.955 -471.539',
        'showInProduction' => false,
        'rawMaterial' => array(
            'emptypallet' => array(
                'capacity' => 335000,
                'factor' => 1,
                'fillTypes' => 'emptypallet',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'emptypallet' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'emptypallet',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Apfel' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.6 99.955 -477.953',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Apfelpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'apfel',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Apfelpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'apfel',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Birne' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.7 99.955 -490.701',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Birnenpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'birne',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Birnenpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'birne',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Kirsche' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.68 99.955 -459.32',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Kirschpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'kirsche',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Kirschpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'kirsche',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Pflaume' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.6 99.955 -471.658',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Pflaumenpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'pflaume',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Pflaumenpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'pflaume',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Bierkasten' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.6 99.955 -531.733',
        'showInProduction' => false,
        'rawMaterial' => array(
            'bierpalettekasten' => array(
                'capacity' => 465000,
                'factor' => 1,
                'fillTypes' => 'beer',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'bierpalettekasten' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'beer',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Bierfass' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.588 99.955 -519.388',
        'showInProduction' => false,
        'rawMaterial' => array(
            'bierpalettefass' => array(
                'capacity' => 465000,
                'factor' => 1,
                'fillTypes' => 'beerf',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'bierpalettefass' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'beerf',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Zucker' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.714 99.955 -599.055',
        'showInProduction' => false,
        'rawMaterial' => array(
            'zuckerpalette' => array(
                'capacity' => 355000,
                'factor' => 1,
                'fillTypes' => 'zucker',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'zuckerpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'zucker',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Mehl' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.714 99.955 -611.621',
        'showInProduction' => false,
        'rawMaterial' => array(
            'mehlpalette' => array(
                'capacity' => 355000,
                'factor' => 1,
                'fillTypes' => 'mehl',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'mehlpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'mehl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Milch' => array(
        'ProdPerHour' => 14400001,
        'position' => '-885.573 99.955 -611.621',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettemilch' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'milch',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettemilch' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'milch',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Butter' => array(
        'ProdPerHour' => 14400001,
        'position' => '-885.573 99.955 -598.991',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettebutter' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'butter',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettebutter' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'butter',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Quark' => array(
        'ProdPerHour' => 14400001,
        'position' => '-888.15 99.955 -580.32',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettequark' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'quark',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettequark' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'quark',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Sahne' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.269 99.955 -580.32',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettesahne' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'sahne',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettesahne' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'sahne',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Yogurt' => array(
        'ProdPerHour' => 14400001,
        'position' => '-888.223 99.955 -592.881',
        'showInProduction' => false,
        'rawMaterial' => array(
            'paletteyogurt' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'yogurt',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'paletteyogurt' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'yogurt',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Brot' => array(
        'ProdPerHour' => 14400001,
        'position' => '-933.233 99.955 -592.881',
        'showInProduction' => false,
        'rawMaterial' => array(
            'brotpalette' => array(
                'capacity' => 480000,
                'factor' => 1,
                'fillTypes' => 'brot',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'brotpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'brot',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_kartoffelsack' => array(
        'ProdPerHour' => 14400001,
        'position' => '-944.192 99.955 -692.864',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettekartoffelsack' => array(
                'capacity' => 355000,
                'factor' => 1,
                'fillTypes' => 'kartoffelsack',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettekartoffelsack' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'kartoffelsack',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Chips' => array(
        'ProdPerHour' => 14400001,
        'position' => '-946.992 99.955 -674.129',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettechips' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'chips',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettechips' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'chips',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_pommes' => array(
        'ProdPerHour' => 14400001,
        'position' => '-946.872 99.955 -661.57',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettepommes' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'pommes',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettepommes' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'pommes',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_washedPotato' => array(
        'ProdPerHour' => 14400001,
        'position' => '-944.192 99.955 -692.862',
        'showInProduction' => false,
        'rawMaterial' => array(
            'washedPotato' => array(
                'capacity' => 660000,
                'factor' => 1,
                'fillTypes' => 'washedPotato',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'washedPotato' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'washedPotato',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_oel' => array(
        'ProdPerHour' => 14400001,
        'position' => '-882.855 99.955 -661.556',
        'showInProduction' => false,
        'rawMaterial' => array(
            'palettespeiseoel' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'oel',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'palettespeiseoel' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'oel',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Wurst' => array(
        'ProdPerHour' => 14400001,
        'position' => '-880.353 99.955 -680.221',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Wurst' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'sausage',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Wurst' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'sausage',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Fleisch' => array(
        'ProdPerHour' => 14400001,
        'position' => '-879.978 99.955 -692.857',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Fleisch' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'meat',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Fleisch' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'meat',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_obstler' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.413 99.955 -550.58',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Obstler' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'obstler',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Obstler' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'obstler',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Korn' => array(
        'ProdPerHour' => 14400001,
        'position' => '-930.783 99.955 -537.926',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Korn' => array(
                'capacity' => 625000,
                'factor' => 1,
                'fillTypes' => 'korn',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Korn' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'korn',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Blumenkohl' => array(
        'ProdPerHour' => 14400001,
        'position' => '-942.432 99.955 -734.118',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Blumenkohl' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'blumenkohl',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Blumenkohl' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'blumenkohl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Tomaten' => array(
        'ProdPerHour' => 14400001,
        'position' => '-945.382 99.955 -727.818',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Tomatenpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'tomaten',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Tomatenpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'tomaten',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Salat' => array(
        'ProdPerHour' => 14400001,
        'position' => '-945.46 99.955 -715.471',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Salatpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'salat',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Salatpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'salat',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Rotkohl' => array(
        'ProdPerHour' => 14400001,
        'position' => '-942.545 99.955 -746.861',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Rotkohlpalette' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'rotkohl',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Rotkohlpalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'rotkohl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Lager_Pellets' => array(
        'ProdPerHour' => 14400001,
        'position' => '-888.5 99.955 -459.2',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Pelletspalette' => array(
                'capacity' => 355000,
                'factor' => 1,
                'fillTypes' => 'pellets',
                'showInStorage' => true
            )
        ),
        'product' => array(
            'Pelletspalette' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'pellets',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Duenger_Prod' => array(
        'ProdPerHour' => 10000,
        'position' => '-3.163 0 -14.2899',
        'showInProduction' => true,
        'rawMaterial' => array(
            'manure' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillTypes' => 'manure',
                'showInStorage' => false
            ),
            'liquidManure' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillTypes' => 'liquidManure',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'fertilizer' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillType' => 'fertilizer',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Saat_Prod' => array(
        'ProdPerHour' => 10000,
        'position' => '-3.15 4.01462e-14 17.5367',
        'showInProduction' => true,
        'rawMaterial' => array(
            'grain' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillTypes' => 'wheat maize barley rape',
                'showInStorage' => false
            ),
            'fertilizer' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'fertilizer',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'seeds' => array(
                'capacity' => 100000,
                'factor' => 1,
                'fillType' => 'seeds',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Fertilizer' => array(
        'ProdPerHour' => 2147483647,
        'position' => '6.21052 0.260554 -9.09314',
        'showInProduction' => false,
        'rawMaterial' => array(
            'FS_fertilizer' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'fertilizer',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'FS_fertilizer' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'fertilizer',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Saatgut' => array(
        'ProdPerHour' => 2147483647,
        'position' => '5.87823 0.265491 22.8234',
        'showInProduction' => false,
        'rawMaterial' => array(
            'FS_Seeds' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'seeds',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'FS_Seeds' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'seeds',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Schweinefutter' => array(
        'ProdPerHour' => 2147483647,
        'position' => '-66.7724 0.260557 -45.7668',
        'showInProduction' => false,
        'rawMaterial' => array(
            'Schweinefutter' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'pigFood',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Schweinefutter' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'pigFood',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_kartoffellager' => array(
        'ProdPerHour' => 1000000000,
        'position' => '-481.765 0.0500031 -874.563',
        'showInProduction' => false,
        'rawMaterial' => array(
            'potato' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'potato',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'potato' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'potato',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_kartoffellager2' => array(
        'ProdPerHour' => 1000000000,
        'position' => '44.9181 0.0499822 -43.7428',
        'showInProduction' => false,
        'rawMaterial' => array(
            'potato' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillTypes' => 'potato',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'potato' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'potato',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_zuckerrueben' => array(
        'ProdPerHour' => 1000000000,
        'position' => '28.259 0.0499862 -24.1173',
        'showInProduction' => false,
        'rawMaterial' => array(
            'sugarBeet' => array(
                'capacity' => 600000,
                'factor' => 1,
                'fillTypes' => 'sugarBeet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'sugarBeet' => array(
                'capacity' => 500000,
                'factor' => 1,
                'fillType' => 'sugarBeet',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_Schweinefutterstation' => array(
        'ProdPerHour' => 30000,
        'position' => '-76.8797 1.15196 25.771',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Getreide' => array(
                'capacity' => 100000,
                'factor' => 0.6,
                'fillTypes' => 'wheat barley maize oat rye',
                'showInStorage' => false
            ),
            'Raps Sonnenblume Soja' => array(
                'capacity' => 100000,
                'factor' => 0.3,
                'fillTypes' => 'rape sunflower soybean',
                'showInStorage' => false
            ),
            'Erdfruechten' => array(
                'capacity' => 100000,
                'factor' => 0.1,
                'fillTypes' => 'potato sugarBeet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Schweinefutter' => array(
                'capacity' => 250000,
                'factor' => 0.935,
                'fillType' => 'pigFood',
                'showInStorage' => true
            )
        )
    ),
    'FabrikScript_potatoWasher' => array(
        'ProdPerHour' => 6000,
        'position' => '-699.617 99.9871 766.891',
        'showInProduction' => true,
        'rawMaterial' => array(
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
        'product' => array(
            'washedPotato' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'washedPotato',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_potatoWasher2' => array(
        'ProdPerHour' => 6000,
        'position' => '-698.768 99.9407 752.973',
        'showInProduction' => true,
        'rawMaterial' => array(
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
        'product' => array(
            'washedPotato' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'washedPotato',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Schlachterei' => array(
        'ProdPerHour' => 50,
        'position' => '-634.491 99.3027 -94.9426',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Tier_Anlieferung' => array(
                'capacity' => 400,
                'factor' => 0.4,
                'fillTypes' => 'pig cow sheep',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 260000,
                'factor' => 3,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            ),
            'palette_karton' => array(
                'capacity' => 170000,
                'factor' => 3,
                'fillTypes' => 'karton',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'Wurst' => array(
                'capacity' => 5000,
                'factor' => 200,
                'fillType' => 'sausage',
                'palettPlaces' => 999,
                'showInStorage' => false
            ),
            'Fleisch' => array(
                'capacity' => 5000,
                'factor' => 200,
                'fillType' => 'meat',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Tomatenzucht' => array(
        'ProdPerHour' => 1,
        'position' => '-509.492 89.5874 581.372',
        'showInProduction' => true,
        'rawMaterial' => array(
            'water' => array(
                'capacity' => 30000,
                'factor' => 0.7,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'compost' => array(
                'capacity' => 80000,
                'factor' => 0.5,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 45000,
                'factor' => 0.142857,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'tomaten' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'tomaten',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Salatzucht' => array(
        'ProdPerHour' => 1,
        'position' => '-540.967 89.6469 606.976',
        'showInProduction' => true,
        'rawMaterial' => array(
            'water' => array(
                'capacity' => 30000,
                'factor' => 0.7,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'compost' => array(
                'capacity' => 80000,
                'factor' => 0.5,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 45000,
                'factor' => 0.142857,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'salat' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'salat',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Rotkohlzucht' => array(
        'ProdPerHour' => 1,
        'position' => '-510.072 89.5945 608.427',
        'showInProduction' => true,
        'rawMaterial' => array(
            'water' => array(
                'capacity' => 30000,
                'factor' => 0.7,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'compost' => array(
                'capacity' => 80000,
                'factor' => 0.5,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 45000,
                'factor' => 0.142857,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'rotkohl' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'rotkohl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Blumenkohlzucht' => array(
        'ProdPerHour' => 1,
        'position' => '-541.626 89.5798 634.097',
        'showInProduction' => true,
        'rawMaterial' => array(
            'water' => array(
                'capacity' => 30000,
                'factor' => 0.7,
                'fillTypes' => 'water',
                'showInStorage' => false
            ),
            'compost' => array(
                'capacity' => 80000,
                'factor' => 0.5,
                'fillTypes' => 'compost',
                'showInStorage' => false
            ),
            'emptypallet' => array(
                'capacity' => 45000,
                'factor' => 0.142857,
                'fillTypes' => 'emptypallet',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'blumenkohl' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'blumenkohl',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'FabrikScript_Weberei' => array(
        'ProdPerHour' => 5000,
        'position' => '23.441 -0.004 -9.551',
        'showInProduction' => true,
        'rawMaterial' => array(
            'Wolle' => array(
                'capacity' => 200000,
                'factor' => 0.13,
                'fillTypes' => 'wool',
                'showInStorage' => false
            ),
            'Wasser' => array(
                'capacity' => 150000,
                'factor' => 0.5,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'stoffrolleMK' => array(
                'capacity' => 5000,
                'factor' => 1,
                'fillType' => 'stoffrolleMK',
                'palettPlaces' => 999,
                'showInStorage' => false
            )
        )
    ),
    'Animals_sheep' => array(
        'ProdPerHour' => 0,
        'showInProduction' => false,
        'rawMaterial' => array(
            'grass_windrowdryGrass_windrow' => array(
                'capacity' => 0,
                'factor' => 0,
                'fillTypes' => 'grass_windrow dryGrass_windrow',
                'showInStorage' => false
            ),
            'water' => array(
                'capacity' => 0,
                'factor' => 0,
                'fillTypes' => 'water',
                'showInStorage' => false
            )
        ),
        'product' => array(
            'woolPallet' => array(
                'capacity' => 2000,
                'factor' => 0,
                'fillType' => 'woolPallet',
                'palettPlaces' => 8,
                'showInStorage' => false
            )
        )
    )
);

function getLocation($position)
{
    list ($posx, $posy, $posz) = explode(' ', $position);
    if ($posx < - 1071 || $posx > 1071 || $posy < 0 || $posy > 255 || $posz < - 1071 || $posz > 1071)
        return 'outOfMap';
    if ($posx > - 970.0 && $posx < - 967.0 && $posz > - 829.0 && $posz < - 814.0)
        return 'FabrikScript_Zellstoff_Fabrik';
    if ($posx > - 970.0 && $posx < - 967.0 && $posz > - 852.0 && $posz < - 837.0)
        return 'FabrikScript_Zellstoff_Fabrik';
    if ($posx > - 942.1 && $posx < - 939.9 && $posz > - 35.8 && $posz < - 19.6)
        return 'FabrikScript_Backerei';
    if ($posx > - 578.2 && $posx < - 568.0 && $posz > 264.0 && $posz < 272.0)
        return 'FabrikScript_Molkerei';
    if ($posx > - 566.0 && $posx < - 556.0 && $posz > 264.0 && $posz < 272.0)
        return 'FabrikScript_Molkerei';
    if ($posx > - 553.8 && $posx < - 543.8 && $posz > 264.0 && $posz < 272.0)
        return 'FabrikScript_Molkerei';
    if ($posx > - 542.4 && $posx < - 531.4 && $posz > 264.0 && $posz < 272.0)
        return 'FabrikScript_Molkerei';
    if ($posx > - 529.4 && $posx < - 519.4 && $posz > 264.0 && $posz < 272.0)
        return 'FabrikScript_Molkerei';
    if ($posx > - 945.5 && $posx < - 935.3 && $posz > 417.6 && $posz < 427.7)
        return 'FabrikScript_BrauereiKasten';
    if ($posx > - 923.3 && $posx < - 913.0 && $posz > 457.0 && $posz < 467.3)
        return 'FabrikScript_BrauereiFass';
    if ($posx > - 932.1 && $posx < - 921.8 && $posz > 585.7 && $posz < 595.9)
        return 'FabrikScript_Oel_Raffinerie_Raps';
    if ($posx > - 772.2 && $posx < - 710.0 && $posz > 765.5 && $posz < 767.8)
        return 'FabrikScript_potatoWasher';
    if ($posx > - 721.4 && $posx < - 709.1 && $posz > 751.5 && $posz < 753.9)
        return 'FabrikScript_potatoWasher2';
    if ($posx > - 713.2 && $posx < - 709.0 && $posz > 807.4 && $posz < 823.5)
        return 'FabrikScript_Kartoffelfabrik';
    if ($posx > - 695.1 && $posx < - 690.8 && $posz > 807.4 && $posz < 823.6)
        return 'FabrikScript_Kartoffelfabrik';
    if ($posx > - 675.9 && $posx < - 671.7 && $posz > 807.4 && $posz < 823.6)
        return 'FabrikScript_Kartoffelfabrik';
    if ($posx > - 853.8 && $posx < - 852.2 && $posz > - 98.8 && $posz < - 82.7)
        return 'FabrikScript_RoggenMehlfabrik';
    if ($posx > - 845.7 && $posx < - 844.2 && $posz > - 98.8 && $posz < - 82.7)
        return 'FabrikScript_GersteMehlfabrik';
    if ($posx > - 837.7 && $posx < - 836.2 && $posz > - 98.8 && $posz < - 82.7)
        return 'FabrikScript_WeizenMehlfabrik';
    if ($posx > 578.5 && $posx < 592.7 && $posz > - 25.3 && $posz < - 23.4)
        return 'Animals_sheep';
    if ($posx > 866.4 && $posx < 882.6 && $posz > 618.5 && $posz < 622.7)
        return 'FabrikScript_Paletten_Fabrik';
    if ($posx > 960.1 && $posx < 961.7 && $posz > 663.1 && $posz < 683.3)
        return 'FabrikScript_Fabrik';
    if ($posx > 877.6 && $posx < 893.8 && $posz > - 880.3 && $posz < - 876.1)
        return 'FabrikScript_obst_apfel';
    if ($posx > 877.5 && $posx < 893.8 && $posz > - 893.1 && $posz < - 888.9)
        return 'FabrikScript_obst_birne';
    if ($posx > 877.6 && $posx < 893.8 && $posz > - 906.3 && $posz < - 902.0)
        return 'FabrikScript_obst_kirsche';
    if ($posx > 877.6 && $posx < 893.8 && $posz > - 918.4 && $posz < - 914.2)
        return 'FabrikScript_obst_pflaume';
    if ($posx > - 618.0 && $posx < - 601.8 && $posz > - 118.4 && $posz < - 114.2)
        return 'FabrikScript_Schlachterei';
    if ($posx > - 618.0 && $posx < - 601.8 && $posz > - 113.0 && $posz < - 108.8)
        return 'FabrikScript_Schlachterei';
    if ($posx > - 774.6 && $posx < - 752.4 && $posz > - 929.4 && $posz < - 925.2)
        return 'FabrikScript_Zuckerfabrik';
    return 'onMap';
}