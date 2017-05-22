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
		'palette_washedPotato' => 'gewaschene Kartoffeln',
		'palettekartoffelsack' => 'Palette Kartoffelsäcke',
		'palettechips' => 'Palette Chips',
		'palettepommes' => 'Palette Pommes',
		'palette_oel' => 'Palette Speiseöl',
		'Saatgut-BigBag' => 'Saatgut-BigBag',
		'Mineraldünger-BigBag' => 'Mineraldünger-BigBag',
		'fertilizerTank' => 'Flüssigdüngertank',
		
) );
/*
 *  <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerFertilizer.xml" position="228.50003051758 89.996101379395 -124.00000762939" rotation="3.141589641571 4.665778163826e-08 3.1415903568268" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerFertilizer.xml" position="228.49995422363 89.996109008789 -125.49995422363" rotation="-3.1415910720825 1.3113551176502e-05 3.1415901184082" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerSeeds.xml" position="216.99996948242 89.996101379395 -125.49998474121" rotation="3.1415922641754 5.4994302445266e-06 -3.141592502594" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerFertilizer.xml" position="-742.00006103516 99.999992370605 444.9992980957" rotation="3.1415901184082 0.0011270560789853 -3.1415867805481" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerSeeds.xml" position="219.00004577637 89.996101379395 -125.5" rotation="3.1415891647339 -2.1357930108934e-06 -3.141589641571" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerSeeds.xml" position="-744.00006103516 99.999992370605 445.00003051758" rotation="3.1415894031525 -7.5093521445524e-06 -3.141589641571" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerPigFood.xml" position="-737.99987792969 99.999992370605 444.99758911133" rotation="-3.1415865421295 -0.0042322035878897 -3.1415922641754" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerSeeds.xml" position="217 89.996109008789 -124" rotation="-3.1415920257568 3.6448823266255e-06 -3.1415917873383" fillLevel="1000"/>
    <item className="Placeable" filename="data/placeables/shelters/storageShelter01.xml" position="150 89.5 -75" rotation="0 1.570799946785 0" age="57" price="14000"/>
    <item className="FillablePallet" filename="data/objects/pallets/palletPoplar.xml" position="-734.10992431641 99.999984741211 444.94497680664" rotation="-3.141566991806 -0.0046518938615918 3.1415870189667" fillLevel="2000"/>
    <item className="Placeable" filename="data/placeables/shelters/vehicleShelter.xml" position="163 94 141" rotation="0 -1.570799946785 0" age="29" price="20000"/>
    <item className="FillablePallet" filename="data/objects/pallets/fertilizerTank.xml" position="222.69981384277 89.996101379395 -125.50006866455" rotation="-3.1415903568268 1.2322388101893e-05 3.1415894031525" fillLevel="2000"/>
    <item className="FillablePallet" filename="data/objects/pallets/fertilizerTank.xml" position="-740.0009765625 99.999992370605 445.00079345703" rotation="-3.1415872573853 0.0012125463690609 3.1415910720825" fillLevel="2000"/>
    <item className="Placeable" filename="data/placeables/shelters/storageShelter02.xml" position="70 95.5 55" rotation="0 1.570799946785 0" age="40" price="9000"/>
    <item className="SaplingPallet" filename="data/objects/pallets/treeSaplingPallet.xml" position="-736.02191162109 99.999984741211 444.99896240234" rotation="-3.1415667533875 -0.0017637652345002 3.1415920257568" fillLevel="20"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerSeeds.xml" position="218.99992370605 89.996101379395 -123.99996948242" rotation="3.1415891647339 4.1914790926967e-06 -3.1415905952454" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerFertilizer.xml" position="226.5001373291 89.996109008789 -123.99996948242" rotation="3.1415908336639 3.2313320843969e-05 3.1415901184082" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/bigBagContainer/bigBagContainerFertilizer.xml" position="226.49987792969 89.996101379395 -125.49995422363" rotation="3.1415865421295 6.6566744862939e-06 3.1415920257568" fillLevel="1000"/>
    <item className="FillablePallet" filename="data/objects/pallets/fertilizerTank.xml" position="222.69999694824 89.996101379395 -123.50002288818" rotation="3.1415901184082 4.7983003241825e-06 -3.1415898799896" fillLevel="2000"/>
    <item className="Placeable" filename="data/placeables/shelters/storageShelter02.xml" position="230 89.5 -120" rotation="0 0 0" age="57" price="9000"/>

 */
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
