<?php

require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';

class CCreazioneGruppo
{
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
    public function scegliCamppo(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $isAmministratore = $session->readValue('isAmministratore');
        $isUtente = $session->readValue('isUtente');
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
        $view->showScegliCampo($results, $isAmministratore, $isUtente);

    }

    /**
     *Funzione che permette la scelta della data per la creazione di un gruppo
     */
    public function scegliData(){
        $session = new USession();
        $pm = new FPersistentManager();
        $session->startSession();
        $view = new VGruppo();
        if ($_POST['idCampo']){
            $idCampoScelto = $_POST['idCampo'];
            $session->setValue('idCampo', $idCampoScelto);
        }
        $campoScelto = $pm->load($idCampoScelto, 'FCampo');
        $nomeCampo = $campoScelto->getNome();
        $isAmministratore = $session->readValue('isAmministratore');
        $isUtente = $session->readValue('isUtente');

        $view->showScegliDataPage($nomeCampo, $isAmministratore, $isUtente);

    }

    /**
     *Funzione che permette la scelta dell'ora per la data selezionata per la scelta di un gruppo
     */
    public function scegliOra(){
        $session = new USession();
        $session->startSession();
        $view = new VGruppo();
        $isAmministratore = $session->readValue('isAmministratore');
        $isUtente = $session->readValue('isUtente');
        //La data è passata con formato yyyy-mm-dd
        if (isset($_POST['dataCreazioneGruppo'])) {
            $dataScelta = $_POST['dataCreazioneGruppo'];
            //timestamp della data scelta
            $date = strtotime($dataScelta);
            //Metto il timestamp nell'array session
            $session->setValue('dataScelta', $date);
        }
        //Ore disponibili per la data scelta
        $oreDisponibili = self::freeHoursFromDate($dataScelta);

        $view->showScegliOraPage($dataScelta, $oreDisponibili, $isAmministratore, $isUtente);
    }

    public function scegliInvitati(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $view = new VGruppo();
        $isAmministratore = $session->readValue('isAmministratore');
        $isUtente = $session->readValue('isUtente');
        $results = array();
        if (isset($_POST['ora'])){
            $oraScelta = $_POST['ora'];
            $session->setValue('oraScelta', $oraScelta);
        }
        $utenti = $pm->loadList(FUtente);
        foreach($utenti as $utente){
            //Array contentente i dati per la view
            $u = array();
            //Username dell'utente
            $username= $utente->getUsername();
            //Recensioni dell'utente
            $recensioniUtente = $pm->loadRecensioniUtente($username);
            //Assegno all'array i dati
            $u['username']=$username;
            $u['eta']=$utente->getEta();
            $u['valutazione'] = round($utente->calcolaMediaRecensioni($recensioniUtente));
            //Metto nell'array results per la view l'array appena creato.
            $results[] = $u;
        }
        $view->showGruppoListaInvitati($results, $isAmministratore, $isUtente);
    }

    public function immissioneDatiGruppo(){
        $session = new USession();
        $session->startSession();
        $pm = new FPersistentManager();
        $view = new VGruppo();
        $isAmministratore = $session->readValue('isAmministratore');
        $isUtente = $session->readValue('isUtente');
        if ($_POST){
            $invitati = array();
            foreach($_POST as $username){
                $invitati[] = $username;
            }
            $session->setValue('invitati', $invitati);
        }
        $campi = $pm->loadList(FCampo);
        $nomiCampi=array();
        foreach($campi as $campo){
            $nomiCampi[] = $campo->getNome();
        }
        $view->showCreaGruppoDettagliFinali($nomiCampi, $isAmministratore, $isUtente);






    }














    /**
     * Funzione che serve a ricavare le ore disponiibli della data scelta
     * @param $dataScelta
     * @return string[]
     */
    private static function freeHoursFromDate($dataScelta){
        $oreDisponibili= self::$orePossibili;
        $pm = new FPersistentManager();
        //Queste sono tutte le date e ore occupate recuperate dal db
        $dataEOreOccupate = $pm->loadField('dataEOra', 'FGruppo');
        //Filtro l'array di prima prendendo esclusivamente le date e ore della data scelta dall'utente
        foreach ($dataEOreOccupate as $dataOccupata){
            //Giorno della data occupata
            $d = date('Y-m-d', strtotime($dataOccupata['dataEOra']));
            //Se la data corrisponde
            if ($d == $dataScelta)
                //Ora occupata della data
                $o = date('H:i:s', strtotime($dataOccupata['dataEOra']));
                //Cerca l'indice dell'orario da togliere
                $indexOre = array_search($o, $oreDisponibili);
                 //Togli quell'orario dagli orari disponibili
                unset($oreDisponibili[$indexOre]);
        }
        return $oreDisponibili;
    }
}
