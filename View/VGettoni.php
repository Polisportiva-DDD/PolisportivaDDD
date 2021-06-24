<?php


class VGettoni
{
    private  $smarty;

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
     * @param string $nomeTitolare titolare della carta di credito
     * @param string $dataScadenza data di scadenza della carta di credito
     * @param int $prezzoTotale costo complessivo dei gettoni che si vuole acquistare
     * @param bool $isAmministratore sei amministratore?
     * @throws SmartyException
     */
    public function showRiepilogoAcquisto(array $gettoniAcquistati,string $numeroCarta,string $nomeTitolare,string $dataScadenza,float $prezzoTotale,bool $isAmministratore){
        $this -> smarty -> assign('results',$gettoniAcquistati);
        $this -> smarty -> assign('numeroCarta',$numeroCarta);
        $this -> smarty -> assign('nomeTitolare',$nomeTitolare);
        $this -> smarty -> assign('dataScadenza',$dataScadenza);
        $this -> smarty -> assign('prezzoTotale',$prezzoTotale);
        $this -> smarty -> assign("isAmministratore", $isAmministratore);

        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/RiepilogoAcquisto.tpl");
    }


    /**
     * Funzione che mostra la pagina in cui è possibile acquistare gettoni relativi ai vari campi
     * @param array $campi lista dei campi presenti
     * @param array $carte liste delle carte di credito dell'utente
     * @throws SmartyException
     */
  /*  public function showAcquistaGettoni(array $campi, array $carte,bool $isAmministratore){
        $this -> smarty -> assign('results',$campi);
        $this -> smarty -> assign('carta',$carte);
        $this -> smarty -> assign('isAmministratore',$isAmministratore);
        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/acquistaGettoni.tpl");
    }*/

    /**
     * Funzione che mostra la pagina in cui l'amministratore può aggiungere gettoni ad un utente
     * @param array $campi
     * @throws SmartyException
     */
    public function showAmministratoreAggiungiGettoni(array $campi){
        $this -> smarty -> assign('results',$campi);
        $this->smarty->display(dirname(__DIR__) ."/Smarty/templates/AmministratoreAggiungiGettoni.tpl");
    }

    /**
     * Funzione che mostra la pagina in cui l'amministratore può modificare il prezzo dei campi
     * @param array $campi lista dei campi presenti
     * @throws SmartyException
     */
    public function showAmministratoreModificaPrezzo(array $campi){
        $this -> smarty -> assign('results',$campi);
        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/AmministratoreModificaPrezzo.tpl");
    }

    /**
     * Funzione che mostra la pagina per inserire i dati di una nuova carta di credito
     * @throws SmartyException
     */
    public function showAcquistoConNuovaCarta(bool $isAmministratore){
        $this -> smarty -> assign('isAmministratore',$isAmministratore);
        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/AcquistoConNuovaCarta.tpl");
    }
}