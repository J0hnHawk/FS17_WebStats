<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}
function GetParam($ParamName, $Method = "P", $DefaultValue = "") {
	if ($Method == "P") {
		if (isset ( $_POST [$ParamName] ))
			return $_POST [$ParamName];
		else
			return $DefaultValue;
	} else if ($Method == "G") {
		if (isset ( $_GET [$ParamName] ))
			return $_GET [$ParamName];
		else
			return $DefaultValue;
	} else if ($Method == "S") {
		if (isset ( $_SERVER [$ParamName] ))
			return $_SERVER [$ParamName];
		else
			return $DefaultValue;
	} else if ($Method == "Z") {
		if (isset ( $_SESSION [$ParamName] ))
			return $_SESSION [$ParamName];
		else
			return $DefaultValue;
	}
}

function translate($text) {
	global $lang;
	$text = strval ( $text );
	if (isset ( $lang [$text] )) {
		return $lang [$text];
	} else {
		return '{' . $text . '}';
	}
}