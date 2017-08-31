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
// Kartendaten laden
require ('./include/savegame.php');
$object = GetParam('object', 'G');

// Übersichtskarte
$linkToImage = "./server/map29/pda_map_H.jpg";
$imageSize = 512;
$mapSize = 2048;
$mapSizeHalf = $mapSize / 2.0;
$machineIconSize = 10;
$backgroundColor = "#4dafd7";
$i = 0;
$mapEntries = array();

// Ware vorhanden?
if (is_array($object)) {
    $object = 'Brot';
}

// Warengruppe
$l_object = translate($object);
$smarty->assign('l_object', $l_object);
if ($commodities[$l_object]['isCombine']) {
    $combineCommodities = array();
    foreach ($mapconfig as $plantName => $plant) {
        foreach ($plant['rawMaterial'] as $combineFillType => $data) {
            if (translate($combineFillType) == $l_object) {
                $fillTypes = explode(' ', $data['fillTypes']);
                foreach ($fillTypes as $fillType) {
                    $l_fillType = translate($fillType);
                    $combineCommodities[$l_fillType] = $l_fillType;
                }
            }
        }
    }
    ksort($combineCommodities);
} else {
    $combineCommodities = false;
}
$smarty->assign('combineCommodities', $combineCommodities);
$smarty->assign('commodities', $commodities);

// Warenbedarf ermitteln
$demand = array();
$demandSum = 0;
foreach ($plants as $plantName => $plant) {
    foreach ($plant['input'] as $fillTypeName => $fillTypeDetails) {
        if ($commodities[$l_object]['isCombine']) {
            if ($fillTypeName == $l_object) {
                $demandValue = $fillTypeDetails['fillMax'] - $fillTypeDetails['fillLevel'];
                if ($options['storage']['hideZero'] && $demandValue == 0) {
                    continue;
                } else {
                    $demandSum += $demandValue;
                    $demand[$plantName] = $demandValue;
//                     $i ++;
//                     list ($x, $y, $z) = explode(' ', $plant['position']);
//                     $x = ($x + $mapSizeHalf) / ($mapSize / $imageSize);
//                     $z = ($z + $mapSizeHalf) / ($mapSize / $imageSize);
//                     $x = intval($x - ($machineIconSize - 1) / 2);
//                     $z = intval($z - ($machineIconSize - 1) / 2);
//                     $mapEntries[$i] = array(
//                         'name' => $plantName,
//                         'xpos' => $x,
//                         'zpos' => $z,
//                         'icon' => 'placeholder-tool.png'
//                     );
                }
            }
        } else {
            $fillTypes = $mapconfig[$plant['i3dName']]['rawMaterial'][$fillTypeDetails['i3dName']]['fillTypes'];
            $fillTypes = explode(' ', $fillTypes);
            foreach ($fillTypes as $fillType) {
                if ($l_object == translate($fillType)) {
                    $demandValue = $fillTypeDetails['fillMax'] - $fillTypeDetails['fillLevel'];
                    if ($options['storage']['hideZero'] && $demandValue == 0) {
                        continue;
                    } else {
                        $demandSum += $demandValue;
                        $demand[$plantName] = $demandValue;
//                         $i ++;
//                         list ($x, $y, $z) = explode(' ', $plant['position']);
//                         $x = ($x + $mapSizeHalf) / ($mapSize / $imageSize);
//                         $z = ($z + $mapSizeHalf) / ($mapSize / $imageSize);
//                         $x = intval($x - ($machineIconSize - 1) / 2);
//                         $z = intval($z - ($machineIconSize - 1) / 2);
//                         $mapEntries[$i] = array(
//                             'name' => $plantName,
//                             'xpos' => $x,
//                             'zpos' => $z,
//                             'icon' => 'placeholder-tool.png'
//                         );
                    }
                }
            }
        }
    }
}
arsort($demand);
$smarty->assign('demand', $demand);
$smarty->assign('demandSum', $demandSum);
foreach ($positions['FillablePallet'] as $fillType => $items) {
    if ($fillType == $l_object) {
        foreach ($items as $position) {
            $i ++;
            $x = ($position[0] + $mapSizeHalf) / ($mapSize / $imageSize);
            $z = ($position[2] + $mapSizeHalf) / ($mapSize / $imageSize);
            $x = intval($x - ($machineIconSize - 1) / 2);
            $z = intval($z - ($machineIconSize - 1) / 2);
            $icon = "tool.png";
            $iconHover = "tool_selected.png";
            $mapEntries[$i] = array(
                'name' => 'Palette',
                'xpos' => $x,
                'zpos' => $z,
                'icon' => $icon
            );
        }
    }
}
foreach ($positions['Bale'] as $fillType => $items) {
    if ($fillType == $l_object) {
        foreach ($items as $position) {
            $i ++;
            $x = ($position[0] + $mapSizeHalf) / ($mapSize / $imageSize);
            $z = ($position[2] + $mapSizeHalf) / ($mapSize / $imageSize);
            $x = intval($x - ($machineIconSize - 1) / 2);
            $z = intval($z - ($machineIconSize - 1) / 2);
            $icon = "tool.png";
            $iconHover = "tool_selected.png";
            $mapEntries[$i] = array(
                'name' => 'Ballen',
                'xpos' => $x,
                'zpos' => $z,
                'icon' => $icon
            );
        }
    }
}
$smarty->assign('linkToImage', $linkToImage);
$smarty->assign('backgroundColor', $backgroundColor);
$smarty->assign('machineIconSize', $machineIconSize);
$smarty->assign('mapEntries', $mapEntries);
