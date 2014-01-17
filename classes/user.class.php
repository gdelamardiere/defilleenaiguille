<?php

/**
 * This file is part of the GOLF project.
 * Definition de la classe user
 * cette classe gere la connection des utilisateurs
 *
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 * @package classes
 */
class user
{

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /* SPECIFICS ROLES */

    Const ROLE_ADMINISTRATEUR = "ADMINISTRATEUR";
    Const ROLE_SUPERADMINISTRATEUR = "SUPER_ADMINISTRATEUR";
    Const ROLE_USER = "USER";

    /* DROITS */
    Const RIGHTS_FORBIDDEN = 'Vous n\'avez pas les droits suffisants';

    /* parametres de l'utilisateur */

    private $nUserId;
    private $sNomPrenom;
    private $sEmail;
    private $sRole;
    private $sLogin;
    private $sPassword;
    private $sActif;

    /**
     * Constructeur de la classe
     * @param type $nUserId
     * @param type $bActiveUser
     */
    public function __construct($nUserId = 0, $bActiveUser = false)
    {
        $this->nUserId = (int) $nUserId;
        $this->sRole = '';
        $this->sNomPrenom = '';
        $this->sEmail = '';
        $this->sLogin = '';
        $this->sPassword = '';
        $this->sActif = 0;
        $this->bUserLoaded = false;
        $this->bUserActive = $bActiveUser;
        if (!empty($this->nUserId)) {
            $this->load();
        }
    }

    /**
     * méthode qui crée l'unique instance de la classe (singleton)
     * si elle n'existe pas encore puis la retourne.
     * @param type $nUserId
     * @return type
     */
    public static function getInstance($nUserId = 0)
    {

        if (empty($nUserId) || (isset($_SESSION['connectedUserId']) && $nUserId == $_SESSION['connectedUserId'])) {
            // Cas 1 : active user
            if (!empty($_SESSION['connectedUserId'])) {
                $nUserId = $_SESSION['connectedUserId'];
            }
            if (!isset(self::$_instance)) {
                self::$_instance = new user($nUserId, true);
            }
        } else {
            // Cas 2 : target user, renouvelé si l'instance déjà existante a un ID différent
            if (!isset(self::$_instance) || $nUserId != self::$_instance->nUserId) {
                self::$_instance = new user($nUserId, false);
            }
        }

        return self::$_instance;
    }

    /**
     *  Charge les données d'un utilisateur qui n'est pas forcément l'utilisateur en cours
     * @param string $sLoadMode
     *
     * @return bool
     */
    public function load()
    {
        if (!$this->loadUserAttributesWithId($this->nUserId)) {
            return false;
        }
        $this->bUserLoaded = true;

        return true;
    }

    /**
     * Charge les attributs d'un utilisateur en fonction d'un id
     * @param type $nUserId
     * @return bool
     */
    private function loadUserAttributesWithId($nUserId)
    {
        global $USERS;
        $login = false;
        foreach ($USERS as $ligne) {
            if ($nUserId == $ligne['id']) {
                list($this->nUserId, $this->sLogin, $this->sPassword, $this->sRole, $this->sActif) = array_values($ligne);
                $login = true;
            }
        }

        return $login;
    }

    /**
     * Charge les attributs d'un utilisateur en fonction d'un login/mdp
     * @param type $sLogin
     * @param type $sPassword
     * @return boolean
     */
    private function loadUserAttributesWithLogin($sLogin, $sPassword)
    {
        global $USERS;
        $sPassword = md5(PREFIX_SALT . $sPassword . SUFFIX_SALT);
        $login = false;
        /*  var_dump($sPassword);
          die(); */
        foreach ($USERS as $ligne) {
            if (strtoupper($sLogin) == $ligne['user'] && $sPassword == $ligne['password']) {
                list($this->nUserId, $this->sLogin, $this->sPassword, $this->sRole, $this->sActif) = array_values($ligne);
                $login = true;
                $this->toSession($ligne);
                $_SESSION['KCFINDER'] = array();
                $_SESSION['KCFINDER']['disabled'] = false;
                $_SESSION['KCFINDER']['uploadURL'] = FRONT_DATA;
                $_SESSION['KCFINDER']['maxImageWidth'] = IMAGE_MAX_WIDTH;
                $_SESSION['KCFINDER']['maxImageHeight'] = IMAGE_MAX_HEIGHT;
                $_SESSION['KCFINDER']['thumbWidth'] = MINIATURE_WIDTH;
                $_SESSION['KCFINDER']['thumbHeight'] = MINIATURE_HEIGHT;
                $_SESSION['KCFINDER']['thumbMediumWidth'] = MEDIUM_WIDTH;
                $_SESSION['KCFINDER']['thumbMediumHeight'] = MEDIUM_HEIGHT;
                $_SESSION['KCFINDER']['thumbsDir'] = IMAGE_MINI;
                $_SESSION['KCFINDER']['thumbsMediumDir'] = IMAGE_MEDIUM;
            }
        }
        /* Changement de session ID (voir session hijacking) */
        session_regenerate_id();
        return $login;
    }

    /**
     *
     * @return type
     */
    public function getRole()
    {
        return $this->sRole;
    }

    /**
     *
     * @return type
     */
    public function isActif()
    {
        return $this->sActif;
    }

    /**
     *
     * @param type $sLogin
     * @param type $sPassword
     * @return int|boolean
     *
     */
    public function doLogin($sLogin, $sPassword)
    {
        $sessionId = session_id();
        $login = true;
        if (empty($sessionId)) {
            trigger_error('Aucune session n\'a été initialisée.', E_USER_WARNING);
            return 0;
        }

        // Récupération du profil en fonction du Login/mdp ou des variables en session
        if (!empty($sLogin)) {
            $bLoadedUserAttributes = $this->loadUserAttributesWithLogin($sLogin, $sPassword);
        } elseif (!empty($_SESSION['connectedUserId'])) {
            $bLoadedUserAttributes = $this->loadUserAttributesWithId($_SESSION['connectedUserId'], true);
        } else {
            $login = false;
        }
        if (!$bLoadedUserAttributes) {
            $login = false;
        }
        if ($login) {
            $this->bUserLoaded = true;
        }

        return $login;
    }

    /**
     * Enregistre les donnees de l'utilisateur en session (methode a supprimer plus tard)
     * @param type $ligne
     */
    private function toSession($ligne)
    {
        $_SESSION['connectedUserId'] = $ligne['id'];
        $_SESSION['connectedUserName'] = $ligne['user'];
        $_SESSION['connectedUserRole'] = $ligne['role'];
    }

    /**
     * Deconnecte l'utilisateur
     * @return bool
     */
    public function doLogout()
    {
        if (empty($this->nUserId)) {
            return false;
        }
        logs::log("déconnection de l'utilisateur ", logs::INFO);
        //  Remise à zéro des attributs utilisateurs
        $this->nUserId = 0;
        $this->sNomPrenom = '';
        $this->sEmail = '';
        $this->sRole = '';
        $this->sLogin = '';
        $this->sPassword = '';
        $this->sActif = 0;
        // Suppression des valeurs de session
        session_destroy();

        return true;
    }

    /**
     * vérifie q'un utilisateur a un droit particulier
     * @param type $droit
     *
     * @return type
     */
    public function hasDroit($droit)
    {
        //a mettre en bdd
        $return = false;
        if ($this->sRole == self::ROLE_SUPERADMINISTRATEUR) {
            $return = true;
        } else {
            switch ($droit) {
                case "menu":
                    $return = in_array($this->sRole, array(self::ROLE_ADMINISTRATEUR, self::ROLE_USER));
                    break;
                case "menu_admin":
                case "parametrage":
                case "import_IEP":
                case "import_SGE":
                case "freeze":
                case "FREEZE_APP":
                case "updateEtape":
                case "displayLogs":
                //case "gestionBDD":
                case "supressionImage":
                case "listeCron":
                    $return = in_array($this->sRole, array(self::ROLE_ADMINISTRATEUR));
                    break;
                default:
                    break;
            }
        }

        return $return;
    }

    /**
     *
     * @return type
     */
    public function getNUserId()
    {
        return $this->nUserId;
    }

    /**
     *
     * @return type
     */
    public function getSNomPrenom()
    {
        return $this->sNomPrenom;
    }

    /**
     *
     * @return type
     */
    public function getSEmail()
    {
        return $this->sEmail;
    }

    /**
     *
     * @return type
     */
    public function getSRole()
    {
        return $this->sRole;
    }

    /**
     *
     * @return type
     */
    public function getSLogin()
    {
        return $this->sLogin;
    }

    /**
     *
     * @return type
     */
    public function getSActif()
    {
        return $this->sActif;
    }

}

