<?php
require_once(TEMPLATE . 'header.php');
?>
<div id="content-wrapper" class="clearfix row">
    <div id="main-content">


        <div class="texte-right" ><?php include_once(REP_DATA . PAGE . '.html'); ?></div>

        <div class="image-left">
            <img src="<?php echo divers::getOneRandomImageFromRep(PAGE . "/"); ?>" alt="<?php echo PAGE; ?>">
        </div>
    </div>
    <div class="bloc-caroussel">
        <ul id="carousel" class="elastislide-list">
            <?php
            $listeImage = divers::listeImageFromRep(REP_IMAGE . PAGE . "/small");
            foreach ($listeImage as $image) {
                echo '<li><a href="' . FRONT_IMAGE . PAGE . '/' . $image . '" rel="lightbox"><img src="' . FRONT_IMAGE . PAGE . '/small/' . $image . '" alt="' . $image . '" /></a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');