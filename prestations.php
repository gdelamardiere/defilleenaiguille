<?php
define("PAGE", "prestations");
require_once(dirname(__FILE__) . '/config/conf.php');
$listeJS = array(
);
require_once(TEMPLATE . 'header.php');
?>
<div id="content-wrapper" class="clearfix row">
    <div class="content-left twelve columns jquery-plugin">
        <div id="content" class="jquery-plugin">


            <div id="prestations-texte" ><?php include_once(REP_DATA . 'prestations.html'); ?></div>

            <div>
                <ul class="polaroids large-block-grid-4 small-block-grid-2">
                    <li>
                        <a title="les fauteuils" href="<?php echo SITE_FRONT; ?>fauteuils.php">
                            <img src="<?php echo FRONT_IMAGE_MINI . divers::getOneRandomImageFromRep(REP_IMAGE_MINI, "fauteuils/"); ?>" alt="fauteuil">
                        </a>
                    </li>
                    <li>
                        <a title="la teinture murale" href="<?php echo SITE_FRONT; ?>murs-et-fenetres.php">
                            <img src="<?php echo FRONT_IMAGE_MINI . divers::getOneRandomImageFromRep(REP_IMAGE_MINI, "coussins/"); ?>" alt="la teinture murale">
                        </a>
                    </li>
                    <li>
                        <a title="les rideaux" href="<?php echo SITE_FRONT; ?>murs-et-fenetres.php">
                            <img src="<?php echo FRONT_IMAGE_MINI . divers::getOneRandomImageFromRep(REP_IMAGE_MINI, "rideau/"); ?>" alt="les rideaux">
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="polaroids large-block-grid-4 small-block-grid-2">
                    <li>
                        <a title="le lit" href="<?php echo SITE_FRONT; ?>le-lit.php">
                            <img src="<?php echo FRONT_IMAGE_MINI . divers::getOneRandomImageFromRep(REP_IMAGE_MINI, "lit/"); ?>" alt="le lit">
                        </a>
                    </li>
                    <li>
                        <a title="les coussins" href="<?php echo SITE_FRONT; ?>le-lit.php">
                            <img src="<?php echo FRONT_IMAGE_MINI . divers::getOneRandomImageFromRep(REP_IMAGE_MINI, "coussins/"); ?>" alt="les coussins">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');
