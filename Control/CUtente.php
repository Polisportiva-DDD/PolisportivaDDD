<?php

//require_once '../Utility/autoload.php';
//require_once '../Utility/StartSmarty.php';
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CUtente
{

    public function __construct(){}

    public function assistenza(){
        $session = new USession();
        $session->startSession();
        $view = new VUtente();
        $view->showAssistenza();
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
       // $isAmministratore = $session->readValue('isAmministratore');
        //$isRegistrato = $session->readValue('isRegistrato');
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
        $view->showHome(true,true,$result);
    }

    public function mioProfilo(){
        $session = new USession();
        $session->startSession();
        // $isAmministratore = $session->readValue('isAmministratore');
        $view=new VUtente();
        $pm = new FPersistentManager();
        //$username = $session->readValue('username');
        $username="lor";
        $utente=$pm->load($username,"FUtente");
        $username=$utente->getUsername();
        $nome=$utente->getNome();
        $cognome=$utente->getCognome();
        $eta=$utente->getEta();
        $recensioni=$pm->loadRecensioniUtente($username);
        $listCampi=$utente->getWallet()->getListaCampiWallet();
        $pic64=$utente->getImmagine();
        $type="";
        if($recensioni!=null){
            $valutazioneMedia=round($utente->calcolaMediaRecensioni($recensioni));
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


        $view->showMioProfilo($username, $nome, $cognome, $eta, $valutazioneMedia,$result,true,$pic64, $type);
    }

    public function mostraCampo(){
        $view=new VUtente();
        $pm = new FPersistentManager();
        if (isset($_POST['idCampo'])) {
            $idCampo=$_POST['idCampo'];
            $campo=$pm->load($idCampo,"FCampo");
            $nome=$campo->getNome();
            $descrizione=$campo->getDescrizione();
            $type=$campo->getImmagine();
            $pic64="";
            $view->showDettagliCampo($nome,$descrizione,$type,$pic64,false,true);
        }
        else{
            //che faccio?
        }

    }

    public function effettuaRecensione(){
        $view=new VRecensione();
        $session = new USession();
        $session->startSession();
        // $isAmministratore = $session->readValue('isAmministratore');
        if (isset($_POST['username'])) {
            $username=$_POST['username'];
            $session->setValue('utenteDaRecensire',$username);
            $view->showEffettuaRecensioni(true,$username);
        }
        else{
            //che faccio?
        }
    }

    public function recensisci(){
        $view=new VRecensione();
        $pm = new FPersistentManager();
        $session = new USession();
        $session->startSession();
        // $isAmministratore = $session->readValue('isAmministratore');
        // $utente = $session->readValue('username');
        $utenteDaRec = $session->readValue('utenteDaRecensire');

        if (isset($_POST['titoloRecensione']) and isset($_POST['testo']) and isset($_POST['rate'])) {
            $titolo=$_POST['titoloRecensione'];
            $testo=$_POST['testo'];
            $voto=$_POST['rate'];
            $utenteAutore=$pm->load("lor1","FUtente");
            $utentePosessore=$pm->load($utenteDaRec,"FUtente");
            $recensione=new ERecensione($utenteAutore,$voto,$titolo,$testo,new DateTime('now'),$utentePosessore);
            $pm->store($recensione);

            header('Location: /PolisportivaDDD/Utente/home');
        }
        else{
            //che faccio?
        }
    }



    /**
     * Funzione che consente il login di un utente registrato. Si possono avere diversi casi:
     * 1) se il metodo della richiesta HTTP è GET:
     *   - se l'utente è già loggato viene reindirizzato alla homepage;
     *     - se l'utente non è loggato si viene indirizzati alla form di login;
     * 2) se il metodo della richiesta HTTP è POST viene richiamata la funzione verifica().
     * @throws SmartyException
     */
    public function login (){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(static::isLogged()) {
                //$isAmministratore = $session->readValue('isAmministratore');
                //$isRegistrato = $session->readValue('isRegistrato');
                $pm = new FPersistentManager();
                $view = new VUtente();
                $campi = $pm -> loadList("FCampo");
                $result=array();
                $c=0;
                foreach ($campi as $value){

                    $nomiCampi=array();
                    $nomiCampi['nome']=$value->getNome();
                    $nomiCampi['descrizione']=$value->getNome();
                    $result[$c]=$nomiCampi;
                    $c++;
                }
                $view->showHome('false','true',$result);
            }
            else{
                $view=new VUtente();
                $view->showFormLogin();
            }
        }elseif ($_SERVER['REQUEST_METHOD']=="POST")
            static::verifica();
    }

    /**
     * Metodo che verifica se l'utente è loggato
     */
    public function isLogged(): bool
    {
        $identificato = false;
        $session = new USession();
        if ($session -> isSessionSet()) {
            if ($session -> isSessionNone()) {
                //header('Cache-Control: no cache'); //no cache
                //session_cache_limiter('private_no_expire'); // works
                //session_cache_limiter('public'); // works too
                $session -> startSession();
            }
        }
        if (isset($_SESSION['utente'])) {
            $identificato = true;
        }
        return $identificato;
    }

    /**
     * Funzione che si occupa di verificare l'esistenza di un utente con username e password inseriti nel form di login.
     * 1) se, dopo la ricerca nel db non si hanno risultati ($utente = null) oppure se l'utente si trova nel db ma ha lo stato false
     *    viene ricaricata la pagina con l'aggiunta dell'errore nel login.
     * 2) se l'utente c'è, avviene il reindirizzamento alla homepage;
     * @throws SmartyException
     */
    static function verifica() {
        $session = new USession();
        $view = new VUtente();
        $pm = new FPersistentManager();
        $utente = $pm->Login($_POST['email'], $_POST['password']);
        if ($utente != null) {
            if ($session -> isSessionNone()) {
                $session -> startSession();
                $salvare = serialize($utente);
                $_SESSION['utente'] = $salvare;
                if (isset($_COOKIE['username'])) {
                    header('Location: /PolisportivaDDD/Utente/Home');
                }
            }
        }
        else {
            $view->loginError();
        }
    }
}