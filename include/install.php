<?php
/**
 *
 * This file is part of the "FS17 Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
 *
 * "FS17 Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "FS17 Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

if (! defined ( 'IN_NFMWS' ) && ! defined ( 'IN_INSTALL' )) {
	exit ();
}

$smarty->assign ( 'maps', getMaps () );
$smarty->assign ( 'languages', getLanguages () );

$error = $success = false;
$serverConfig = array (
		NULL,
		NULL,
		NULL,
		NULL,
		true,
		NULL,
		NULL 
);
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$submit = GetParam ( 'submit' );
	$serverConfig [5] = GetParam ( 'modmap', 'P' );
	if (! file_exists ( "./config/" . $serverConfig [5] )) {
		$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_MAP##</div>';
	}
	if ($submit == 'language') {
		$_SESSION ['language'] = $options ['general'] ['language'] = GetParam ( 'language' );
		setcookie ( 'nfmarsch', json_encode ( $options ), time () + 31536000 );
	} elseif ($submit == 'server') {
		$serverConfig [0] = GetParam ( 'serverip', 'P', '127.0.0.1' );
		$serverConfig [1] = GetParam ( 'serverport', 'P', '8080' ) + 0;
		$serverConfig [2] = GetParam ( 'servercode', 'P', '' );
		$serverConfig [3] = '';
		$serverConfig [4] = true;
		$serverConfig [6] = GetParam ( 'adminpass1', 'P', '' );
		$repeatedPassword = GetParam ( 'adminpass2', 'P', '' );
		if (filter_var ( $serverConfig [0], FILTER_VALIDATE_IP ) === false) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_IP##</div>';
		}
		if ($serverConfig [1] < 1 || $serverConfig [1] > 65536) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_PORT##</div>';
		}
		if (strlen ( $serverConfig [2] ) < 1) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_CODE##</div>';
		}
		if ($serverConfig [6] != $repeatedPassword) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##PASSWORD_MATCH##</div>';
		}
		if (strlen($serverConfig [6])<6) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##PASSWORD_SHORT##</div>';
		}
		if (! $error) {
			error_reporting ( E_NOTICE );
			$fp = fsockopen ( $serverConfig [0], $serverConfig [1], $errno, $errstr, 4 );
			error_reporting ( E_ALL );
			if ($fp) {
				$out = "GET /feed/dedicated-server-stats.xml?code=" . $serverConfig [2] . " HTTP/1.0\r\n";
				$out .= "Host: " . $serverConfig [0] . "\r\n";
				$out .= "Connection: Close\r\n\r\n";
				fwrite ( $fp, $out );
				// Get response
				$resp = "";
				while ( ! feof ( $fp ) ) {
					$resp .= fgets ( $fp, 256 );
				}
				fclose ( $fp );
				if (preg_match ( "/HTTP\/1\.\d\s(\d+)/", $resp, $matches ) && $matches [1] == 200) {
					$serverConfig [6] = password_hash ( $serverConfig [6], PASSWORD_DEFAULT );
					$fp = fopen ( './config/server.conf', 'w' );
					fwrite ( $fp, serialize ( $serverConfig ) );
					fclose ( $fp );
					$success = true;
				} else {
					$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_CODE##</div>';
				}
			} else {
				$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_OFFLLINE##</div>';
			}
		}
	} elseif ($submit == 'local') {
		$serverConfig [0] = '';
		$serverConfig [1] = '';
		$serverConfig [2] = '';
		$serverConfig [3] = GetParam ( 'savepath', 'P', '' ) . DIRECTORY_SEPARATOR;
		$serverConfig [4] = false;
		$serverConfig [6] = GetParam ( 'adminpass1', 'P', '' );
		$repeatedPassword = GetParam ( 'adminpass2', 'P', '' );
		if ($serverConfig [6] != $repeatedPassword) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##PASSWORD_MATCH##</div>';
		}
		if (strlen($serverConfig [6])<6) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##PASSWORD_SHORT##</div>';
		}
		if (! file_exists ( $serverConfig [3] . 'careerSavegame.xml' )) {
			$error .= '<div class="alert alert-danger"><strong>##ERROR##</strong> ##ERROR_SAVEGAME##</div>';
		}
		if (! $error) {
			$serverConfig [6] = password_hash ( $serverConfig [6], PASSWORD_DEFAULT );
			$fp = fopen ( './config/server.conf', 'w' );
			fwrite ( $fp, serialize ( $serverConfig ) );
			fclose ( $fp );
			$success = true;
		}
	}
}
$smarty->assign ( 'fsockopen', function_exists ( 'fsockopen' ) );
$smarty->assign ( 'error', $error );
$smarty->assign ( 'success', $success );
$smarty->assign ( 'postdata', $serverConfig );
$tpl_source = $smarty->fetch ( 'install.tpl' );
echo preg_replace_callback ( '/##(.+?)##/', 'prefilter_i18n', $tpl_source );
