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

    public function jsError(){
        $messaggio = 'Per favore attiva javascript per continuare sul nostro sito';
        $view = new VMessaggio();
        $view->showJSErrorPage($messaggio);
    }

    /**
     * Funzione che si occupa si mostrare la schermata di errore in caso di cookie disattivati.
     */
    public function cookieError(){
        $messaggio = 'Per favore attiva i cookie per continuare sul nostro sito';
        $view = new VMessaggio();
        $view->showJSErrorPage($messaggio);
    }

}