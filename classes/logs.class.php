<?php

/**
 * This file is part of the GOLF project.
 * Definition de la classe import
 * cette classe gere les logs et les messages d'alert et de succes
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 * @package classes
 */
class logs
{

    const INFO = "infos";
    const ERROR = "erreur";
    const SUCCESS = "success";
    const WARNING = "warning";

    /**
     * permet de mettre le style css correspondant au type de message
     * @param type $type
     * @return string
     */
    public static function getStyleCss($type)
    {
        $style = "";
        $styleCss = array("infos" => "alert-info", "erreur" => "alert-danger", "success" => "alert-success", "warning" => "alert-warning",);
        if (isset($styleCss[$type])) {
            $style = $styleCss[$type];
        }

        return $style;
    }

    /**
     * sauvegarde le message dans le fichier de log avec le type de message, le datetime et l'utilisateur
     * @param string $message
     * @param type $type
     */
    public static function log($message, $type)
    {
        $user = user::getInstance();
        $fileLog = self::getFileLog($type);
        $message = date("Y-m-d H:i:s") . " : " . $user->getSLogin() . " -> type:  " . $type . " -> " . $message . "\n";
        file_put_contents($fileLog, $message, FILE_APPEND);
    }

    /**
     * sauvegarde le message dans un tableau en session
     * @param type $message
     * @param type $type
     */
    public static function setMessage($message, $type)
    {
        $_SESSION['message'][$type][] = $message;
    }

    /**
     * récupère le message de la session
     * si pas de type precisé, on récupère tous les messages sinon seulement le type concerné
     * les messages récupésées sont supprimés.
     * @param type $type
     * @return type
     */
    public static function getMessage($type = "all")
    {
        if ($type == "all") {
            $messages = (isset($_SESSION['message'])) ? $_SESSION['message'] : array();
            unset($_SESSION['message']);
        } else {
            $messages = (isset($_SESSION['message'][$type])) ? $_SESSION['message'][$type] : array();
            unset($_SESSION['message'][$type]);
        }

        return $messages;
    }

    /**
     * détermine le nom du fichier de log
     * @param type $type
     * @return type
     */
    public static function getFileLog($type)
    {
        return REP_LOGS . "logs_" . date(DUREE_ROTATION_LOG) . ".txt";
    }

    /**
     * sauvegarde le message en session et en plus le log
     * @param type $message
     * @param type $type
     */
    public static function MessageWithLog($message, $type)
    {
        self::log($message, $type);
        self::setMessage($message, $type);
    }

}

