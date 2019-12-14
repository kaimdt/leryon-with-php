<?php
$usersubs = "100";
$myId = $_SESSION['usid'];
include "config/connect.php";
include "config/settings.php";
$urlusername = filter_var(htmlspecialchars($urlusername),FILTER_SANITIZE_STRING);
if(empty($urlusername)){
  require('../Leryon/public/errorpages/404.error.ntcms.php');
  exit;
}
$getaccount = $conn_acm->prepare("SELECT * FROM acm_accounts WHERE acm_username = :username OR acm_usid = :username");
$getaccount->bindParam(':username',$urlusername,PDO::PARAM_STR);
$getaccount->execute();
while ($row = $getaccount->fetch(PDO::FETCH_ASSOC)) {
  $userusid = $row["acm_usid"];
  $username = $row["acm_username"];
  $fullname = $row["acm_firstname"]." ".$row["acm_lastname"];
}
$getaccountdetails = $conn_acm->prepare("SELECT * FROM acm_accounts_details WHERE acmd_usid = :usid");
$getaccountdetails->bindParam(':usid',$userusid,PDO::PARAM_STR);
$getaccountdetails->execute();
while ($row = $getaccountdetails->fetch(PDO::FETCH_ASSOC)) {
  $ppicture = $row["acmd_profilepicture"];
  $pcoverpicture = $row["acmd_profile_cover"];
  $ppublic = $row["acmd_public_profile"];
  $confirmed = $row["acmd_verified"];
  $pbanned = $row["acmd_blocked"];
  $netid = $row["acmd_netid"];
}
if((strtolower($urlusername) == strtolower($username)) OR ($userusid == $urlusername)){
  $title = "@".$username;
}else{
  $title = "User not found";
}

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
<main data-barba="container" data-barba-namespace="home">

<style>
html,body{
  margin: 0;
  height: 100%;
  font-family: LeFont_Light;
}
</style>


<?php
//AUTOIMAGE
if($ppicture == "0"){
  $picture_url = "ERROR";
}else{
  $picture_url = $MEDIASERVER."grove/".$userusid."/".$ppicture."/r126-100/photo.jpg";
}

if($$pcoverpicture == "0"){
  $pcoverpicture_url = "ERROR";
}else{
  $pcoverpicture_url = "https://ncm_accounts.leryon-developer.com/images/leryonweb.jpeg";
}

if((strtolower($urlusername) == strtolower($username)) OR ($userusid == $urlusername)) {
	if((strtolower($_SESSION["username"]) == strtolower($urlusername)) OR ($_SESSION["usid"] == $urlusername)) {
    $myprofile = "true";
    if($ppublic == '2'){
      $notification = 'Dein Profil ist auf Privat gestellt!';

    }
    if($usersubs == "1"){
      $subs = "Subscribed ".$usersubs;
    }else{
      $subs = "Subscribed ".$usersubs;
    }
    $lesubscribebutton = "<span id='followUnfollow_$userusid' style='cursor:pointer;width:100%;display:inline-flex;'><button class=\"follow_btn lesubscribe\" onclick=\"followUnfollow('$userusid')\"><span class=\"fa fa-plus-circle\"></span> EDIT PROFILE</button></span>";
    $lesubscribe = $subs;
  }else{
    if($pbanned == '1' OR $pbanned == 'permaban'){
      echo '<center><h2 style="padding-top: 10%;">Zugriff verweigert!<h2><h3 style="padding-bottom: 10%;">Der User ist derzeit gebannt</h3>';
      exit;
    }
    //1 Public, 2 Friends and Followers
    if($ppublic != '1' AND $ppublic != '2'){
      echo '<center><h2 style="padding-top: 10%;">Zugriff verweigert!<h2><h3 style="padding-bottom: 10%;">Der User hat sein Profil auf Privat gestellt!</h3>';
      exit;
    }
    if($userrow["moderator"] == 2){ echo '<a class="moderatorbar followbutton-profilepage" style="float: right;" href="?edit=true"><i class="fas fa-user-tie"></i></a>'; }
     /*$csql = "SELECT usid FROM follow WHERE uf_one=:s_id AND uf_two=:row_id";
     $c = $conn->prepare($csql);
     $c->bindParam(':s_id',$s_id,PDO::PARAM_INT);
     $c->bindParam(':row_id',$row_id,PDO::PARAM_INT);
     $c->execute();
     $c_num = $c->rowCount();
     if ($c_num > 0){*/


     $test = "1";
      if($test == "2"){
          if($usersubs == "1"){
            $subs = "Subscribed ".$usersubs;
          }else{
            $subs = "Subscribed ".$usersubs;
          }
         $lesubscribebutton = "<span id='followUnfollow_$userusid' style='cursor:pointer;width:100%;display:inline-flex;'><button class=\"unfollow_btn lesubscribed\" onclick=\"followUnfollow('$userusid')\"><span class=\"fa fa-check\"></span> ".$subs."</button></span>";
         $lesubscribe = $subs;
     }else{
          if($usersubs == "1"){
            $subs = "Subscriber ".$usersubs;
          }else{
            $subs = "Subscribers ".$usersubs;
          }
         $lesubscribebutton = "<span id='followUnfollow_$userusid' style='cursor:pointer;width:100%;display:inline-flex;'><button class=\"follow_btn lesubscribe\" onclick=\"followUnfollow('$userusid')\"><span class=\"fa fa-plus-circle\"></span> ".$subs."</button></span>";
         $lesubscribe = $subs;
     }
   }
  ?>

<style>
.lesubscribe {
  padding: 10px 30px;
  background-color: #ef1f2f;
  color: white;
  font-family: LeFont;
  font-size: 17px;
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
  font-size: 17px;
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
.leprofilecover {
  margin-top: 60px;
  padding: 45px;
  background: url(<?php echo $pcoverpicture_url; ?>) no-repeat center center;
  background-size: cover;
}
@media screen and (max-width: 640px) {
  .leprofilepicturecontainer {
    position: relative;
    top: 150px;
    right: 10px;
    transition: transform 2s;
    transform:scale(0.5);
  }
}
@media screen and (min-width: 640px) {
  .leprofilepicturecontainer {
    position: relative;
    top: 150px;
    right: 10px;
    transition: transform 2s;
    transform:scale(0.8);
  }
}
.profileleftsidecontent {
}
.profilecentercontent {
}
.profilerightsidecontent {
}
.profilelinks {
    margin: 10px 4px;
    background: #fff;
    border-radius: 2px;
    width: auto;
    box-shadow: 0px 0px 18px rgba(63, 81, 181, 0.16);
    font-family: LeFont;
}
.leprofileusername {
  color: black;
  font-size: 15px;
  font-family: LeFont;
  font-size: 20px;
}
.leprofileimage {
  width: 126px;
  height: 126px;
  overflow: hidden;
  border-radius:100px;
}
.profileimagerand1 > .leprofileimage {
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -webkit-transition: -webkit-box-shadow 0.3s ease;
  transition: box-shadow 0.3s ease;
  -webkit-box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
  box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
}
.profileimagerand1:hover > .leprofileimage  {
  z-index: 2;
  -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
}
.profileimagerand {
  border: 10px solid white;
  border-radius: 100%;
}
@-webkit-keyframes scaleIn {
  0% {
    -webkit-transform: scale(0);
  }
  100% {
    -webkit-transform: scale(1);
  }
}

@keyframes scaleIn {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}

@-webkit-keyframes ripple {
  0% {
    transform: scale3d(0, 0, 0);
  }
  50%,
  100% {
    -webkit-transform: scale3d(1, 1, 1);
  }
  100% {
    opacity: 0;
  }
}
@keyframes ripple {
  0% {
    transform: scale3d(0, 0, 0);
  }
  50%,
  100% {
    transform: scale3d(1, 1, 1);
  }
  100% {
    opacity: 0;
  }
}
* {
    box-sizing: border-box;
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
  //height:75px;
  overflow-y: visible;
}
@media (max-width: 768px){
  .cell{
    width:100%;
    display:block;
  }
}
.leonsmall {
  font-family: LeFont_Light;
}
</style>
<div>
</div>
<div class="leprofilecover" style="margin-bottom: 100px;">
<div class="leprofilepicturecontainer">
<table style="width: 100%; font-size: 15px;">
<tbody><tr>
<td style="width: 150px;" class="profileimagerand">
<div class="leprofileimage">
<img style="border-radius: 100%; float: right;" src="<?php echo $picture_url; ?>" alt="Neryon" width="126" height="126">
</div>
</td>
<td style="padding: 0px 10px"><span class="leprofileusername"><?php echo $fullname; if($confirmed == 2){ echo ' <i class="leonicon-verifizierter-user" data-toggle="tooltip" data-placement="top" title="Certified account"></i></h6></div>'; } ?></span><br><span class="leprofileusername leonsmall"><?php if($myprofile != "true"){ echo "@".$username; }else{ echo $lesubscribe; } ?></span></td>
<td class="leprofileusername" style="width: 250px; font-family: LeFont;"><?php echo $lesubscribebutton; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
<?php if(isset($notification)){ echo "<center><h3>".$notification."</h3></center>"; } ?>
<?php
if($netid == "0"){
  echo '<center><h3>The user is not yet registered in the network!</h3>';
  exit;
}
if($ppublic == '2' AND $myprofile != "true"){
  echo '<center><h3>Der User hat sein Profil auf Privat gestellt!</h3>';
  exit;
}
?>

<div class="row">
  <div class="cell">
    <div style="width: 250px; display: block;" class="profilelinks">
      <div style="background-color: #e9ebee; color: #4c4c4c; padding: 6px 10px;" align="center">
        <?php echo strtoupper($username); ?>
      </div>
      <div style="overflow-y: scroll; height: 500px;" align="center">
        <a><?php echo $username; ?> Photos</a>
      </div>
    </div>
  </div>
  <div class="cell">
    <div class="profilelinks1">
      <?php echo $err_success_Msg; ?>
      <?php
      $s_id = $_SESSION['usid'];
      $row_id = $s_id;
      $emptyImg = '';
      $getphotos_sql = "SELECT * FROM wpost WHERE author_id=:s_id AND (post_img_1 != :emptyImg) OR (post_img_2 != :emptyImg) OR (post_img_3 != :emptyImg) OR (post_img_4 != :emptyImg) ORDER BY post_time";
      $getphotos = $conn_ncm->prepare($getphotos_sql);
      $getphotos->bindParam(':s_id',$s_id,PDO::PARAM_STR);
      $getphotos->bindParam(':emptyImg',$emptyImg,PDO::PARAM_STR);
      $getphotos->execute();
      $getphotos_num = $getphotos->rowCount();
      if ($_SESSION['usid'] == $row_id) {
          include("includes/w_post_form.php");
      }
      ?>
      <?php
      if ($getphotos_num > 0) {
          include("includes/myphotosProfile.php");
      }
      if ($posts_num_int < 1) {
      if ($_SESSION['usid'] == $row_id) {
      echo "
      <div class='post'>
      <p style='color: gray;text-align: center;padding: 15px;margin: 0px;'>".lang('you_have_not_posted_anything_yet').".</p>
      </div>
      ";
       }else{
      echo "
      <div class='post'>
      <p style='color: gray;text-align: center;padding: 15px;margin: 0px;'>$fullname ".lang('has_not_posted_anything_yet').".</p>
      </div>
      ";
       }
      }
      ?>
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
        <p style="color: #b1b1b1;text-align: center;padding: 15px;margin: 0px;font-size: 18px;"><?php echo lang('noMoreStories'); ?></p>
      </div>
      <div class="post  loading-info" id="LoadMorePostsBtn" style="display: none;">
        <button class="blue_flat_btn" style="width: 100%" onclick="fetchPosts_DB('user')">Load more</button>
      </div>
      <input type="hidden" id="GetLimitOfPosts" value="0">
    </div>
  </div>
  <div class="cell" align="right">
    <div style="width: 250px; display: block;" class="profilelinks">
      <div style="background-color: #e9ebee; color: #4c4c4c; padding: 6px 10px;" align="center">
        TRENDS
      </div>
        <p align="center" style="padding: 200px 0px;">coming soon</p>
    </div>
    <div style="width: 250px; display: block;" class="profilelinks">
        <p align="left" style="color: #4c4c4c; font-size: 10px;">© 2019 Leryon. All Rights Reserved.</p>
    </div>
  </div>
</div>
</main>
<?php include("includes/footer/footer.php"); ?>
    <?php include "includes/endJScodes.php"; ?>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/navbar-simple.js"></script>
    </body>
    </html>


<?php
}else{
?>
<!--
Leryon DEBUG: <?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];  ?>
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Leryon - Page not found (404)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<style>
      @keyframes floating {
  0% {
    transform: translate3d(0, 0, 0);
  }
  45% {
    transform: translate3d(0, -10%, 0);
  }
  55% {
    transform: translate3d(0, -10%, 0);
  }
  100% {
    transform: translate3d(0, 0, 0);
  }
}
@keyframes floatingShadow {
  0% {
    transform: scale(1);
  }
  45% {
    transform: scale(0.85);
  }
  55% {
    transform: scale(0.85);
  }
  100% {
    transform: scale(1);
  }
}
body {
  background-color: #f7f7f7;
}

.container {
  font-family: 'Varela Round', sans-serif;
  color: #9b9b9b;
  position: relative;
  height: 100vh;
  text-align: center;
  font-size: 16px;
}
.container h1 {
  font-size: 32px;
  margin-top: 32px;
}

.boo-wrapper {
  width: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  paddig-top: 64px;
  paddig-bottom: 64px;
}

.boo {
  width: 160px;
  height: 184px;
  background-color: #f7f7f7;
  margin-left: auto;
  margin-right: auto;
  border: 3.3939393939px solid #9b9b9b;
  border-bottom: 0;
  overflow: hidden;
  border-radius: 80px 80px 0 0;
  box-shadow: -16px 0 0 2px rgba(234, 234, 234, 0.5) inset;
  position: relative;
  padding-bottom: 32px;
  animation: floating 4s ease-in-out infinite;
}
.boo::after {
  content: '';
  display: block;
  position: absolute;
  left: -18.8235294118px;
  bottom: -8.3116883117px;
  width: calc(100% + 32px);
  height: 32px;
  background-repeat: repeat-x;
  background-size: 32px 32px;
  background-position: left bottom;
  background-image: linear-gradient(-45deg, #f7f7f7 16px, transparent 0), linear-gradient(45deg, #f7f7f7 16px, transparent 0), linear-gradient(-45deg, #9b9b9b 18.8235294118px, transparent 0), linear-gradient(45deg, #9b9b9b 18.8235294118px, transparent 0);
}
.boo .face {
  width: 24px;
  height: 3.2px;
  border-radius: 5px;
  background-color: #9b9b9b;
  position: absolute;
  left: 50%;
  bottom: 56px;
  transform: translateX(-50%);
}
.boo .face::before, .boo .face::after {
  content: '';
  display: block;
  width: 6px;
  height: 6px;
  background-color: #9b9b9b;
  border-radius: 50%;
  position: absolute;
  bottom: 40px;
}
.boo .face::before {
  left: -24px;
}
.boo .face::after {
  right: -24px;
}

.shadow {
  width: 128px;
  height: 16px;
  background-color: rgba(234, 234, 234, 0.75);
  margin-top: 40px;
  margin-right: auto;
  margin-left: auto;
  border-radius: 50%;
  animation: floatingShadow 4s ease-in-out infinite;
}

    </style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="container">
<div class="boo-wrapper">
<div class="boo">
<div class="face"></div>
</div>
<div class="shadow"></div>
<h1 style="font-size: 50px;">#404</h1>
<h1>Whoops!</h1>
<p>
Sorry this page may have been removed,
<br />
or that page doesn't exist!
</p>
<h6>This profile does not exist</h6>
</div>
</div>
</body>
</html>

<?php
}
exit;
?>
