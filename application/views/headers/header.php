
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> -->
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assists/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assists/css/bootstrap-rtl.css">

  <!--
  <script src="js/jquery-3.3.1.min.js" charset="utf-8" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--[if IE]><script type="text/javascript" src="<?=base_url();?>assists/js/excanvas.js"></script><![endif]-->
  <script src="<?=base_url();?>assists/js/html5-canvas-drawing-app.js" charset="utf-8"></script>

  <!-- <link rel="stylesheet" href="<?=base_url();?>assists/css/main-style.css"> -->
  <link rel="stylesheet" href="<?=base_url();?>assists/css/store.css">

  <script>
    function openMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
  </script>

  <title>Smart Store</title>

</head>
<body>

  <!-- <div class="topnav" id="myTopnav">
    <a href="javascript:void(0)">مقارنة الاسعار</a>
    <a href="<?=base_url();?>" ><img height="20" src="<?=base_url();?>assists/images/home.png"/> الرئيسية </a>
    <a href="<?=base_url();?>home/add_url"  ><img height="20" src="<?=base_url();?>assists/images/add.png"/> اضافة روابط </a>
    <a href="<?=base_url();?>home"  ><img height="20" src="<?=base_url();?>assists/images/settings.png"/>اعداداتي</a>
    <a href="<?=base_url();?>home"  ><img height="20" src="<?=base_url();?>assists/images/logout.png"/>تسجيل الخروج</a>
    <a href="javascript:void(0);" class="icon" onclick="openMenu()">
      <i class="fa fa-bars"></i>
    </a>
  </div> -->
  <a href="<?=base_url();?>index.php/home">
    <img src="<?=base_url();?>assists/images/logo.jpg" width="150" height="150">
  </a>
