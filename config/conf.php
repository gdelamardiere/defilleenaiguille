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
 * connection à la base
 */
//A CHANGER EN PRODUCTION
define("HOSTNAME_BASE", "localhost");
define("DATABASE_BASE", "golf");
//A CHANGER EN PRODUCTION
define("USERNAME_BASE", "root");
//A CHANGER EN PRODUCTION
define("PASSWORD_BASE", "");
define("PREFIX_BASE", "");
define("ENCODAGE_BDD", "latin1");
//-------------------------------------------------------------------------------
/**
 *  répertoire réel
 */
define("TEMPLATE", ROOT . "templates/");
define("REP_IMAGE", ROOT . "img/");
define("REP_CLASSE", ROOT . "classes/");
define("REP_DATA", ROOT . "data/");

//-------------------------------------------------------------------------------
/**
 *  répertoire front
 */
define("FRONT_IMAGE", SITE_FRONT . "img/");
define("FRONT_CSS", SITE_FRONT . "css/");
define("FRONT_ADMINISTRATION", SITE_FRONT . "administration/");



//-------------------------------------------------------------------------------
/**
 * configuration des MAILS
 */
//A CHANGER EN PRODUCTION
define('MAIL_FROM', "GOLF");
//A CHANGER EN PRODUCTION
define('MAIL_FROM_EMAIL', "gdeveilleche@webmail.alten.fr");
define('LOCAL_MAIL', 'gdeveilleche@webmail.alten.fr');



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
DEFINE("MEDIUM_HEIGHT", 360);