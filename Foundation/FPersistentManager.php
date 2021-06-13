<?php

require_once(get_include_path() ."/Utility/autoload.php");

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
        $Fclass::delete($id);
    }

    public function load($id, $Fclasse){
        return $Fclasse::load($id);
    }

    public function loadList($Fclasse){
        return $Fclasse::loadList();
    }

    public function updateUtenteRegistrato(string $username, bool $bannato, string $motivazione){
        return FUtenteRegistrato::updateBannato($username,$bannato,$motivazione);
    }

    public function updateWallet(){
        //?????????
    }

    public function existUsername($username): bool{
        return FUtente::esisteUsername($username);
    }

    public function existMail($mail): bool{
        return FUtente::esisteMail($mail);
    }

    public function exist($username){
        return FAmministratore::exist($username);
    }

    public function Login($username, $password): int
    {
        return FUtente::Login($username,$password);
    }

    public function loadGruppi(?string $nomeGruppo, ?string $admin, ?string $data,
                                        ?string $tipologiaCampo, ?int $etaMinima, ?int $etaMassima, ?float $valutazioneMinima){
        return FGruppo::loadGruppi($nomeGruppo, $admin, $data, $tipologiaCampo, $etaMinima, $etaMassima, $valutazioneMinima);
    }

    public function loadRecensioniEffettuate(string $username){
        return FRecensione::loadRecensioniEffettuate($username);
    }

    public function loadRecensioniUtente(string $username){
        return FRecensione::loadRecensioniUtente($username);
    }

    public function loadField(string $field, $Fclass){
        return $Fclass::loadField($field);
    }

    public function loadCarteUtente(string $username){
        return FCartaDiCredito::loadCarteUtente($username);
    }

}