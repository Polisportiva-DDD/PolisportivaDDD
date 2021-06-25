<?php

require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
require_once (dirname(__DIR__)  .'/Utility/autoload.php');
require_once (dirname(__DIR__)  .'/Utility/USession.php');

class CGettoni
{
    private $quantitasc1=3;
    private $quantitasc2=5;
    private $quantitasc3=10;
    private $sconto1=5/100;
    private $sconto2=10/100;
    private $scont3=15/100;

    public function __construct(){}

    public function acquista(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $isAmministratore = $session->readValue('isAmministratore');
            $username = $session->readValue('username');
            $pm= FPersistentManager::getInstance();
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
                $c['pic64']=$campo->getImmagine();
                $resultsCampi[] = $c;
            }
            $carte = $pm->loadCarteNonScadute($username);
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
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function aggiungiCarta(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $view = new VCarta();
            $isAmministratore = $session->readValue('isAmministratore');
            if(isset($_POST['aggiungiCarta']) && $_POST['aggiungiCarta']==1){
                $session->setValue('aggiungiCarta',1);
            }
            $view->showAggiungiCarta($isAmministratore);
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    public function confermaAggiungiCarta(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm= FPersistentManager::getInstance();
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
                if ($acqGettoni == 1) {
                    header('Location: /PolisportivaDDD/Gettoni/acquista');
                } else {
                    header('Location: /PolisportivaDDD/Gettoni/visualizzaCarte');
                }
            }
            else{
                //che faccio se non è settato?
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function riepilogoAcquisto(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $pm= FPersistentManager::getInstance();
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
                    $prezzoTotale=0.0;
                    $quantita=0;
                    foreach ($listaCampi as $value){
                        $arr=array();
                        $arr["nomeCampo"]=$value->getNome();
                        $arr["quantita"]=$campi[$value->getId()];
                        $arr["prezzo"]=$value->getPrezzo();
                        $arr["id"]=$value->getId();
                        $quantita+=$arr["quantita"];
                        $prezzoTotale+= $arr["prezzo"]*$arr["quantita"];
                        $result[]=$arr;

                    }
                    if($prezzoTotale!=0){
                        if($quantita>=$this->quantitasc1 and $quantita<$this->quantitasc2){
                            $prezzoTotale=$prezzoTotale-$prezzoTotale*$this->sconto1;
                        }
                        elseif($quantita>=$this->quantitasc2 and $quantita<$this->quantitasc3){
                            $prezzoTotale=$prezzoTotale-$prezzoTotale*$this->sconto2;
                        }elseif($quantita>=$this->quantitasc3 ){
                            $prezzoTotale=$prezzoTotale-$prezzoTotale*$this->scont3;

                        }
                    }
                    $view->showRiepilogoAcquisto($result,$numero,$nomeTitolare,$scadenza,$prezzoTotale,$isAmministratore);

                }
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }



    }

    public function paga(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $username = $session->readValue("username");
            $pm = FPersistentManager::getInstance();
            $utente = $pm->load($username, "FUtente");
            $wallet = $utente->getWallet();
            if ($_POST) {
                foreach ($_POST as $chiave => $quantita) {
                    $campo = $pm->load($chiave, "FCampo");
                    $wallet->aggiungiGettoni($campo, $quantita);
                }
                $pm->update($wallet);
                header('Location: /PolisportivaDDD/Utente/mioProfilo');
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function visualizzaCarte(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $isAmministratore = $session->readValue('isAmministratore');
            $pm = FPersistentManager::getInstance();
            $view = new VCarta();
            $carteUtente = $pm -> loadCarteUtente($session->readValue('username'));
            $results = array();
            for ($i=0;$i<count($carteUtente); $i++){
                $tmp = array(
                    'numeroCarta' => $carteUtente[$i]->getNumero(),
                    'titolareCarta' => $carteUtente[$i]->getNomeTitolare(). " " . $carteUtente[$i]->getCognomeTitolare(),
                    'dataScadenza' => $carteUtente[$i]->getScadenza()->format('d-m-y')
                );
                $results[]=$tmp;
                $session->setValue('numeroCarta',$tmp['numeroCarta']);
            }
            $view -> showLeTueCarte($isAmministratore,$results);
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function rimuoviCarta(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = FPersistentManager::getInstance();
            $numerocarta=$_POST["numeroCarta"];
            $pm->delete($numerocarta,'FCartaDiCredito');
            header('Location: /PolisportivaDDD/Gettoni/visualizzaCarte');
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }



    }
