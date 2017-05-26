<?php
class commodity {
	var $overall;
	var $storage;
	function farmStorage($value) {
		$this->farmStorage = $value;
		$this->overall += $value;
	}
	function pallets() {
	}
}
function addCommodity($fillType, $fillLevel, $location, $className = 'none') {
	global $commodities;
	if (! isset ( $commodities [$fillType] )) {
		$commodities [$fillType] = array (
				'overall' => $fillLevel 
		);
	} elseif (! isset ( $commodities [$fillType] [$location] )) {
		$commodities [$fillType] ['overall'] += $fillLevel;
		$commodities [$fillType] += array (
				$location => array (
						$className => 1,
						'fillLevel' => $fillLevel 
				) 
		);
	} else {
		$commodities [$fillType] ['overall'] += $fillLevel;
		$commodities [$fillType] [$location] [$className] ++;
		$commodities [$fillType] [$location] ['fillLevel'] += $fillLevel;
	}
}