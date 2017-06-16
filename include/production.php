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

$hidePlant = GetParam ( 'hide', 'G', false );
if ($hidePlant && ! is_array ( $hidePlant )) {
	$plant = base64_decode ( $hidePlant );
	foreach ( $lang as $term => $translation ) {
		if ($translation == $plant) {
			$options ['production'] ['hidePlant'] [$plant] = true;
			$options ['version'] = $cookieVersion;
			setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
			break;
		}
	}
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['production'] ['sortByName'] = filter_var ( GetParam ( 'sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['production'] ['sortFullProducts'] = filter_var ( GetParam ( 'sortFullProducts', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$showPlant = GetParam ( 'showPlant', 'P', false );
	if ($showPlant && is_array ( $showPlant )) {
		foreach ( $showPlant as $plant ) {
			$plant = base64_decode ( $plant );
			if (isset ( $options ['production'] ['hidePlant'] [$plant] )) {
				unset ( $options ['production'] ['hidePlant'] [$plant] );
			}
		}
	}
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}
if(sizeof($options['production']['hidePlant'])>0) {
	foreach($plants as $plantName => $plant) {
		if (isset ( $options ['production'] ['hidePlant'] [$plantName] )) {
			unset($plants[$plantName]);
		}		
	}
}

if (! $options ['production'] ['sortByName']) {
	$sortName = array();
	foreach($plants as $plantName => $plant) {
		$sortName [] = strtolower ( $plantName );
		if ($options ['production'] ['sortFullProducts']) {
			$plantState = $plant['state'];
			foreach($plant['output'] as $output) {
				if($output['state'] > $plantState) {
					$plantState = $output['state'];
				}
			}
			$plants[$plantName]['state'] = $plantState;
		}
		$sortFillLevel [] = $plantState;
	}
	array_multisort ( $sortFillLevel, SORT_DESC, $sortName, SORT_ASC, $plants );
} else {
	uksort ( $plants, "strnatcasecmp" );
}

$smarty->assign ( 'plants', $plants );
$smarty->assign ( 'commodities', $commodities );
$smarty->assign ( 'options', $options ['production'] );
$smarty->registerPlugin ( "modifier", 'base64_encode', 'base64_encode' );
