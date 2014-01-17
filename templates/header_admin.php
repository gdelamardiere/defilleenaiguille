<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo SITE_FRONT; ?>css/base3860.css?v=15">


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="container">
            <div id="logo-events" class="constrain clearfix">
                <h2 class="logo"><a href="http://defilleenaiguille" title="De Fille en aiguille">De Fille en aiguille</a></h2>


            </div>

            <nav id="main" class="constrain clearfix">
                <div class="menu-top-container">
                    <ul id="menu-top" class="menu">
                        <li class="menu-item <?php echo (PAGE == "garniture") ? "current" : ""; ?>"><a href="<?php echo FRONT_ADMINISTRATION; ?>gestion_contenu.php">Gestion du contenu</a></li>
                        <li class="menu-item <?php echo (PAGE == "fauteuils") ? "current" : ""; ?>"><a href="<?php echo FRONT_ADMINISTRATION; ?>gestion_images.php">Gestion des images</a></li>
                        <li class="menu-item"><a href="<?php echo SITE_FRONT; ?>prestations.php">Lien vers le Front</a></li>
                        <?php if ($user->hasDroit("menu")) { ?>
                            <li class="menu-item"><a style="font-size:smaller;" href="<?php echo FRONT_ADMINISTRATION; ?>index.php?Task=deconnection">Déconnexion</a></li>
                            <?php } ?>
                    </ul>
                </div>
            </nav>