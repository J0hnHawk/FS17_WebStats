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
if (! defined('IN_NFMWS')) {
    exit();
}

foreach ($object->FillLevel as $row) {
    $fillTypeId = strval($row['fillType']);
    $configData = $mapconfig[$location]['FillLevel'][$fillTypeId];
    $fillType = $configData['fillType'];
    $fillLevel = getPositiveInt($row['Lvl']);
    if ((isset($configData['showInStorage']) && $configData['showInStorage'] != false) || ! isset($configData['showInStorage'])) {
        addCommodity($fillType, $fillLevel, $location);
    }
}
// Variables:
// $object = the in savegame.php actually loades XML object from savegame vehicles
// $mapconfig = all defined objects on the map
    
    