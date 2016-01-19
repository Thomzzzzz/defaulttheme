<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<head>
    <title><?php the_title(); ?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="TRUE Communications">
    <meta name="robots" content="index, follow">

    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/touch-icon-iphone.png"><!-- 60x60 -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/touch-icon-ipad-retina.png">

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {
            "message": "Deze website gebruikt cookies om ervoor te zorgen dat uw ervaring van onze website optimaal is!",
            "dismiss": "OK",
//            "learnMore": "Meer info",
//            "link": "",
            "theme": "dark-bottom"};
    </script>
    <!-- End Cookie Consent plugin -->

    <?php wp_head(); ?>
</head>
<body>

<header>
    <!--    header content goes here... -->
    <a class="logo" href="<?php echo home_url(); ?>"></a>
</header>
