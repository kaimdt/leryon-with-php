<?php
/*
switch ($_SESSION['language']) {
case 'English':
	include_once $path."langs/english.php";
	break;
	case 'German':
		include_once $path."langs/german.php";
		break;
case 'العربية':
	include_once $path."langs/arabic.php";
	break;
default:
	$_SESSION['language'] = "English";
	include_once $path."langs/english.php";
	break;
}
*/
$language = $_COOKIE['LERYON_NETWORK_LANG_LOCALE'];
if($language == 'en_US') {
include_once $path."langs/english.php";
define("_SWITCH", '<a href="/select?continue=http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'&languageselector=de_DE" rel="nofollow">DE</a>');
} elseif($language == 'de_DE') {
define("_SWITCH", '<a href="/select?continue=http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'&languageselector=en_US" rel="nofollow">EN</a>');
include_once $path."langs/german.php";
} elseif($language == 'fr_FR') {
require('includes/language/fr_FR.php');
} else {
include_once $path."langs/english.php";
define("_SWITCH", '<a href="/select?continue=http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'&languageselector=de_DE" rel="nofollow">DE</a>');
}
?>
