<?php
require("config/settings.php");
include "config/connect.php";
    header('Content-type: text/css');
    // setup the URL and read the CSS from a file
    if($style == "lenav"){
      $url = $DOMAIN.'/assets/css/navbar/leryon-navbar.css';
    }else if($style == "leonicon"){
      $url = $DOMAIN.'/assets/css/leonicon.css';
    }else if($style == "leryontheme"){
      $url = $DOMAIN.'/assets/css/leryontheme.css';
    }else if($style == "letheme"){
      $url = $DOMAIN.'/assets/css/leontheme.css';
      if($_GET["pi"] == "myle-p"){
        $url2 = $DOMAIN.'/assets/css/leryontheme.css';
      }
    }
    //$css = file_get_contents('navbar/leryon-navbar.css');

    // init the request, set various options, and send it
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([ "input" => $css ])
    ]);

    $minified = curl_exec($ch);

    // finally, close the request
    curl_close($ch);

    //two
    $ch2 = curl_init();

    curl_setopt_array($ch2, [
        CURLOPT_URL => $url2,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([ "input" => $css2 ])
    ]);

    $minified2 = curl_exec($ch2);

    // finally, close the request
    curl_close($ch2);

    // output the $minified css
    echo $minified;
    echo $minified2;
?>
