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
<div class="row" align="center">
  <div class="cell">
    <div class="lecontainer_netside2">
      <p class="letrends">Your Account</p>
      <div align="center">
        <?php
        echo "<a><img style=\"border-radius: 100px; cursor: pointer;\" src=\"".$MEDIASERVER."grove/".$_SESSION["usid"]."/".$_SESSION["picid"]."/r70-100/photo.jpg"."\" alt=\"".$_SESSION["username"]."\" ></a>";
        echo "<h3 class=\"netsideaccname\">".$_SESSION["fullname"]."</h3>";
        echo "<h5 class=\"netsideaccname\">".$_SESSION["username"]."</h5>";
        ?>
      </div>
      <button class="lesubscribe">Edit Profile</button>
      <ul class="netsidemenu">
        <li><a href="/">Home</a></li>
        <li>News</li>
        <li>Hashtags</li>
        <li>Explore</li>
        <li>Search</li>
        <li>Profile</li>
        <li>Settings</li>
      </ul>
    </div>
  </div>
  <div class="cellcenter">
    <div class="lecontainer_netcenter2">
        <?php include "includes/w_post_form.php"; ?>
      </div>

    </div>
  <div class="cell">
    <div class="lecontainer_netside2">
      <p class="letrends">LeTrends</p>
    </div>
  </div>
</div>

<div style="padding-top: 500px;"></div>
<?php require("includes/footer/footer.php"); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/navbar-simple.js"></script>
</body>
</html>
<style>
* {
  box-sizing: border-box;
}
body {
  height: 100%;
  width: 100%;
  margin: 0;
  margin-top: 60px;
}
.lesubscribe {
  padding: 10px 30px;
  background-color: #ef1f2f;
  color: white;
  font-family: LeFont;
  font-size: 14px;
  outline: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}
.lesubscribe:hover {
  padding: 10px 30px;
  background-color: #AA1f2f;
  color: white;
  font-family: LeFont;
  font-size: 14px;
  outline: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}
.lesubscribed {
  padding: 10px 30px;
  background-color: #495057;
  color: white;
  font-family: LeFont;
  font-size: 17px;
  outline: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}
.lesubscribed:hover {
  padding: 10px 30px;
  background-color: #495057;
  color: white;
  font-family: LeFont;
  font-size: 17px;
  outline: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}
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
}
.cellcenter{
  width:20%;
  display:table-cell;
}
@media (max-width: 768px){
  .cell{
    width:100%;
    display:block;
  }
}
.netsidemenu {
  margin: 0;
  padding: 10px;
  font-family: "LeFont";
  text-align: left;
}
.netsidemenu li, .netsidemenu li a {
  text-decoration: none;
  color: black;
 list-style: none;
 padding: 10px 0px;
}
.netsidemenu li:hover {
 list-style: none;
 padding: 10px 0px;
 background: #F3F3F3;
 transition: 0.3s;
}
.netsidemenu li:focus {
  -webkit-animation: html 2s ease-in-out;
   background: #F3F3F3;
}
.letrends {
  font-family: "LeFont";
  color: #1b1b1b;
  text-align: center;
}
.netsideaccname {
  font-family: "LeFont";
  color: #1b1b1b;
  margin: 0;
  padding: 0;
}
</style>
<script>
$('.postarea').each(function () {
 this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;text-align:' + "left;");
}).on('input', function () {
 this.style.height = 'auto';
 this.style.height = (this.scrollHeight) + 'px';
});
</script>
<?php
/*
<div id="FetchingPostsDiv">
</div>
<div class="post loading-info" id="LoadingPostsDiv" style="padding: 8px;padding-bottom: 100px;">
 <div class="animated-background">
     <div class="background-masker header-top"></div>
     <div class="background-masker header-left"></div>
     <div class="background-masker header-right"></div>
     <div class="background-masker header-bottom"></div>
     <div class="background-masker subheader-left"></div>
     <div class="background-masker subheader-right"></div>
     <div class="background-masker subheader-bottom"></div>
     <div class="background-masker content-top"></div>
     <div class="background-masker content-first-end"></div>
     <div class="background-masker content-second-line"></div>
     <div class="background-masker content-second-end"></div>
     <div class="background-masker content-third-line"></div>
     <div class="background-masker content-third-end"></div>
 </div>
</div>
<div class="post  loading-info" id="NoMorePostsDiv" style="display: none;">
<p style="color: #b1b1b1;text-align: center;padding: 15px;margin: 0px;font-size: 18px;">No more stories</p>
</div>
<div class="post  loading-info" id="LoadMorePostsBtn" style="display: none;">
<button class="blue_flat_btn" style="width: 100%" onclick="fetchPosts_DB('home')">Load more</button>
</div>
<input type="hidden" id="GetLimitOfPosts" value="0">

*/
?>
