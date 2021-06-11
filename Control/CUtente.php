<?php

require_once '../Utility/autoload.php';
require_once '../Utility/StartSmarty.php';

class CUtente
{

    public function __construct(){}

    public function assistenza(){
        $session = new USession();
        $session->startSession();
        $view = new VUtente();
        $view->showAssistenza();
    }

    public function inviaSegnalazione(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        if (isset($_POST['oggetto']) && isset($_POST['messaggio'])){
            $oggetto = $_POST['oggetto'];
            $messaggio = $_POST['messaggio'];
        }
        $autore = $session->readValue('username');
        $segnalazione = new ETicketAssistenza($autore, $messaggio, $oggetto, new DateTime('now'));
        $pm->store($segnalazione);
        header('Location: /PolisportivaDDD/Utente/Home');
    }

}