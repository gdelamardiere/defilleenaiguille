<?php

/**
 * This file is part of the GOLF project.
 * Il s'agit du fichier de configuration du site
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 */
/**
 * Config globales
 */
//A CHANGER EN PRODUCTION
define("SITE_FRONT", "http://defilleenaiguille/"); //ATTENTION AU / FINAL !!!!!
define("ROOT", dirname(__FILE__) . "/../");
//-------------------------------------------------------------------------------
/**
 *  Numéro de version
 */
define("VERSION", '1.0');


//-------------------------------------------------------------------------------
/**
 *  répertoire réel
 */
define("IMAGE_MINI", "small");
define("IMAGE_MEDIUM", "medium");
define("REP_DATA", ROOT . "data/");
define("TEMPLATE", ROOT . "templates/");
define("REP_IMAGE", REP_DATA . "img/");
define("REP_IMAGE_MEDIUM", REP_DATA . IMAGE_MINI . "/img/");
define("REP_IMAGE_MINI", REP_DATA . IMAGE_MEDIUM . "/img/");
define("REP_CLASSE", ROOT . "classes/");


define("REP_ADMIN", ROOT . "configuration/");

//-------------------------------------------------------------------------------
/**
 *  répertoire front
 */
define("FRONT_DATA", SITE_FRONT . "data/");
define("FRONT_IMAGE", FRONT_DATA . "img/");
define("FRONT_IMAGE_MEDIUM", FRONT_DATA . IMAGE_MEDIUM . "/img/");
define("FRONT_IMAGE_MINI", FRONT_DATA . IMAGE_MINI . "/img/");
define("FRONT_CSS", SITE_FRONT . "css/");
define("FRONT_ADMINISTRATION", SITE_FRONT . "configuration/");




//-------------------------------------------------------------------------------
/**
 * configuration des MAILS
 */
//A CHANGER EN PRODUCTION
define('MAIL_FROM', "defilleenaiguille");
//A CHANGER EN PRODUCTION
define('MAIL_FROM_EMAIL', "gdeveilleche@webmail.alten.fr");
define('SEND_MAIL', 'gdelamardiere@gmail.com');



//-------------------------------------------------------------------------------
/**
 * configuration du salt
 */
define('PREFIX_SALT', '1f5%!sdDR1&');
define('SUFFIX_SALT', '151SDds*^d12f*%df.s1');

require_once(REP_CLASSE . '/divers.class.php');
spl_autoload_register('divers::my_autoloader');

/*
 * configuration des images
 */
DEFINE("MINIATURE_HEIGHT", 120);
DEFINE("MINIATURE_WIDTH", 300);
DEFINE("IMAGE_MAX_HEIGHT", 700);
DEFINE("IMAGE_MAX_WIDTH", 900);
DEFINE("MEDIUM_HEIGHT", 360);
DEFINE("MEDIUM_WIDTH", 500);

//-------------------------------------------------------------------------------
/**
 *  Configuration des Sessions
 */
define('APPLI_TIMEOUT', '72000');
define('DUREE_SESSION', 10800);

//gestion des utilisateurs
$USERS[1] = array("id" => 1, "user" => "DEFILLE", "password" => "b2b00d00994316334635e343ff852fc0", "role" => "SUPER_ADMINISTRATEUR", "actif" => 1);