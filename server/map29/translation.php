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
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (empty ( $lang ) || ! is_array ( $lang )) {
	$lang = array ();
}

$lang = array_merge ( $lang, array (
		'cm_inputWaste' => 'Abfall',
		'apfel' => 'Apfel',
		'Apfelpalette' => 'Apfel',
		'palette_apfel' => 'Apfel',
		'bierpalettefass' => 'Bierfass',
		'bierpalettekasten' => 'Bierkasten',
		'birne' => 'Birne',
		'Birnenpalette' => 'Birne',
		'palette_birne' => 'Birne',
		'blumenkohl' => 'Blumenkohl',
		'Brennstoffe' => 'Brennstoffe',
		'boardPallet' => 'Bretter',
		'boardwood' => 'Bretter',
		'brotpalette' => 'Brot',
		'palettebrod' => 'Brot',
		'palettebutter' => 'Butter',
		'palettechips' => 'Chips',
		'palette_chips' => 'Chips',
		'RM_Output' => 'Diesel',
		'Diesel' => 'Diesel',
		'fuel' => 'Diesel',
		'bigBagContainerFertilizer' => 'Dünger',
		'FS_fertilizer' => 'Dünger',
		'fertilizer' => 'Dünger',
		'Erdfruechten' => 'Erdfrüchte',
		'palette_fleisch' => 'Fleisch',
		'Fleisch' => 'Fleisch',
		'liquidFertilizer' => 'Flüssigdünger',
		'fertilizerTank' => 'Flüssigdünger',
		'Tip_RS1' => 'Gärreste oder Gülle',
		'Tip_RSbarley' => 'Gerste',
		'barley' => 'Gerste',
		'grain' => 'Getreide',
		'Getreide' => 'Getreide',
		'washedPotato' => 'Gewaschene Kartoffeln',
		'palette_washedPotato' => 'Gewaschene Kartoffeln',
		'grass_windrow' => 'Gras',
		'baleGrass240' => 'Gras',
		'Gras' => 'Gras',
		'grass' => 'Gras',
		'grass_windrowdryGrass_windrow' => 'Gras oder Heu',
		'liquidManure' => 'Gülle',
		'woodChips' => 'Hackschnitzel',
		'Hackschnitzel' => 'Hackschnitzel',
		'chaff' => 'Häckselgut',
		'Holz' => 'Holzstämme',
		'oat' => 'Hafer',
		'dryGrass_windrow' => 'Heu',
		'baleHay240' => 'Heu',
		'hops' => 'Hopfen',
		'paletteyogurt' => 'Joghurt',
		'palette_karton' => 'Karton',
		'karton' => 'Karton',
		'potato' => 'Kartoffeln',
		'Kartoffeln' => 'Kartoffeln',
		'palettekartoffelsack' => 'Kartoffelsack',
		'palette_kartoffeln' => 'Kartoffelsack',
		'kirsche' => 'Kirsche',
		'Kirschen' => 'Kirsche',
		'Kirschpalette' => 'Kirsche',
		'palette_kirsche' => 'Kirsche',
		'compost' => 'Kompost',
		'RS_compost1' => 'Kompost',
		'cm_outputCompost' => 'Kompost',
		'RS_compost' => 'Kompost',
		'Compost' => 'Kompost',
		'palettekorn' => 'Korn',
		'maize' => 'Körnermais',
		'cow' => 'Kühe',
		'emptypallet' => 'Leere Paletten',
		'palletPallet' => 'Leere Paletten',
		'mehlpalette' => 'Mehl',
		'mehl' => 'Mehl',
		'palettemehlgerste1' => 'Mehl',
		'palettemehlroggen1' => 'Mehl',
		'palettemehlweizen1' => 'Mehl',
		'Tip_mehl' => 'Mehl',
		'Tip_RSmilk' => 'Milch',
		'milk' => 'Milch',
		'forage' => 'Mischfutter',
		'Mischfutter' => 'Mischfutter',
		'manure' => 'Mist',
		'geld' => 'Münzen',
		'Obstpalette' => 'Obst',
		'paletteobstler' => 'Obstler',
		'palettepapier' => 'Papier',
		'papier' => 'Papier',
		'palletPoplar' => 'Pappelsetzlinge',
		'pellets' => 'Pellets',
		'Pelletspalette' => 'Pellets',
		'pflaume' => 'Pflaume',
		'Pflaumenpalette' => 'Pflaume',
		'palette_pflaume' => 'Pflaume',
		'Raps Sonnenblume Soja' => 'Protein',
		'palettepommes' => 'Pommes',
		'palette_pommes' => 'Pommes',
		'palettequark' => 'Quark',
		'rape' => 'Raps',
		'Tip_RS' => 'Raps oder Sonnenblumen',
		'rye' => 'Roggen',
		'Tip_RSrye' => 'Roggen',
		'rotkohl' => 'Rotkohl',
		'Rotkohl' => 'Rotkohl',
		'Rotkohlpalette' => 'Rotkohl',
		'FS_Seeds' => 'Saatgut',
		'seeds' => 'Saatgut',
		'bigBagContainerSeeds' => 'Saatgut',
		'palettesahne' => 'Sahne',
		'salat'=>'Salat',
		'Salatpalette' => 'Salat',
		'sheep' => 'Schafe',
		'pig' => 'Schweine',
		'bigBagContainerPigFood' => 'Schweinefutter',
		'pigFood' => 'Schweinefutter',
		'Schweinefutter' => 'Schweinefutter',
		'treeSaplings' => 'Setzlinge',
		'treeSaplingPallet' => 'Setzlinge',
		'Silage' => 'Silage',
		'silage' => 'Silage',
		'soybean' => 'Sojabohnen',
		'sunflower' => 'Sonnenblumen',
		'palettespeiseoel' => 'Speiseöl',
		'palette_oel' => 'Speiseöl',
		'oel' => 'Speiseöl',
		'stoffrolleMK' => 'Stoff',
		'straw' => 'Stroh',
		'Stroh' => 'Stroh',
		'baleStraw240' => 'Stroh',
		'Stroh_Hackschnitzel' => 'Stroh oder Hackschnitzel',
		'tomaten' => 'Tomate',
		'Tomaten' => 'Tomate',
		'Tomatenpalette' => 'Tomate',
		'Tier_Anlieferung' => 'Vieh',
		'palettemilch' => 'Vollmilch',
		'RM_Output2' => 'Wasser',
		'Tip_RSwater' => 'Wasser',
		'Wasser' => 'Wasser',
		'water' => 'Wasser',
		'wheat' => 'Weizen',
		'Tip_RSwheat' => 'Weizen',
		'woolPallet' => 'Wolle',
		'palette_wurst' => 'Wurst',
		'Wurst' => 'Wurst',
		'palettezucker' => 'Zucker',
		'zuckerpalette' => 'Zucker',
		'sugarBeet' => 'Zuckerrüben',
		'Tip_RSzucker' => 'Zuckerrüben' 
) );

$lang = array_merge ( $lang, array (
		'FabrikScript_Backerei' => 'Bäckerei',
		'FabrikScript_BrauereiFass' => 'Brauerei',
		'FabrikScript_BrauereiKasten' => 'Brauerei',
		'FabrikScript_compostMaster2k17' => 'compostMaster 2k17',
		'FabrikScript_Duenger_Prod' => 'Düngerproduktion',
		'FabrikScript_Fabrik' => 'Sägewerk',
		'FabrikScript_GersteMehlfabrik' => 'Mehlfabrik (Gerste)',
		'FabrikScript_Holzhacker' => 'Holzhacker',
		'FabrikScript_Kartoffelfabrik' => 'Kartoffelfabrik',
		'FabrikScript_Klaerwerk' => 'Klärwerk',
		'FabrikScript_KraftFutterHerstellung' => 'Futterfabrik',
		'FabrikScript_Molkerei' => 'Molkerei',
		'FabrikScript_obst_apfel' => 'Obstfarm (Apfel)',
		'FabrikScript_obst_birne' => 'Obstfarm (Birne)',
		'FabrikScript_obst_kirsche' => 'Obstfarm (Kirsche)',
		'FabrikScript_obst_pflaume' => 'Obstfarm (Pflaume)',
		'FabrikScript_Oel_Raffinerie_Raps' => 'Biodiesel Raffinerie',
		'FabrikScript_Paletten_Fabrik' => 'Palettenwerk',
		'FabrikScript_potatoWasher' => 'Kartoffelwaschanlage 1',
		'FabrikScript_potatoWasher2' => 'Kartoffelwaschanlage 2',
		'FabrikScript_RoggenMehlfabrik' => 'Mehlfabrik (Roggen)',
		'FabrikScript_Saat_Prod' => 'Saatgutproduktion',
		'FabrikScript_Schweinefutterstation' => 'Schweinefutterstation',
		'FabrikScript_Schweinefutter' => 'Schweinefutterlager',
		'FabrikScript_WeizenMehlfabrik' => 'Mehlfabrik (Weizen)',
		'FabrikScript_Zellstoff_Fabrik' => 'Zellstofffabrik',
		'FabrikScript_Zuckerfabrik' => 'Zuckerfabrik',
		'FabrikScript_Brennerei_Obstler' => 'Brennerei (Obstler)',
		'FabrikScript_geldboxen' => 'Münzzähler',
		'FabrikScript_Brennerei_Korn' => 'Brennerei (Korn)',
		'FabrikScript_Saatgut' => 'Saatgutlager',
		'FabrikScript_Weberei' => 'Weberei',
		'FabrikScript_zuckerrueben' => 'Zuckerrübenlager (Hof)',
		'FabrikScript_kartoffellager' => 'Lagerhalle (Hof)',
		'FabrikScript_kartoffellager2' => 'Lagerhalle (Waschanlage)',
		'FabrikScript_Fertilizer' => 'Düngerlager',
		'FabrikScript_HofladenApfel' => 'Hofladen (Apfel)',
		'FabrikScript_HofladenBirne' => 'Hofladen (Birne)',
		'FabrikScript_HofladenBlumenkohl' => 'Hofladen (Blumenkohl)',
		'FabrikScript_Hofladenkirsche' => 'Hofladen (Kirsche)',
		'FabrikScript_HofladenPflaume' => 'Hofladen (Pflaume)',
		'FabrikScript_HofladenRotkohl' => 'Hofladen (Rotkohl)',
		'FabrikScript_Hofladensalat' => 'Hofladen (Salat)',
		'FabrikScript_Hofladentomaten' => 'Hofladen (Tomate)',
		'FabrikScript_Blumenkohlzucht' => 'Gewächshaus (Blumenkohl)',
		'FabrikScript_Rotkohlzucht' => 'Gewächshaus (Rotkohl)',
		'FabrikScript_Salatzucht' => 'Gewächshaus (Salat)',
		'FabrikScript_Tomatenzucht' => 'Gewächshaus (Tomate)',
		'FabrikScript_Lager_Papier' => 'Palettenlager',
		'FabrikScript_Lager_Karton' => 'Palettenlager',
		'FabrikScript_Lager_Leerpaletten' => 'Palettenlager',
		'FabrikScript_Lager_Apfel' => 'Palettenlager',
		'FabrikScript_Lager_Birne' => 'Palettenlager',
		'FabrikScript_Lager_Blumenkohl' => 'Palettenlager',
		'FabrikScript_Lager_Kirsche' => 'Palettenlager',
		'FabrikScript_Lager_Pflaume' => 'Palettenlager',
		'FabrikScript_Lager_Bierkasten' => 'Palettenlager',
		'FabrikScript_Lager_Bierfass' => 'Palettenlager',
		'FabrikScript_Lager_Zucker' => 'Palettenlager',
		'FabrikScript_Lager_Mehl' => 'Palettenlager',
		'FabrikScript_Lager_Milch' => 'Palettenlager',
		'FabrikScript_Lager_Butter' => 'Palettenlager',
		'FabrikScript_Lager_Quark' => 'Palettenlager',
		'FabrikScript_Lager_Sahne' => 'Palettenlager',
		'FabrikScript_Lager_Yogurt' => 'Palettenlager',
		'FabrikScript_Lager_Salat' => 'Palettenlager',
		'FabrikScript_Lager_Brot' => 'Palettenlager',
		'FabrikScript_Lager_kartoffelsack' => 'Palettenlager',
		'FabrikScript_Lager_Chips' => 'Palettenlager',
		'FabrikScript_Lager_pommes' => 'Palettenlager',
		'FabrikScript_Lager_washedPotato' => 'Palettenlager',
		'FabrikScript_Lager_oel' => 'Palettenlager',
		'FabrikScript_Lager_Wurst' => 'Palettenlager',
		'FabrikScript_Lager_Fleisch' => 'Palettenlager',
		'FabrikScript_Pellets_Fabrik' => 'Pelletfabrik',
		'Storage_storage1' => 'Hofsilo',
		'onMap' => 'Landschaft',
		'HayLoftPlaceable' => 'Wurzelfruchtlager (platzierbar)',
		'FabrikScript_Schlachterei' => 'Schlachter',
		'Animals_cow' => 'Kuhstall',
		'Animals_pig' => 'Schweinestall',
		'Animals_sheep' => 'Schafweide',
		'fuelStation_Tankstelle_Raffinerie' => 'Tankstelle Raffinerie',
		'fuelStation_Hoftankstelle' => ' Hoftankstelle',
		'fuelStation_Tankstelle_BGA_Nord' => 'Tankstelle BGA Nord',
		'fuelStation_Tankstelle_BGA_Sued' => 'Tankstelle BGA süd' 
) );
