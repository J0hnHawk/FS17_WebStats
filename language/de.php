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
		'grass_windrow' => 'Grass' 
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
		'brotpalette' => 'Brot Palette' 
) );

// Ballen
$lang = array_merge ( $lang, array (
		'baleStraw240' => 'Strohballen',
		'baleHay240' => 'Heuballen',
		'baleGrass240' => 'Grasballen'
) );
