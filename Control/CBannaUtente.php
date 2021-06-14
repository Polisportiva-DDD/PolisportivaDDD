<?php
require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CBannaUtente
{



    public function __construct(){}



    /**
     *Funzione che mostra la pagina in cui si banna un utente
     */
    public function banna(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $view = new VAmministratore();
        $utente =unserialize($session->readValue('utente'));
        $username=$utente->getUsername();
        $nome=$utente->getNome();
        $cognome=$utente->getCognome();
        $eta=$utente->getEta();
        $recensioni=$pm->loadRecensioniUtente($username);
        if($recensioni!=null){
            $valutazioneMedia=round($utente->calcolaMediaRecensioni($recensioni));
        }
        else{
            $valutazioneMedia=0;
        }
        $pic64=$utente->getImmagine();
        $type="";
        $view->showBannaUtente($username, $nome, $cognome, $eta, $valutazioneMedia,$pic64, $type);


    }

    public function inviaBan(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        if ($_POST['motivazione']){
            $motivazione = $_POST['motivazione'];
            $utente =unserialize($session->readValue('utente'));
            $username=$utente->getUsername();
            $pm->updateUtenteRegistrato($username,true,$motivazione);
            //se va male l'update???
            header('Location: /PolisportivaDDD/Utente/home');

        }

    }


}
