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
}