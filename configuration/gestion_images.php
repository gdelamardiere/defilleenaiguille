<?php
/**
 * This file is part of the GOLF project.
 * Il s'agit du fichier racine du site. il affiche le formulaire de connection et redirige une fois connecté ver la page de pilotage
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 */
require_once(dirname(__FILE__) . '/bootstrap.inc.php');
$title = "Pilotage";
$listeJS = array();
require_once(TEMPLATE . 'header_admin.php');
?>
<div class="clearfix row">
    <iframe class="CKFinderFrame" width="100%" scrolling="no" height="500" frameborder="0" src="kcfinder/browse.php?lng=fr&type=img">
    </iframe>
</div>
<?php
require_once(TEMPLATE . 'footer.php');



