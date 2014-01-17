<?php

/**
 * This file is part of the GOLF project.
 * Definition de la classe divers
 * cette classe contient un certain nombre de fonctions utilisés dans le site
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 * @package classes
 *
 */
class divers
{

    /**
     * Retourne la valeur d'un champ dans l'url (donc en GET) ou dans un formulaire (donc en POST),
     * ou bien la valeur par défaut.
     * Traite le cas des apostrophes quelle que soit la configuration du fichier php.ini (magic_quotes_gpc)
     * @param $sField Nom du champ du formulaire
     * @param string $sDefault Valeur par défaut si le champ n'existe pas
     * @return string la valeur du champ
     *
     */
    public static function get_value_get_post($sField, $sDefault = '')
    {
        $sReturnValue = $sDefault;
        if (isset($_POST[$sField])) {
            $sReturnValue = self::get_value_post($sField, $sDefault);
        } elseif (isset($_GET[$sField])) {
            $sReturnValue = stripslashes($_GET[$sField]);
        }

        return $sReturnValue;
    }

    /**
     * Retourne la valeur d'un champ de formulaire (donc en POST), ou bien la valeur par défaut
     * Traite le cas des apostrophes quelle que soit la configuration du fichier php.ini (magic_quotes_gpc)
     * @param string $sField Nom du champ du formulaire
     * @param string $sDefault Valeur par défaut si le champ n'existe pas
     * @return string la valeur du champ
     *
     */
    public static function get_value_post($sField, $sDefault = '')
    {
        $sReturnValue = $sDefault;
        if (isset($_POST[$sField])) {
            // GE : adaptation aux tableaux (typiquement les champs SELECT)
            if (!is_array($_POST[$sField])) {
                $sReturnValue = stripslashes($_POST[$sField]);
            } else {
                $sReturnValue = $_POST[$sField];
            }
        }

        return $sReturnValue;
    }

    /**
     * Positionne une valeur dans la requete (donc en GET)
     * Attention, utiliser la fonction redirect() ci-dessous pour que cette valeur soit prise en compte
     * @param $sField Nom de la variable
     * @param $value  Valeur de la variable
     * @return void
     *
     */
    public static function set_value_get($sField, $value)
    {
        global $gRequestParam;

        if (!isset($gRequestParam)) {
            $gRequestParam = '';
        } else {
            $gRequestParam .= '&';
        }
        $gRequestParam .= $sField . '=' . urlencode($value);
    }

    /**
     * Retourne la valeur d'une variable en session, ou bien la valeur par défaut
     * Supprime cette variable de la session si spécifié
     * @param string $sField Nom de la variable en session
     * @param string $sDefault Valeur par défaut si la variable n'existe pas
     * @param bool $bDelete Indique s'il faut supprimer la variable de la session après lecture
     * @return string la valeur de la variable
     *
     */
    public static function get_value_session($sField, $sDefault = '', $bDelete = false)
    {
        $sReturnValue = $sDefault;
        if (isset($_SESSION[$sField])) {
            $sReturnValue = $_SESSION[$sField];
            if ($bDelete) {
                unset($_SESSION[$sField]);
            }
        }

        return $sReturnValue;
    }

    /**
     * Positionne une valeur en session
     * Traite le cas des apostrophes quelle que soit la configuration du fichier php.ini
     * @param $sField Nom de la variable en session
     * @param $value Valeur de la variable
     * @return void
     *
     */
    public static function set_value_session($sField, $value)
    {
        $_SESSION[$sField] = $value;
    }

    /**
     * Vérifie si une valeur existe en session
     * @param $sField Nom de la variable en session
     * @return bool
     *
     */
    public static function is_value_session($sField)
    {
        $return = false;
        if (isset($_SESSION[$sField])) {
            $return = true;
        }

        return $return;
    }

    /**
     * Retourne la valeur d'un champ de formulaire, ou bien celle de la variable en session, ou bien la valeur par défaut
     * Traite le cas des apostrophes quelle que soit la configuration du fichier php.ini
     * Supprime cette variable de la session si spécifié
     * Cette méthode est utilisée pour récupérer les données d'un formulaire d'édition, qui peuvent être
     * soit dans le formulaire après un POST, soit en session après une redirection suite à une erreur.
     * A noter les similitudes avec la norme java/weblogic utilisée par ailleurs à DRLD/ITD.
     * @param $sField Nom de la variable en session
     * @param string $sDefault Valeur par défaut si la variable n'existe pas
     * @param bool $bDelete Indique s'il faut supprimer la variable de la session après lecture
     * @return string la valeur de la variable
     *
     */
    public static function get_value_post_session($sField, $sDefault = '', $bDelete = false)
    {
        if (isset($_POST[$sField])) {
            $sReturnValue = self::get_value_post($sField);
        } else {
            $sReturnValue = self::get_value_session($sField, $sDefault, $bDelete);
        }

        return $sReturnValue;
    }

    /**
     * Retourne la valeur d'un champ de formulaire (GET ou POST), ou bien celle de la variable en session, ou bien la valeur par défaut
     * Traite le cas des apostrophes quelle que soit la configuration du fichier php.ini
     * Supprime cette variable de la session si spécifié
     * Cette méthode est utilisée pour récupérer les données d'un formulaire d'édition, qui peuvent être
     * soit dans le formulaire après un POST ou GET, soit en session après une redirection suite à une erreur.
     * @param $sField Nom de la variable en session
     * @param string $sDefault Valeur par défaut si la variable n'existe pas
     * @param bool $bDelete Indique s'il faut supprimer la variable de la session après lecture
     * @return string la valeur de la variable
     *
     */
    public static function get_value_get_post_session($sField, $sDefault = '', $bDelete = false)
    {
        if (array_key_exists($sField, $_REQUEST)) {
            $sReturnValue = self::get_value_get_post($sField, '');
        } else {
            $sReturnValue = self::get_value_session($sField, $sDefault, $bDelete);
        }

        return $sReturnValue;
    }

    /**
     * Détruit une valeur en session
     * @param $sField Nom de la variable en session
     * @return void
     *
     */
    public static function del_value_session($sField)
    {
        if (array_key_exists($sField, $_SESSION)) {
            unset($_SESSION[$sField]);
        }
    }

    /**
     * Récupère le nom du script actuel appelé en HTTP
     * @return string le nom du script PHP
     *
     */
    public static function get_currentpage()
    {
        return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/') + 1);
    }

    /**
     * Récupère le nom abrégé du script actuel appelé en HTTP
     * @return string le nom abrégé du script PHP
     *
     */
    public static function get_currentpage_keyword()
    {
        if (strlen(substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/'), -4)) > 5) {
            return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/') + 5, -4);
        } else {
            return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/') + 1, -4);
        }
    }

    /**
     * Redirige vers la page passée en paramètre.
     * Transmet L'argument facultatif passé en paramètre
     * Transmet aussi les arguments positionnés avec set_value_get ci-dessus.
     * @param string $redirectPage url de la page vers laquelle on redirige
     * @param string $field nom de la variable passée en paramètre
     * @param string $value valeur de la variable passée en paramètre
     * @return void
     *
     */
    public static function redirect($redirectPage, $field = "", $value = "")
    {
        $queryString = '';
        if (!empty($field)) {
            $queryString = '?' . $field . '=' . urlencode($value);
        }
        header("Location: " . $redirectPage . $queryString);
        die();
    }

    /**
     * Redirige vers la page acces_denied et logue la tentative d'acces.
     * @return void
     *
     */
    public static function redirect_access_denied()
    {
        logs::log("tentative d'accès a la page " . PAGE, logs::WARNING);
        self::redirect(SITE_FRONT . "access_denied.php");
    }

    /**
     * freeze l'application en créant un fichier freeze.txt a la racine
     * @return void
     *
     */
    public static function freeze()
    {
        file_put_contents(REP_SETTINGS . "freeze.txt", time());
    }

    /**
     * défreeze l'application en supprimant le fichier freeze.txt a la racine si il existe
     * @return void
     *
     */
    public static function defreeze()
    {
        if (file_exists(REP_SETTINGS . "freeze.txt")) {
            unlink(REP_SETTINGS . "freeze.txt");
        }
    }

    /**
     * charge automatiquement les classes quand c'est nécéssaires
     * @param type $class
     * @return void
     *
     */
    public static function my_autoloader($class)
    {
        require_once (REP_CLASSE . $class . '.class.php');
    }

    public static function myErrorHandler($errno, $errstr, $errfile, $errline)
    {
        logs::log("erreur levée dans le fichier : " . $errfile . " message d'erreur :" . $errstr, logs::ERROR);
        return false;
    }

    public static function myExceptionHandler($exception)
    {
        logs::log("exception levée : " . $exception->getMessage(), logs::ERROR);
        self::redirect(SITE_FRONT . "page_erreur.php");
        return false;
    }

    /**
     * affiche une variable d'un tableau si elle existe, la valeur $default sinon
     * @param type $tab
     * @param type $index
     * @param type $default
     */
    public static function displayIfExist($tab, $index, $default = "")
    {
        echo self::valueIfExist($tab, $index, $default);
    }

    /**
     * retourne la valeur d'un tableau si la clé existe. sinon, on retourne la valeur $value
     * @param type $tab
     * @param type $index
     * @param type $default
     * @return type
     */
    public static function valueIfExist($tab, $index, $default = "")
    {
        $return = $default;
        if (!empty($tab[$index])) {
            $return = $tab[$index];
        }

        return $return;
    }

    /**
     * permet de retourner un texte
     * @param type $str
     * @return type
     */
    public static function RotateTxt($str = "")
    {
        return preg_replace("#(.)#", "$1<br/>", $str);
    }

    /**
     *
     * @param type $date1
     * @param type $date2
     * @return type
     */
    public static function strTimeDiff($date1, $date2)
    {
        $s = abs($date2 - $date1);
        $d = intval($s / 86400) + 1;

        return "$d";
    }

    /**
     * permet d'obtenir le mois ou son abbrévtion (si $abbre==true) en francais, a partir d'un mois sous la forme M ou MM
     * @param type $mois
     * @param type $abbrev
     * @return type
     */
    public static function MonthName($mois, $abbrev = false)
    {
        $name = "";
        switch ($mois) {
            case '01':
            case '1':
                $name = ($abbrev) ? "Janv." : "Janvier";
                break;
            case '02':
            case '2':
                $name = ($abbrev) ? "Fév." : "Février";
                break;
            case '03':
            case '3':
                $name = "Mars";
                break;
            case '04':
            case '4':
                $name = ($abbrev) ? "Avr." : "Avril";
                break;
            case '05':
            case '5':
                $name = "Mai";
                break;
            case '06':
            case '6':
                $name = "Juin";
                break;
            case '07':
            case '7':
                $name = ($abbrev) ? "Juil." : "Juillet";
                break;
            case '08':
            case '8':
                $name = "Aout";
                break;
            case '09':
            case '9':
                $name = ($abbrev) ? "Sept." : "Septembre";
                break;
            case '10':
                $name = ($abbrev) ? "Oct." : "Octobre";
                break;
            case '11':
                $name = ($abbrev) ? "Nov." : "Novembre";
                break;
            case '12':
                $name = ($abbrev) ? "Déc." : "Décembre";
                break;
            default:break;
        }

        return $name;
    }

    /**
     * liste tous les fichiers d'un répertoire, triés par date du fichier
     * @param type $rep
     * @return type
     */
    public static function listFilesFromRepOrderByDate($rep)
    {
        $tableauSauvegardes = array();
        if ($repOuvert = opendir($rep)) {
            while ($fichierActu = readdir($repOuvert)) {

                if (is_file($rep . $fichierActu)) {
                    $tableauSauvegardes[] = array($fichierActu, filectime($rep . $fichierActu));
                }
            }
            closedir($repOuvert);
        }
        usort($tableauSauvegardes, 'self::cmp');

        return $tableauSauvegardes;
    }

    /**
     * supprime tous les fichiers dans le repertoire donne et ses sous repertoires, qui sont plus vieux que $strTime (timestamp)
     * @param type $rep
     * @param type $strTime
     */
    public static function deleteFilesFromRepOlder($rep, $strTime)
    {
        if ($repOuvert = opendir($rep)) {
            while ($fichierActu = readdir($repOuvert)) {
                if ($fichierActu != "." && $fichierActu != "..") {
                    if (is_file($rep . $fichierActu)) {
                        if (filectime($rep . $fichierActu) < $strTime) {
                            unlink($rep . $fichierActu);
                        }
                    } else if (is_dir($rep . $fichierActu)) {
                        self::deleteFilesFromRepOlder($rep . $fichierActu, $strTime);
                    }
                }
            }
            closedir($repOuvert);
        }
    }

    /**
     * tri du tableau sur les dates
     * @param type $a
     * @param type $b
     * @return int
     */
    private static function cmp($a, $b)
    {
        if ($a[1] == $b[1])
            return 0;

        return ($a[1] < $b[1]) ? 1 : -1;
    }

    /**
     * formate les dates de type YYYY-MM-JJ en JJ/MM/YYYY
     * @param type $date
     * @return string
     */
    public static function formatageDate($date)
    {
        $dateFormate = $date;
        if (preg_match("#^[0-9]{2}([0-9]{2})-([0-9]{2})-([0-9]{2})$#", $date, $val)) {
            $dateFormate = $val[3] . "/" . $val[2] . "/" . $val[1];
        }

        return $dateFormate;
    }

    public static function closePopin()
    {
        echo "<script language='javascript'>window.parent.$('#cancel').trigger('click');</script>";
        die();
    }

    /* debut */

    public static function listeImageFromRep($rep)
    {

        $iterator = new FilesystemIterator($rep);
        $filter = new RegexIterator($iterator, '#\.(jpeg|jpg|png|bmp)$#i');
        $filelist = array();
        foreach ($filter as $entry) {
            $filelist[] = $entry->getFilename();
        }
        return $filelist;
    }

    public static function getOneRandomImageFromRep($rep)
    {
        $listeImage = self::listeImageFromRep($rep);
        $nb = count($listeImage);
        $image = "";
        if ($nb > 0) {
            $image = $listeImage[rand(0, $nb - 1)];
        }
        return $image;
    }

}

