<?php

//require_once(get_include_path() ."/Utility/autoload.php");

class FPersistentManager
{

    public function store($obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $id = $Fclass::store($obj);
        return $id;
    }
    //per EcartaDiCredito
    public function store2($obj,$username) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $id = $Fclass::store($obj,$username);
        return $id;
    }

    public function delete($id, $Fclass) {
        return $Fclass::delete($id);
    }

    public function load($id, $Fclasse){
        return $Fclasse::load($id);
    }

    public function loadList($Fclasse){
        return $Fclasse::loadList();
    }

    public function loadGruppiScaduti(){
        return FGruppo::loadGruppiScaduti();
    }

    public function updateUtenteRegistrato(string $username, bool $bannato, string $motivazione): bool
    {
        return FUtenteRegistrato::updateBannato($username,$bannato,$motivazione);
    }

    public function update($obj): bool{
        $EClass = get_class($obj);
        $FClass = str_replace("E", "F", $EClass);
        $result = $FClass::update($obj);
        return $result;
    }

    public function updateCampo(float $prezzo, int $idCampo): bool{
        $result = FCampo::update($prezzo, $idCampo);
        return $result;
    }

    public function loadCarteNonScadute($username): ?array
    {
        return FCartaDiCredito::loadCarteNonScadute($username);
    }


    public function existUsername($username): bool{
        return FUtente::esisteUsername($username);
    }

    public function existMail($mail): bool{
        return FUtente::esisteMail($mail);
    }

    public function exist($username): bool
    {
        return FAmministratore::exist($username);
    }

    public function isBannato($username): ?bool
    {
        return FUtenteRegistrato::isBannato($username);
    }

    public function Login($username, $password): int
    {
        return FUtente::Login($username,$password);
    }

    public function loadGruppi(?string $nomeGruppo, ?string $admin, ?string $data,
                                        ?string $tipologiaCampo, ?int $etaMinima, ?int $etaMassima, ?float $valutazioneMinima): array
    {
        return FGruppo::loadGruppi($nomeGruppo, $admin, $data, $tipologiaCampo, $etaMinima, $etaMassima, $valutazioneMinima);
    }

    public function loadRecensioniEffettuate(string $username): ?array
    {
        return FRecensione::loadRecensioniEffettuate($username);
    }

    public function loadRecensioniUtente(string $username): ?array
    {
        return FRecensione::loadRecensioniUtente($username);
    }

    public function loadField(string $field, $Fclass){
        return $Fclass::loadField($field);
    }

    public function loadCarteUtente(string $username): ?array
    {
        return FCartaDiCredito::loadCarteUtente($username);
    }

    public function loadGruppiUtente(string $username): ?array
    {
        return FGruppo::loadGruppiUtente($username);
    }

    public function addPartecipanteGruppo($username, $idGruppo): bool
    {
        return FGruppo::addPartecipante($username, $idGruppo);
    }

    public function loadUtentiFiltered(string $searchedUsername): array
    {
        return FUtente::loadUtentiFiltered($searchedUsername);
    }
}