<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (! isset ( $options ['storage'] )) {
	$options ['storage'] ['sortByName'] = true;
	$options ['storage'] ['hideZero'] = true;
	$options ['storage'] ['showVehicles'] = true;
	$options ['storage'] ['onlyPallets'] = false;
}
if (! isset ( $options ['production'] )) {
	$options ['production'] ['sortByName'] = true;
	$options ['production'] ['sortFullProducts'] = true;
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$options ['production'] ['sortByName'] = filter_var ( GetParam ( 'p_sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['sortByName'] = filter_var ( GetParam ( 's_sortByName', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['hideZero'] = filter_var ( GetParam ( 's_hideZero', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['showVehicles'] = filter_var ( GetParam ( 's_showVehicles', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['storage'] ['onlyPallets'] = filter_var ( GetParam ( 's_onlyPallets', 'P', 1 ), FILTER_VALIDATE_BOOLEAN );
	$options ['version'] = $cookieVersion;
	setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
}
$smarty->assign ( 'options', $options );
