<?php

/**
 * This file is part of the GOLF project.
 * Il s'agit du fichier de bootstrap du site permettant de charger le fichier de configuration ainsi que les classes nécéssaires via un autoloader
 * il vérifie également qu l'on est bien connecté
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 */
if (!defined("PAGE")) {
    define("PAGE", "ajax");
}
require_once(dirname(__FILE__) . '/../config/conf.php');

$listeCSS = array();
$listeJS = array();
header('Content-Type: text/html; charset=utf-8');
session_start();
$user = user::getInstance();
define("IS_LOAD", true);
if (strpos($_SERVER['PHP_SELF'], "/index.php") === false) {
    // Controle du timeout de la session
    if (!empty($_SESSION['last_access']) && ((int) time() > (int) ($_SESSION['last_access'] + APPLI_TIMEOUT))) {
        //  Session has expired
        $_SESSION = array(); // kill session
        @header("Location: " . FRONT_ADMINISTRATION . "index.php");
        die();
    } else {
        $_SESSION['last_access'] = time();
        // Fin du controle du timeout
        // Si la session a expiré, ou la production est suspendue par le serveur, ou le compte a été supprimé
        if (!isset($_SESSION["connectedUserId"]) || !$user->isActif()) {
            // Met en mémoire l'url actuellement en cours de consultation afin de pouvoir rediriger l'utilisateur lors de sa reconnection
            $_SESSION['url_asked'] = $_SERVER['PHP_SELF'] . (!empty($_SERVER['queryString']) ? "?" . $_SERVER['queryString'] : "");
            // Simule la deconnection de l'utilisateur (évite session_destroy)
            if (isset($_SESSION["connectedUserId"])) {
                unset($_SESSION["connectedUserId"]);
            }
            @header("Location: " . FRONT_ADMINISTRATION . "index.php");
            die();
        }
    }
}

