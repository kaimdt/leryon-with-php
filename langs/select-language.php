<?php
// Language Select Datei
$continue = (string)$_GET['continue'];
if(empty($continue)) {
	$continue = '/';
}

$defaultlanguage = (string)$_GET['language'];
if( $_GET['language'] ) {
	$userlanguage = (string)$_GET['language'];
	setcookie( 'LERYON_NETWORK_LANG_LOCALE', $userlanguage, time() + 60*60*24*30, '/', ".leryon.com");
} elseif( !isset($_COOKIE['N4C']) ) {
	$languageselector = 'en_US';
} else {
	$languageselector = $_COOKIE['LERYON_NETWORK_LANG_LOCALE'];
}

if( !isset($_COOKIE['LERYON_NETWORK_LANG_LOCALE'])) {
	if($_COOKIE['LERYON_NETWORK_LANG_LOCALE'] == '') {
	setcookie( 'LERYON_NETWORK_LANG_LOCALE', $defaultlanguage, time() + 60*60*24*30, '/', ".leryon.com");
}
}

header ("Location: $continue");
exit;
