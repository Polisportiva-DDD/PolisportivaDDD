<?php

require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CRecensione
{

    public function __construct(){}

    public function recensioniEffettuate(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $isAmministratore = $session->readValue('isAmministratore');
        $username = $session->readValue('username');
        $recensioni = $pm->loadRecensioniEffettuate($username);
        $results = array();
        foreach($recensioni as $recensione){
            $r = array();
            $possessore = $recensione->getPossessore();
            $r['username'] = $possessore->getUsername();
            $r['valutazione'] = $recensione->getVoto();
            $r['titoloRecensione'] = $recensione->getTitolo();
            $r['dataRecensione'] = $recensione->getData()->format('Y-m-d');
            $r['descrizioneRecensione'] = $recensione->getTesto();
            $r['pic64'] = base64_encode($possessore->getImmagine());
            $r['idRecensione'] = $recensione->getId();
            $results[] = $r;
        }

        $view = new VRecensione();
        $view->showRecensioniEffettuate($results, $isAmministratore);
    }

    public function eliminaRecensione($id){
        $pm = new FPersistentManager();
        $pm->delete($id, 'FRecensione');
        header("Location: /PolisportivaDDD/Utente/Home");
    }

}