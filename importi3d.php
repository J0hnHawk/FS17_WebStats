<?php
$xmlStr = file_get_contents ( './config/map01.i3d' );
$xml = simplexml_load_string ( $xmlStr );
var_dump($xml);