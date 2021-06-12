<?php

class USession {

    /**
     * USession constructor.
     */
    public function __construct() {
    }

    /**
     * Funzione che assegna un valore all'array sessione
     * @param $chiave
     * @param $valore
     */
    function setValue($chiave, $valore) {
        $_SESSION[$chiave]=$valore;
    }

    /**
     * Funzione che elimina un valore all'array sessione
     * @param $chiave
     */
    function deleteValue($chiave) {
        unset($_SESSION[$chiave]);
    }

    /**
     * Valore che legge un valore dall'array sessione, se questo c'è. Se non c'è restituisce false
     * @param $chiave
     * @return false|mixed
     */
    function readValue($chiave) {
        if (isset($_SESSION[$chiave]))
            return $_SESSION[$chiave];
        else
            return false;
    }

    /**
     *Funzione che esegue il session_start
     */
    function startSession(){
        session_start();
    }

    /**
     * Funzione che controlla se è arrivato il cookie PHPSESSID
     * @return bool
     */
    function isSessionSet(): bool{
        if (isset($_COOKIE['PHPSESSID'])){
            return true;
        }
        else return false;
    }

    /**
     * Funzione che controlla se lo stato della session è NONE, se lo è restituisce true, altrimenti false
     * @return bool
     */
    function isSessionNone(): bool{
        if(session_status() == PHP_SESSION_NONE){
            return true;
        }
        else return false;
    }


    /*
    function isAmministratore(): bool{
        if (isset($_SESSION['isAmministratore'])){
            if ($_SESSION['isAmministratore']){
                return true;
            }
        }
        else return false;
    }
    */
}
?>