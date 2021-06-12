<?php

//require_once("../Utility/autoload.php");
//require_once '../Foundation/config.inc.php';

class FRecensione
{
    /**
     * tabella con la quale opera
     * @var string
     */
    private static $tableName = "recensione";

    /**
     * valori della tabella
     * @var string
     */
    private static $values="(:id,:autore,:voto,:titolo,:testo,:data,:possessore)";


    /**
     * FRecensione constructor.
     */
    public function __construct() {}

    /**
     * Questo metodo lega gli attributi della Recensione da inserire con i parametri della INSERT
     * @param $stmt
     * @param ERecensione $recensione Recensione in cui i dati devono essere inseriti nel DB
     */
    public static function bind($stmt, ERecensione $recensione){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':autore', $recensione->getAutore()->getUsername(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':voto', $recensione->getVoto(), PDO::PARAM_INT);
        $stmt->bindValue(':titolo', $recensione->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':testo', $recensione->getTesto(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $recensione->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':possessore', $recensione->getPossessore()->getUsername(), PDO::PARAM_STR);

    }

    /**
     * Metodo che permette di salvare una Recensione
     * @param ERecensione $recensione Recensione da salvare
     * @return string|null della Recensione salvata
     */
    public static function store(ERecensione $recensione) {
        try {
            $sql = "INSERT INTO ". static::$tableName . " VALUES " . static::$values;
            $db=FDatabase::getInstance();
            $id=$db->store($sql,$recensione);
            if($id)
                return $id;
            else
                return null;
        }
        catch (Exception $e){
            echo "Error";
        }

    }

    /**
     * Permette la delete sul db in base all'id
     * @param int $idRecensione l'id dell'oggetto da eliminare dal db
     * @return bool
     */
    public static function delete(int $idRecensione){
        try{
            $sql = "DELETE FROM " . static::$tableName . " WHERE id=" . $idRecensione;
            $db=FDatabase::getInstance();
            if($db->delete($sql)) return true;
            else return false;
        }
        catch(Exception $e){
            echo ("Error");
        }
    }

    /**
     * Carica tutte le recensioni che sono state fatte all'utente
     * @param string $username
     * @return array|null
     */
    public static function loadRecensioniUtente(string $username){
        try{
            $sql="SELECT * FROM " . static::$tableName . " WHERE possessore='" . $username . "';";
            $db=FDatabase::getInstance();
            $result=$db->loadMultiple($sql);
            if($result!=null){
                $recensioniUtente = array();
                for($i=0; $i<count($result); $i++){
                    $possessore = FUtente::loadByUsername($result[$i]['possessore']);
                    $autore = FUtente::loadByUsername($result[$i]['autore']);
                    $recensioniUtente[] = new ERecensione($result[$i]['id'],$autore,$result[$i]['voto'],$result[$i]['titolo'],$result[$i]['testo'],new DateTime($result[$i]['data']),$possessore);
                }
                return $recensioniUtente;
            }
            else return null;
        }
        catch(Exception $e){
            echo ("Error");
        }

    }

    /**
     * Carica tutte le recensioni che ha fatto l'utente
     * @param string $username
     * @return array|null
     */
    public static function loadRecensioniEffettuate(string $username){
        try{
            $sql="SELECT * FROM " . static::$tableName . " WHERE autore='" . $username . "';";
            $db=FDatabase::getInstance();
            $result=$db->loadMultiple($sql);
            if($result!=null){
                $recensioniEffettuate = array();
                for($i=0; $i<count($result); $i++){
                    $possessore = FUtente::loadByUsername($result[$i]['possessore']);
                    $autore = FUtente::loadByUsername($result[$i]['autore']);
                    $recensioniEffettuate[] = new ERecensione($result[$i]['id'],$autore,$result[$i]['voto'],$result[$i]['titolo'],$result[$i]['testo'],new DateTime($result[$i]['data']),$possessore);
                }
                return $recensioniEffettuate;
            }
            else return null;
        }
        catch(Exception $e){
            echo ("Error");
        }

    }

}

