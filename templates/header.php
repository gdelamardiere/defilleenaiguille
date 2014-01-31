<?php
header('x-ua-compatible: ie=edge');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo SITE_FRONT; ?>css/base3860.min.css?v=<?php echo VERSION; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_FRONT; ?>caroussel/css/elastislide.min.css?v=<?php echo VERSION; ?>" />
        <link rel="stylesheet" href="<?php echo SITE_FRONT; ?>lightbox/css/lightbox.min.css?v=<?php echo VERSION; ?>" type="text/css" media="screen" />

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="container">
            <div id="logo-events" class="constrain clearfix" style="background-image: url(<?php echo SITE_FRONT; ?>css/images/logo.gif?rand=<?php echo time(); ?>);">
                <h2 class="logo"><a href="http://defilleenaiguille" title="De Fille en aiguille">De Fille en aiguille</a></h2>
            </div>

            <div id="main" class="constrain clearfix">
                <div class="menu-top-container">
                    <ul id="menu-top" class="menu">
                        <li class="menu-item <?php echo (PAGE == "prestations") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>prestations.php">Nos prestations</a></li>
                        <li class="menu-item <?php echo (PAGE == "fauteuils") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>fauteuils.php">Les fauteuils</a></li>
                        <li class="menu-item <?php echo (PAGE == "garniture") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>une-garniture-traditionnelle.php">Une garniture traditionnelle</a></li>
                        <li class="menu-item <?php echo (PAGE == "mursetfenetres") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>murs-et-fenetres.php">Murs et fenêtres</a></li>
                        <li class="menu-item <?php echo (PAGE == "lit") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>le-lit.php">le lit</a></li>
                        <li class="menu-item <?php echo (PAGE == "contact") ? "current" : ""; ?>"><a href="<?php echo SITE_FRONT; ?>contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>