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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
ksort ( $prices );
foreach ( $prices as $fillType => $fillTyleData ) {
	ksort ( $prices [$fillType] ['locations'] );
}
$smarty->assign('prices', $prices);
ksort($tipTrigger);
$smarty->assign('tipTrigger', $tipTrigger);

/*
$prices = array ();
$locations = array (
		'Bga',
		'TipTrigger_BIOGAS',
		'TipTrigger_BAHNHOF',
		'TipTrigger_DEPOT',
		'TipTrigger_GETREIDEHANDEL',
		'TipTrigger_HAFEN',
		'TipTrigger_HEIZWERK',
		'TipTrigger_WOLLEVERKAUF',
		'TipTrigger_WOLLEVERKAUF1',
		'TipTrigger_RAIFFEISEN',
		'TipTrigger_SAWMILL',
		'TipTrigger_STADION',
		'TipTrigger_WINDROW_SALE',
		'TipTrigger_SUPERMARKT',
		'TipTrigger_SUPERMARKT1',
		'TipTrigger_BANK' 
);
$fillTypes = array (
		'wheat',
		'barley',
		'rape',
		'sunflower',
		'soybean',
		'maize',
		'potato',
		'sugarBeet',
		'manure',
		'liquidManure',
		'wool',
		'woodChips',
		'silage',
		'straw',
		'grass_windrow',
		'dryGrass_windrow',
		'oat',
		'rye',
		'hops',
		'compost',
		'mehl',
		'zucker',
		'brot',
		'backwaren',
		'kuchen',
		'beer',
		'beerf',
		'emptypallet',
		'milch',
		'sahne',
		'butter',
		'quark',
		'yogurt',
		'papier',
		'karton',
		'apfel',
		'birne',
		'kirsche',
		'pflaume',
		'oel',
		'kartoffelsack',
		'chips',
		'pommes',
		'fisch',
		'krabben',
		'korn',
		'obstler',
		'pellets',
		'washedPotato',
		'sausage',
		'meat',
		'geld',
		'tomaten',
		'blumenkohl',
		'rotkohl',
		'salat',
		'stoffrolleMK' 
);
$statsVars = array (
		'fillType',
		'received',
		'paid',
		'isInPlateau',
		'nextPlateauNumber',
		'meanValue',
		'plateauDuration',
		'plateauTime' 
);
$curveVars = array (
		'amplitudeDistribution',
		'periodDistribution',
		'nominalAmplitude',
		'nominalAmplitudeVariation',
		'nominalPeriod',
		'nominalPeriodVariation',
		'amplitude',
		'period',
		'time' 
);
function tableHead($location) {
	global $statsVars, $curveVars;
	$string = '';
	$string .= "<h1>$location</h1><table border=\"1\"><tr><th>price</th>";
	foreach ( $statsVars as $var ) {
		$string .= "<th>$var</th>";
	}
	foreach ( $curveVars as $var ) {
		$string .= "<th>$var</th>";
	}
	foreach ( $curveVars as $var ) {
		$string .= "<th>$var</th>";
	}
	$string .= "</tr><tr>";
	return $string;
}
$output = $fullOutput = '';
foreach ( $careerVehicles->onCreateLoadedObject as $trigger ) {
	$location = strval ( $trigger ['saveId'] );
	if (strstr ( $location, 'TipTrigger' ) !== false || $location == "Bga") {
		$prices [$location] = array ();
		
		$fullOutput .= tableHead ( $location );
		
		$foreach = $trigger->stats;
		if ($location == 'Bga') {
			$foreach = $trigger->tipTrigger->stats;
		}
		foreach ( $foreach as $triggerStats ) {
			$curveBaseCurve = $triggerStats->curveBaseCurve;
			$curve1 = $triggerStats->curve1;
			$sin1 = floatval ( $curveBaseCurve ['amplitude'] ) * sin ( (2 * pi () / floatval ( $curveBaseCurve ['period'] )) * floatval ( $curveBaseCurve ['time'] ) );
			$sin2 = floatval ( $curve1 ['amplitude'] ) * sin ( (2 * pi () / floatval ( $curve1 ['period'] )) * floatval ( $curve1 ['time'] ) ) + floatval ( $curve1 ['nominalAmplitude'] ) * 10;
			$price = intval ( ($sin1 + $sin2) * 1000 );
			$prices [$location] [strval ( $triggerStats ['fillType'] )] = $price;
			$fullOutput .= "<th>$price</th>";
			foreach ( $statsVars as $var ) {
				$fullOutput .= '<td>' . $triggerStats [$var] . '</td>';
			}
			foreach ( $curveVars as $var ) {
				$fullOutput .= "<td>$curveBaseCurve[$var]</td>";
			}
			foreach ( $curveVars as $var ) {
				$fullOutput .= "<td>$curve1[$var]</td>";
			}
			$fullOutput .= "</tr>";
		}
		$fullOutput .= "</table>";
	}
}
$output = '<table border="1"><tr><th>location</th>';
foreach ( $locations as $location ) {
	$location = ltrim ( $location, 'TipTrigger_' );
	$output .= "<th  style=\"min-width: 80px;  max-width: 80px;  overflow: hidden;\">$location</th>";
}
$output .= '</tr>';
foreach ( $fillTypes as $fillType ) {
	$output .= "<tr><th>$fillType</td>";
	foreach ( $locations as $location ) {
		if (isset ( $prices [$location] [$fillType] )) {
			$output .= "<td style=\"text-align: right;\">{$prices[$location][$fillType]}</td>";
		} else {
			$output .= "<td>&nbsp;</td>";
		}
	}
	$output .= "</tr>";
}
$output .= '</table>';
echo ($output);
// echo ($fullOutput);
exit ();
*/