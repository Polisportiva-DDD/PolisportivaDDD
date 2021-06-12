<?php


class VCarta
{
    private $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showLeTueCarte($isAmministratore, $isUtente, $carte){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("results", $carte);

        $this->smarty->display("le_tue_carte.tpl");


    }


    public function showAggiungiCarta(bool $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this -> smarty -> display(get_include_path() ."/smarty/templates/aggiungi_carta.tpl");
    }
}