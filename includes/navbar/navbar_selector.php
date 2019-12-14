<?php
if($navbar == "main"){
  require('includes/navbar/navbar_main.php');
}elseif($navbar == "middle"){
  require('includes/navbar/navbar_middle.php');
}elseif($navbar == "simple"){
  require('includes/navbar/navbar_simple.php');
}elseif($navbar == "html"){
  require('includes/navbar/navbar_html.php');
}

?>
