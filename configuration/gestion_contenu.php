<?php

/**
 * This file is part of the GOLF project.
 * Il s'agit du fichier racine du site. il affiche le formulaire de connection et redirige une fois connecté ver la page de pilotage
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 */
require_once(dirname(__FILE__) . '/bootstrap.inc.php');
// task contient le traitement à effectuer : listage par défaut
$sTask = divers::get_value_get_post('Task', '');

// Récupération du login et du mot de passe saisis par l'utilisateur
$sLogin = divers::get_value_post("loginCrit");
$sPassword = divers::get_value_post("passwordCrit");
if (!empty($_GET['url_asked'])) {
    $_SESSION['url_asked'] = $_GET['url_asked'];
}

// Connexion à l'application
if ($sTask == 'login') {
    // Vérifie que l'utilisateur peut bien se connecter avec ce login et ce mot de passe
    if ($user->doLogin($sLogin, $sPassword) !== false) {
        // Sauvegarde des valeurs importantes en session (ID_USER, Role, etc...)
        if (!empty($_SESSION['url_asked'])) {
            // Redirection vers la page appelée avant perte de la session
            $sRedirectPage = $_SESSION['url_asked'];
            $_SESSION['url_asked'] = '';
        } else {
            // Redirection vers la page par défaut
            $sRedirectPage = 'pilotage.php';
        }
        divers::redirect($sRedirectPage);
    }
} else if ($sTask == 'deconnection') {
    $user->doLogout();
    $sRedirectPage = 'index.php';
    divers::redirect($sRedirectPage);
} else if (isset($_SESSION["connectedUserId"])) {
    $sRedirectPage = 'pilotage.php';
    divers::redirect($sRedirectPage);
}
$title = "Pilotage";
require_once(TEMPLATE . 'header_admin.php');
require_once(TEMPLATE . 'login.php');
require_once(TEMPLATE . 'footer.php');



