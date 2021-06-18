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

    /**
     * Funzione che mostra la pagina delle carte possedute dall'utente.
     * @param bool $isAmministratore sei Amministratore?
     * @param array $carte carte dell'utente
     * @throws SmartyException
     */
    public function showLeTueCarte(bool $isAmministratore, array $carte){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("results", $carte);

        $this->smarty->display(dirname(__DIR__)  ."/Smarty/templates/le_tue_carte.tpl");


    }


    public function showAggiungiCarta(bool $isAmministratore){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/aggiungi_carta.tpl");
    }
}