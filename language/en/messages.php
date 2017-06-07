<?php
if (! defined ( 'IN_NFMWS' )) {
	exit ();
}

if (empty ( $lang ) || ! is_array ( $lang )) {
	$lang = array ();
}

$lang = array_merge ( $lang, array (
		'L_ERROR' => 'Error',
		'L_INFO' => 'Infomation',
		'L_SUCCESS' => 'Success',
		'L_WRONGIP' => 'The entered IP adress is not valid',
		'L_WRONGPORT' => 'The entered port is not valid',
		'L_WRONGCODE' => 'The entered code is not valid' ,
		'L_NOCONNECTION' => 'Server is offline or IP adress is wrong'
) );