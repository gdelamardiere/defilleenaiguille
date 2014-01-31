<?php

define("PAGE", "accueil");
$cookie = (isset($_COOKIE["animation"])) ? true : false;
if (!$cookie) {
    setcookie("animation", "1", time() + 60 * 60 * 24);
}
require_once(dirname(__FILE__) . '/prestations.php');