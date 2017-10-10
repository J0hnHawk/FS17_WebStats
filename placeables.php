<?php

/**
 * PLANNED BUT NOT YET REALIZED !!!
 *
 * Code below is still under development.
 *
 */


function get_bool($value)
{
    $value = strval($value);
    switch (strtolower($value)) {
        case 'true':
            return true;
        case 'false':
            return false;
        default:
            if (is_numeric($value)) {
                return $value + 0;
            }
    }
    return $value;
}
foreach (glob('./config/placeables/*.xml') as $filename) {
    $placeable = simplexml_load_file($filename);
    if (empty($mapconfig) || ! is_array($mapconfig)) {
        $mapconfig = array();
    }
    foreach ($placeable->item as $item) {
        $className = strval($item['className']);
        $mapconfig = array_merge($mapconfig, array(
            $className => array()
        ));
        foreach ($item->attributes() as $attribute => $value) {
            if ($attribute != 'className') {
                $mapconfig[$className][$attribute] = get_bool($value);
            }
        }
        foreach ($item->children() as $childName => $childData) {
            if (empty($mapconfig[$className][$childName]) || ! is_array($mapconfig[$className][$childName])) {
                $mapconfig[$className][$childName] = array();
            }
            $fillType = strval($childData['Name']);
            $mapconfig[$className][$childName][$fillType] = array();
            foreach ($childData->attributes() as $attribute => $value) {
                if ($attribute != 'Name') {
                    $mapconfig[$className][$childName][$fillType][$attribute] = get_bool($value);
                }
            }
        }
    }
}
var_dump($mapconfig);
