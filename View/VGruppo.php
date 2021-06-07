<?php


class VGruppo
{

    private Smarty $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
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

    public function showDettagliGruppo($invitati, $admin, $campo, $postiDisponibili,
                                        $etaMinima, $etaMassima, $votoMinimo, $descrizione,
                                        $isAmministratore, $isUtente){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("invitati", $invitati);
        $this->smarty->assign("admin", $admin);
        $this->smarty->assign("campo", $campo);
        $this->smarty->assign("postiDisponibili", $postiDisponibili);
        $this->smarty->assign("etaMinima", $etaMinima);
        $this->smarty->assign("etaMassima", $etaMassima);
        $this->smarty->assign("votoMinimo", $votoMinimo);
        $this->smarty->assign("descrizione", $descrizione);

        $this->smarty->display("dettagliGruppo.tpl");
    }

    public function showITuoiGruppi($isAmministratore, $isUtente, $gruppiDetails){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isUtente", $isUtente);
        $this->smarty->assign("gruppiDetails", $gruppiDetails);

        $this->smarty->display("i_tuoi_gruppi.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione della ricerca di tutti i gruppi
     * @param array $listaGruppi lista dei gruppi presenti
     * @param array $listaCampi lista dei campi presenti
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @param $isUtente bool che controlla se è loggato un utente
     * @throws SmartyException
     */
    public function showRicercaGruppo(array $listaGruppi,array $listaCampi,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results',$listaGruppi);
        $this -> smarty -> assign('results',$listaCampi);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display('RicercaGruppo.tpl');
    }

}