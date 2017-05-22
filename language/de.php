<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (empty ( $lang ) || ! is_array ( $lang )) {
	$lang = array ();
}
// Fruchtsorten
$lang = array_merge ( $lang, array (
		'wheat' => 'Weizen',
		'barley' => 'Gerste',
		'rape' => 'Raps',
		'sunflower' => 'Sonnenblumen',
		'soybean' => 'Sojabohnen',
		'maize' => 'Körnermais',
		'forage' => 'Mischration',
		'chaff' => 'Häckselgut',
		'woodChips' => 'Hackschnitzel',
		'silage' => 'Silage',
		'straw' => 'Stroh',
		'hops' => 'Hopfen',
		'oat' => 'Hafer',
		'dryGrass_windrow' => 'Heu',
		'rye' => 'Roggen',
		'compost' => 'Kompost',
		'grass_windrow' => 'Gras',
		'potato' => 'Kartoffeln',
		'sugarBeet' => 'Zuckerrüben'
) );

// Paletten
$lang = array_merge ( $lang, array (
		'palettepapier' => 'Palette Papier',
		'palette_karton' => 'Palette Karton',
		'emptypallet' => 'Leere Paletten',
		'Apfelpalette' => 'Apfelpalette',
		'palette_apfel' => 'Apfelpalette',
		'Birnenpalette' => 'Birnenpalette',
		'palette_birne' => 'Birnenpalette',
		'Kirschpalette' => 'Kirschpalette',
		'palette_kirsche' => 'Kirschpalette',
		'Pflaumenpalette' => 'Pflaumenpalette',
		'palette_pflaume' => 'Pflaumenpalette',
		'bierpalettekasten' => 'Bierpalette Kasten',
		'bierpalettefass' => 'Bierpalette Fass',
		'palettezucker' => 'Zucker Palette',
		'zuckerpalette' => 'Zucker Palette',
		'mehlpalette' => 'Mehl Palette',
		'palettemilch' => 'Palette Milch',
		'palettebutter' => 'Palette Butter',
		'palettequark' => 'Palette Quark',
		'paletteyogurt' => 'Palette Joghurt',
		'palettesahne' => 'Palette Sahne',
		'woolPallet' => 'Wollpalette',
		'brotpalette' => 'Brot Palette',
		'palettebrod' => 'Brot Palette',
		'boardPallet' => 'Bretter Paletten',
		'palletPallet' => 'Leere Paletten',
		'palettemehlgerste1' => 'Mehl Palette',
		'palettemehlroggen1' => 'Mehl Palette',
		'palettemehlweizen1' => 'Mehl Paletten',
		'palettespeiseoel' => 'Palette Speiseöl',
		'washedPotato' => 'gewaschene Kartoffeln',
		'palettekartoffelsack' => 'Palette Kartoffelsäcke',
		'palettechips' => 'Palette Chips',
		'palettepommes' => 'Palette Pommes',
) );

// Ballen
$lang = array_merge ( $lang, array (
		'baleStraw240' => 'Strohballen',
		'baleHay240' => 'Heuballen',
		'baleGrass240' => 'Grasballen' 
) );

// Produktionsstätten
$lang = array_merge ( $lang, array (
		'seeds' => 'Saatgut',
		'grain' => 'Getreide',
		'fertilizer' => 'Dünger',
		'manure' => 'Mist',
		'liquidManure' => 'Gülle',
		'Stroh' => 'Stroh',
		'Gras' => 'Gras',
		'Silage' => 'Silage',
		'Mischfutter' => 'Mischfutter',
		'Tip_RS1' => 'Gärreste oder Gülle',
		'RS_compost1' => 'Kompost',
		'RM_Output2' => 'Wasser',
		'Tip_RSbarley' => 'Gerste',
		'cm_inputWaste' => 'Abfall',
		'cm_outputCompost' => 'Kompost',
		'Tip_RSrye' => 'Roggen',
		'Compost' => 'Kompost',
		'Tip_RSwater' => 'Wasser',
		'Tip_RSwheat' => 'Weizen',
		'boardwood' => 'Bretter Paletten',
		'Holz' => 'Holzstämme',
		'Tip_mehl' => 'Mehl Palette',
		'Brennstoffe' => 'Brennstoffe',
		'Tip_RSmilk' => 'Milch',
		'Tip_RSzucker' => 'Zuckerrüben',
		'Erdfruechten' => 'Erdfrüchte',
		'Getreide' => 'Getreide',
		'Proteine' => 'Proteeine',
		'Schweinefutter' => 'Schweinefutter',
		'Tip_RS' => 'Raps oder Sonnenblumen',
		'RS_compost' => 'Kompost',
		'RM_Output' => 'Diesel',
		'Hackschnitzel' => 'Hackschnitzel',
		'Diesel' => 'Diesel',
		'Kartoffeln' => 'Kartoffeln',
		'Wasser' => 'Wasser'
) );

// Produktionsstätten
$lang = array_merge ( $lang, array (
		'FabrikScript_Backerei' => 'Bäckerei',
		'FabrikScript_BrauereiFass' => 'Brauerei Fass',
		'FabrikScript_BrauereiKasten' => 'Brauerei Kasten',
		'FabrikScript_compostMaster2k17' => 'compostMaster 2k17',
		'FabrikScript_Duenger_Prod' => 'Dünerproduktion',
		'FabrikScript_Fabrik' => 'Sägewerk',
		'FabrikScript_GersteMehlfabrik' => 'Mehlfabrik (Gerste)',
		'FabrikScript_Holzhacker' => 'Holzhacker',
		'FabrikScript_Kartoffelfabrik' => 'Kartoffelfabrik',
		'FabrikScript_Klaerwerk' => 'Klärwerk',
		'FabrikScript_KraftFutterHerstellung' => 'Futterfabrik',
		'FabrikScript_Molkerei' => 'Molkerei',
		'FabrikScript_obst_apfel' => 'Obstfarm (Äpfel)',
		'FabrikScript_obst_birne' => 'Obstfarm (Birnen)',
		'FabrikScript_obst_kirsche' => 'Obstfarm (Kirschen)',
		'FabrikScript_obst_pflaume' => 'Obstfarm (Pflaumen)',
		'FabrikScript_Oel_Raffinerie_Raps' => 'Biodiesel Raffinerie',
		'FabrikScript_Paletten_Fabrik' => 'Palettenwerk',
		'FabrikScript_potatoWasher' => 'Kartoffelwaschanlage 1',
		'FabrikScript_potatoWasher2' => 'Kartoffelwaschanlage 2',		
		'FabrikScript_RoggenMehlfabrik' => 'Mehlfabrik (Roggen)',
		'FabrikScript_Saat_Prod' => 'Saatgutproduktion',
		'FabrikScript_Schweinefutterstation' => 'Schweinefutterstation',
		'FabrikScript_WeizenMehlfabrik' => 'Mehlfabrik (Weizen)',
		'FabrikScript_Zellstoff_Fabrik' => 'Zellstofffabrik',
		'FabrikScript_Zuckerfabrik' => 'Zuckerfabrik' 
) );
