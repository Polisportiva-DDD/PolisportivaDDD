<?php

//require_once '../Utility/autoload.php';
//require_once '../Utility/StartSmarty.php';
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CUtente
{

    public function __construct(){}

    public function informazioni(){
        $session = new USession();
        $session->startSession();
        $username = $session->readValue('username');
        $view = new VUtente();
        $view->showAssistenza();
    }

    public function utenti($username=""){
        $session = new USession();
        $session->startSession();
        $isAmministratore= $session->readValue('isAmministratore');
        if($username!=""){
            self::visualizzaProfilo($username);
        }
        else{
            $view = new VUtente();
            $pm = new FPersistentManager();
            if (isset($_POST['searchedUser'])){
                $searchedUser = $_POST['searchedUser'];
                $utenti = $pm->loadUtentiFiltered($searchedUser);
                $risultatiRicerca = array();
                foreach ($utenti as $utente){
                    $u= array();
                    $u['username'] = $utente->getUsername();
                    $u['nome'] = $utente->getNome();
                    $u['cognome'] = $utente->getCognome();
                    $risultatiRicerca[] = $u;
                }
                $view->showRicercaUtente($risultatiRicerca, $isAmministratore);
            }
        }

    }


    public function inviaSegnalazione(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        if (isset($_POST['oggetto']) && isset($_POST['messaggio'])){
            $oggetto = $_POST['oggetto'];
            $messaggio = $_POST['messaggio'];
        }
        $autore = $session->readValue('username');
        $segnalazione = new ETicketAssistenza($autore, $messaggio, $oggetto, new DateTime('now'));
        $pm->store($segnalazione);
        header('Location: /PolisportivaDDD/Utente/Home');
    }

    public function home(){
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $isRegistrato = $session->readValue('isRegistrato');
        print ($isRegistrato);
        $view=new VUtente();
        $pm = new FPersistentManager();
        $campi=$pm->loadList("FCampo");
        $result=array();

        foreach ($campi as $value){

            $nomiCampi=array();
            $nomiCampi['nome']=$value->getNome();
            $nomiCampi['descrizione']=$value->getDescrizione();
            $nomiCampi['idCampo']=$value->getId();
            $result[]=$nomiCampi;

        }
        $view->showHome($isAmministratore,$isRegistrato,$result);
    }

    public function mioProfilo(){
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $view=new VUtente();
        $pm = new FPersistentManager();
        $username = $session->readValue('username');
        $utente=$pm->load($username,"FUtente");
        $username=$utente->getUsername();
        $nome=$utente->getNome();
        $cognome=$utente->getCognome();
        $eta=$utente->getEta();
        $recensioni=$pm->loadRecensioniUtente($username);

        $rec=array();
        $listCampi=$utente->getWallet()->getListaCampiWallet();
        $pic64=$utente->getImmagine();
        $type="";
        if($recensioni!=null){
            $valutazioneMedia=round($utente->calcolaMediaRecensioni($recensioni));
            foreach ($recensioni as $valore  ){
                $arr=array();
                $arr["valutazione"]=$valore->getVoto();
                $arr["titoloRecensione"]=$valore->getTitolo();
                $arr["dataRecensione"]=$valore->getData()->format('Y-m-d');
                $arr["descrizioneRecensione"]=$valore->getTesto();
                $arr["username"]=$valore->getAutore()->getUsername();
                $rec[]=$arr;

            }
        }
        else{
            $valutazioneMedia=0;
        }

        $result=array();

        foreach ($listCampi as $value){

            $gettoni=array();
            $gettoni['nomeCampo']=$value->getCampo()->getNome();
            $gettoni['quantitaGettoni']=$value->getGettoni();
            $result[]=$gettoni;

        }


        $view->showMioProfilo($username, $nome, $cognome, $eta, $valutazioneMedia,$result,$rec,$isAmministratore,$pic64, $type);
    }

    public function mostraCampo(){
        $view=new VUtente();
        $pm = new FPersistentManager();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $isRegistrato = $session->readValue('isRegistrato');
        if (isset($_POST['idCampo'])) {
            $idCampo=$_POST['idCampo'];
            $campo=$pm->load($idCampo,"FCampo");
            $nome=$campo->getNome();
            $descrizione=$campo->getDescrizione();
            $type=$campo->getImmagine();
            $pic64="";
            $view->showDettagliCampo($nome,$descrizione,$type,$pic64,$isRegistrato,$isAmministratore);
        }
        else{
            //che faccio?
        }

    }

    public function effettuaRecensione(){
        $view=new VRecensione();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        if (isset($_POST['username'])) {
            $username=$_POST['username'];
            $session->setValue('utenteDaRecensire',$username);
            $view->showEffettuaRecensioni($isAmministratore,$username);
        }
        else{
            //che faccio?
        }
    }

    public function recensisci(){
        $pm = new FPersistentManager();
        $session = new USession();
        $session->startSession();
        $utente = $session->readValue('username');
        $utenteDaRec = $session->readValue('utenteDaRecensire');

        if (isset($_POST['titoloRecensione']) and isset($_POST['testo']) and isset($_POST['rate'])) {
            $titolo=$_POST['titoloRecensione'];
            $testo=$_POST['testo'];
            $voto=$_POST['rate'];
            $utenteAutore=$pm->load($utente,"FUtente");
            $utentePosessore=$pm->load($utenteDaRec,"FUtente");
            $recensione=new ERecensione($utenteAutore,$voto,$titolo,$testo,new DateTime('now'),$utentePosessore);
            $pm->store($recensione);

            header('Location: /PolisportivaDDD/Utente/home');
        }
        else{
            //che faccio?
        }
    }



    public function loginError($error=-1){
        $view=new VUtente();
        $view->showLoginError($error);
    }

    public function login (){
        $view=new VUtente();
        $view->showFormLogin();
    }



    /**
     * Funzione che si occupa di verificare l'esistenza di un utente con username e password inseriti nel form di login.
     * 1) se, dopo la ricerca nel db non si hanno risultati ($utente = null) oppure se l'utente si trova nel db ma ha lo stato false
     *    viene ricaricata la pagina con l'aggiunta dell'errore nel login.
     * 2) se l'utente c'è, avviene il reindirizzamento alla homepage;
     */
    public function verifica() {
        $session = new USession();
        $view = new VUtente();
        $pm = new FPersistentManager();
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $esiste = $pm->Login($_POST['username'], $_POST['password']);
            if ($esiste==1) {
                if($pm->isBannato($_POST['username'])){
                    header('Location: /PolisportivaDDD/Utente/loginError/2');
                }
                else{
                    $utente = $pm->load($_POST['username'], 'FUtente');
                    if ($utente != null) {

                        if ($session->isSessionNone()) {
                            $session->startSession();

                            $username=$utente->getUsername();
                            $session->setValue("username",$username);
                            if($pm->exist($username)){
                                $session->setValue("isAmministratore",true);
                                $session->setValue("isRegistrato",true);
                            }else{
                                $session->setValue("isAmministratore",false);
                                if($pm->existUsername($username)){
                                    $session->setValue("isRegistrato",true);
                                }
                                else{
                                    $session->setValue("isRegistrato",false);
                                }
                            }
                            $session->setValue("isRegistrato",true);
                            header('Location: /PolisportivaDDD/Utente/Home');

                        }
                    } else {
                        header('Location: /PolisportivaDDD/Utente/login');
                    }
                }

            }
            else{
                header('Location: /PolisportivaDDD/Utente/loginError/1');

            }
        }
    }

    public function registrazione(){
        $view = new VUtente();
        $view->showRegistrazioneUtente();
    }
    /**
     * Funzione di supporto che si occupa di verificare i dati inseriti nella form di registrazione per il cliente .
     * In questo metodo avviene la verifica sull'univocità dell'username inserito;
     * se questa verifiche non riscontrano problemi, si passa alla store nel db.
     */
    public function verificaRegistrazione() {
        $session = new USession();
        $session->startSession();
        $session->setValue("isAmministratore",false);
        $session->setValue('isRegistrato',true);
        $pm = new FPersistentManager();
        $view = new VUtente();
        $username = $_POST['username'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = $_POST['data'];
        $data=(DateTime::createFromFormat('Y-m-d',$data));
        $immagine = $_POST['file'];
        $verUsername = $pm->existUsername($username);
        if ($verUsername){
            $view->showRegistrazioneError("errorUsername");
        }
        else {
            $campi = $pm -> loadList('FCampo');
            $listaCampiWallet = array();
            foreach ($campi as $campo){
                $gettoni = new ECampiWallet(0,$campo);
                array_push($listaCampiWallet,$gettoni);
            }
            $wallet = new EWallet($listaCampiWallet);
            $id=$pm->store($wallet);
            $wallet->setId($id);
            $utente = new EUtente($username,$nome,$cognome,$email,$password,$data,$immagine,$wallet);
            $utenteRegistrato = new EUtenteRegistrato(false,'',$username,$nome,$cognome,$email,$password,$data,$immagine,$wallet);


            $pm -> store($utente);
            $pm -> store($utenteRegistrato);
            header('Location: /PolisportivaDDD/Utente/home');
        }
    }
    public function utentiBannati(){
        $session = new USession();
        $view = new VAmministratore();
        $pm = new FPersistentManager();
        $utentiBannati=$pm->loadList("FUtenteRegistrato");
        $result=array();
        foreach ($utentiBannati as $value){
            $array=array();
            $array["motivoBan"]=$value->getMotivazione();
            $array["username"]=$value->getUsername();
            $result[]=$array;

        }
        $view->showUtentiBannati($result);

    }

    public function rimuoviBan(){
        $session = new USession();
        $pm = new FPersistentManager();
        if(isset($_POST['username'])){
            $pm->updateUtenteRegistrato($_POST['username'],false,"");
            header('Location: /PolisportivaDDD/Utente/utentiBannati');
        }

    }

    public function logout(){
        $session = new USession();
        $session->startSession();
        $session->stopSession();
        header('Location: /PolisportivaDDD/Utente/home');
    }

    public function visualizzaProfilo($username){
        $session = new USession();
        $isAmministratore = $session->readValue('isAmministratore');
        $pm = new FPersistentManager();
        $view = new VUtente();

            $utenteDaBannare = $pm->load($username,"FUtente");
            if($utenteDaBannare!=null){
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
                if($username==$session->readValue('username')){
                    $listaCampiWallet=$utenteDaBannare->getWallet()->getListaCampiWallet();
                    $wallet=array();
                    foreach ($listaCampiWallet as $value){
                        $arr=array();
                        $arr["nomeCampo"]=$value->getCampo()->getNome();
                        $arr["quantitaGettoni"]=$value->getGettoni();
                        $wallet[]=$arr;
                    }
                    $view->showMioProfilo($username, $nome, $cognome, $eta, $valutazioneMedia,$wallet,$result,$isAmministratore,$pic64,$type);
                }
                else{
                    $session->setValue('utente', serialize($utenteDaBannare));

                    $view->showProfiloUtenteRegistrato($username, $nome, $cognome, $eta, $valutazioneMedia,$result,$isAmministratore);
                }

            }
            else{
                //$view->showErrore($username,$isAmministratore );
            }




    }




}