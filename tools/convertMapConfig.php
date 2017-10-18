<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
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

include ('../config/nfmarsch30/mapconfig.php');

/**
 * PLANNED BUT NOT YET REALIZED !!!
 *
 * Code below is still under development.
 *
 */

$xml_mapconfig = new SimpleXMLElement('<?xml version="1.0"?><mapconfig></mapconfig>');

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
                        $mapSubItem->addAttribute("$key3", htmlspecialchars("$value3"));
                    }
                } else {
                    // Yes, then only add the factor
                    $mapSubItem->addAttribute("factor", htmlspecialchars("$value2"));
                }
            }
        } else {
            // Add more location attributes 
            $mapItem->addAttribute("$key1", htmlspecialchars("$value1"));
        }
    }
}

$result = $xml_mapconfig->asXML('mapconfig.xml');
