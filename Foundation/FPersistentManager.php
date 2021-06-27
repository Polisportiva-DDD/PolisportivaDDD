<?php

//require_once(get_include_path() ."/Utility/autoload.php");

class FPersistentManager
{

    private static $instance = null;


    private function __construct()
    {

    }

    /**
     * Funzione per ottenere l'istanza del Persistent manager
     * @return FPersistentManager|null
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new FPersistentManager();
        }
        return self::$instance;
    }


    /**
     * Memorizza l'oggetto su DB, riconoscendone la classe di appartenenza
     * @param $obj
     * @return mixed
     */
    public function store($obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $id = $Fclass::store($obj);
        return $id;
    }

    /**
     * Store specifica per ECartaDiCredito
     * @param $obj
     * @param $username
     * @return mixed
     */
    public function store2($obj, $username) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $id = $Fclass::store($obj,$username);
        return $id;
    }

    /**
     * Cancella l'oggetto su DB, riconoscendone la classe di appartenenza
     * @param $id
     * @param $Fclass
     * @return mixed
     */
    public function delete($id, $Fclass) {
        return $Fclass::delete($id);
    }


    public function deleteCarta($numeroCarta, $username) {
        return FCartaDiCredito::delete($numeroCarta,$username);
    }

    /**
     * Carica l'oggetto dal DB, riconoscendone la classe di appartenenza
     * @param $id
     * @param $Fclasse
     * @return mixed
     */
    public function load($id, $Fclasse){
        return $Fclasse::load($id);
    }

    /**
     * Carica la lista di oggetti appartenenti alla classe specificata dal DB
     * @param $Fclasse
     * @return mixed
     */
    public function loadList($Fclasse){
        return $Fclasse::loadList();
    }

    /**
     * Chiama FGruppo::loadGruppiScaduti
     * @return array
     */
    public function loadGruppiScaduti(){
        return FGruppo::loadGruppiScaduti();
    }

    /**
     * Chiama FUtenteRegistrato::updateBannato
     * @param string $username
     * @param bool $bannato
     * @param string $motivazione
     * @return bool
     */
    public function updateUtenteRegistrato(string $username, bool $bannato, string $motivazione): bool
    {
        return FUtenteRegistrato::updateBannato($username,$bannato,$motivazione);
    }

    /**
     * Aggiorna l'oggetto sul DB, riconoscendone la classe di appartenenza
     * @param $obj
     * @return bool
     */
    public function update($obj): bool{
        $EClass = get_class($obj);
        $FClass = str_replace("E", "F", $EClass);
        $result = $FClass::update($obj);
        return $result;
    }

    /**
     * Chiama FCampo::update
     * @param float $prezzo
     * @param int $idCampo
     * @return bool
     */
    public function updateCampo(float $prezzo, int $idCampo): bool{
        $result = FCampo::update($prezzo, $idCampo);
        return $result;
    }

    /**
     * Chiama FCartaDiCredito::loadCarteNonScadute
     * @param $username
     * @return array|null
     */
    public function loadCarteNonScadute($username): ?array
    {
        return FCartaDiCredito::loadCarteNonScadute($username);
    }


    /**
     * Chiama FUtente::esisteUsername
     * @param $username
     * @return bool
     */
    public function existUsername($username): bool{
        return FUtente::esisteUsername($username);
    }

    /**
     * Chiama FUtetne::esisteMail
     * @param $mail
     * @return bool
     */
    public function existMail($mail): bool{
        return FUtente::esisteMail($mail);
    }

    /**
     * Chiama FAmministratore::Exist
     * @param $username
     * @return bool
     */
    public function exist($username): bool
    {
        return FAmministratore::exist($username);
    }

    public function existCarta($numeroCarta,$username): bool
    {
        return FCartaDiCredito::existCarta($numeroCarta,$username);
    }


    /**
     * Chiama FUtenteRegistrato::isBannato
     * @param $username
     * @return bool|null
     */
    public function isBannato($username): ?bool
    {
        return FUtenteRegistrato::isBannato($username);
    }

    /**
     * Chiama FUtente:login
     * @param $username
     * @param $password
     * @return int
     */
    public function Login($username, $password): int
    {
        return FUtente::Login($username,$password);
    }

    /**
     * Chiama FGruppo::loadGruppi
     * @param string|null $nomeGruppo
     * @param string|null $admin
     * @param string|null $data
     * @param string|null $tipologiaCampo
     * @param int|null $etaMinima
     * @param int|null $etaMassima
     * @param float|null $valutazioneMinima
     * @return array
     */
    public function loadGruppi(?string $nomeGruppo, ?string $admin, ?string $data,
                               ?string $tipologiaCampo, ?int $etaMinima, ?int $etaMassima, ?float $valutazioneMinima): array
    {
        return FGruppo::loadGruppi($nomeGruppo, $admin, $data, $tipologiaCampo, $etaMinima, $etaMassima, $valutazioneMinima);
    }

    /**
     * Chiama FRecensione::loadRecensioniEffettuate
     * @param string $username
     * @return array|null
     */
    public function loadRecensioniEffettuate(string $username): ?array
    {
        return FRecensione::loadRecensioniEffettuate($username);
    }

    /**
     * Chiama FRecensione::loadRecensioniUtente
     * @param string $username
     * @return array|null
     */
    public function loadRecensioniUtente(string $username): ?array
    {
        return FRecensione::loadRecensioniUtente($username);
    }

    /**
     * Chiama la loadField della classe specificata
     * @param string $field
     * @param $Fclass
     * @return mixed
     */
    public function loadField(string $field, $Fclass){
        return $Fclass::loadField($field);
    }

    /**
     * Chiama FCartaDiCredito::loadCarteUtente
     * @param string $username
     * @return array|null
     */
    public function loadCarteUtente(string $username): ?array
    {
        return FCartaDiCredito::loadCarteUtente($username);
    }

    /**
     * Chiama FGruppo::loadGruppiUtente
     * @param string $username
     * @return array|null
     */
    public function loadGruppiUtente(string $username): ?array
    {
        return FGruppo::loadGruppiUtente($username);
    }

    /**
     * Chiama FGruppo::addPartecipante
     * @param $username
     * @param $idGruppo
     * @return bool
     */
    public function addPartecipanteGruppo($username, $idGruppo): bool
    {
        return FGruppo::addPartecipante($username, $idGruppo);
    }

    /**
     * Chiama FUtente::loadUtentiFiltered
     * @param string $searchedUsername
     * @return array
     */
    public function loadUtentiFiltered(string $searchedUsername): array
    {
        return FUtente::loadUtentiFiltered($searchedUsername);
    }
}