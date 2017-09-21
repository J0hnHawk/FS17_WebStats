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
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

// Kartendaten laden
$default = current($plants);
$object = GetParam ( 'object', 'G', $default['i3dName']);
$l_object = translate ( $object );

// Ware vorhanden?
if(!isset($plants [$l_object])) {
	$object = 'FabrikScript_Oel_Raffinerie_Raps';
	$l_object = translate ( $object );
}

uksort($plants, "strnatcasecmp");
$smarty->assign('selectedPlant', $object);
$smarty->assign('plantName', $l_object);
$smarty->assign('plants', $plants);

