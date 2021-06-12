<?php
require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CBannaUtente
{



    public function __construct(){}

    /**
     * Funzione che mostra il profilo dell'utente
     * @throws SmartyException
     */
    public function visualizzaProfilo(){
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $pm = new FPersistentManager();
        $view = new VUtente();
        if(true){
            //if (isset($_POST['username'])) {
            $username = "lor"; //$_POST['username'];
            $utenteDaBannare = $pm->load($username,"FUtente");
            if($utenteDaBannare!=null){
                $session->setValue('utente', serialize($utenteDaBannare));
                //$session->setValue('utente2', "allora");
                $nome=$utenteDaBannare->getNome();
                $cognome=$utenteDaBannare->getCognome();
                $eta =  $utenteDaBannare->getEta();
                $pic64=$utenteDaBannare->getImmagine();
                $type="";
                $recensioni=$pm->loadRecensioniUtente($username);
                if($recensioni==null){
                    $recensioni=array();
                    $valutazioneMedia=1;//non ha recensioni
                }
                else {
                    $valutazioneMedia = round($utenteDaBannare->calcolaMediaRecensioni($recensioni));
                }
                $view->showProfiloUtenteRegistrato($username, $nome, $cognome, $eta, $valutazioneMedia,$recensioni,true);
            }
           else{
               $view->showErrore($username,$isAmministratore );
           }

        }
        //???
//        $view->showErrore( );

    }

    /**
     *Funzione che mostra la pagina in cui si banna un utente
     */
    public function banna(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $view = new VAmministratore();
        //$utente = unserialize($_SESSION['utente']);
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
