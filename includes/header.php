<?php
if(isset($header)){
  if($header == "main"){
    require('includes/header/header_main.php');
  }
}
?>
<body>
<?php
echo "      <style>
@font-face { font-family: 'LeFont';
             src: url('/assets/fonts/lefont-bold.ttf') format('truetype');
           }
@font-face { font-family: 'LeFont_Light';
             src: url('/assets/fonts/lefont-light.ttf') format('truetype');
           }</style>";
if(isset($navbar)){
  if($navbar_dark == "yep"){
    if(isset($navbar_allwayssticky)){
      echo "
      <style>
      .navlink {
        font-weight: bold;
        font-size: 15px;
      }
      .darklogo {
        display: none;
      }
      .nav {
        color: white;
        background-color: #222222;
      }
      .hamburger {
        background-color: white;
      }
      .hamburger:before {
        background-color: white;
      }
      .hamburger:after {
        background-color: white;
      }
      .nav .brand a {
        color: #ef1f2f;
      }
      .brandingtext {
        font-family: LeFont;
        color: white!important;
        letter-spacing: -1;
      }
      .sticky ul li a {
        color: white;
      }
      .nav ul li:hover a {
        font-weight: bold;
        color: #ef1f2f;
      }
      .nav ul li a {
        color: #eee;
        text-decoration: none;
        transition: 0.1s;
      }
      </style>
      ";
    }else {
      echo "
      <style>
      .navlink {
        font-weight: bold;
        font-size: 15px;
      }
      .darklogo {
        display: none;
      }
      .nav {
        color: white;
      }
      .hamburger {
        background-color: white;
      }
      .hamburger:before {
        background-color: white;
      }
      .hamburger:after {
        background-color: white;
      }
      .navlink:hover {
        font-weight: bold;
        color: #222222;
      }
      .navlink {
        color: #222222;
      }
      .sticky {
        color: white;
        background-color: #222222;
      }
      .brandingtext {
        font-family: LeFont;
        color: white!important;
        letter-spacing: -1;
      }
      .sticky ul li a {
        color: white;
      }
      .nav ul li:hover a {
        font-weight: bold;
        color: #ef1f2f;
      }
      .nav ul li a {
        color: #eee;
        text-decoration: none;
        transition: 0.1s;
      }
      </style>
      ";
    }
  }else {
    if(isset($navbar_allwayssticky)){
      echo "
      <style>
      .navlink {
        font-weight: bold;
        font-size: 15px;
      }
      .lightlogo {
        display: none;
      }
      .navlink:hover {
        font-weight: bold;
        color: #222222;
      }
      .nav {
        color: white;
        background-color: white;
      }
      .hamburger {
        background-color: black;
      }
      .hamburger:before {
        background-color: black;
      }
      .hamburger:after {
        background-color: black;
      }
      .stickycolor {
        color: #222222;
        background-color: white;
      }
      .brandingtext {
        font-family: LeFont;
        color: black!important;
        letter-spacing: -1;
      }
      .sticky ul li a {
        color: black;
      }
      .nav ul li:hover a {
        font-weight: bold;
        color: #ef1f2f;
      }
      .nav ul li a {
        color: black;
        text-decoration: none;
        transition: 0.1s;
      }
      </style>
      ";
    }else {
      echo "
      <style>
      .navlink {
        font-weight: bold;
        font-size: 15px;
      }
      .lightlogo {
        display: none;
      }
      .navlink:hover {
        font-weight: bold;
        color: #222222;
      }
      .nav {
        color: white;
      }
      .hamburger {
        background-color: black;
      }
      .hamburger:before {
        background-color: black;
      }
      .hamburger:after {
        background-color: black;
      }
      .stickycolor {
        color: #222222;
        background-color: white;
      }
      .brandingtext {
        font-family: LeFont;
        color: black!important;
        letter-spacing: -1;
      }
      .sticky ul li a {
        color: black;
      }
      .nav ul li:hover a {
        font-weight: bold;
        color: #ef1f2f;
      }
      .nav ul li a {
        color: black;
        text-decoration: none;
        transition: 0.1s;
      }
      </style>
      ";
    }

  }
  if($navbar == "main"){
    require('includes/navbar/navbar_main.php');
  }elseif($navbar == "sidenav"){
    require('includes/navbar/navbar_main_sidenav.php');
  }elseif($navbar == "simple"){
    require('includes/navbar/navbar_simple.php');
  }elseif($navbar == "html"){
    echo "?????";
  }
}
?>
