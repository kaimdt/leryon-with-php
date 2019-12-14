<?php
setcookie( 'cookiechecker', 'enable', time() + 60*60*24*30, '/');
require("config/settings.php");
session_name('LERYONID');
session_set_cookie_params(60*1440*365, '/', $SDOMAIN);
session_start();
include('router.php');

if(isset($_SESSION["usid"])){
  Route::add('/',function(){
      require('public/pages/home.leon.php');
  });
}else{
  Route::add('/',function(){
      require('public/pages/mainpage.leon.php');
  });
}

Route::add('/imprint',function(){
    require('public/pages/imprint.leon.php');
});

Route::add('/([A-Z,a-z,0-9,-,%]*)',function($urlusername){
    require('public/pages/userprofile.leon.php');
});

Route::add('/lestyle/([A-Z,a-z,0-9,/,-]*).([leoncss]*)',function($style){
  require('assets/css/style.php');
});

Route::run('/');
