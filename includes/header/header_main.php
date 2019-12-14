<!DOCTYPE html>
<html lang="" dir="ltr">
<head>
  <title><?php if(isset($pagetitle)){ echo $pagetitle; if($withdot == "true" OR $withdot == ""){ echo " • Leryon"; } } ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php if(isset($pagedescription)){ echo $pagedescription; } ?>" />
    <meta name="keywords" content="<?php if(isset($pagekeywords)){ echo $pagekeywords; } ?>" />
    <meta name="author" content="Leon Team" />
    <meta name="publisher" content="Leon" />
    <meta name="copyright" content="©<?php echo date("Y"); ?> Leon. All Rights Reserved." />
    <meta name="generator" content="LeEngine Zeeo" />
    <script type="text/javascript">
window.onbeforeunload = function(){
    var st = "0";
    $.ajax({
        type: "POST",
        url: "includes/userStatus.php",
        data: {'st':st}
    });
}

</script>
<link rel='shortcut icon' type='image/x-icon' href='/assets/images/icon.png' />
<link rel="stylesheet" href="/lestyle/leonicon.leoncss" />
<link rel="stylesheet" href="/lestyle/letheme.leoncss?pi=myle-p" />
<?php if(isset($navbar)){
  if($navbar == "main"){
    echo "<link rel=\"stylesheet\" href=\"/lestyle/lenav.leoncss\">";
  }elseif($navbar == "middle"){
    echo "<link rel=\"stylesheet\" href=\"/assets/css/navbar/leryon-navbar-middle.css\">";
  }elseif($navbar == "simple"){
    echo "<link rel=\"stylesheet\" href=\"/assets/css/navbar/leryon-navbar-simple.css\">";
  }elseif($navbar == "html"){
    echo "?????";
  }
}
?>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.form.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.maxlength.js"></script>
</head>
