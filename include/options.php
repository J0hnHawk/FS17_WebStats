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
$smarty->assign ( 'maps', getMaps() );

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['version'] = $cookieVersion;
	$options ['general'] ['reload'] = filter_var ( GetParam ( 'g_reload', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['sortByName'] = filter_var ( GetParam ( 's_sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['showVehicles'] = filter_var ( GetParam ( 's_showVehicles', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['onlyPallets'] = filter_var ( GetParam ( 's_onlyPallets', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['hideZero'] = filter_var ( GetParam ( 's_hideZero', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['production'] ['sortByName'] = filter_var ( GetParam ( 'p_sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['production'] ['sortFullProducts'] = filter_var ( GetParam ( 'p_sortFullProducts', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
	$newMap = GetParam('g_map', 'P');
	if(file_exists("./server/$newMap")) {
		$serverConfig[5] = $newMap;
		$fp = fopen('./server/server.conf', 'w');
		fwrite($fp, serialize($serverConfig));
		fclose($fp);
		header("Refresh:0");
	}
}
$smarty->assign ( 'options', $options );
