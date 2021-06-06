<?php


class VGruppo
{

    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showScegliDataPage($nomeCampo, $isAmministratore, $isUtente){
        $this->smarty->assign("nomeCampo", $nomeCampo);
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);

        $this->smarty->display("creaGruppo_scegliData.tpl");
    }

    public function showScegliOraPage($dataScelta, $oreDisponibili, $isAmministratore, $isUtente){
        $this->smarty->assign("dataScelta", $dataScelta);
        $this->smarty->assign("ore", $oreDisponibili);
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);

        $this->smarty->display("creaGruppo_scegliOra.tpl");
    }

    public function showGruppoListaInvitati($utenti ,$isAmministratore, $isUtente){
        $this->smarty->assign("utenti", $utenti);
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);

        $this->smarty->display("creaGruppoListaInvitati.tpl");
    }







}