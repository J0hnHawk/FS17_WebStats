<?php
if (isset ( $_COOKIE ['sortType'] ) && $_COOKIE ['sortType'] == 'alpha') {
	$sortType = 'alpha';
} else {
	$sortType = 'fill';
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$sortType = GetParam ( 'sortType', 'P', 'alpha' );
	if ($sortType == 'alpha') {
		setcookie ( 'sortType', 'alpha' );
	} else {
		setcookie ( 'sortType', 'fill' );
		$sortType = 'fill';
	}
}
$smarty->assign ( 'sortType', $sortType );