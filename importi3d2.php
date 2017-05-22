<?php
$xmlStr = file_get_contents ( './config/map01.i3d' );
$xml = simplexml_load_string ( $xmlStr );
$i=0;
$nodeIds = array();
foreach($xml->UserAttributes->UserAttribute as $UserAttribute) {
	foreach($UserAttribute as $Attribute) {
		//var_dump($Attribute);
		if($Attribute['value']=='modOnCreate.FabrikScript') {
			$nodeIds[] = intval($UserAttribute['nodeId']);
		}
	}
}
foreach($xml->Scene as $item1) {
	if(in_array($item1['nodeId'],$nodeIds)) echo($item1['name'].' - '. $item1['nodeId'].'<br>');
	foreach($item1 as $item2) {
		if(in_array($item2['nodeId'],$nodeIds)) echo($item2['name'].' - '. $item2['nodeId'].'<br>');
		foreach($item2 as $item3) {
			if(in_array($item3['nodeId'],$nodeIds)) echo($item3['name'].' - '. $item3['nodeId'].'<br>');
		}
	}
}

