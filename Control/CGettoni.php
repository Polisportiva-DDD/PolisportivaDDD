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
        $isAmministratore = $session->readValue('isAmministratore');
        $username = $session->readValue('username');
        $pm= new FPersistentManager();
        $campi = $pm->loadList('FCampo');
        $resultsCampi = array();
        foreach($campi as $campo){
            $c = array();
            $nome = $campo->getNome();
            $prezzo = $campo->getPrezzo();
            $id=$campo->getId();
            $c['nome'] = $nome;
            $c['prezzo'] = $prezzo;
            $c['id'] = $id;
            $resultsCampi[] = $c;
        }
        $carte = $pm->loadCarteUtente($username);
        $resultCarte=array();
        if($carte!=null){
            foreach($carte as $carta){
                $numeriCarte=array();
                $numeriCarte["numero"] = $carta->getNumero();
                $resultCarte[]=$numeriCarte;
            }
        }
        $view->showAcquistaGettoni($resultsCampi, $resultCarte,$isAmministratore);

    }

    public function aggiungiCarta(){
        $view = new VCarta();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministatore');
        if(isset($_POST['aggiungiCarta']) && $_POST['aggiungiCarta']==1){
            $session->setValue('aggiungiCarta',1);
        }
        $view->showAggiungiCarta($isAmministratore);
    }


    public function confermaAggiungiCarta()
    {
        $session = new USession();
        $pm= new FPersistentManager();
        $session->startSession();
        $username=$session->readValue('username');

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
        $pm= new FPersistentManager();
        $isAmministratore = $session->readValue('isAmministratore');
        if(isset($_POST["carta"])  ){
            $numero=$_POST["carta"];
            unset($_POST["carta"]);
            if ($_POST){
                $campi = array();
                foreach($_POST as $chiave => $idCampo){
                    $campi[$chiave] = $idCampo;
                }
                $carta=$pm->load($numero,"FCartadiCredito");
                $nomeTitolare=$carta->getNomeTitolare();
                $carta->getCognomeTitolare();
                $scadenza=$carta->getScadenza()->format("Y-m-d");

                $listaCampi=$pm->loadList("FCampo");
                $result=array();
                $prezzoTotale=0;
                $quantita=0;
                foreach ($listaCampi as $value){
                    $arr=array();
                    $arr["nomeCampo"]=$value->getNome();
                    $arr["quantita"]=$campi[$value->getId()];
                    $arr["prezzo"]=$value->getPrezzo();
                    $prezzoTotale+= $arr["prezzo"]*$arr["quantita"];
                    $result[]=$arr;
                    $quantita+=$arr["quantita"];
                }
                if($prezzoTotale!=0){
                    if($quantita>=3 and $quantita<5){
                        $prezzoTotale=$prezzoTotale-$prezzoTotale*5/100;
                    }
                    elseif($quantita>=5 and $quantita<=9){
                        $prezzoTotale=$prezzoTotale-$prezzoTotale*10/100;
                    }elseif($quantita>=10 ){
                        $prezzoTotale=$prezzoTotale-$prezzoTotale*15/100;

                    }
                }
                $view->showRiepilogoAcquisto($result,$numero,$nomeTitolare,$scadenza,$prezzoTotale,$isAmministratore);

            }
        }


    }

    public function paga()
    {
        $session = new USession();
        $session->startSession();
        //$username=$session->readValue("username");
        //$pm= new FPersistentManager();
        /*if ($_POST) {
            $campi = array();
            foreach ($_POST as $chiave => $idCampo) {
                $campo=$pm->load($chiave,"FCampo");
                if($campo!=null){
                    $cmpw=new ECampiWallet($idCampo,$campo);
                    $campi[]=$cmpw;
                }
            }
            //da finire
            //$pm->updateWallet($campi);
            header('Location: /PolisportivaDDD/Utente/home');
        }*/

    }
}