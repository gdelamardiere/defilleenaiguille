<?php
/**
 * This file is part of the GOLF project.
 * Il s'agit du fichier racine du site. il affiche le formulaire de connection et redirige une fois connecté ver la page de pilotage
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 */
require_once(dirname(__FILE__) . '/bootstrap.inc.php');

$title = "gestion_images";
$listeJS = array("configuration/ckeditor/ckeditor.js", "configuration/ckeditor/config.js");
require_once(TEMPLATE . 'header_admin.php');
if (!empty($_POST['contenu'])) {
    foreach ($_POST['contenu'] as $file => $value) {
        file_put_contents(REP_DATA . $file . ".html", $value);
    }
}
$listeFichier = divers::listeHtmlFromRep(REP_DATA);
?>
<div id="content-wrapper" class="clearfix row">
    <div class="content-left twelve columns jquery-plugin">
        <form class="well span8" method="POST" action="<?php echo FRONT_ADMINISTRATION; ?>gestion_contenu.php">
            <?php foreach ($listeFichier as $value) { ?>
                <div class="textarea">
                    <label>contenu <?php echo $value; ?></label>
                    <textarea class="ckeditor" id="<?php echo $value; ?>" name="contenu[<?php echo $value; ?>]" data-validation="required" rows="5"><?php echo file_get_contents(REP_DATA . $value . ".html"); ?></textarea>
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-default active">Envoyer</button>
        </form>
    </div>
</div>

<?php
require_once(TEMPLATE . 'footer.php');



