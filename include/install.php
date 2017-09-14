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
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
if (! defined ( 'IN_NFMWS' ) && ! defined ( 'IN_INSTALL' )) {
	exit ();
}
$smarty->assign ( 'maps', getMaps () );
$error = $success = false;
$serverConfig = array (
		NULL,
		NULL,
		NULL,
		NULL,
		true,
		NULL
);
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$submit = GetParam ( 'submit' );
	$serverConfig [5] = GetParam ( 'modmap', 'P' );
	if(!file_exists("./config/".$serverConfig [5]))  {
		$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Die Karte ist ungültig.</div>';
	}
	if ($submit == 'language') {
		$_SESSION ['language'] = GetParam ( 'language' );
	} elseif ($submit == 'server') {
		$serverConfig [0] = GetParam ( 'serverip', 'P', '127.0.0.1' );
		$serverConfig [1] = GetParam ( 'serverport', 'P', '8080' ) + 0;
		$serverConfig [2] = GetParam ( 'servercode', 'P', '' );
		$serverConfig [3] = '';
		$serverConfig [4] = true;
		
		if (filter_var ( $serverConfig [0], FILTER_VALIDATE_IP ) === false) {
			$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Die eingegebene IP Adresse ist nicht gültig.</div>';
		}
		if ($serverConfig [1] < 1 || $serverConfig [1] > 65536) {
			$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Port ist ungültig.</div>';
		}
		if (strlen ( $serverConfig [2] ) < 1) {
			$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Code ist ungültig.</div>';
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
					$fp = fopen ( './config/server.conf', 'w' );
					fwrite ( $fp, serialize ( $serverConfig ) );
					fclose ( $fp );
					$success = true;
				} else {
					$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Code ist ungültig.</div>';
				}
			} else {
				$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Server ist offline oder die IP Adresse ist falsch.</div>';
			}
		}
	} elseif ($submit == 'local') {
		$serverConfig [0] = '';
		$serverConfig [1] = '';
		$serverConfig [2] = '';
		$serverConfig [3] = GetParam ( 'savepath', 'P', '' ) . DIRECTORY_SEPARATOR;
		$serverConfig [4] = false;
		if (! file_exists ( $serverConfig [3] . 'careerSavegame.xml' )) {
			$error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Unter dem angegebenen Pfad wurde kein Spielstand gefunden.</div>';
		}
		if (! $error) {
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
$smarty->display ( 'install.tpl', 'bootstrap', 'bootstrap' );