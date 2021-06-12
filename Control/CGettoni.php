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
        //$isAmministratore = $session->readValue('isAmministatore');
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

    public function aggiungiCarta(){
        $view = new VCarta();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministatore');
        if(isset($_POST['aggiungiCarta']) and $_POST['aggiungiCarta']==1){
            $session->setValue('aggiungiCarta',1);
        }
        $view->showAggiungiCarta(true);
    }
    public function confermaAggiungiCarta()
    {
        $view = new VCarta();
        $session = new USession();
        $pm= new FPersistentManager();
        $session->startSession();
        //$username=$session->readValue('utente');
        $username="lor1";

        $acqGettoni = $session->readValue('aggiungiCarta');
        if (isset($_POST['nome']) and isset($_POST['cognome']) and isset($_POST['numero']) and isset($_POST['cvc']) and isset($_POST['data'])) {
            $nome=$_POST['nome'];
            $cognome=$_POST['cognome'];
            $numero=$_POST['numero'];
            $cvc=$_POST['cvc'];
            $data=new DateTime($_POST['data']);
            $carta=new ECartadiCredito($numero,$nome,$cognome,$cvc,$data);
            $pm->store2($carta,$username);
            //se va male lo store che faccio?
            if ($acqGettoni == 1) {
                header('Location: /PolisportivaDDD/Gettoni/acquista');
            } else {
                header('Location: /PolisportivaDDD/Utente/Home');
            }
        }
        else{
            //che faccio se non è settato?
        }
    }

    public function riepilogoAcquisto(){
        $view = new VGettoni();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministatore');
        $view->showRiepilogoAcquisto(true);
    }



}