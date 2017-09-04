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

if (empty ( $mapconfig ) || ! is_array ( $mapconfig )) {
	$mapconfig = array ();
}

$mapconfig = array_merge ( $mapconfig, array (
		'Animals_cow' => array (
				'ProdPerHour' => 0,
				'position' => '0 0 0',
				'showInProduction' => false,
				'rawMaterial' => array (),
				'product' => array (
						'milk' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillType' => 'milk',
								'showInStorage' => true 
						),
						'manureFillLevel' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'manure',
								'showInStorage' => true 
						),
						'liquidManureFillLevel' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'liquidManure',
								'showInStorage' => true 
						) 
				) 
		),
		'Animals_pig' => array (
				'ProdPerHour' => 0,
				'position' => '0 0 0',
				'showInProduction' => false,
				'rawMaterial' => array () 
		),
		'Animals_sheep' => array (
				'ProdPerHour' => 0,
				'position' => '570 0 -19',
				'showInProduction' => false,
				'rawMaterial' => array (
						'grass_windrowdryGrass_windrow' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'grass_windrow dryGrass_windrow',
								'showInStorage' => false 
						),
						'water' => array (
								'capacity' => 0,
								'factor' => 0,
								'fillTypes' => 'water',
								'showInStorage' => false 
						) 
				),
				'product' => array (
						'woolPallet' => array (
								'capacity' => 2000,
								'factor' => 0,
								'fillType' => 'woolPallet',
								'palettPlaces' => 8,
								'showInStorage' => false 
						) 
				) 
		) 
) );