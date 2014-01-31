<?php
define("PAGE", "contact");
define("TITLE", "tapissier décorateur à Boulogne Billancourt - nous contacter ou venir à la boutique de fille en aiguille");
$description = "Donnez un nouveau souffle à votre appartement. Habiller les murs, les fauteuils, les lits, les fenêtres. Frappez chez De fille en aiguille vous verrez, elles sont pleines d'idées";
$keywords = "tapissier décorateur, restauration de fauteuils à Boulogne Billancourt, 23 Rue Michelet‎ 92100 Boulogne-Billancourt";
require_once(dirname(__FILE__) . '/config/conf.php');
$listeCSS = array("css/modal.css",
    "css/tableau.css",
    "css/libs/jquery.contextMenu.css",
    "css/transactions.css",
    "js/libs/autocompletion/css/ui-lightness/jquery-ui-1.10.3.custom.css",
    "js/libs/datepicker/css/datepicker.css");
$listeJS = array("js/jquery-validity.min.js", "js/contact.js");
if (isset($_POST['message']) && !empty($_POST['message'])) {
    $sujet = (!empty($_POST['sujet'])) ? $_POST['sujet'] : "Contact depuis le site " . SITE_FRONT;
    $reply = (!empty($_POST['email'])) ? $_POST['email'] : "";
    $message = "Bonjour,\n" . ((!empty($_POST['prenom'])) ? $_POST['prenom'] . " " : "") . ((!empty($_POST['nom'])) ? $_POST['nom'] : "");
    $message.=" vous a envoyé le message suivant: \n";
    $message.=$_POST['message'];
    $message.="\n\nVous pouvez lui répondre à l'adresse suivante: \n" . $reply;
    $mailer = new mailer();
    $mailer->setFrom(MAIL_FROM, MAIL_FROM_EMAIL);
    $mailer->addRecipient("", SEND_MAIL);
    $mailer->fillSubject($sujet);
    $mailer->setReplyTo($reply);
    $mailer->fillMessage($message);
    $mailer->send();
}
require_once(TEMPLATE . 'header.php');
?>
<div id="content-wrapper" class="clearfix row">
    <div class="content-left twelve columns jquery-plugin">
        <h1 class="presentationContact">Nous sommes trois filles, Claire, Claudine et Raphaëlle issus de formation différentes passionnées par la restauration,</h1>

        <div id="contentContact" class="jquery-plugin">

            <form class="well span8" method="POST" action="<?php echo SITE_FRONT; ?>contact.php">
                <div class="span3">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="Votre prénom">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Votre nom">
                    <label>Email</label>
                    <div class="input-prepend">
                        <input type="text" name="email" id="inputIcon" class="form-control"  data-validation="required email" placeholder="Votre email">
                    </div>
                    <label>Sujet</label>
                    <input type="text" name="sujet" class="span3" placeholder="Sujet">
                </div>
                <div class="span5">
                    <label>Message</label>
                    <textarea name="message" data-validation="required" id="message" class="input-xlarge span5" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-default active">Envoyer</button>
            </form>
        </div>
        <h2 class="presentationContact">la décoration,</h2>
        <h3 class="presentationContact">le tissu...</h3>
        <div id="texte-rightContact" >
            <div class="plan">
                <iframe width="425" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=Boulogne-Billancourt+23+rue+michelet&amp;aq=&amp;sll=48.946857,2.291336&amp;sspn=0.391883,1.056747&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=23+Rue+Michelet,+92100+Boulogne-Billancourt&amp;ll=48.837125,2.230911&amp;spn=0.011299,0.018282&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=Boulogne-Billancourt+23+rue+michelet&amp;aq=&amp;sll=48.946857,2.291336&amp;sspn=0.391883,1.056747&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=23+Rue+Michelet,+92100+Boulogne-Billancourt&amp;ll=48.837125,2.230911&amp;spn=0.011299,0.018282&amp;z=15&amp;iwloc=A" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
            </div>
            <div class="texteContact">Nous sommes joignables tous les jours au <h3 itemprop="tel">01.82.15.80.86</h3></div>
            <div class="texteContactright">Nous nous déplaçons gratuitement pour vos devis</div>
            <div class="texteContactright">et serons ravis de vous faire part de toutes nos idées</div>

        </div>
    </div>
</div>
<?php
require_once(TEMPLATE . 'footer.php');