<?php


class VUtente
{
    private Smarty $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
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

    public function showHome($isAmministratore, $isRegistrato, $nomeCampi){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("isRegistrato", $isRegistrato);
        $this->smarty->assign("results", $nomeCampi);

        $this->smarty->display(get_include_path() ."/smarty/templates/home.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione del profilo dell'utente loggato
     * @param string $username username dell'utente loggato
     * @param string $nome nome dell'utente loggato
     * @param string $cognome cognome dell'utente loggato
     * @param int $eta età dell'utente loggato
     * @param int $media_recensioni media delle recensioni dell'utente loggato
     * @param array $gettoni contiene il nome del campo e la quantità dei gettoni
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @param $isUtente bool che controlla se è loggato un utente
     * @throws SmartyException
     */
    public function showMioProfilo(string $username,string $nome,string $cognome,int $eta,int $media_recensioni,array $gettoni,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('valutazioneMedia',$media_recensioni);
        $this -> smarty -> assign('results', $gettoni);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display('MioProfilo.tpl');
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione del profilo dell'utente cercato
     * @param string $username username dell'utente loggato
     * @param string $nome nome dell'utente loggato
     * @param string $cognome cognome dell'utente loggato
     * @param int $eta età dell'utente loggato
     * @param int $media_recensioni media delle recensioni dell'utente loggato
     * @param array $recensioni contiene tutte le recensioni relative all'utente
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @param $isUtente bool che controlla se è loggato un utente
     * @throws SmartyException
     */
    public function showProfiloUtenteRegistrato(string $username, string $nome, string $cognome, int $eta, int $media_recensioni, array $recensioni, bool $isAmministratore){

        $this -> smarty -> assign('username',$username);
        $this -> smarty -> assign('nome',$nome);
        $this -> smarty -> assign('cognome',$cognome);
        $this -> smarty -> assign('eta',$eta);
        $this -> smarty -> assign('valutazioneMedia',$media_recensioni);
        $this -> smarty -> assign('results', $recensioni);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);

        $this -> smarty -> display(get_include_path() ."/smarty/templates/profiloUtenteRegistrato.tpl");
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione della ricerca di tutti gli utenti
     * @param array $listaUtenti lista di tutti gli utenti
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @param $isUtente bool che controlla se è loggato un utente
     * @throws SmartyException
     */
    public function showRicercaUtente(array $listaUtenti,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results',$listaUtenti);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display('ricercaUtente.tpl');
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione delle recensioni effettuate dall'utente
     * @param array $listaRecensioni lista di tutte le recensioni
     * @param $isAmministratore bool che controlla se è loggato un amministratore
     * @param $isUtente bool che controlla se è loggato un utente
     * @throws SmartyException
     */
    public function showRecensioni(array $listaRecensioni,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results',$listaRecensioni);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display('recensioni.tpl');
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione del form di registrazione
     * @throws SmartyException
     */
    public function showRegistrazioneUtente(){
        $this -> smarty -> display('registrazione.tpl');
    }


    /**
     * Mostra la pagina in cui inviare il ticket d'assitenza
     * @throws SmartyException
     */
    public function showAssistenza(){
        $this -> smarty -> display('assistenza.tpl');
    }






}