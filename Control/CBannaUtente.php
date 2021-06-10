<?php
require_once '../Utility/USession.php';
require_once '../Utility/StartSmarty.php';
require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';


class CBannaUtente
{



    public function __construct(){}

    /**
     * Funzione che mostra il profilo dell'utente
     * @throws SmartyException
     */
    public function visualizzaProfilo(){
        $session = new USession();
        $isAmministratore = $session->readValue('isAmministratore');
        $pm = new FPersistentManager();
        $view = new VUtente();
        if(true){
            $username = "lor";
            $utenteDaBannare = $pm->load($username,"FUtente");
            if($utenteDaBannare!=null){
                $session->setValue('utente', serialize($utenteDaBannare));

                $nome=$utenteDaBannare->getNome();
                $cognome=$utenteDaBannare->getCognome();
                //$data=$utenteDaBannare->getDataDiNascita();
                $eta =  1;

                $pic64=$utenteDaBannare->getImmagine();
                $type="";
                $recensioni=$pm->loadRecensioniUtente($username);
                if($recensioni==null){
                    $recensioni=array();
                    $valutazioneMedia=0;//non ha recensioni
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
        $pm = new FPersistentManager();
        $view = new VAmministratore();
        $utente =unserialize($session->readValue('utente'));
        $username=$utente->getUsername();
        $nome=$utente->getNome();
        $cognome=$utente->getCognome();
        $eta=$utente->getEta();
        $recensioni=$pm->loadRecensioniUtente($username);
        $valutazioneMedia=round($utente->calcolaMediaRecensioni($recensioni));
        $pic64=$utente->getImmagine();
        $type="";
        $view->showBannaUtente($username, $nome, $cognome, $eta, $valutazioneMedia,$pic64, $type);


    }

    public function inviaBan(){
        $session = new USession();
        $pm = new FPersistentManager();
        if ($_POST['motivazione']){
            $motivazione = $_POST['idCampo'];
            $utente =unserialize($session->readValue('utente'));
            $username=$utente->getUsername();
            $pm->updateUtenteRegistrato($username,true,$motivazione);
            //se va male l'update???
            header('Location: /ProgettoWeb/Admin/home');

        }

    }


}
