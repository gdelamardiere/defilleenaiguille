<?php
define("PAGE", "garniture");
define("TITLE", "tapissier utilisant une garniture traditionnelle à Boulogne Billancourt - de fille en aiguille");
$description = "Donnez un nouveau souffle à votre appartement. Habiller les murs, les fauteuils, les lits, les fenêtres. Frappez chez De fille en aiguille vous verrez, elles sont pleines d'idées";
$keywords = "tapissier décorateur, restauration de fauteuils à Boulogne Billancourt,23 Rue Michelet‎ 92100 Boulogne-Billancourt";
$listeJS = array(
    "js/main.min.js",
    "lightbox/js/lightbox-2.6.min.js"
);
require_once(dirname(__FILE__) . '/config/conf.php');
require_once(TEMPLATE . 'header.php');
?>
<div id="content-wrapper" class="clearfix row">
    <div id="main-content">
        <?php
        include_once(TEMPLATE . "bloc_etape.ajax.php");
        ?>
    </div>
    <div class="bloc-caroussel">
        <ul id="garniture">
            <?php
            for ($i = 1; $i <= 5; $i++) {
                $image = divers::getOneRandomImageFromRep(REP_IMAGE_MINI, PAGE . "/etape" . $i . "/");
                echo '<li><a class="listeetapes" title="titre étape' . $i . '" id="etape' . $i . '" href="#"><img src="' . FRONT_IMAGE_MINI . $image . '" alt="titre étape' . $i . '"/></a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');
