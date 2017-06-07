<?php
$error = $success = false;
$smarty = new Smarty ();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir ( "./styles/$style/templates" );
$smarty->assign ( 'style', $style );
include ('./include/language.php');
if (! isset ( $_SESSION ['language'] )) {
	$_SESSION ['language'] = $defaultLanguage;
}
include ("./language/{$_SESSION ['language']}/messages.php");
$postdata = array ();
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$submit = GetParam ( 'submit' );
	if ($submit == 'language') {
		$_SESSION ['language'] = GetParam ( 'language' );
	} elseif ($submit == 'server') {
		$postdata [0] = GetParam ( 'serverip', 'P', '127.0.0.1' );
		$postdata [1] = GetParam ( 'serverport', 'P', '8080' ) + 0;
		$postdata [2] = GetParam ( 'servercode', 'P', '' );
		$postdata [3] = GetParam ( 'language', 'P', 'en' );
		if (filter_var ( $postdata [0], FILTER_VALIDATE_IP ) === false) {
			$error .= '<div class="alert alert-danger"><strong>' . $lang ['L_ERROR'] . '!</strong> ' . $lang ['L_WRONGIP'] . '</div>';
		}
		if ($postdata [1] < 1 || $postdata [1] > 65536) {
			$error .= '<div class="alert alert-danger"><strong>' . $lang ['L_ERROR'] . '!</strong> ' . $lang ['L_WRONGPORT'] . '</div>';
		}
		if (strlen ( $postdata [2] ) < 1) {
			$error .= '<div class="alert alert-danger"><strong>' . $lang ['L_ERROR'] . '!</strong> ' . $lang ['L_WRONGCODE'] . '</div>';
		}
		if (! isset ( $languages [$postdata [3]] )) {
			$postdata [3] = $defaultLanguage;
		}
		$_SESSION ['language'] = GetParam ( 'language' );
		if (! $error) {
			error_reporting ( E_NOTICE );
			$fp = fsockopen ( $postdata [0], $postdata [1], $errno, $errstr, 4 );
			error_reporting ( E_ALL );
			if ($fp) {
				$out = "GET /feed/dedicated-server-stats.xml?code=" . $postdata [2] . " HTTP/1.0\r\n";
				$out .= "Host: " . $postdata [0] . "\r\n";
				$out .= "Connection: Close\r\n\r\n";
				fwrite ( $fp, $out );
				// Get response
				$resp = "";
				while ( ! feof ( $fp ) ) {
					$resp .= fgets ( $fp, 256 );
				}
				fclose ( $fp );
				if (preg_match ( "/HTTP\/1\.\d\s(\d+)/", $resp, $matches ) && $matches [1] == 200) {
					$fp = fopen ( './config/server.conf', 'w' );
					fwrite ( $fp, serialize ( $postdata ) );
					fclose ( $fp );
					$success = true;
				} else {
					$error .= '<div class="alert alert-danger"><strong>' . $lang ['L_ERROR'] . '!</strong> ' . $lang ['L_WRONGCODE'] . '</div>';
				}
			} else {
				$error .= '<div class="alert alert-danger"><strong>' . $lang ['L_ERROR'] . '!</strong> ' . $lang ['L_NOCONNECTION'] . '</div>';
			}
		}
	}
}

$smarty->assign ( 'languages', $languages );
$smarty->assign ( 'languagePath', $_SESSION ['language'] );

$smarty->assign ( 'error', $error );
$smarty->assign ( 'success', $success );
$smarty->assign ( 'postdata', $postdata );

$smarty->display ( 'install.tpl', $style, $style );