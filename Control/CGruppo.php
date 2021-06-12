<?php

require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
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
        $pm = new FPersistentManager();
        $isAmministratore = $session->readValue('isAmministratore');
        $campi = FPersistentManager::loadList("FCampo");
        $view = new VGruppo();
        $results = array();
        foreach($campi as $campo){
            $c = array();
            $id = $campo->getId();
            $nome = $campo->getNome();
            $immagine = $campo->getImmagine();
            $c["idCampo"] = $id;
            $c["nome"] = $nome;
            $c["immagine"] = $immagine;
            $results[] = $c;
        }
        $view->showScegliCampo($results, $isAmministratore);

    }


    /**
     *Funzione che permette la scelta della data per la creazione di un gruppo
     */
    public function scegliData(){
        $session = new USession();
        $pm = new FPersistentManager();
        $session->startSession();
        $view = new VGruppo();
        if (isset($_POST['idCampo'])){
            $idCampoScelto = $_POST['idCampo'];
            $session->setValue('idCampo', $idCampoScelto);
            $campoScelto = $pm->load($idCampoScelto, 'FCampo');
            $nomeCampo = $campoScelto->getNome();
            $isAmministratore = $session->readValue('isAmministratore');
            $view->showScegliDataPage($nomeCampo, $isAmministratore);
        }

    }

    /**
     *Funzione che permette la scelta dell'ora per la data selezionata per la scelta di un gruppo
     */
    public function scegliOra(){
        $session = new USession();
        $session->startSession();
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
    }

    public function scegliInvitati(){
        $session = new USession();
        $session->startSession();
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

    public function scegliDettagli(){
        $session = new USession();
        $session->startSession();
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

    }

    public function creaGruppo(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
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
        //DA SCOMMENTARE
        //$adminUsername = $session->readValue('username');
        //$pm->load()
        //SOLO PER PROVA ADMIN='lor'
        $adminUsername='lor';
        $admin = $pm->load($adminUsername, 'FUtente');
        $campo = $pm->load($idCampo, 'FCampo');

        $gruppo = new EGruppo(null, $nomeGruppo, $etaMinima, $etaMassima, $valutazioneMinima, $descrizione, $dataEOra, array(), $admin, $campo);
        $pm->store($gruppo);
        $session->deleteValue('oraScelta');
        $session->deleteValue('dataScelta');
        $session->deleteValue('invitati');
        $session->deleteValue('idCampo');
        header('Location: /PolisportivaDDD/Utente/Home');

    }














    /**
     * Funzione che serve a ricavare le ore disponiibli della data scelta
     * @param $dataScelta
     * @return string[]
     */
    public static function freeHoursFromDate($dataScelta, $idCampoScelto){
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
    }
}

