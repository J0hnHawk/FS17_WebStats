<?php
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
function dbstat($result, $sql, $alles = true) {
	echo ((($alles) ? "\"" . $sql . "\"<br>" : "") . "verarbeitet? " . (($result) ? "ja" : "nein") . "<br>");
}
function getStyle() {
	global $db_styles, $sqldb;
	$sql = "SELECT * FROM `$db_styles` ORDER BY style_name ASC";
	$result = $sqldb->query ( $sql );
	$styles = array ();
	if ($result->num_rows > 0) {
		while ( $style = $result->fetch_assoc () ) {
			$styles [$style ['style_id']] = $style;
		}
		$style = getConfigValue ( 'default_style' );
		if (! getConfigValue ( 'override_user_style' ) && isset ( $_SESSION ['user'] ['user_style'] ))
			$style = $_SESSION ['user'] ['user_style'];
		if (isset ( $styles [$style] )) {
			return $styles [$style] ['style_path'];
		} else
			return 'bootstrap';
	} else {
		return 'bootstrap';
	}
}
function getConfigValue($config_name) {
	global $db_config, $sqldb;
	$sql = "SELECT config_value FROM `$db_config` WHERE config_name = '$config_name'";
	$result = $sqldb->query ( $sql );
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc ();
		return $row ['config_value'];
	} else
		return false;
}
