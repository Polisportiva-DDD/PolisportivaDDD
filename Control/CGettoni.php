<?php

require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
require_once (get_include_path() .'/Utility/USession.php');

class CGettoni
{

    public function __construct(){}

    public function acquista(){
        $session = new USession();
        $session->startSession();
        $view = new VGettoni();
        $username = $session->readValue('username');
        $pm= new FPersistentManager();
        $campi = $pm->loadList('FCampo');
        $resultsCampi = array();
        foreach($campi as $campo){
            $c = array();
            $nome = $campo->getNome();
            $prezzo = $campo->getPrezzo();
            $c['nome'] = $nome;
            $c['prezzo'] = $prezzo;
            $resultsCampi[] = $c;
        }
        $username="lor";
        $carte = $pm->loadCarteUtente($username);
        $resultCarte=array();
        if($carte!=null){
            foreach($carte as $carta){
                $numeriCarte=array();
                $numeriCarte["numero"] = $carta->getNumero();
                $resultCarte[]=$numeriCarte;
            }
        }
        $view->showAcquistaGettoni($resultsCampi, $resultCarte,false);

    }

}