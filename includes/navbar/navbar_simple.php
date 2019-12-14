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
  </ul>
  </nav>
