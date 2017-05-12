<?php
// Do not change anything in this file!
//if (strncasecmp ( PHP_OS, 'WIN', 3 ) == 0) {
	$dbhost = '127.0.0.1';
	$dbport = '';
	$dbname = 'insertName';
	$dbuser = 'root';
	$dbpasswd = '';
	$table_prefix = 'insertName_';
	
	$dSrvIp = "";
	$dSrvPort = "8080";
	$dSrvCode = "";
	$serverAddress = "http://$dSrvIp:$dSrvPort/feed/dedicated-server-stats.xml?code=$dSrvCode";
/* 
} else {
	$dbhost = '';
	$dbport = '';
	$dbname = '';
	$dbuser = '';
	$dbpasswd = '';
	$table_prefix = 'insertName_';
}
*/
