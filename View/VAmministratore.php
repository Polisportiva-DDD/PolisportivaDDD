<?php

//require_once (dirname(__DIR__)  .'/Utility/autoload.php');
//require_once (dirname(__DIR__)  .'/Foundation/config.php');
//require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');

class VAmministratore{
    private  $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione di tutti gli utenti bannati dall'account amministratore
     * @param array $listaBannati lista degli utenti bannati
     * @throws SmartyException
     */
    public function showUtentiBannati(array $listaBannati){
        $this -> smarty -> assign('results', $listaBannati);
        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/utentiBannati.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione di tutte le segnalazioni dall'account amministratore
     * @param array $listaSegnalazioni lista di tutte le segnalazioni
     * @throws SmartyException
     */
    public function showSegnalazioniAmministratore(array $listaSegnalazioni){
        $this -> smarty -> assign('results', $listaSegnalazioni);
        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/SegnalazioniAmministratore.tpl");
    }


    /**
     * Funzione che mostra il tpl per bannare uno specifico utente
     * @param string $username username dell'utente da bannatre
     * @param string $nome nome dell'utente da bannare
     * @param string $cognome cognome dell'utente da bannare
     * @param int $eta eta dell'utente da bannare
     * @param string $valutazioneMedia valutazione media dell'utente da bananre
     * @param $pic64
     * @param $type
     * @throws SmartyException
     */
    public function showBannaUtente(string $username, string $nome, string $cognome, int $eta, int $valutazioneMedia, $pic64){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('valutazioneMedia',$valutazioneMedia);
        $this->smarty->assign("pic64", $pic64);
        $this->smarty->display(dirname(__DIR__) ."/Smarty/templates/BannaUtente.tpl");
    }


    /**
     * Funzione che mostra il tpl in cui si risponde ad una segnalazione
     * @param string $username username dell'utente che ha effettuato la segnalazione
     * @param string $nome nome dell'utente che ha effettuato la segnalazione
     * @param string $cognome cognome  dell'utente che ha effettuato la segnalazione
     * @param int $eta eta dell'utente che ha effettuato la segnalazione
     * @param string $oggetto oggetto della segnalazione
     * @param string $messaggio messaggio riguardante la segnalazione
     * @param $pic64
     * @throws SmartyException
     */
    public function showAmministratoreResponse(string $username, string $nome, string $cognome, int $eta, string $oggetto, string $messaggio, $pic64){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('oggettoSegnalazione',$oggetto);
        $this -> smarty -> assign('messaggioSegnalazione',$messaggio);
        $this->smarty->assign("pic64", $pic64);
        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/AmministratoreResponse.tpl");
    }
}