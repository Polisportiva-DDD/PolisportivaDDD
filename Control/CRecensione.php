<?php

require_once (dirname(__DIR__)  .'/Utility/USession.php');
require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
require_once (dirname(__DIR__)  .'/Utility/autoload.php');
class CRecensione
{
    /**
     * CRecensione constructor.
     */
    public function __construct(){}

    /**
     * Funzione che visualizza tutte le recensioni effettuate dall'utente.
     * @throws SmartyException
     */
    public function recensioniEffettuate(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = FPersistentManager::getInstance();
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
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }

    /**
     * Funzione che permette di eliminare una recensione in base all'id.
     * @param $id
     */
    public function eliminaRecensione($id){
        if(CUtente::isLogged()){
            $pm = FPersistentManager::getInstance();
            $pm->delete($id, 'FRecensione');
            header("Location: /PolisportivaDDD/Utente/Home");
        }
        else{
            header("Location: /PolisportivaDDD/Utente/Home");
        }

    }

}