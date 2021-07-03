<?php

//require_once (get_include_path() .'/Utility/autoload.php');
//require_once (get_include_path() .'/Foundation/config.php');
//require_once (get_include_path() .'/Utility/StartSmarty.php');

class VGruppo
{

    private  $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }


    /**
     * Funzione che mostra il tpl scegliData in fase di creazione gruppo
     * @param $nomeCampo
     * @param $isAmministratore
     * @param $tomorrowString
     * @throws SmartyException
     */
    public function showScegliDataPage($nomeCampo, $isAmministratore, $tomorrowString){
        $this->smarty->assign("nomeCampo", $nomeCampo);
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("tomorrow", $tomorrowString);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/creaGruppo_scegliData.tpl");
    }


    /**
     * Funzione che mostra il tpl scegliOra in fase di creazione gruppo
     * @param $dataScelta
     * @param $oreDisponibili
     * @param $isAmministratore
     * @throws SmartyException
     */
    public function showScegliOraPage($dataScelta, $oreDisponibili, $isAmministratore){
        $this->smarty->assign("dataScelta", $dataScelta);
        $this->smarty->assign("ore", $oreDisponibili);
        $this->smarty->assign("isAmministratore", $isAmministratore);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/creaGruppo_scegliOra.tpl");
    }


    /**
     * Funzione che mostra il tpl delle persone da invitare in fase di creazione gruppo
     * @param $utenti
     * @param $isAmministratore
     * @throws SmartyException
     */
    public function showGruppoListaInvitati($utenti , $isAmministratore){
        $this->smarty->assign("utenti", $utenti);
        $this->smarty->assign("isAmministratore", $isAmministratore);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/CreaGruppoListaInvitati.tpl");
    }


    /**
     * Funzione che mostra il tpl in cui inserire i dettagli del gruppo in fase di creazione gruppo
     * @param $idGruppo
     * @param $invitati
     * @param $admin
     * @param $campo
     * @param $dataEOra
     * @param $postiDisponibili
     * @param $etaMinima
     * @param $etaMassima
     * @param $votoMinimo
     * @param $descrizione
     * @param $isAmministratore
     * @throws SmartyException
     */
    public function showDettagliGruppo($idGruppo, $invitati, $nomeGruppo, $admin, $campo, $dataEOra, $postiDisponibili,
                                       $etaMinima, $etaMassima, $votoMinimo, $descrizione,
                                       $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("idGruppo", $idGruppo);
        $this->smarty->assign('nomeGruppo', $nomeGruppo);
        $this->smarty->assign("invitati", $invitati);
        $this->smarty->assign("admin", $admin);
        $this->smarty->assign("campo", $campo);
        $this->smarty->assign("dataEOra", $dataEOra);
        $this->smarty->assign("postiDisponibili", $postiDisponibili);
        $this->smarty->assign("etaMinima", $etaMinima);
        $this->smarty->assign("etaMassima", $etaMassima);
        $this->smarty->assign("votoMinimo", $votoMinimo);
        $this->smarty->assign("descrizione", $descrizione);

        $this->smarty->display(dirname(__DIR__) ."/Smarty/templates/dettagliGruppo.tpl");
    }


    /**
     * Funzione che mostra il tpl "i_tuoi_Gruppi"
     * @param $isAmministratore
     * @param $gruppiDetails
     * @throws SmartyException
     */
    public function showITuoiGruppi($isAmministratore, $gruppiDetails){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("gruppiDetails", $gruppiDetails);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/i_tuoi_gruppi.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione della ricerca di tutti i gruppi
     * @param array $listaGruppi lista dei gruppi presenti
     * @param array $listaCampi lista dei campi presenti
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @throws SmartyException
     */
    public function showRicercaGruppo(array $listaGruppi,array $listaCampi,bool $isAmministratore){
        $this -> smarty -> assign('results',$listaGruppi);
        $this -> smarty -> assign('campi',$listaCampi);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/RicercaGruppo.tpl");
    }

    /**
     * Funzione che si occupa della visualizzazione dei campi da scegliere in fase di creazione gruppo
     * @param array $campi lista dei campi presenti da visualizzare
     * @throws SmartyException
     */
    public function showScegliCampo(array $campi,  $isAmministratore){
        $this -> smarty -> assign('results',$campi);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/creaGruppo_scegliCampo.tpl");
    }


    /**
     * @param array $campi lista dei campi presenti da visualizzare
     * @throws SmartyException
     */
    public function showCreaGruppoDettagliFinali(array $campi, $isAmministratore){
        $this -> smarty -> assign('results',$campi);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/creaGruppo_dettagliFinali.tpl");
    }
}