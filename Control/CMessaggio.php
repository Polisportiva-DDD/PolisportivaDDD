<?php



class CMessaggio
{

    /**
     * CMessaggio constructor.
     */
    public function __construct(){}

    /**
     * Funzione che mostra un generico errore e poi reindirizza alla home dopo 5 secondi
     * @throws SmartyException
     */
    public function genericError(){
        $session = USession::getInstance();
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

    /**
     * Funzione per la visualizzazione di un errore se javascript non è attivato
     * @throws SmartyException
     */
    public function jsError(){
        $messaggio = 'Per favore attiva javascript per continuare sul nostro sito';
        $view = new VMessaggio();
        $view->showJSErrorPage($messaggio);
    }

    /**
     * Funzione che si occupa si mostrare la schermata di errore in caso di cookie disattivati.
     */
    public function cookieError(){
        $messaggio = 'Per favore attiva i cookie per continuare sul nostro sito, se sono attivi ed è la prima volta che
        si esegue l\'accesso si provi a ricaricare la pagina';
        $view = new VMessaggio();
        $view->showJSErrorPage($messaggio);
    }

}