<?php

require_once (dirname(__DIR__)  .'/Utility/USession.php');
require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
require_once (dirname(__DIR__)  .'/Utility/autoload.php');
//require_once '../Foundation/config.inc.php';

class CGruppo
{

    //commento
    /**
     * Ore possibili per la creazione di un gruppo
     * @var string[]
     */
    private static $orePossibili=array('08:00:00',
                                            '10:00:00',
                                            '12:00:00',
                                            '14:00:00',
                                            '16:00:00',
                                            '18:00:00',
                                            '20:00:00',
                                            '22:00:00');

    public function __construct(){}

    /**
     * Funzione che permette la scelta di un campo e richiama il template giusto
     * @throws SmartyException
     */
    public function scegliCampo(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = new FPersistentManager();
            $isAmministratore = $session->readValue('isAmministratore');
            $campi = $pm->loadList("FCampo");
            $view = new VGruppo();
            $results = array();
            $type = 'image/png';
            foreach($campi as $campo){
                $c = array();
                $id = $campo->getId();
                $nome = $campo->getNome();
                $immagine = $campo->getImmagine();
                $c["idCampo"] = $id;
                $c["nome"] = $nome;
                $c["immagine"] = $immagine;
                $c['pic64'] = $immagine;
                $results[] = $c;
            }
            $view->showScegliCampo($results, $type, $isAmministratore);
        }
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }


    }


    /**
     *Funzione che permette la scelta della data per la creazione di un gruppo
     */
    public function scegliData(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = new FPersistentManager();

            $view = new VGruppo();
            $today = new DateTime("now", new DateTimeZone('Europe/Rome') );
            $tomorrow = $today->modify('+1 day');
            $tomorrowString = $tomorrow->format('Y-m-d');
            if (isset($_POST['idCampo'])){
                $idCampoScelto = $_POST['idCampo'];
                $session->setValue('idCampo', $idCampoScelto);
                $campoScelto = $pm->load($idCampoScelto, 'FCampo');
                $nomeCampo = $campoScelto->getNome();
                $isAmministratore = $session->readValue('isAmministratore');
                $view->showScegliDataPage($nomeCampo, $isAmministratore, $tomorrowString);
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }


    }

    /**
     *Funzione che permette la scelta dell'ora per la data selezionata per la scelta di un gruppo
     */
    public function scegliOra(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $view = new VGruppo();
            $isAmministratore = $session->readValue('isAmministratore');
            //La data è passata con formato yyyy-mm-dd
            if (isset($_POST['dataCreazioneGruppo'])) {
                $dataScelta = $_POST['dataCreazioneGruppo'];
                //timestamp della data scelta
                $date = strtotime($dataScelta);
                //Metto il timestamp nell'array session
                $session->setValue('dataScelta', $date);
            }
            //Ore disponibili per la data scelta
            $idCampoScelto = $session->readValue('idCampo');
            $oreDisponibili = self::freeHoursFromDate($dataScelta, $idCampoScelto);

            $view->showScegliOraPage($dataScelta, $oreDisponibili, $isAmministratore);
        }else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }



    public function scegliInvitati(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $pm = new FPersistentManager();
            $view = new VGruppo();
            $isAmministratore = $session->readValue('isAmministratore');
            $results = array();
            if (isset($_POST['ora'])){
                $oraScelta = $_POST['ora'];
                $session->setValue('oraScelta', $oraScelta);
            }
            $utenti = $pm->loadList('FUtente');
            foreach($utenti as $utente){
                //Array contentente i dati per la view
                $u = array();
                //Username dell'utente
                $username= $utente->getUsername();
                //Recensioni dell'utente
                $recensioniUtente = $pm->loadRecensioniUtente($username);
                if(!$recensioniUtente){
                    $recensioniUtente=array();
                }
                //Assegno all'array i dati
                $u['username']=$username;
                $u['eta']=$utente->getEta();
                $u['valutazione'] = round($utente->calcolaMediaRecensioni($recensioniUtente));
                //Metto nell'array results per la view l'array appena creato.
                $results[] = $u;
            }
            $view->showGruppoListaInvitati($results, $isAmministratore);
        }
        else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }

    }

    public function scegliDettagli(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $pm = new FPersistentManager();
            $view = new VGruppo();
            $isAmministratore = $session->readValue('isAmministratore');
            if ($_POST){
                $invitati = array();
                foreach($_POST as $username){
                    $invitati[] = $username;
                }
                $session->setValue('invitati', $invitati);
            }
            $campi = $pm->loadList('FCampo');
            $nomiCampi=array();
            foreach($campi as $campo){
                $nomiCampi[] = $campo->getNome();
            }
            $view->showCreaGruppoDettagliFinali($nomiCampi, $isAmministratore);
        }else{
            header('Location: /PolisportivaDDD/Utente/Home');
        }


    }

    public function creaGruppo(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $pm = new FPersistentManager();
            $username = $session->readValue('username');
            if ($_POST){
                $nomeGruppo = $_POST['nomeGruppo'];
                $etaMinima = $_POST['etaMinima'];
                $etaMassima = $_POST['etaMassima'];
                $valutazioneMinima = $_POST['valMinima'];
                $descrizione = $_POST['descrizione'];
            }
            $invitati = $session->readValue('invitati');

            //INVIARE EMAIL AGLI INVITATI!!!!!!



            $idCampo = $session->readValue('idCampo');
            $data = $session->readValue('dataScelta');
            $dataString = date('Y-m-d', $data);
            $ora = $session->readValue('oraScelta');
            $dataEOra = DateTime::createFromFormat('Y-m-d H:i:s', $dataString . $ora);


            $adminUsername = $session->readValue('username');
            $admin = $pm->load('username', 'FUtente');
            $admin = $pm->load($adminUsername, 'FUtente');
            $campo = $pm->load($idCampo, 'FCampo');
            $abbastanzaGettoni = self::rimuoviGettone($username, $idCampo);
            if ($abbastanzaGettoni){
                $gruppo = new EGruppo(null, $nomeGruppo, $etaMinima, $etaMassima, $valutazioneMinima, $descrizione, $dataEOra, array(), $admin, $campo);
                $idGruppoCreato = $pm->store($gruppo);
                $pm->addPartecipanteGruppo($adminUsername, $idGruppoCreato);
                $session->deleteValue('oraScelta');
                $session->deleteValue('dataScelta');
                $session->deleteValue('invitati');
                $session->deleteValue('idCampo');
                header('Location: /PolisportivaDDD/Utente/home');
            }
            else{
                $session->deleteValue('oraScelta');
                $session->deleteValue('dataScelta');
                $session->deleteValue('invitati');
                $session->deleteValue('idCampo');
                $messaggio = 'Siamo spiacenti, non ha un gettone per il campo da lei scelto';
                $session->setValue('messaggioErrore', $messaggio);
                header("Location: /PolisportivaDDD/messaggio/genericError");
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }


    }





    public function gruppi($id=-1){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $isAmministratore = $session->readValue('isAmministratore');
            $pm = new FPersistentManager();
            $view = new VGruppo();
            $nomeGruppo = null; $adminGruppo = null; $etaMinima = null; $etaMassima = null; $dataGruppo = null; $campo = null; $valutazioneMinima = null;
            if(isset($_POST['nomeGruppo']) && $_POST['nomeGruppo']!=''){
                $nomeGruppo = $_POST['nomeGruppo'];
            }
            if(isset($_POST['adminGruppo']) && $_POST['adminGruppo']!=''){
                $adminGruppo = $_POST['adminGruppo'];
            }
            if(isset($_POST['etaMinima']) && $_POST['etaMinima']!=''){
                $etaMinima = $_POST['etaMinima'];
            }
            if(isset($_POST['etaMassima']) && $_POST['etaMassima']!=''){
                $etaMassima = $_POST['etaMassima'];
            }
            if(isset($_POST['dataGruppo']) && $_POST['dataGruppo']!=''){
                $dataGruppo = $_POST['dataGruppo'];
            }
            if(isset($_POST['campo']) && $_POST['campo']!=''){
                $campo = $_POST['campo'];
            }
            if(isset($_POST['valutazioneMinima']) && $_POST['valutazioneMinima']!=''){
                $valutazioneMinima = $_POST['valutazioneMinima'];
            }
            if ($id==-1) {
                $gruppiObj = $pm->loadGruppi($nomeGruppo, $adminGruppo, $dataGruppo, $campo, $etaMinima, $etaMassima, $valutazioneMinima);
                $campiObj = $pm->loadList('FCampo');
                $campi = array();
                foreach ($campiObj as $campoObj) {
                    $c = array();
                    $nomeCampo = $campoObj->getNome();
                    $c['nomeCampo'] = $nomeCampo;
                    $campi[] = $c;
                }

                $gruppi = array();
                foreach ($gruppiObj as $gruppo) {
                    $g = array();
                    $g['nomeGruppo'] = $gruppo->getNome();
                    $g['admin'] = $gruppo->getAdmin()->getUsername();
                    $g['tipologia'] = $gruppo->getCampo()->getNome();
                    $g['dataEOra'] = $gruppo->getDataEOra()->format("Y-m-d H:i:s");
                    $g['etaMinima'] = $gruppo->getEtaMinima();
                    $g['etaMassima'] = $gruppo->getEtaMassima();
                    $g['limiteValutazione'] = $gruppo->getVotoMinimo();
                    $g['postiDisponibili'] = $gruppo->getPostiDisponibili();
                    $g['id'] = $gruppo->getId();
                    $gruppi[] = $g;
                }

                $view->showRicercaGruppo($gruppi, $campi, $isAmministratore);
            }
            else{

                $gruppo = $pm->load($id, 'FGruppo');
                $partecipanti = $gruppo->getPartecipanti();
                $nomePartecipanti = array();
                foreach($partecipanti as $partecipante){
                    $nomePartecipanti[] = $partecipante->getUsername();
                }
                $admin = $gruppo->getAdmin()->getUsername();
                $campo = $gruppo->getCampo()->getNome();
                $dataEOra = $gruppo->getDataEOra()->format('Y-m-d H:i:s');
                $postiDisponibili = $gruppo->getPostiDisponibili();
                $etaMinima = $gruppo->getEtaMinima();
                $etaMassima = $gruppo->getEtaMassima();
                $votoMinimo = $gruppo->getVotoMinimo();
                $descrizione = $gruppo->getDescrizione();
                $idGruppo = $gruppo->getId();

                $view->showDettagliGruppo($idGruppo, $nomePartecipanti, $admin, $campo, $dataEOra, $postiDisponibili, $etaMinima, $etaMassima, $votoMinimo, $descrizione, $isAmministratore);

            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }


    }










    private function rimuoviGettone($username, $idCampo): bool{
        if(CUtente::isLogged()){
            $pm = new FPersistentManager();
            $utente = $pm->load($username, "Futente");
            $wallet = $utente->getWallet();
            $campo = $pm->load($idCampo, 'FCampo');
            $result=false;
            if($wallet->rimuoviGettoni($campo, 1)){
                $result = $pm->update($wallet);
            }
            return $result;
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }




    /**
     * Funzione che serve a ricavare le ore disponibili della data scelta
     * @param $dataScelta
     * @return string[]
     */
    public static function freeHoursFromDate($dataScelta, $idCampoScelto){
        if(CUtente::isLogged()){
            $oreDisponibili= self::$orePossibili;
            $pm = new FPersistentManager();
            //Recupera dal db le ore occupate del campo scelto
            $gruppi = $pm->loadGruppi(null, null, null, null, null, null, null);
            $dataEOreOccupate = array();
            foreach($gruppi as $gruppo){
                if ($gruppo->getCampo()->getId() == $idCampoScelto){
                    $deO = $gruppo->getDataEOra();
                    $dataEOreOccupate[] = date_format($deO, 'Y-m-d H:i:s');
                }
            }
            //Filtro l'array di prima prendendo esclusivamente le date e ore della data scelta dall'utente
            foreach ($dataEOreOccupate as $dataOccupata){
                //Giorno della data occupata
                $d = date('Y-m-d', strtotime($dataOccupata));
                //Se la data corrisponde
                if ($d == $dataScelta) {
                    //Ora occupata della data
                    $o = date('H:i:s', strtotime($dataOccupata));
                    //Cerca l'indice dell'orario da togliere
                    $indexOre = array_search($o, $oreDisponibili);
                    //Togli quell'orario dagli orari disponibili
                    unset($oreDisponibili[$indexOre]);
                    $oreDisponibili = array_values($oreDisponibili);
                }
            }
            return $oreDisponibili;
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function visualizzaGruppiUtente(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $isAmministratore = $session->readValue('isAmministratore');
            $pm = new FPersistentManager();
            $view = new VGruppo();
            $gruppiUtente = $pm -> loadGruppiUtente($session->readValue('username'));
            if ($gruppiUtente != null){
                $gruppiDetails = array();
                for ($i=0;$i<count($gruppiUtente); $i++){
                    $tmp = array(
                        'id' => $gruppiUtente[$i]->getId(),
                        'nome' => $gruppiUtente[$i]->getNome(),
                        'admin' => $gruppiUtente[$i]->getAdmin()->getUsername(),
                        'campo' => $gruppiUtente[$i]->getCampo()->getNome(),
                        'dataEOra' => $gruppiUtente[$i]->getDataEOra()->format('d-m-Y H:i')
                    );
                    $gruppiDetails[]=$tmp;
                }
            }
            else{
                $gruppiDetails = array();
            }


            $view -> showITuoiGruppi($isAmministratore,$gruppiDetails);
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    /**
     * Metodo che permette la partecipazione al gruppo da parte dell'utente che ne fa richiesta. L'id del gruppo gli
     * viene passato come parametro mentre l'username si prende dall'array session. Restituisce false se l'utente non soddisfa
     * le condizioni oppure se il gruppo è già pieno.
     * @param $idGruppo
     * @return false
     */
    public function partecipa($idGruppo){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){

            $username = $session->readValue('username');
            $pm = new FPersistentManager();
            $utente = $pm->load($username, 'FUtente');
            $gruppo = $pm->load($idGruppo, 'FGruppo');
            //Se soddisfa le condizioni
            if ($gruppo->verificaCondizioni($utente)){
                //Se il gruppo non è pieno
                if(!($gruppo->isPieno())){
                    //Se non è già un partecipante
                    if(!($gruppo->hasPartecipante($username))){
                        //Se ha abbastanza gettoni per quel campo
                        if(self::rimuoviGettone($username, $gruppo->getCampo()->getId())){
                            $pm->addPartecipanteGruppo($username, $idGruppo);
                            header("Location: /PolisportivaDDD/utente/home");
                        }
                        else{
                            $messaggio = 'Siamo spiacenti, non ha un gettone per questo campo';
                            $session->setValue('messaggioErrore', $messaggio);
                            header("Location: /PolisportivaDDD/messaggio/genericError");
                        }
                    }
                    else{
                        $messaggio = 'Siamo spiacenti, è già un partecipante di questo gruppo';
                        $session->setValue('messaggioErrore', $messaggio);
                        header("Location: /PolisportivaDDD/messaggio/genericError");
                    }
                }
                else{
                    $messaggio = 'Siamo spiacenti, il gruppo è già pieno';
                    $session->setValue('messaggioErrore', $messaggio);
                    header("Location: /PolisportivaDDD/messaggio/genericError");
                }
            }
            else{
                $messaggio = 'Siamo spiacenti, non soddisfa i requisiti per partecipare al gruppo';
                $session->setValue('messaggioErrore', $messaggio);
                header("Location: /PolisportivaDDD/messaggio/genericError");
            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

}

