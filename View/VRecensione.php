<?php


class VRecensione
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }


    /**
     * Funzione che mostra il tpl per effettuare una recensione
     * @param $isAmministratore
     * @param $username
     * @throws SmartyException
     */
    public function showEffettuaRecensioni($isAmministratore, $username){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("username", $username);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/effettuaRecensioni.tpl");
    }


    /**
     * Funzione che mostra il tpl delle recensioni effettuate
     * @param $results
     * @param $isAmministratore
     * @throws SmartyException
     */
    public function showRecensioniEffettuate($results, $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("results", $results);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/recensioni.tpl");
    }


}