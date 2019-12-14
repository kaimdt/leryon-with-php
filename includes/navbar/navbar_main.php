<nav id="nav" class="nav <?php if(isset($navbar_allwayssticky)){ echo "sticky"; } ?>">
<button class="menu">
<em class="hamburger"></em>
</button>
<div class="brand">
  <?php
    if(isset($navbarlogo)){
      if($navbarlogo == "logo"){
        echo '<a href="'.$DOMAIN.'/" class="lightlogo branding" style="background: url(/assets/images/branding/brandmark_light_370x140.svg) center center no-repeat;"><span class=\"brandingtext\" style="position: absolute; font-family: LeFont; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
        echo '<a href="'.$DOMAIN.'/" class="darklogo branding" style="background: url(/assets/images/branding/brandmark_dark_370x140.svg) center center no-repeat;"><span class=\"brandingtext\" style="position: absolute; font-family: LeFont; font-size: 11px; bottom: 8px; left: 165px; color: black; letter-spacing: -1px;">'.$logotext.'</span></a>';
      } elseif($navbarlogo == "icon"){
        echo '<a href="'.$DOMAIN.'/" class="lightlogo brandingicon" style="background: url(/assets/images/branding/brandmark_icon_light_90x90.svg) center center no-repeat;"></a>';
        echo '<a href="'.$DOMAIN.'/" class="darklogo brandingicon" style="background: url(/assets/images/branding/brandmark_icon_dark_90x90.svg) center center no-repeat;"></a>';
      } elseif($navbarlogo == "text"){
        echo "<a class=\"brandingtext\" href=\"".$DOMAIN."\">".$logotext."</a>";
      }
    } else {
      echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_light_212x90.svg) center center no-repeat; background-size: 100px auto;"><span class=\"brandingtext\" style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px; display: none;">'.$logotext.'</span></a>';
      echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_dark_212x90.svg) center center no-repeat; background-size: 100px auto;"><span class=\"brandingtext\" style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px; display: none;">'.$logotext.'</span></a>';
    }
  ?>
</div>
<ul class="navbar">
<li>
  <input type="search" placeholder="Search">
</li>
<li>
  <a class="navlink" href="/">Home</a>
</li>
<li>
  <a class="navlink" href="/services">Our Services</a>
</li>
<li>
  <a class="navlink" href="/locations">Locations</a>
</li>
<li>
  <a class="navlink" href="#search">LeCloud</a>
</li>
</ul>
<ln-account>
<?php
$accountid = $_SESSION["usid"];
$navbarsql = "SELECT * FROM acm_accounts_details WHERE acmd_usid= :usid";
$navbarquery = $conn_acm->prepare($navbarsql);
$navbarquery->bindParam(':usid', $accountid, PDO::PARAM_STR);
$navbarquery->execute();
$navbarnum = $navbarquery->fetch(PDO::FETCH_ASSOC);
if(isset($_SESSION['username'])) {
  //echo "<img height=\"40px\" width=\"40px\" style=\"border-radius: 100%;\" src=\"".$MEDIASERVER1.$USERCOVER."/images/".$_SESSION['usid'].".jpg\">";
  if($navbarnum["acmd_profilepicture"] == "0"){
    echo "<div class=\"navprofilephoto\" style=\"margin-right: 20px;\"><a id=\"ledropdownbutton\" onclick=\"leuserdropdown()\"><img style=\"border-radius: 100px; cursor: pointer; float: right;\" src=\"".$MEDIASERVER."/images/userimg.svg\" alt=\"".$_SESSION["username"]."\" width=\"40\" height=\"40\"></a></div>";
  }else{
    echo "<div class=\"navprofilephoto\" style=\"margin-right: 20px;\"><a id=\"ledropdownbutton\" onclick=\"leuserdropdown()\"><img style=\"border-radius: 100px; cursor: pointer; float: right;\" src=\"".$MEDIASERVER."grove/".$_SESSION["usid"]."/".$_SESSION["picid"]."/r40-100/photo.jpg"."\" alt=\"".$_SESSION["username"]."\" ></a></div>";
  }
}else{
  //IF USER OUTLOG
  echo "<div class=\"navprofilephoto\" style=\"margin-right: 20px;\"><a id=\"ledropdownbutton\" onclick=\"leuserdropdown()\"><img style=\"border-radius: 100px; cursor: pointer; float: right;\" src=\"".$MEDIASERVER."images/userimg.svg\" alt=\"".$_SESSION["username"]."\" width=\"40\" height=\"40\"></a></div>";
}
?>
</ln-account>
</nav>
<leuserdropdown id="pdBox" data-pdtog="0" style="display: none; z-index: 999;" class="profiledropdownBox profiledropdown"><div><span class="toTopArrow" style="position: absolute; top: -10px;left:209px;"></span></div>
<leon id="lnavlocal" style="display: block;">
<?php if(isset($_SESSION['username'])) { ?>
<table style="width: 240px; font-size: 15px;">
  <tbody><tr>
    <td style="width: 32px;">
      <div style="border: 1px solid rgba(0, 0, 0, 0.1);width: 60px;height: 60px;overflow: hidden;border-radius:100px;">
        <?php
          if($navbarnum["acmd_profilepicture"] == "0"){
            echo "<img style=\"border-radius: 100px; float: right;\" src=\"".$MEDIASERVER."images/userimg.svg\" alt=\"".$_SESSION["username"]."\" width=\"60\" height=\"60\">";
          }else{
            echo "<img style=\"border-radius: 100px; float: right;\" src=\"".$MEDIASERVER."grove/".$_SESSION["usid"]."/".$_SESSION["picid"]."/r60-100/photo.jpg"."\" alt=\"".$_SESSION["username"]."\" width=\"60\" height=\"60\">";
          }
        ?>
      </div>
    </td>
    <td style="padding: 0px 10px"><span style="color: black; font-size: 15px;"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></span><br><span style="color: black; font-size: 15px; font-family: LeFont_Light;">@<?php echo $_SESSION['username']; ?></span></td>
  </tr></tbody>
</table>
  <a href="https://my<?php echo $SDOMAIN; ?>" class="profiledropdown-link"><span class="leonicon-userimg leonicon"></span> Leryon-Konto</a>
  <a onclick="leuserdropdown_settings()" class="profiledropdown-link"><span class="leonicon-cog leonicon"></span> Einstellungen</a>
  <a href="https://accounts<?php echo $SDOMAIN;?>/logout?continue=<?php echo $DOMAIN; ?>" class="profiledropdown-link">Abmelden</a>
<?php }else { ?>
    <table style="width: 240px; font-size: 15px;">
      <tbody><tr>
        <td style="width: 32px;">
        </td>
      </tr></tbody>
    </table>
    <a href="https://accounts<?php echo $SDOMAIN; ?>?ServiceLogin=signin&continue=<?php echo $DOMAIN; ?>/&service=Leryon Account" class="profiledropdown-link">Signin</a>
    <a href="https://accounts<?php echo $SDOMAIN; ?>?ServiceLogin=signup&continue=<?php echo $DOMAIN; ?>/&service=Leryon Account" class="profiledropdown-link">Signup</a>
    <a onclick="leuserdropdown_settings()" class="profiledropdown-link">Einstellungen</a>
<?php } ?>
</leon>
<leon id="lnavsettings" data-pdtog="0" style="display: none;">
  <table style="width: 240px; font-size: 15px;">
    <tbody><tr>
      <td style="width: 32px;">
        <a onclick="leuserdropdown_settings()" class="profiledropdown-link"><span class="leonicon-arrow-left"></span> Einstellungen</a>
      </td>
    </tr></tbody>
  </table>
  <a id="text" class="profiledropdown-link" onclick="leuserdropdown_language()"><span class="leonicon-language"></span> Language</a>
  <a class="profiledropdown-link"><span class="leonicon-darkmode"></span> Dark Mode <input id="darkmode" type="checkbox" style="float: right;" onclick="luserdropdown_darkmode()" id="darkmode" checked></a>
</leon> <!--target="_blank"-->
</leuserdropdown>
<div id="localeBase" data-langtog="0" style="position: fixed; right: 15px; top: 70px; bottom: auto; height: 400px; z-index: 999; display: none;" class="profiledropdownBox profiledropdown language-dropdown">
  <span style="display: block; background-color: green;"><a onclick="leuserdropdown_language()"><span class="leonicon-arrow-left"></span>123</a></span>
  <li role="button" tabindex="0" id=":44" lang="en" class="language-dropdown-li"><img class="languageImage" src="/assets/images/flags/flag-for-united-states_1f1fa-1f1f8.png1" alt="<?php echo lang("english"); ?>"> <?php echo lang("english"); ?></li>
  <li role="button" tabindex="0" id=":44" lang="de" href="/language-select?continue=/&language=de_DE" class="language-dropdown-li localeBase-27bssN"><img class="languageImage" src="/assets/7fa2adf98f26db34178bb30a63dabe8c.png" alt="<?php echo lang("german"); ?>"> <?php echo lang("german"); ?></li>
  <li role="button" tabindex="0" id=":44" lang="de" class="language-dropdown-li localeBase-27bssN"><img class="languageImage" src="/assets/7fa2adf98f26db34178bb30a63dabe8c.png" alt="<?php echo lang("german"); ?>"> <?php echo lang(""); ?></li>
</div>
