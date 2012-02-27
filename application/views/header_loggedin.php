<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <base href="<?php echo base_url() ?>">

  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="resources/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Bree+Serif' rel='stylesheet' type='text/css'>
  <link rel="icon" href="resources/favicon.ico" type="image/ico"> 

  <script src="resources/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="resources/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="resources/js/plugins.js"></script>
  <script src="resources/js/script.js"></script>

</head>

<body>

<div id="container">

  <header>

    <div id="header_pattern"></div>
    <div id="header_nav">

      <div id="header_inner">

        <div id="logo"><h1><a href="#"><span>Smart</span>Scan</a></h1></div>

        <nav id="main_navigation">
          <ul>
            <li><a href="profile"><img src="resources/img/icon-register-small.png" alt="Profiel icoon"><?php echo $username; ?></a></li>
            <li><a href="logout"><img src="resources/img/icon-lock-small.png" alt="Afmelden icoon">Afmelden</a></li>
          </ul>
        </nav>

      </div>
    
    </div>
      
  </header>