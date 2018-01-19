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
define('IN_NFMWS', true);
$map = 'goldcrestValley';
include ("../config/$map/mapconfig.php");
include ('../include/functions.php');

echo("<h4>Loading map from folder '$map'</h4>");

/**
 * PLANNED BUT NOT YET REALIZED !!!
 *
 * Code below is still under development.
 */

$xml_mapconfig = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><mapconfig></mapconfig>');

// Loop through all locations
foreach ($mapconfig as $location => $locationData) {
    // Create an entry for each locations
    $mapItem = $xml_mapconfig->addChild('item');
    // Add the location name as attribute
    $mapItem->addAttribute('name', $location);
    // Loop through all elements of a location
    foreach ($locationData as $key1 => $value1) {
        // Check if element is an array
        if (is_array($value1)) {
            // Then loop trough these elements
            foreach ($value1 as $key2 => $value2) {
                // SubItem could be 'input', 'output' or 'productivity'
                $mapSubItem = $mapItem->addChild($key1);
                // Add the fillType as attribute
                $mapSubItem->addAttribute('name', $key2);
                // Check if SubItem is productivity
                if ($key1 != 'productivity') {
                    // No, then loop through all fillType attributes
                    foreach ($value2 as $key3 => $value3) {
                        if(is_bool($value3)===true) {
                            if($value3) {
                                $value3 = 'true';
                            } else {
                                $value3 = 'false';
                            }
                        }
                        $mapSubItem->addAttribute("$key3", htmlspecialchars("$value3"));
                    }
                } else {
                    // Yes, then only add the factor
                    $mapSubItem->addAttribute("factor", htmlspecialchars("$value2"));
                }
            }
        } else {
            // Add more location attributes
            if(is_bool($value1)===true) {
                if($value1) {
                    $value1 = 'true';
                } else {
                    $value1 = 'false';
                }
            }
            $mapItem->addAttribute("$key1", htmlspecialchars("$value1"));
        }
    }
}
$result = $xml_mapconfig->asXML("./xml/mapconfg.xml");
if($result) echo("<p>/xml/mapconfg.xml saved</p>");

$xml_mapconfig = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><mapconfig></mapconfig>');
include ("../config/$map/translation/de.php");
$l10n = $xml_mapconfig->addChild('l10n');
foreach($lang as $text => $translation) {
	$l10nText = $l10n->addChild('text');
	$l10nText->addAttribute('name', htmlspecialchars("$text"));
	$l10nText->de = htmlspecialchars(translate($text));	
}
$result = $xml_mapconfig->asXML("./xml/translations.xml");
if($result) echo("<p>/xml/translations.xml saved</p>");

