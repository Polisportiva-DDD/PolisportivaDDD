<?php


class VUtente
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }


    public function showDettagliCampo($nomeCampo, $descrizione, $pic64, $type ,$isRegistrato,$isAmministratore, $isUtente){
        $this->smarty->assign("nomeCampo", $nomeCampo);
        $this->smarty->assign("descrizione", $descrizione);
        $this->smarty->assign("type", $type);
        $this->smarty->assign("pic64", $pic64);
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("isRegistrato", $isRegistrato);

        $this->smarty->display("dettagliCampo.tpl");
    }

    public function showHome($isAmministratore, $isUtente, $isRegistrato, $nomeCampi){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("isRegistrato", $isRegistrato);
        $this->smarty->assign("results", $nomeCampi);

        $this->smarty->display("home.tpl");
    }




}