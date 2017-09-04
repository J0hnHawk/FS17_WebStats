<?php
/**
 *
 * This file is part of the "NF Marsch Webstats" package.
 * Copyright (C) 2017  John Hawk <john.hawk@gmx.net>
 *
 * "NF Marsch Webstats" is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "NF Marsch Webstats" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

if (! defined('IN_NFMWS') && ! defined('IN_INSTALL')) {
    exit();
}

$error = $success = false;
$postdata = array(NULL,NULL,NULL,NULL,true);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submit = GetParam('submit');
    if ($submit == 'language') {
        $_SESSION['language'] = GetParam('language');
    } elseif ($submit == 'server') {
        $postdata[0] = GetParam('serverip', 'P', '127.0.0.1');
        $postdata[1] = GetParam('serverport', 'P', '8080') + 0;
        $postdata[2] = GetParam('servercode', 'P', '');
        $postdata[3] = '';
        $postdata[4] = true;
        if (filter_var($postdata[0], FILTER_VALIDATE_IP) === false) {
            $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Die eingegebene IP Adresse ist nicht gültig.</div>';
        }
        if ($postdata[1] < 1 || $postdata[1] > 65536) {
            $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Port ist ungültig.</div>';
        }
        if (strlen($postdata[2]) < 1) {
            $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Code ist ungültig.</div>';
        }
        if (! $error) {
            error_reporting(E_NOTICE);
            $fp = fsockopen($postdata[0], $postdata[1], $errno, $errstr, 4);
            error_reporting(E_ALL);
            if ($fp) {
                $out = "GET /feed/dedicated-server-stats.xml?code=" . $postdata[2] . " HTTP/1.0\r\n";
                $out .= "Host: " . $postdata[0] . "\r\n";
                $out .= "Connection: Close\r\n\r\n";
                fwrite($fp, $out);
                // Get response
                $resp = "";
                while (! feof($fp)) {
                    $resp .= fgets($fp, 256);
                }
                fclose($fp);
                if (preg_match("/HTTP\/1\.\d\s(\d+)/", $resp, $matches) && $matches[1] == 200) {
                    $fp = fopen('./server/server.conf', 'w');
                    fwrite($fp, serialize($postdata));
                    fclose($fp);
                    $success = true;
                } else {
                    $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Der eingegebene Code ist ungültig.</div>';
                }
            } else {
                $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Server ist offline oder die IP Adresse ist falsch.</div>';
            }
        }
    } elseif ($submit == 'local') {
        $postdata[0] = '';
        $postdata[1] = '';
        $postdata[2] = '';
        $postdata[3] = GetParam('savepath', 'P', '') . DIRECTORY_SEPARATOR;
        $postdata[4] = false;
        if (! file_exists($postdata[3] . 'careerSavegame.xml')) {
            $error .= '<div class="alert alert-danger"><strong>FEHLER:</strong> Unter dem angegebenen Pfad wurde kein Spielstand gefunden.</div>';
        }
        if (! $error) {
            $fp = fopen('./server/server.conf', 'w');
            fwrite($fp, serialize($postdata));
            fclose($fp);
            $success = true;
        }
    }
}

$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->assign('postdata', $postdata);
$smarty->display('install.tpl', 'bootstrap', 'bootstrap');