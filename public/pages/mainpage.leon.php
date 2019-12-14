<?php
//PageSetup
require("config/settings.php");
include "config/connect.php";
$sessusid = $_SESSION['usid'];
$header = "main";
$pagetitle = "Welcome to Leon";
$withdot = "false";
$pagedescription = "Test";
$pagekeywords = "Test, 123";
$navbar = "main";
$navbarlogo = "text";
$logotext = "Leon Network.";
$navbar_allwayssticky = "yep";
$navbar_dark = "yep";
require("includes/header.php");
?>
<div class="header">
  <p>Welcome home in the Leon family</p>
  <lepix>Welcome to California</lepix>
</div>
<div class="row">
  <div class="cell">
    <h2 style="font-family: LeFont; font-weight: 100; text-align: center;">Our Mission:</h2>
  </div>
  <div class="cell">
    <h2 style="font-family: LeFont; font-weight: 100; text-align: center;">We connect systems together to form a common Internet</h2>
  </div>
</div>
<div class="row" style="background-color: #1123;">
  <div class="cell">
    <h2 style="font-family: LeFont; font-weight: 100; text-align: center;">Our Mission:</h2>
  </div>
  <div class="cell">
    <h2 style="font-family: LeFont; font-weight: 100; text-align: center;">We connect systems together to form a common Internet</h2>
  </div>
</div>
<?php require("includes/footer/footer.php"); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/navbar-simple.js"></script>
</body>
</html>
<style>
.row{
  display:table;
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
  width:100%;
}
.cell{
  width:8%;
  display:table-cell;
  height:75px;
}
@media (max-width: 768px){
  .cell{
    width:100%;
    display:block;
  }
}

.header {
  font-weight: normal;
  text-align: center;
  padding: 150px 0px;
  background: url(assets/images/panorama-2117310.jpg)no-repeat center center;
  background-size: cover;
}
.header p {
  font-weight: normal;
  color: white;
  font-size: 30px;
}
.header lepix {
  font-family: LeFont;
  line-height: 0;
  font-weight: normal;
  color: white;
  font-size: 20px;
}
</style>
