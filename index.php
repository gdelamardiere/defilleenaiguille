<?php

define("PAGE", "accueil");
define("TITLE", "de fille en aiguille - tapissier décorateur, restauration de fauteuils à Boulogne Billancourt");
$description = "Donnez un nouveau souffle à votre appartement. Habiller les murs, les fauteuils, les lits, les fenêtres. Frappez chez De fille en aiguille vous verrez, elles sont pleines d'idées";
$keywords = "tapissier décorateur, restauration de fauteuils à Boulogne Billancourt,23 Rue Michelet‎ 92100 Boulogne-Billancourt";
$cookie = (isset($_COOKIE["animation"])) ? true : false;
if (!$cookie) {
    setcookie("animation", "1", time() + 60 * 60 * 24);
}
require_once(dirname(__FILE__) . '/prestations.php');