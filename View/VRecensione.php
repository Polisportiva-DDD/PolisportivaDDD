<?php


class VRecensione
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showEffettuaRecensioni($isAmministratore, $username){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("username", $username);

        $this->smarty->display(get_include_path() ."/smarty/templates/effettuaRecensioni.tpl");
    }

    public function showRecensioniEffettuate($results, $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("results", $results);

        $this->smarty->display(get_include_path() ."/smarty/templates/recensioni.tpl");
    }


}