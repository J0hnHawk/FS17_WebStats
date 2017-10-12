<?php
// Serverkonfiguration laden - wenn nicht vorhanden Instalation starten
$configFile = './config/server.conf';
if (file_exists ( $configFile )) {
    $server = file ( $configFile );
    $serverConfig = unserialize ( $server [0] );
    list ( $dSrvIp, $dSrvPort, $dSrvCode, $savegame, $isDediServer, $mapPath ) = $serverConfig;
    if ($mapPath == '') {
        $mapPath = 'nfmarsch29';
    }
    $smarty->assign ( 'isDediServer', $isDediServer );
} else {
    define ( 'IN_INSTALL', true );
    include ('./include/install.php');
    exit ();
}

// Kartendetails laden
list ( $mapName, $mapShort, $mapVersion, $mapLink, $mapCopyright, $mapSize) = file ( "./config/$mapPath/map.txt" );

$map = array (
    'Name' => $mapName,
    'Path' => $mapPath,
    'Short' => $mapShort,
    'Version' => $mapVersion,
    'Link' => $mapLink,
    'Copyright' => $mapCopyright,
    'Size' => $mapSize,
);
$smarty->assign ( 'map', $map );
require ("./config/$mapPath/mapconfig.php");
if (! file_exists ( "./config/$mapPath/translation/{$_SESSION ['language']}.php" )) {
    require ("./config/$mapPath/translation/$defaultLanguage.php");
} else {
    require ("./config/$mapPath/translation/{$_SESSION ['language']}.php");
}
$lang = array_merge ( $lang, getVehicleNames () );

// load installed placeables 
$placeableObjects = array();
foreach (glob('./config/placeables/*.xml') as $filename) {
    $placeable = simplexml_load_file($filename);
    foreach ($placeable->item as $item) {
        $className = strval($item['className']);
        $placeableObjects = array_merge($placeableObjects, array(
            $className => array()
        ));
        foreach ($item->attributes() as $attribute => $value) {
            if ($attribute != 'className') {
                $placeableObjects[$className][$attribute] = get_bool($value);
            }
        }
        foreach ($item->children() as $childName => $childData) {
            if (empty($placeableObjects[$className][$childName]) || ! is_array($placeableObjects[$className][$childName])) {
                $placeableObjects[$className][$childName] = array();
            }
            $fillType = strval($childData['Name']);
            $placeableObjects[$className][$childName][$fillType] = array();
            foreach ($childData->attributes() as $attribute => $value) {
                if ($attribute != 'Name') {
                    $placeableObjects[$className][$childName][$fillType][$attribute] = get_bool($value);
                }
            }
        }
    }
    $placeablesLang = array();
    foreach ($placeable->l10n->text as $text) {
        $key = strval($text['name']);
        $value = strval($text->$_SESSION ['language']);
        $placeablesLang = array_merge($lang, array(
            $key => $value
        ));
    }
}