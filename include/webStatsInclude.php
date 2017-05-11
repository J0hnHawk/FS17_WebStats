<?php
	/**
	 * Copyright (c) 2008-2013 GIANTS Software GmbH, Confidential, All Rights Reserved.
	 * Copyright (c) 2003-2013 Christian Ammann and Stefan Geiger, Confidential, All Rights Reserved.
	 */

	function loadFileHTTPSocket($domain, $port, $path, $timeout) {
		$fp = fsockopen($domain, $port, $errno, $errstr, $timeout);

		if ($fp) {
			// Make request
			$out = "GET ". $path . " HTTP/1.0\r\n";
			$out .= "Host: ". $domain . "\r\n";
			$out .= "Connection: Close\r\n\r\n";
			fwrite($fp, $out);

			// Get response
			$resp = "";
			while (!feof($fp)) {
				$resp .= fgets($fp, 256);
			}
			fclose($fp);
			
			// Check status is 200
			if(preg_match("/HTTP\/1\.\d\s(\d+)/", $resp, $matches) && $matches[1] == 200) {   
				// Load xml as object
				$parts = explode("\r\n\r\n", $resp);
				$temp = "";
				for ($i=1;$i<count($parts);$i++) {
					$temp .= $parts[$i];
				}
				return $temp;
			}
		}
		return false;
	}

	function getServerStatsSimpleXML($url) {

		$urlParts = parse_url($url);

		$cacheFile = "dedicated-server-stats.cached";
		$cacheTimeout = 60*2;
		
		if(file_exists($cacheFile) && filemtime($cacheFile) > (time() - ($cacheTimeout) + rand(0, 10))) {
			$xmlStr = file_get_contents($cacheFile);
		} else {
			error_reporting(0);
			$xmlStr = loadFileHTTPSocket($urlParts["host"], $urlParts["port"], $urlParts["path"] . "?" . $urlParts["query"], 4);
			
			error_reporting(E_ALL);
			
			if ($xmlStr) {
				$fp = fopen($cacheFile, "w");
				fwrite($fp, $xmlStr);
				fclose($fp);			
			}
			
		}

		return simplexml_load_string($xmlStr);
	}

	function getVehicleClass($category, $type) {
		if($category == 'vehicle') {
			return 'vehicle';
		} else if($category == 'harvester') {
			return 'harvester';
		} else if($category == 'tool') {
			return 'tool';
		} else if($category == 'trailer') {
			return 'trailer';
		} else if($category == 'tractors') {
			return 'vehicle';
		} else if($category == 'trucks') {
			return 'vehicle';
		} else if($category == 'wheelLoaders') {
			if($type == 'dynamicMountAttacherImplement') {
				return 'tool';
			} else if($type == 'shovel_animated') {
				return 'tool';
			} else if($type == 'shovel_dynamicMountAttacher') {
				return 'tool';
			} else {
				return 'vehicle';
			}
		} else if($category == 'teleLoaders') {
			if($type == 'dynamicMountAttacherImplement') {
				return 'tool';
			} else if($type == 'baleGrab') {
				return 'tool';
			} else if($type == 'shovel_dynamicMountAttacher') {
				return 'tool';
			} else if($type == 'shovel_animated') {
				return 'tool';
			} else {
				return 'vehicle';
			}
		} else if($category == 'skidSteers') {
			if($type == 'dynamicMountAttacherImplement') {
				return 'tool';
			} else if($type == 'shovel') {
				return 'tool';
			} else if($type == 'shovel_dynamicMountAttacher') {
				return 'tool';
			} else if($type == 'stumpCutter') {
				return 'tool';
			} else if($type == 'treeSaw') {
				return 'tool';
			} else {
				return 'vehicle';
			}
		} else if($category == 'cars') {
			return 'vehicle';
		} else if($category == 'harvesters') {
			return 'harvester';
		} else if($category == 'forageHarvesters') {
			if($type == 'attachableCombine') {
				return 'tool';
			} else {
				return 'harvester';
			}
		} else if($category == 'potatoHarvesting') {
			if($type == 'defoliator_animated') {
				return 'tool';
			} else {
				return 'harvester';
			}
		} else if($category == 'beetHarvesting') {
			if($type == 'defoliater_cutter_animated') {
				return 'tool';
			} else {
				return 'harvester';
			}
		} else if($category == 'frontLoaders') {
			if($type == 'wheelLoader') {
				return 'vehicle';
			} else {
				return 'tool';
			}
		} else if($category == 'forageHarvesterCutters') {
			return 'tool';
		} else if($category == 'cutters') {
			return 'tool';
		} else if($category == 'plows') {
			return 'tool';
		} else if($category == 'cultivators') {
			return 'tool';
		} else if($category == 'sowingMachines') {
			return 'tool';
		} else if($category == 'sprayers') {
			if($type == 'selfPropelledSprayer') {
				return 'vehicle';
			} else {
				return 'tool';
			}
		} else if($category == 'fertilizerSpreaders') {
			return 'tool';
		} else if($category == 'weeders') {
			return 'tool';
		} else if($category == 'mowers') {
			return 'tool';
		} else if($category == 'tedders') {
			return 'tool';
		} else if($category == 'windrowers') {
			return 'tool';
		} else if($category == 'baling') {
			if($type == 'transportTrailer') {
				return 'trailer';
			} else if($type == 'baleLoader') {
				return 'trailer';
			} else if($type == 'baler') {
				return 'trailer';
			} else {
				return 'tool';
			}
		} else if($category == 'chainsaws') {
			return 'tool';
		} else if($category == 'wood') {
			if($type == 'transportTrailer') {
				return 'trailer';
			} else if($type == 'forwarderTrailer_steerable') {
				return 'trailer';
			} else if($type == 'woodCrusherTrailer') {
				return 'trailer';
			} else if($type == 'combine_animated') {
				return 'vehicle';
			} else if($type == 'forwarder') {
				return 'vehicle';
			} else if($type == 'woodHarvester') {
				return 'vehicle';
			} else {
				return 'tool';
			}
		} else if($category == 'animals') {
			if($type == 'selfPropelledMixerWagon') {
				return 'vehicle';
			} else {
				return 'trailer';
			}
		} else if($category == 'leveler') {
			return 'tool';
		} else if($category == 'misc') {
			if($type == 'fuelTrailer') {
				return 'trailer';
			} else {
				return 'tool';
			}
		} else if($category == 'dollys') {
			return 'trailer';
		} else if($category == 'weights') {
			return 'tool';
		} else if($category == 'pallets') {
			return 'tool';
		} else if($category == 'belts') {
			return 'tool';
		} else if($category == 'placeables') {
			return 'tool';
		} else if($category == 'tippers') {
			return 'trailer';
		} else if($category == 'augerWagons') {
			return 'trailer';
		} else if($category == 'slurryTanks') {
			if($type == 'manureBarrelCultivator') {
				return 'tool';
			} else {
				return 'trailer';
			}
		} else if($category == 'manureSpreaders') {
			return 'trailer';
		} else if($category == 'loaderWagons') {
			return 'trailer';
		} else if($category == 'lowloaders') {
			return 'trailer';
		} else if($category == 'cutterTrailers') {
			return 'trailer';
		} else {
			return 'tool';
		}
	}

?>