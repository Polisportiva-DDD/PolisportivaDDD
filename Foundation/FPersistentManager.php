<?php

require_once("../Utility/autoload.php");

class FPersistentManager
{

    public static function store($obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $id = $Fclass::store($obj);
        return $id;
    }

    public static function delete($id, $Fclass) {
        $Fclass::delete($id);
    }

    public static function load($id, $Fclasse){
        return $Fclasse::load($id);
    }

    public static function loadList($Fclasse){
        return $Fclasse::loadList();
    }

    public static function updateUtenteRegistrato(string $username, bool $bannato, string $motivazione){
        return FUtenteRegistrato::updateBannato($username,$bannato,$motivazione);
    }

    public static function updateWallet(){
        //?????????
    }

    public static function existUsername($username): bool{
        return FUtente::esisteUsername($username);
    }

    public static function existMail($mail): bool{
        return FUtente::esisteMail($mail);
    }

    public static function exist($username){
        //??????????
    }

    public static function existLogin($username, $password): bool{
        return FUtente::Login($username,$password);
    }

    public static function loadGruppi(?string $nomeGruppo, ?string $admin, ?DateTime $data,
                                        ?string $tipologiaCampo, ?int $etaMinima, ?int $etaMassima, ?float $valutazioneMinima){
        return FGruppo::loadGruppi($nomeGruppo, $admin, $data, $tipologiaCampo, $etaMinima, $etaMassima, $valutazioneMinima);
    }

    public static function loadRecensioniEffettuate(string $username){
        return FRecensione::loadRecensioniEffettuate($username);
    }

    public static function loadRecensioniUtente(string $username){
        return FRecensione::loadRecensioniUtente($username);
    }

}