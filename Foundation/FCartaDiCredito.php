<?php

require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';

class FCartaDiCredito
{
    //tabella con la quale opera
    private static $tableName="cartadicredito";

    //valori della tabella
    private static $values="(:numero,:nomeTitolare,:cognomeTitolare,:cvc,:scadenza)";

    //costruttore
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi della Carta di Credito da inserire con i parametri della INSERT
     * @param PDOStatement $stmt
     * @param ECartadiCredito $cartadiCredito Carta di credito in cui i dati devono essere inseriti nel DB
     */
    public static function bind($stmt, ECartadiCredito $cartadiCredito){
        $stmt->bindValue(':numero', $cartadiCredito->getNumero(), PDO::PARAM_STR);
        $stmt->bindValue(':nomeTitolare', $cartadiCredito->getNomeTitolare(), PDO::PARAM_STR);
        $stmt->bindValue(':cognomeTitolare', $cartadiCredito->getCognomeTitolare(), PDO::PARAM_STR);
        $stmt->bindValue(':cvc', $cartadiCredito->getCVC(), PDO::PARAM_STR);
        $stmt->bindValue(':scadenza', $cartadiCredito->getScadenza()->format('Y-m-d'), PDO::PARAM_STR);
    }

    /**
     * Metodo che permette di salvare una Recensione
     * @param $rec Recensione da salvare
     * @return $id della Recensione salvata
     */
    public static function store(ECartadiCredito $carta) {
        try{

            $sql = "INSERT INTO ". static::$tableName . " VALUES " . static::$values;
            $db = FDatabase::getInstance();
            $id = $db->store($sql, $carta);
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
     * Permette la delete sul db in base alla carta di credito
     * @param ECartadiCredito $carta
     * @return bool
     */
    public static function delete(ECartadiCredito $carta){
        try{
            $numeroCarta = $carta->getNumero();
            $sql = "DELETE FROM " . static::$tableName . " WHERE numero=" . $numeroCarta;
            $db=FDatabase::getInstance();
            if($db->delete($sql)) return true;
            else return false;
        }
        catch(Exception $e){
            echo ("Error");
        }
    }

    /**
     * @param string $numero
     * @return ECartadiCredito|null
     * @throws Exception
     */
    public static function loadCarta(string $numero){
        $sql="SELECT * FROM ".static::$tableName." WHERE numero='" . $numero . "';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $carta=new ECartadiCredito($result['numero'],$result['nomeTitolare'],$result['cognomeTitolare'],$result['cvc'],new DateTime($result['scadenza']));

            return $carta;
        }
        else return null;
    }

    public static function loadCarteUtente(string $username){
        try{
            $sql="SELECT * FROM " . static::$tableName . " WHERE username='" . $username . "';";
            $db=FDatabase::getInstance();
            $result=$db->loadMultiple($sql);
            if($result!=null){
                $carteUtente = array();
                for($i=0; $i<count($result); $i++){
                    $carteUtente[] = new ECartadiCredito($result[$i]['numero'],$result[$i]['nomeTitolare'],$result[$i]['cognomeTitolare'],$result[$i]['cvc'],new DateTime($result[$i]['scadenza']));
                }
                return $carteUtente;
            }
            else return null;
        }
        catch(Exception $e){
            echo ("Error");
        }

    }


}