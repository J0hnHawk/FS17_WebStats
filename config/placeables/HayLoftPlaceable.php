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
if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

/**
 * PLANNED BUT NOT YET REALIZED !!!
 * 
 * Code below is still in savegame.php and in this file totaly useless.
 * 
 */

$mapconfig = array_merge ( $mapconfig, array (
		'HayLoftPlaceable' => array (
				'position' => '-550 0 750',
				'showInProduction' => false,
				'isBuildinStorage' => true,
				'rawMaterial' => array (),
				'product' => array () 
		) 
) );
$lang = array_merge ( $lang, array (
		'HayLoftPlaceable' => 'Wurzelfruchtlager (platzierbar)' 
) );
