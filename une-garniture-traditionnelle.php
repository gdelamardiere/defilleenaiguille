<?php
define("PAGE", "garniture");
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
                $image = divers::getOneRandomImageFromRep(PAGE . "/etape" . $i . "/small/");
                echo '<li><a class="listeetapes" id="etape' . $i . '" href="#"><img src="' . $image . '" alt="' . $image . '" /></a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');
