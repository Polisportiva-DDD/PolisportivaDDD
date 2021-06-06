<?php


class VAmministratore{
    private $smarty;

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

}