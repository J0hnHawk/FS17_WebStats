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

if (! defined ( 'IN_NFMWS' ) && ! defined ( 'IN_INSTALL' )) {
	exit ();
}

function getMaxForage($forage, $numAnimals) {
	return $forage * ($numAnimals > 0 && $numAnimals < 15 ? 15 : $numAnimals) * 6;
}
function getAnimalProductivity($location, $tipTriggers) {
	if (strpos ( $tipTriggers, 'water' ) === false) {
		return 0;
	}
	global $animals;
	switch ($location) {
		case 'Animals_sheep' :
			if (strpos ( $tipTriggers, 'grass_windrow_dryGrass_windrow' ) !== false) {
				return 100;
			}
			return 10;
			break;
		case 'Animals_pig' :
		case 'Animals_cow' :
			$productivity = 0;
			foreach ( $animals [$location]['productivity'] as $trigger => $value ) {
				if (strpos ( $tipTriggers, $trigger ) !== false) {
					$productivity += $value;
				}
			}
			return $productivity;
			break;
	}
}
$animals = array (
		'Animals_cow' => array (
				'reproRate' => 1199,
				'input' => array (
						'water' => 35,
						'straw' => 70,
						'grass_windrow' => 70,
						'silage_dryGrass_windrow' => 275,
						'powerFood' => 105
				),
				'output' => array (
						'milk' => 696,
						'manure' => 200,
						'liquidManure' => 250
				),
				'productivity' => array (
						'straw' => 10,
						'grass_windrow' => 18,
						'silage_dryGrass_windrow' => 45,
						'powerFood' => 27
				)
		),
		'Animals_pig' => array (
				'reproRate' => 143,
				'input' => array (
						'water' => 10,
						'straw' => 20,
						'maize_pigFood' => 45,
						'wheat_barley_pigFood' => 22,
						'rape_sunflower_soybean_pigFood' => 18,
						'potato_sugarBeet_pigFood' => 5
				),
				'output' => array (
						'manure' => 50,
						'liquidManure' => 65
				),
				'productivity' => array (
						'straw' => 9.8,
						'maize_pigFood' => 44.8,
						'wheat_barley_pigFood' => 22.8,
						'rape_sunflower_soybean_pigFood' => 17.8,
						'potato_sugarBeet_pigFood' => 4.8
				)
		),
		'Animals_sheep' => array (
				'reproRate' => 959,
				'input' => array (
						'water' => 15,
						'grass_windrow_dryGrass_windrow' => 30
				),
				'output' => array ()
		)
);
