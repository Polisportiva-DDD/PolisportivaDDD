<?php

require_once (get_include_path() .'/Utility/autoload.php');
require_once (get_include_path() .'/Foundation/config.inc.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');

class VAmministratore{
    private Smarty $smarty;

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
        $this -> smarty -> display(get_include_path() ."/smarty/templates/utentiBannati.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione di tutte le segnalazioni dall'account amministratore
     * @param array $listaSegnalazioni lista di tutte le segnalazioni
     * @throws SmartyException
     */
    public function showSegnalazioniAmministratore(array $listaSegnalazioni){
        $this -> smarty -> assign('results', $listaSegnalazioni);
        $this -> smarty -> display(get_include_path() ."/smarty/templates/SegnalazioniAmministratore.tpl");
    }

    public function showBannaUtente(string $username,string $nome,string $cognome,int $eta,string $valutazioneMedia,$pic64, $type){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('valutazioneMedia',$valutazioneMedia);
        $this->smarty->assign("type", $type);
        $this->smarty->assign("pic64", $pic64);
        $this->smarty->display(get_include_path() ."/smarty/templates/bannaUtente.tpl");
    }

    public function showAmministratoreResponse(string $username,string $nome,string $cognome,int $eta, string $oggetto, string $messaggio){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('oggettoSegnalazione',$oggetto);
        $this -> smarty -> assign('messaggioSegnalazione',$messaggio);
        $this->smarty->display(get_include_path() ."/smarty/templates/AmministratoreResponse.tpl");
    }
}