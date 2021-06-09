<?php


class VGettoni
{
    private Smarty $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione della schermata di acquisto dei gettoni
     * @param array $gettoniAcquistati lista dei gettoni dei relativi campi che si vuole acquistare
     * @param string $numeroCarta numero della carta di credito
     * @param string $titolareCarta titolare della carta di credito
     * @param string $dataScadenza data di scadenza della carta di credito
     * @param int $prezzoTotale costo complessivo dei gettoni che si vuole acquistare
     * @param bool $isAmministratore sei amministratore?
     * @param bool $isUtente sei utente?
     * @throws SmartyException
     */
    public function showRiepilogoAcquisto(array $gettoniAcquistati,string $numeroCarta,string $titolareCarta,string $dataScadenza,int $prezzoTotale,bool $isAmministratore,bool $isUtente){
        $this -> smarty -> assign('results',$gettoniAcquistati);
        $this -> smarty -> assign('results',$numeroCarta);
        $this -> smarty -> assign('results',$titolareCarta);
        $this -> smarty -> assign('results',$dataScadenza);
        $this -> smarty -> assign('results',$prezzoTotale);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);
        $this -> smarty -> assign("isUtente", $isUtente);

        $this -> smarty -> display("RiepilogoAcquisto.tpl");
    }


    /**
     * Funzione che mostra la pagina in cui è possibile acquistare gettoni relativi ai vari campi
     * @param array $campi lista dei campi prensenti
     * @param array $carte liste delle carte di credito dell'utente
     * @throws SmartyException
     */
    public function showAcquistaGettoni(array $campi, array $carte){
        $this -> smarty -> assign('results',$campi);
        $this -> smarty -> assign('carta',$carte);
        $this->smarty->display("acquistaGettoni.tpl");
    }

    /**
     * Funzione che mostra la pagina in cui l'amministratore può aggiungere gettoni ad un utente
     * @param array $campi
     * @throws SmartyException
     */
    public function showAmministratoreAggiungiGettoni(array $campi){
        $this -> smarty -> assign('results',$campi);
        $this->smarty->display("AmministratoreAggiungiGettoni.tpl");
    }

    /**
     * Funzione che mostra la pagina in cui l'amministratore può modificare il prezzo dei campi
     * @param array $campi lista dei campi presenti
     * @throws SmartyException
     */
    public function showAmministratoreModificaPrezzo(array $campi){
        $this -> smarty -> assign('results',$campi);
        $this->smarty->display("AmministratoreModificaPrezzo.tpl");
    }

    /**
     * Funzione che mostra la pagina per inserire i dati di una nuova carta di credito
     * @throws SmartyException
     */
    public function showAcquistoConNuovaCarta(){
        $this -> smarty -> display('AcquistoConNuovaCarta.tpl');
    }
}