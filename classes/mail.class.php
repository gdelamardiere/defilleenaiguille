<?php

/**
 * This file is part of the GOLF project.
 * Definition de la classe import
 * cette classe gere l'envoi d'email
 * 
 * @author  guerric de la Mardière <gdelamardiere@gmail.com>
 * @license view the LICENSE file that was distributed with this source code.
 * @package classes
 */
class mail
{

    /**
     * envoie un email en utilisant un template
     * @param type $to
     * @param type $sujet
     * @param type $template
     * @param type $data
     * @return boolean
     */
    public static function send_email_template($to, $sujet, $template, $data)
    {
        if (ENV == "local") {
            $to = LOCAL_MAIL;
        }
        $message = self::templating($template, $data);
        try {
            // minimal requirements to be set
            $mailer = new mailer();
            $mailer->setFrom(MAIL_FROM, MAIL_FROM_EMAIL);
            $mailer->addRecipient("", $to);
            $mailer->fillSubject($sujet);
            $mailer->fillMessage($message);
            // now we send it!
            $mailer->send();
        } catch (Exception $e) {
            logs::MessageWithLog($e->getMessage(), logs::ERROR);
            return false;
        }
        logs::log("envoi d'un email depuis le template " . $template . " à " . $to, logs::INFO);
        logs::setMessage("Un email a été envoyé à " . $to, logs::SUCCESS);
        return true;
    }

    /**
     * remplace les variables dans un template html
     * @param type $template
     * @param type $data
     * @return type
     */
    public static function templating($template, $data)
    {
        $message = file_get_contents(REP_TEMPLATE_EMAIL . $template);
        foreach ($data as $key => $value) {
            $message = str_replace("$" . $key, $value, $message);
        }

        return $message;
    }

}

