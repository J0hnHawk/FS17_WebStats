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
// Preisanalyse
if ($location == 'TipTrigger_SUPERMARKT1') {
	foreach ( $object->stats as $milk_stats ) {
		if (strval ( $milk_stats ['fillType'] ) != 'milch') {
			continue;
		}
		$logfile = file ( 'price.log' );
		$lastline = explode ( ';', trim ( $logfile [sizeof ( $logfile ) - 1] ) );
		$logarray = array (
				$dayTime,
				$milk_stats ['received'],
				$milk_stats ['paid'],
				$milk_stats ['isInPlateau'],
				$milk_stats ['nextPlateauNumber'],
				$milk_stats ['meanValue'],
				$milk_stats ['plateauDuration'],
				$milk_stats ['plateauTime'],
				$milk_stats->curveBaseCurve ['amplitudeDistribution'],
				$milk_stats->curveBaseCurve ['periodDistribution'],
				$milk_stats->curveBaseCurve ['nominalAmplitude'],
				$milk_stats->curveBaseCurve ['nominalAmplitudeVariation'],
				$milk_stats->curveBaseCurve ['nominalPeriod'],
				$milk_stats->curveBaseCurve ['nominalPeriodVariation'],
				$milk_stats->curveBaseCurve ['amplitude'],
				$milk_stats->curveBaseCurve ['period'],
				$milk_stats->curveBaseCurve ['time'],
				$milk_stats->curve1 ['amplitudeDistribution'],
				$milk_stats->curve1 ['periodDistribution'],
				$milk_stats->curve1 ['nominalAmplitude'],
				$milk_stats->curve1 ['nominalAmplitudeVariation'],
				$milk_stats->curve1 ['nominalPeriod'],
				$milk_stats->curve1 ['nominalPeriodVariation'],
				$milk_stats->curve1 ['amplitude'],
				$milk_stats->curve1 ['period'],
				$milk_stats->curve1 ['time'] 
		);
		$newline = false;
		foreach ( $logarray as $key => $value ) {
			$logarray [$key] = str_replace ( '.', ',', $value );
			if ($logarray [$key] != $lastline [$key]) {
				$newline = true;
			}
		}
		if ($newline) {
			$logrow = '';
			foreach ( $logarray as $value ) {
				$logrow .= "$value;";
			}
			$fp = fopen ( 'price.log', 'a' );
			fwrite ( $fp, $logrow . "\r\n" );
			fclose ( $fp );
		}
	}
}
