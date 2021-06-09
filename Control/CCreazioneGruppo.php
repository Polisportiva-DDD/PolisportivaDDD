<?php

require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';

class CCreazioneGruppo
{

    public function __construct(){}

    public function scegliCamppo(){
        $pm = new FPersistentManager();
        $campi = FPersistentManager::loadList("FCampo");
        $view = new VGruppo();
        $results = array();
        foreach($campi as $campo){
            $c = array();
            $id = $campo->getId();
            $nome = $campo->getNome();
            $immagine = $campo->getImmagine();
            $c["idCampo"] = $id;
            $c["nome"] = $nome;
            $c["immagine"] = $immagine;
            $results[] = $c;
        }
        $view->showScegliCampo($results);

    }

    public function scegliData(){
        $session = new USession();
        $crud = new UHttpOperations();
        if ($_POST['idCampo']){
            $session->setValue('idCampo', );
        }


    }

}
