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

/**
 * This File is for Maps with activated grassSilageMod which offers the possibility to choose if you want fermenting
 * chaff to silage or raw grass silage to grass silage.
 * 
 * For using you have to change all bunker in configutation from
 * 	<item name="name_of_bunker" locationType="bunker" position="x 0 z" />
 * to
 * 	<item name="name_of_bunker" locationType="extraFilePHP" scriptFile="grassSilageMod.php" position="x 0 z" />
 */

$state = intval($object['state']);
$fillLevel = intval($object['fillLevel']);
if (isset($object['inputfilltype'])) {
	$siloFillType=array('grassilageraw','grassilage');
} else {
	$siloFillType=array('chaff','silage');
}
if ($state < 2) {
	$fillType = $siloFillType[0];
} else {
	$fillType = $siloFillType[1];
}
addCommodity($fillType, $fillLevel, $location);

   