<?php
///////////////////////////////////////////////////////
//      Leryon Network powerd by NeryonandTeryon
//             Neryon & Teryon Developers
//                  System by Neryon
///////////////////////////////////////////////////////

//Please do not remove this code from this file.
ob_start("compress_htmlcode");
function compress_htmlcode($codedata)
{
$searchdata = array(
'/\>[^\S ]+/s', // remove whitespaces after tags
'/[^\S ]+\</s', // remove whitespaces before tags
'/(\s)+/s' // remove multiple whitespace sequences
);
$replacedata = array('>','<','\\1');
$codedata = preg_replace($searchdata, $replacedata, $codedata);
$codedata = preg_replace('/\s+/', ' ', $codedata);

return $codedata;
}
require('apps/controller.php');
