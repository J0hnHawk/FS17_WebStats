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
		'baleGrass240' => 'Gras',
		'baleStraw240' => 'Stroh',
		'straw' => 'Stroh',
		'barley' => 'Gerste',
		'bigBagContainerFertilizer' => 'Dünger',
		'bigBagContainerPigFood' => 'Schweinefutter',
		'bigBagContainerSeeds' => 'Saatgut',
		'chaff' => 'Häckselgut',
		'cow' => 'Kühe',
		'fertilizer' => 'Dünger',
		'fertilizerTank' => 'Flüssigdünger',
		'grass_windrow' => 'Gras',
		'maize' => 'Körnermais',
		'palletPoplar' => 'Pappelsetzlinge',
		'pig' => 'Schweine',
		'rape' => ' Raps',
		'roundbaleGrass_w112_d130' => 'Gras',
		'roundbaleStraw_w112_d130' => 'Stroh',
		'liquidManure' => 'Gülle',
		'woodChips' => 'Hackschnitzel',
		'manure' => 'Mist',
		'milk' => 'Milch',
		'seeds' => 'Saatgut',
		'potato' => 'Kartoffeln',
		'silage' => 'Silage',
		'bunkerFillLevel' => 'Silage',
		'liquidManureFillLevel' => 'Gülle',
		'forage' => 'Mischfutter',
		'powerFood' => 'Mischfutter',
		'sugarBeet' => 'Zuckerrüben',
		'sheep' => 'Schafe',
		'soybean' => 'Sojabohnen',
		'sunflower' => 'Sonnenblumen',
		'wheat' => 'Weizen',
		'woolPallet' => 'Wolle',
		'digestate' => 'Gärreste',
		'grass_windrow_dryGrass_windrow' => 'Gras oder Heu',
		'dryGrass_windrow' => 'Heu',
		'baleHay240' => 'Heu',
		'roundbaleHay_w112_d130' => 'Heu',
		'water' => 'Wasser',
		'wheat_barley_pigFood' => 'Gerste, Weizen oder Schweinefutter',
		'rape_sunflower_soybean_pigFood' => 'Raps, Sonnenblumen, Sojabohnen oder Schweinefutter',
		'maize_pigFood' => 'Körnermais oder Schweinefutter',
		'potato_sugarBeet_pigFood' => 'Kartoffeln, Zuckerrüben oder Schweinefutter',
		'pigFood' => 'Schweinefutter',
		'silage_dryGrass_windrow' => 'Silage oder Heu' 
) );

$lang = array_merge ( $lang, array (
		'outOfMap' => 'Außerhalb der Karte',
		'onMap' => 'Landschaft',
		'Bga' => 'BGA',
		'Animals_pig' => 'Schweinestall',
		'Animals_cow' => 'Kuhstall',
		'Animals_sheep' => 'Schafweide',
		'Storage_storage1' => 'Hofsilo',
		'BunkerSilo_silo001' => 'BGA Fahrsilo 1',
		'BunkerSilo_silo002' => 'BGA Fahrsilo 2',
		'BunkerSilo_silo003' => 'BGA Fahrsilo 3',
		'BunkerSilo_silo004' => 'BGA Fahrsilo 4',
		'BunkerSilo_silo005' => 'BGA Fahrsilo 5',
		'BunkerSilo_cowSilo' => 'Kuhstall Fahrsilo' 
) );
