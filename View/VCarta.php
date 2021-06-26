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


    /**
     * Funzione che mostra la pagina in cui inserire una nuova carta di credito
     * @param bool $isAmministratore indica se si è amministratori o no
     * @throws SmartyException
     */
    public function showAggiungiCarta(bool $isAmministratore,int $errore=-1){
        $this->smarty->assign("isAmministratore", $isAmministratore);
        $this->smarty->assign("errore", $errore);
        $this -> smarty -> display(dirname(__DIR__)  ."/Smarty/templates/aggiungi_carta.tpl");
    }
}