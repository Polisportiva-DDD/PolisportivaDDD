<?php


class CMessaggio
{

    public function __construct(){}

    public function genericError(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $messaggio = $session->readValue('messaggioErrore');
            $isAmministratore = $session->readValue('isAmministratore');
            $view = new VMessaggio();
            $view->showGenericErrorPage($messaggio, $isAmministratore);
            header( "refresh:5;url=/PolisportivaDDD/Utente/Home");
            $session->deleteValue('messaggioErrore');
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

}