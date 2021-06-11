<?php


require_once '../Utility/autoload.php';
require_once '../Utility/StartSmarty.php';

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

        $carte = $pm->loadCarteUtente($username);
        $numeriCarte=array();
        foreach($carte as $carta){
            $numeriCarte[] = $carta->getNumero();
        }
        $view->showAcquistaGettoni($resultsCampi, $numeriCarte);

    }

}