<?php
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
		/*'meanValue',
		'plateauDuration',*/
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
			$sin2 = floatval ( $curve1 ['amplitude'] ) * sin ( (2 * pi () / floatval ( $curve1 ['period'] )) * floatval ( $curve1 ['time'] ) );
			$price = intval ( ($sin1 + $sin2 + (floatval ( $curveBaseCurve ['nominalAmplitude'] ) + floatval ( $curve1 ['nominalAmplitude'] )) * 3.3333333) * 1000 );
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
foreach ( $fillTypes as $fillType ) {
	$output .= "<th  style=\"min-width: 42px;  max-width: 42px;  overflow: hidden;\">$fillType</th>";
}
$output .= '</tr>';
foreach ( $locations as $location ) {
	$output .= "<tr><th>$location</td>";
	foreach ( $fillTypes as $fillType ) {
		if (isset ( $prices [$location] [$fillType] )) {
			$output .= "<td style=\"text-align: right;\">{$prices[$location][$fillType]}</td>";
		} else {
			$output .= "<td>&nbsp;</td>";
		}
	}
	$output .= "</tr>";
}
$output .= '</table>';
//echo ($output);
echo ($fullOutput);
exit ();