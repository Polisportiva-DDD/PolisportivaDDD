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
                $nome=$utenteDaBannare->getNome();
                $cognome=$utenteDaBannare->getCognome();
                $eta =  $utenteDaBannare->getEta();
                $pic64=$utenteDaBannare->getImmagine();
                $type="";
                $result=array();
                $recensioni=$pm->loadRecensioniUtente($username);
                if($recensioni==null){
                    $valutazioneMedia=0;//non ha recensioni
                }
                else {
                    $valutazioneMedia = round($utenteDaBannare->calcolaMediaRecensioni($recensioni));
                    foreach ($recensioni as $valore  ){
                        $arr=array();
                        $arr["valutazione"]=$valore->getVoto();
                        $arr["titoloRecensione"]=$valore->getTitolo();
                        $arr["dataRecensione"]=$valore->getData()->format('Y-m-d');
                        $arr["descrizioneRecensione"]=$valore->getTesto();
                        $arr["username"]=$valore->getAutore()->getUsername();
                        $result[]=$arr;

                    }
                }
                $view->showProfiloUtenteRegistrato($username, $nome, $cognome, $eta, $valutazioneMedia,$result,true);
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
