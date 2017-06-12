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
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['storage'] ['sortByName'] = filter_var ( GetParam ( 'sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['hideZero'] = filter_var ( GetParam ( 'hideZero', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['showVehicles'] = filter_var ( GetParam ( 'showVehicles', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['onlyPallets'] = filter_var ( GetParam ( 'onlyPallets', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}

// Kartendaten laden
require ('./include/savegame.php');

$smarty->assign ( 'commodities', $commodities );
$smarty->assign ( 'outOfMap', $outOfMap );
$smarty->assign ( 'options', $options ['storage'] );
