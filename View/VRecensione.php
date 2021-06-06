<?php


class VRecensione
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showEffettuaRecensioni($isAmministratore, $isUtente, $username){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("username", $username);

        $this->smarty->display("effettuaRecensioni.tpl");
    }


}