<?php


class VRecensione
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * @throws SmartyException
     */
    public function showEffettuaRecensioni($isAmministratore, $username){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("username", $username);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/effettuaRecensioni.tpl");
    }

    /**
     * @throws SmartyException
     */
    public function showRecensioniEffettuate($results, $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("results", $results);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/recensioni.tpl");
    }


}