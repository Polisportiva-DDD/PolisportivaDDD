<?php

require_once (get_include_path() .'/Utility/autoload.php');
require_once (get_include_path() .'/Foundation/config.inc.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');

class VMessaggio
{
    private Smarty $smarty;

    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    public function showGenericErrorPage($messaggio, $isAmministratore){
        $this->smarty->assign('messaggioErrore', $messaggio);
        $this->smarty->assign('isAmministratore', $isAmministratore);

        $this -> smarty -> display(get_include_path() ."/smarty/templates/genericError.tpl");
    }

}