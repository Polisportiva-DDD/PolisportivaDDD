<?php


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
     * @param bool $isAmministratore sei amministratore?
     * @param bool $isUtente sei utente?
     * @throws SmartyException
     */
    public function showUtentiBannati(array $listaBannati,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results', $listaBannati);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display("utentiBannati.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione di tutte le segnalazioni dall'account amministratore
     * @param array $listaSegnalazioni lista di tutte le segnalazioni
     * @param bool $isAmministratore sei amministratore?
     * @param bool $isUtente sei utente?
     * @throws SmartyException
     */
    public function showSegnalazioniAmministratore(array $listaSegnalazioni,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results', $listaSegnalazioni);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display("SegnalazioniAmministratore.tpl");

    }

    public function showBannaUtente(string $username,string $nome,string $cognome,int $eta,string $valutazioneMedia,$pic64, $type){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('valutazioneMedia',$valutazioneMedia);
        $this->smarty->assign("type", $type);
        $this->smarty->assign("pic64", $pic64);
        $this->smarty->display("bannaUtente.tpl");
    }

    public function showAmministratoreResponse(string $username,string $nome,string $cognome,int $eta,string $segnlazione){
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('segnalazione',$segnlazione);
        $this->smarty->display("AmministratoreResponse.tpl");
    }
}