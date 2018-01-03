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
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (empty ( $lang ) || ! is_array ( $lang )) {
	$lang = array ();
}

$lang = array_merge ( $lang, array (
		'barley' => 'Gerste',
		'bigBagContainerFertilizer' => 'Dünger',
		'bigBagContainerSeeds' => 'Saatgut',
		'cow' => 'Kühe',
		'tertilizer' => 'Dünger',
		'liquidFertilizer' => 'Flüssigdünger',
		'liquidManure' => 'Gülle',
		'liquidManureFillLevel' => 'Gülle',
		'maize' => 'Körnermais',
		'manure' => 'Mist',
		'milk' => 'Milch',
		'pig' => 'Schweine',
		'rape' => 'Raps',
		'seeds' => 'Saatgut',
		'fertilizer' => 'Dünger',
		'sheep' => 'Schafe',
		'soybean' => 'Sojabohnen',
		'sunflower' => 'Sonnenblumen',
		'wheat' => 'Weizen',
		'woolPallet' => 'Wolle',
		'woodChips' => 'Hackschnitzel',
		'Tip_RS' => 'Raps oder Sonnenblumen',
		'RM_Output' => 'Diesel',
		'HFUIN' => 'Diesel',
		'FUOUT' => 'Diesel',
		'RS_forage' => 'Eiweisfuttermittel',
		'DS_digestate' => 'Gärreste',
		'digestate' => 'Gärreste',
		'digestateSiloFillLevel' => 'Gärreste',
		'Weinfaesser' => 'Wein',
		'weinPallet' => 'Wein',
		'grain' => 'Getreide',
		'Traubensaft' => 'Traubensaft',
		'traubensaft' => 'Traubensaft',
		'Wine' => 'Traubensaft',
		'slow_soja_water' => 'Wasser',
		'Trauben' => 'Weintrauben',
		'grape' => 'Weintrauben',
		'grass_windrow_dryGrass_windrow' => 'Gras oder Heu',
		'water' => 'Wasser',
		'cm_inputWaste' => 'Abfall',
		'fuel' => 'Diesel',
		'cm_outputCompost' => 'Kompost',
		'Mist' => 'Mist',
		'Duenger' => 'Dünger',
		'Holz' => 'Holzstämme',
		'boardwood' => 'Bretter',
		'slow_soja_soja' => 'Sojabohnen',
		'slow_soja_fuel' => 'Diesel',
		'slow_soja_pig' => 'Schweinefutter',
		'slow_soja_liquid' => 'Gülle',
		'slow_soja_milk' => 'Milch',
		'boardPallet' => 'Bretter',
		'fertilizerTank' => 'Flüssigdünger',
		'dryGrass_windrow' => 'Heu',
		'baleHay240' => 'Heu',
		'roundbaleHay_w112_d130' => 'Heu',
		'wheat_barley_pigFood' => 'Gerste, Weizen oder Schweinefutter',
		'rape_sunflower_soybean_pigFood' => 'Raps, Sonnenblumen, Sojabohnen oder Schweinefutter',
		'maize_pigFood' => 'Körnermais oder Schweinefutter',
		'potato_sugarBeet_pigFood' => 'Kartoffeln, Zuckerrüben oder Schweinefutter',
		'pigFood' => 'Schweinefutter',
		'silage_dryGrass_windrow' => 'Silage oder Heu',
		'powerFood' => 'Mischfutter',
		'compost' => 'Kompost',
		'grass' => 'Gras',
		'chaff' => 'Häckselgut',
		'forage' => 'Mischfutter',
		'forage_mixing' => 'Futter',
		'grass_windrow' => 'Gras',
		'silage' => 'Silage',
		'bunkerFillLevel' => 'Silage',
		'straw' => 'Stroh',
		'sugarBeet' => 'Zuckerrüben',
		'potato' => 'Kartoffeln' 
) );

$lang = array_merge ( $lang, array (
		'outOfMap' => 'Außerhalb der Karte',
		'onMap' => 'Landschaft',
		'Storage_storage1' => 'Hofsilo',
		'Storage_storage3' => 'Außenlager am Bahnhof',
		'Bga' => 'BGA',
		'Animals_pig' => 'Schweinestall',
		'Animals_cow' => 'Kuhstall',
		'Animals_sheep' => 'Schafweide',
		'FabrikScript_Diesellager' => 'Diesellager',
		'FabrikScript_compostMaster2k17' => 'compostMaster2k17',
		'FabrikScript_Fertilizer' => 'Düngerproduktion',
		'FabrikScript_liquidFertilizer' => 'Flüssigdüngerproduktion',
		'FabrikScript_Raffinerie' => 'Raffinierie',
		'FabrikScript_Seeds' => 'Saatgutproduktion',
		'FabrikScript_Weinberg' => 'Weinberg',
		'FabrikScript_Winzerei' => 'Winzerei',
		'FabrikScript_Fabrik' => 'Sägewerk',
		'FabrikScript_SojamilchProduktion' => 'Sojamich Produktion' 

) );
