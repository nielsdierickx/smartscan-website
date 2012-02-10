<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  
  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <base href="<?php echo base_url() ?>">
  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" type="text/css" href="resources/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Bree+Serif' rel='stylesheet' type='text/css'>
  <link rel="icon" href="resources/favicon.ico" type="image/ico"> 
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="resources/js/libs/modernizr-2.0.6.min.js"></script>
  
  
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
            <li><a href="#"><img src="resources/img/profile-icon.png" alt="Profiel icoon"><?php echo $username; ?></a></li>
            <li><a href="logout"><img src="resources/img/lock-icon.png" alt="Afmelden icoon">Afmelden</a></li>
          </ul>
        </nav>

      </div>
    
    </div>
      
  </header>
