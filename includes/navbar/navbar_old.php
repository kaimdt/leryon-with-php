  <nav id="nav" class="nav <?php if(isset($navbar_allwayssticky)){ echo "sticky"; } ?>">
  <button class="menu">
  <em class="hamburger"></em>
  </button>
  <div class="brand">
    <?php
      if(isset($navbarlogo)){
        if($navbarlogo == "logo"){
          echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_light_520x140.svg) center center no-repeat; background-size: 100px auto;"><span class=\"brandingtext\" style="position: absolute; font-family: Leryon-Font; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
          echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_dark_520x140.svg) center center no-repeat; background-size: 100px auto;"><span class=\"brandingtext\" style="position: absolute; font-family: Leryon-Font; font-size: 11px; bottom: 8px; left: 165px; color: black; letter-spacing: -1px;">'.$logotext.'</span></a>';
        } elseif($navbarlogo == "icon"){
          echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_icon_light_90x90.svg) center center no-repeat; background-size: 100px auto;"></a>';
          echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_icon_dark_90x90.svg) center center no-repeat; background-size: 100px auto;"></a>';
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
  <a class="navlink" href="/">Home</a>
  </li>
  <li>
  <a class="navlink" href="/library">Help</a>
  </li>
  <li>
  <a class="navlink lastnavlink" href="#search">Settings</a>
  </li>
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
        echo "<div class=\"profile-card\" style=\"margin-right: 20px;\"><a onclick=\"luserdropdown()\"><img style=\"border-radius: 100px; cursor: pointer; float: right;\" src=\"".$MEDIASERVER."/images/userimg.svg\" alt=\"".$_SESSION["username"]."\" width=\"40\" height=\"40\"></a></div>";
      }else{
        echo "<div class=\"profile-card\" style=\"margin-right: 20px;\"><a onclick=\"luserdropdown()\"><img style=\"border-radius: 100px; cursor: pointer; float: right;\" src=\"".$MEDIASERVER.$USERCOVER."/images/".$_SESSION['usid'].".jpg\" alt=\"".$_SESSION["username"]."\" width=\"40\" height=\"40\"></a></div>";
      }
    }else{
      echo "<a class=\"navlink\" href=\"https://accounts".$SDOMAIN."\">Signin</a>";
    }
  ?>
</ln-account>
</ul>
</nav>
  <luserdropdown id="pdBox" data-pdtog="0" style="position: fixed; right: 15px; top: 70px; bottom: auto; display: none; z-index: 999;" class="profiledropdownBox profiledropdown"><div><span class="toTopArrow" style="position: absolute; top: -10px;left:209px;"></span></div>
  <leon id="lnavlocal" style="display: block;">
  <table style="width: 240px; font-size: 15px;">
    <tbody><tr>
      <td style="width: 32px;">
        <div style="border: 1px solid rgba(0, 0, 0, 0.1);width: 60px;height: 60px;overflow: hidden;border-radius:100px;">
          <?php
            if($navbarnum["acmd_profilepicture"] == "0"){
              echo "<img style=\"border-radius: 100px; float: right;\" src=\"".$MEDIASERVER."images/userimg.svg\" alt=\"".$_SESSION["username"]."\" width=\"60\" height=\"60\">";
            }else{
              echo "<img style=\"border-radius: 100px; float: right;\" src=\"".$MEDIASERVER."/images/".$navbarnum["acmd_profilepicture"].".jpg\" alt=\"".$_SESSION["username"]."\" width=\"60\" height=\"60\">";
            }
          ?>
        </div>
      </td>
      <td style="padding: 0px 10px"><span style="color: #848484; font-size: 15px;"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></span><br><span style="color: #848484; font-size: 15px; font-family: Leryon-Font-Light;">@<?php echo $_SESSION['username']; ?></span></td>
    </tr></tbody>
  </table>
    <a class="profiledropdown-link"><span class="lmusic-usericon"></span> Leryon-Konto</a>
    <a class="profiledropdown-link">Help</a>
    <a onclick="luserdropdown_settings()" class="profiledropdown-link">Einstellungen</a>
    <a href="/logout" class="profiledropdown-link">Abmelden</a>
  </leon>
  <leon id="lnavsettings" data-pdtog="0" style="display: none;">
    <table style="width: 240px; font-size: 15px;">
      <tbody><tr>
        <td style="width: 32px;">
          <a onclick="luserdropdown_settings()" class="profiledropdown-link"><span class="lmusic-arrow-left"></span> Einstellungen</a>
        </td>
      </tr></tbody>
    </table>
    <a class="profiledropdown-link" onclick="luserdropdown_language()"><span class="lmusic-language"></span> Language</a>
    <a class="profiledropdown-link" onclick="luserdropdown_darkmode()"><span class="lmusic-darkmode"></span> Dark Mode</a>
  </leon>
  </luserdropdown>
  <div id="localeBase" data-langtog="0" style="position: fixed; right: 15px; top: 70px; bottom: auto; height: 400px; z-index: 999; display: none;" class="profiledropdownBox profiledropdown language-dropdown">
    <span style="display: block; background-color: green;"><a onclick="luserdropdown_language()"><span class="lmusic-arrow-left"></span></a>123</span>
    <li role="button" tabindex="0" id=":44" lang="en" class="language-dropdown-li"><img class="languageImage" src="/assets/images/flags/flag-for-united-states_1f1fa-1f1f8.png1" alt="<?php echo lang("english"); ?>"> <?php echo lang("english"); ?></li>
    <li role="button" tabindex="0" id=":44" lang="de" href="/language-select?continue=/&language=de_DE" class="language-dropdown-li localeBase-27bssN"><img class="languageImage" src="/assets/7fa2adf98f26db34178bb30a63dabe8c.png" alt="<?php echo lang("german"); ?>"> <?php echo lang("german"); ?></li>
    <li role="button" tabindex="0" id=":44" lang="de" class="language-dropdown-li localeBase-27bssN"><img class="languageImage" src="/assets/7fa2adf98f26db34178bb30a63dabe8c.png" alt="<?php echo lang("german"); ?>"> <?php echo lang(""); ?></li>
  </div>
  <script>
  function luserdropdown() {
    var element = document.getElementById("pdBox");
    if($('#pdBox').attr('data-pdtog') == '0'){
      $('#pdBox').show();
      $('#pdBox').attr('data-pdtog','1');
    }else{
      $('#pdBox').hide();
      $('#pdBox').attr('data-pdtog','0');

      $('#localeBase').hide();
      $('#localeBase').attr('data-langtog','0');

      $('#lnavsettings').hide();
      $('#lnavsettings').attr('data-pdtog','0');

      $('#lnavlocal').show();
    }
  }
  function luserdropdown_settings() {
    var element = document.getElementById("pdBox");
    if($('#lnavsettings').attr('data-pdtog') == '0'){
      $('#lnavsettings').show();
      $('#lnavlocal').hide();
      $('#lnavsettings').attr('data-pdtog','1');
    }else{
      $('#lnavsettings').hide();
      $('#lnavlocal').show();
      $('#lnavsettings').attr('data-pdtog','0');
    }
  }
  function luserdropdown_language() {
    var element = document.getElementById("pdBox");
    if($('#localeBase').attr('data-langtog') == '0'){
      $('#localeBase').show();
      $('#lnavsettings').hide();
      $('#lnavlocal').hide();
      $('#localeBase').attr('data-langtog','1');
    }else{
      $('#localeBase').hide();
      $('#lnavsettings').show();

      $('#localeBase').attr('data-langtog','0');
    }
  }
  var modalPrivacy = document.getElementById('lbody');
  window.onclick = function(event) {
      if (event.target == modalPrivacy) {
        $('#pdBox').hide();
        $('#pdBox').attr('data-pdtog','0');

        $('#localeBase').hide();
        $('#localeBase').attr('data-langtog','0');

        $('#lnavsettings').hide();
        $('#lnavsettings').attr('data-pdtog','0');

        $('#lnavlocal').show();
      }
  }

  </script>
  <style>
  .language-dropdown-li {
    list-style: none;
    padding: 10px 5px;
    display: block;
    color: gray;
    cursor: pointer;
    text-decoration: none;
  }
  .language-dropdown-li:hover {
    padding: 10px 5px;
    background-color: #E3E3E3;
    display: block;
    transition: 0.3s;
  }
  .language-dropdown-li .languageImage {
    position: relative;
    top: 7px;
    margin-right: 3px;
  }
  .language-dropdown {
    overflow-y: scroll;
  }
  .lastnavlink {
    margin-right: 80px;
  }
  ln-account {
    position: absolute;
    top: 0px;
    right: 15px;
    margin: 0;
    text-align: center;
    display: inline-block;
    list-style: none;
  }
  .sticky ln-account {
    text-align: center;
    display: inline-block;
    list-style: none;
    padding-top: 10px;
    border-radius: 100%;
  }
  .profiledropdownBox{
    display: none;
    background: #ffffff;
    padding: 5px;
    position: absolute;
    bottom: 50px;
    max-width: 315px;
    //box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.18);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    z-index: 1;
    //border: 1px solid #e2e2e2;
}
.toTopArrow{
    width: 10px;
    height: 10px;
    border-left: 10px solid rgba(0, 0, 0, 0);
    border-right: 10px solid rgba(0, 0, 0, 0);
    border-bottom: 10px solid white;
}
.toBottomArrow{
    width: 10px;
    height: 10px;
    border-left: 10px solid rgba(0, 0, 0, 0);
    border-right: 10px solid rgba(0, 0, 0, 0);
    border-top: 10px solid white;
}
*{
  box-sizing: border-box;
}
.profiledropdown {
  padding: 10px;
  display: block;
  font-family: Leryon-Font;
  font-weight: 500;
  color: black;
}
.profiledropdown-link {
  padding: 10px 5px;
  display: block;
  color: gray;
  cursor: pointer;
  text-decoration: none;
}
.profiledropdown-link:hover {
  padding: 10px 5px;
  background-color: #E3E3E3;
  display: block;
  text-decoration: none;
  transition: 0.3s;
  color: gray;
}
@font-face { font-family: 'Leryon-Font';
             src: url('/assets/fonts/Leryon-Font.ttf') format('truetype');
           }
@font-face { font-family: 'Leryon-Font-Light';
             src: url('/assets/fonts/Leryon-Font-Light.ttf') format('truetype');
           }
  </style>
