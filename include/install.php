<?php
$error = $success = false;
$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir ( "./styles/$style/templates" );
$smarty->assign ( 'style', $style );
include ('./include/language.php');
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$submit = GetParam ( 'submit' );
	if ($submit == 'language') {
		$_SESSION ['language'] = GetParam ( 'language' );
		
	} elseif ($submit == 'server') {
		$serverip = GetParam ( 'serverip' );
		$serverport = GetParam ( 'serverport' );
		$servercode = GetParam ( 'servercode' );
		if (filter_var ( $serverip, FILTER_VALIDATE_IP ) === false) {
			$error = '<div class="alert alert-danger"><strong>Fehler!</strong> ' . $message . '</div>';
		}
	}
}
if (! isset ( $_SESSION ['language'] ))
	$_SESSION ['language'] = $defaultLanguage;

$smarty->assign ( 'languages', $languages );
$smarty->assign ( 'languagePath', $_SESSION ['language'] );

$smarty->assign ( 'error', $error );
$smarty->assign ( 'success', $success );

$smarty->display ( 'install.tpl', $style, $style );