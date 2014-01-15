<?php
define("PAGE", "prestations");
require_once(dirname(__FILE__) . '/config/conf.php');
$listeJS = array(
);
$listeCSS = array("css/modal.css",
    "css/tableau.css",
    "css/libs/jquery.contextMenu.css",
    "css/transactions.css",
    "js/libs/autocompletion/css/ui-lightness/jquery-ui-1.10.3.custom.css",
    "js/libs/datepicker/css/datepicker.css");
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
                            <img src="<?php echo FRONT_IMAGE . "fauteuils/medium/" . divers::getOneRandomImageFromRep("fauteuils/medium/"); ?>" alt="fauteuil">
                        </a>
                    </li>
                    <li>
                        <a title="la teinture murale" href="<?php echo SITE_FRONT; ?>murs-et-fenetres.php">
                            <img src="<?php echo FRONT_IMAGE . "coussins/medium/" . divers::getOneRandomImageFromRep("coussins/medium/"); ?>" alt="la teinture murale">
                        </a>
                    </li>
                    <li>
                        <a title="les rideaux" href="<?php echo SITE_FRONT; ?>fauteuils.php">
                            <img src="<?php echo FRONT_IMAGE . "rideau/medium/" . divers::getOneRandomImageFromRep("rideau/medium/"); ?>" alt="les rideaux">
                        </a>
                    </li>
                    <li>
                        <a title="le lit" href="<?php echo SITE_FRONT; ?>fauteuils.php">
                            <img src="<?php echo FRONT_IMAGE . "lit/medium/" . divers::getOneRandomImageFromRep("lit/medium/"); ?>" alt="le lit">
                        </a>
                    </li>
                    <li>
                        <a title="les coussins" href="<?php echo SITE_FRONT; ?>fauteuils.php">
                            <img src="<?php echo FRONT_IMAGE . "coussins/medium/" . divers::getOneRandomImageFromRep("coussins/medium/"); ?>" alt="les coussins">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');
