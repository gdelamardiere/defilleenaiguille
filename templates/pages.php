<?php
$listeJS = array(
    "js/vendor/modernizr-2.6.2-respond-1.1.0.min.js",
    "caroussel/js/jquery.elastislide.js",
    "js/caroussel.js", "js/pages.js",
    "lightbox/js/prototype.js",
    "lightbox/js/scriptaculous.js?load=effects,builder",
    "lightbox/js/lightbox.js",
);
require_once(TEMPLATE . 'header.php');
$mainImage = divers::getOneRandomImageFromRep(PAGE . "/medium/");
?>
<div id="content-wrapper" class="clearfix row">
    <div id="main-content">


        <div class="texte-right" ><?php include_once(REP_DATA . PAGE . '.html'); ?></div>

        <div class="image-left">
            <a href="<?php echo FRONT_IMAGE . PAGE . "/" . $mainImage; ?>" rel="lightbox">
                <img src="<?php echo FRONT_IMAGE . PAGE . "/medium/" . $mainImage; ?>" alt="<?php echo PAGE; ?>">
            </a>
        </div>
    </div>
    <div class="bloc-caroussel">
        <ul id="carousel" class="elastislide-list">
            <?php
            $listeImage = divers::listeImageFromRep(REP_IMAGE . PAGE . "/small");
            foreach ($listeImage as $image) {
                echo '<li><img class="rise" src="' . FRONT_IMAGE . PAGE . '/small/' . $image . '" alt="' . $image . '" /></li>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');