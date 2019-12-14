  <nav id="nav" class="nav <?php if(isset($navbar_allwayssticky)){ echo "sticky"; } ?>">
  <button class="menu">
  <em class="hamburger"></em>
  </button>
  <div class="brand">
    <?php
      if(isset($navbarlogo)){
        if($navbarlogo == "logo"){
          echo '<a href="'.$DOMAIN.'/" class="lightlogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_light_212x90.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
          echo '<a href="'.$DOMAIN.'/" class="darklogo" style="padding: 4px 115px 3px 0px; background: url(/assets/images/branding/brandmark_dark_212x90.svg) center center no-repeat; background-size: 100px auto;"><span style="position: absolute; font-size: 11px; bottom: 8px; left: 165px; color: white; letter-spacing: -1px;">'.$logotext.'</span></a>';
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
  <a class="navlink" href="/">Home</a>
  </li>
  <li>
  <a class="navlink" href="/library">Library</a>
  </li>
  <li>
  <a class="navlink" href="#search">Search <i class="fas fa-search"></i></a>
  </li>
  <?php
    if(isset($_SESSION['Username'])) {
      $uisql = "SELECT * FROM lnmusic_artists";
      $que = $conn->prepare($uisql);
      $que->bindParam(':artist_name', $artist, PDO::PARAM_STR);
      $que->execute();
        while($row = $que->fetch(PDO::FETCH_ASSOC)){
          if($row["lnmusic_usid"] == $_SESSION['id']){
            echo "<a href=\"/artist/".$row["artist_name"]."\">Artist Konto: ".$row["lnmusic_displayname"]."</a>";
          }
        }
    }
  ?>
  <ln-account>
  <?php
    if(isset($_SESSION['Username'])) {
      echo "<img height=\"40px\" width=\"40px\" style=\"border-radius: 100%;\" src=\"".$MEDIASERVER1.$USERCOVER."https://leryon-developer.com/imgs/user_imgs/1560508015932008584.png\">";
    }else{
      echo "<a class=\"navlink\" href=\"https://accounts".$SDOMAIN."\">Signin</a>";
    }
  ?>
  </ln-account>
  </ul>
  </nav>
<style>
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
  padding-top: 12.5px;
  border-radius: 100%;
}
</style>
