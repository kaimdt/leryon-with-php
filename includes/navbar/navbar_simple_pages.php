  <nav id="nav" class="nav <?php if(isset($navbar_allwayssticky)){ echo "sticky"; } ?>">
  <button class="menu">
  <em class="hamburger"></em>
  </button>
  <div class="brand">
    <?php
      if(isset($navbarlogo)){
        if($navbarlogo == "logo"){
          echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_light_520x140.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
          echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_dark_520x140.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
        } elseif($navbarlogo == "icon"){
          echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_icon_light_90x90.svg) center center no-repeat; background-size: 100px auto;"></a>';
          echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_icon_dark_90x90.svg) center center no-repeat; background-size: 100px auto;"></a>';
        } elseif($navbarlogo == "text"){
          echo "<a href=\"".$DOMAIN."\">".$logotext."</a>";
        }
      } else {
        echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_light_212x90.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px; display: none;">'.$logotext.'</span></a>';
        echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_dark_212x90.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px; display: none;">'.$logotext.'</span></a>';
      }
    ?>
  </div>
  <ul class="navbar">
  <li>
  <a class="navlink" href="/"><i class="fas fa-arrow-left"></i> Back to Pages</a>
  </li>
  <li>
  <a class="navlink" href="/library">Library</a>
  </li>
  <li>
  <a class="navlink" href="#search">Search <i class="fas fa-search"></i></a>
  </li>
  <ln-music-account>
  <?php
    if(isset($_SESSION['Username'])) {
      echo "<img height=\"40px\" width=\"40px\" style=\"border-radius: 100%;\" src=\"".$MEDIASERVER1.$USERCOVER."https://leryon-developer.com/imgs/user_imgs/1560508015932008584.png\">";
    }else{
      echo "<a class=\"navlink signin\" href=\"https://accounts".$SDOMAIN."\"><i class=\"fas fa-user-circle\"></i> Signin</a>";
    }
  ?>
  </ln-music-account>
  </ul>
  </nav>
<style>
.navlink {
  font-weight: bold;
  font-size: 15px;
}
.navlink:hover {
  font-weight: bold;
  color: #222222;
}
.sticky, .navlink {
  color: #222222;
  background-color: white;
}
.navlink:hover {
  color: #ef1f2f;
}
ln-music-account {
  position: absolute;
  top: 0px;
  right: 15px;
  margin: 0;
  text-align: center;
  display: inline-block;
  list-style: none;
}
.sticky ln-music-account {
  text-align: center;
  display: inline-block;
  list-style: none;
  padding-top: 12.5px;
  border-radius: 100%;
}
</style>
