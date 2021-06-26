<?php

//require_once '../Utility/autoload.php';
//require_once '../Utility/StartSmarty.php';
require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
require_once (dirname(__DIR__)  .'/Utility/autoload.php');

/**
 * Class CUtente
 */
class CUtente
{
    /**
     * CUtente constructor.
     */
    public function __construct(){}

    /**
     * @throws SmartyException
     */
    public function informazioni(){
        if(self::isLogged()){
            $view = new VUtente();
            $view->showAssistenza();
        }
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }


    /**
     * Funzione che mostra il proprio profilo se lo username passato al metodo è diverso dalla stringa vuota
     * altrimenti mostra la sezione "ricerca utente"
     * @param string $username
     * @throws SmartyException
     */
    public function utenti($username=""){
        $session = new USession();
        $session->startSession();
        if(self::isLogged()){
            $isAmministratore= $session->readValue('isAmministratore');
            if($username!=""){
                self::visualizzaProfilo($username);
            }
            else{
                $view = new VUtente();
                $pm = FPersistentManager::getInstance();
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

        }else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }


    /**
     *Funzione necessaria alla creazione e all'invio di una segnalazione
     */
    public function inviaSegnalazione(){
        $session = new USession();
        $session->startSession();
        if(self::isLogged()){
            $pm = FPersistentManager::getInstance();
            if (isset($_POST['oggetto']) && isset($_POST['messaggio'])){
                $oggetto = $_POST['oggetto'];
                $messaggio = $_POST['messaggio'];
            }
            $autore = $session->readValue('username');
            $segnalazione = new ETicketAssistenza($autore, $messaggio, $oggetto, new DateTime('now'));
            $pm->store($segnalazione);
            header('Location: /PolisportivaDDD/Utente/Home');
        }
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }

    /**
     * Funzione che si occupa di mostrare la pagina home a seconda se l'utente è loggato o meno
     * @throws SmartyException
     */
    public function home(){
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $isRegistrato = $session->readValue('isRegistrato');
        $view=new VUtente();
        $pm = FPersistentManager::getInstance();
        $campi=$pm->loadList("FCampo");
        $result=array();
        $type = '';
        foreach ($campi as $value){

            $nomiCampi=array();
            $nomiCampi['nome']=$value->getNome();
            $nomiCampi['idCampo']=$value->getId();
            $nomiCampi['pic64'] = $value->getImmagine();

            $result[]=$nomiCampi;

        }
        $view->showHome($isAmministratore,$isRegistrato,$result, $type);

    }


    /**
     * Funzione che si occupa di mostrare il proprio profilo
     * @throws SmartyException
     */
    public function mioProfilo(){
            $session = new USession();
            $session->startSession();
            $isAmministratore = $session->readValue('isAmministratore');
            $view=new VUtente();
            if(CUtente::isLogged()){
                $pm = FPersistentManager::getInstance();
                $username = $session->readValue('username');
                $utente=$pm->load($username,"FUtente");
                $username=$utente->getUsername();
                $nome=$utente->getNome();
                $cognome=$utente->getCognome();
                $eta=$utente->getEta();
                $recensioni=$pm->loadRecensioniUtente($username);

                $rec=array();
                $listCampi=$utente->getWallet()->getListaCampiWallet();
                $pic64=base64_encode($utente->getImmagine());
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
                        $utenteRec=$pm->load($arr["username"],"FUtente");
                        $arr["pic64"]=base64_encode($utenteRec->getImmagine());
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
            else{
                header('Location: /PolisportivaDDD/Utente/Home');
            }




    }

    /**
     * Funzione che mostra i dettagli del campo selezionato sulla home
     * @throws SmartyException
     */
    public function mostraCampo(){
        $view=new VUtente();
        $pm = FPersistentManager::getInstance();
        $session = new USession();
        $session->startSession();
        $isAmministratore = $session->readValue('isAmministratore');
        $isRegistrato = $session->readValue('isRegistrato');
        if (isset($_POST['idCampo'])) {
            $idCampo=$_POST['idCampo'];
            $campo=$pm->load($idCampo,"FCampo");
            $nome=$campo->getNome();
            $descrizione=$campo->getDescrizione();
            $type='image/jpg';
            $pic64=$campo->getImmagine();
            $view->showDettagliCampo($nome,$descrizione,$pic64, $type,$isRegistrato,$isAmministratore);
        }
        else{
            //che faccio?
        }

    }


    /**
     * Funzione che mostra la sezione per effettuare una recensione ad un altro utente
     * @throws SmartyException
     */
    public function effettuaRecensione(){
        $session = new USession();
        $session->startSession();
        if(self::isLogged()) {
            $view = new VRecensione();
            $isAmministratore = $session->readValue('isAmministratore');
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $session->setValue('utenteDaRecensire', $username);
                $view->showEffettuaRecensioni($isAmministratore, $username);
            } else {
                //che faccio?
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }
    }

    /**
     *  Funzione che si occupa di memorizzare la recensione effettuata dall'utente sul db
     */
    public function recensisci(){
        $session = new USession();
        $session->startSession();
        if(self::isLogged()) {
            $pm = FPersistentManager::getInstance();
            $utente = $session->readValue('username');
            $utenteDaRec = $session->readValue('utenteDaRecensire');

            if (isset($_POST['titoloRecensione']) and isset($_POST['testo']) and isset($_POST['rate'])) {
                $titolo=$_POST['titoloRecensione'];
                $testo=$_POST['testo'];
                $voto=$_POST['rate'];
                $utenteAutore=$pm->load($utente,"FUtente");
                $utentePossessore=$pm->load($utenteDaRec,"FUtente");
                $recensione=new ERecensione($utenteAutore,$voto,$titolo,$testo,new DateTime('now'),$utentePossessore);
                $pm->store($recensione);

                header('Location: /PolisportivaDDD/Utente/Utenti/'.$utenteDaRec);
            }
            else{
                //che faccio?
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    /**
     * Funzione che mostra la pagine di login con un errore
     * @param int $error
     * @throws SmartyException
     */
    public function loginError($error=-1){
        $view=new VUtente();
        $view->showLoginError($error);
    }


    /**
     * Funzione che mostra la pagina di login
     * @throws SmartyException
     */
    public function login (){
        $view=new VUtente();
        $view->showFormLogin();
    }



    /**
     * Funzione che si occupa di verificare l'esistenza di un utente con username e password inseriti nel form di login.
     * 1) se, dopo la ricerca nel db non si hanno risultati ($utente = null) oppure se l'utente si trova nel db ma ha è bannato
     *    viene ricaricata la pagina con l'aggiunta dell'errore nel login.
     * 2) se l'utente c'è, avviene il reindirizzamento alla homepage;
     */
    public function verifica() {
        $view = new VUtente();
        $session = new USession();
        $pm = FPersistentManager::getInstance();
        if(isset($_POST['username']) && isset($_POST['password'])) {

            $esiste = $pm->Login($_POST['username'], md5($_POST['password']));
            if ($esiste==1) {
                if($pm->isBannato($_POST['username'])){
                    $view->showLoginError(2);
                }
                else{

                    $utente = $pm->load($_POST['username'], 'FUtente');
                    if ($utente != null) {

                        if ($session->isSessionNone()) {
                            $session->startSession();
                        }
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


                    } else {
                        header('Location: /PolisportivaDDD/Utente/login');
                    }
                }

            }
            else{
                $view->showLoginError(1);

            }
        }
    }

    /**
     * Funzione che mostra la pagina di registrazione.
     * @throws SmartyException
     */
    public function registrazione(){
        $view = new VUtente();
        $view->showRegistrazioneUtente();
    }

    /**
     * Funzione di supporto che si occupa di verificare i dati inseriti nella form di registrazione per il cliente .
     * In questo metodo avviene la verifica sull'univocità dell'username inserito;
     * se questa verifiche non riscontrano problemi, si passa alla store nel db.
     * @throws SmartyException
     */
    public function verificaRegistrazione() {
        $pm = FPersistentManager::getInstance();
        $view = new VUtente();
        $session = new USession();
        $session->startSession();
        $session->setValue("isAmministratore",false);
        $session->setValue('isRegistrato',true);
        if (isset($_POST['username']) and isset($_POST['nome']) and isset($_POST['cognome']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['data']) and isset($_FILES['file'])){
            $session->setValue("username",$_POST['username']);
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $data = $_POST['data'];
            $data=(DateTime::createFromFormat('Y-m-d',$data));
            $nomeFile="file";
            $ris=static::verificaImmagine($nomeFile);
            if($ris=="size"){
                $view->showRegistrazioneError("size");
            }
            elseif($ris=="type"){
                $view->showRegistrazioneError("type");
            }
            else{

                $path = $_FILES[$nomeFile]['tmp_name'];
                $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
                $immagine=fread($file,filesize($path));
                unset($file);
                unlink($path);

                $verUsername = $pm->existUsername($username);
                if ($verUsername){
                    $view->showRegistrazioneError("errorUsername");
                }
                else {
                    $verEmail = $pm->existMail($email);
                    if ($verEmail){
                        $view->showRegistrazioneError("errorEmail");
                    }
                    else{
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
                        if($pm->existUsername($utente->getUsername())){
                            header('Location: /PolisportivaDDD/Utente/home');
                        }
                        else{
                            $view->showRegistrazioneError('errorRegistrazione');
                        }

                    }

                }
            }
        }


    }

    /**
     * Funzione che mostra la sezione degli utenti bannati
     * @throws SmartyException
     */
    public function utentiBannati(){
        if(self::isLogged()){
            $view = new VAmministratore();
            $pm = FPersistentManager::getInstance();
            $utentiBannati=$pm->loadList("FUtenteRegistrato");
            $result=array();
            if($utentiBannati!=null){
                foreach ($utentiBannati as $value){
                    $array=array();
                    $array["motivoBan"]=$value->getMotivazione();
                    $array["username"]=$value->getUsername();
                    $utente=$pm->load($value->getUsername(),"FUtente");
                    $array["pic64"]=base64_encode($utente->getImmagine());
                    $result[]=$array;
                }
            }

            $view->showUtentiBannati($result);
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }


    }

    /**
     *Funzione che permette di rimuovere il ban ad un utente selezionato sulla pagina "utenti bannati"
     */
    public function rimuoviBan(){
        $pm = FPersistentManager::getInstance();
        if(isset($_POST['username'])){
            $pm->updateUtenteRegistrato($_POST['username'],false,"");
            header('Location: /PolisportivaDDD/Utente/utentiBannati');
        }

    }


    /**
     *Funzione che permette di effettuare il logout
     */
    public function logout(){
        $session = new USession();
        $session->startSession();
        $session->stopSession();
        header('Location: /PolisportivaDDD/Utente/home');
    }

    /**
     * Funzione che permette di visualizzare il profilo di un altro utente registrato passandogli il suo username
     * @param $username
     * @throws SmartyException
     */
    public function visualizzaProfilo($username){
        if(self::isLogged()){
            $session = new USession();
            $isAmministratore = $session->readValue('isAmministratore');
            $pm = FPersistentManager::getInstance();
            $view = new VUtente();

            $utenteDaBannare = $pm->load($username,"FUtente");
            $isBannato=false;
            if(!($pm->exist($username))){
                $isBannato=$pm->isBannato($username);
            }

            if($utenteDaBannare!=null){
                $nome=$utenteDaBannare->getNome();
                $cognome=$utenteDaBannare->getCognome();
                $eta =  $utenteDaBannare->getEta();
                $pic64=base64_encode($utenteDaBannare->getImmagine());
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
                        $utenteRec=$pm->load($arr["username"],"FUtente");
                        $arr["pic64"]=base64_encode($utenteRec->getImmagine());
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

                    $view->showProfiloUtenteRegistrato($username, $nome, $cognome, $eta, $valutazioneMedia,$result,$isAmministratore,$isBannato,$pic64);
                }

            }
            else{
                //$view->showErrore($username,$isAmministratore );
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }



    }


    /**
     * Funzione che permette di verificare se l'utente è loggato o meno
     * @return bool
     */
    static function isLogged() {
        $identificato = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
        if (isset($_SESSION['username'])) {
            $identificato = true;
        }
        return $identificato;
    }

    /**
     * Funzione che permette di verificare che l'immagine passata in fase di registrazione rispetti i requisiti:
     * sia di tipo jpg,jpeg,png e che la dimensione sia di 1MB
     * @param $nome_file
     * @return string|null
     */
    static function verificaImmagine($nome_file)
    {

        $ris = null;
        $max_size = 1000000;
        $size = $_FILES[$nome_file]['size'];
        $type = $_FILES[$nome_file]['type'];
        if ($size > $max_size) {
            $ris = "size";
        } elseif ($type != 'image/jpeg' and $type != 'image/png' and $type != 'image/jpg') {
            $ris = "type";
        }
        return $ris;
    }



}