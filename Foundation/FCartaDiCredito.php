<?php


class FCartaDiCredito
{

    /**
     * tabella con la quale opera
     * @var string
     */
    private static $tableName="cartadicredito";

    /**
     * tabella relazionale tra utente e carte
     * @var string
     */
    private static $tablePossessoCarta = "possessocarta";


    /**
     * valori della tabella
     * @var string
     */
    private static $values="(:numero,:nomeTitolare,:cognomeTitolare,:cvc,:scadenza)";


    /**
     * FCartaDiCredito constructor.
     */
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
     * Metodo che permette di salvare una Recensione sul db
     * @param ECartadiCredito $carta
     * @return string|null
     */
    public static function bindAssociazione($stmt,$valuesAssociazione){
        $stmt->bindValue(':carta', $valuesAssociazione[0] , PDO::PARAM_STR);
        $stmt->bindValue(':utente', $valuesAssociazione[1], PDO::PARAM_STR);
    }




    public static function store(ECartadiCredito $carta,$username) {
        try{

            $sql = "INSERT INTO ". static::$tableName . " VALUES " . static::$values;
            $db = FDatabase::getInstance();
            if(static::exist($carta->getNumero())==0){
                $id=$db->store($sql, $carta);
                if($id!=null){
                    $db=FDatabase::getInstance();
                    $sql = "INSERT INTO ". static::$tablePossessoCarta . " VALUES (:carta, :utente) " ;
                    $valuesAsscoiazione=array($carta->getNumero(),$username);
                    $id2 = $db->store3($sql,__CLASS__,$valuesAsscoiazione );
                    if($id2==null){
                        return false;
                    }
                    else return true;
                }
                else{
                    return false;
                }
            }
            else{
                $db=FDatabase::getInstance();
                $sql = "INSERT INTO ". static::$tablePossessoCarta . " VALUES (:carta, :utente) " ;
                $valuesAsscoiazione=array($carta->getNumero(),$username);
                $id2 = $db->store3($sql,__CLASS__,$valuesAsscoiazione );
                if($id2==null){
                    return false;
                }
                else return true;
            }




        }
        catch (Exception $e){
            echo "Error";
        }

    }

    public static function exist($numero){

        $sql="SELECT * FROM ".static::$tablePossessoCarta." WHERE numero='".$numero."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return 1;
        else return 0;

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
     * Carica una carta dal db in base al numero passatogli per parametro
     * @param string $numero
     * @return ECartadiCredito|null
     * @throws Exception
     */
    public static function load(string $numero){
        $sql="SELECT * FROM ".static::$tableName." WHERE numero='" . $numero . "';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $carta=new ECartadiCredito($result['numero'],$result['nomeTitolare'],$result['cognomeTitolare'],$result['cvc'],new DateTime($result['scadenza']));

            return $carta;
        }
        else return null;
    }

    /**
     * Carica tutte le carte dell'utente in base all'username passatogli per parametro
     * @param string $username
     * @return array|null
     */
    public static function loadCarteUtente(string $username){
        try{
            $sql="SELECT carta FROM " . static::$tablePossessoCarta . " WHERE utente='" . $username . "';"; //Query per prendere le carte degli utenti
            $db=FDatabase::getInstance();
            $rows=$db->loadMultiple($sql);
            if($rows!=null){
                $carteUtente = array();
                foreach ($rows as $row) { //Per ogni row
                    $carta = FCartaDiCredito::load($row['carta']); //Carica la carta corrispondente al numero ottenuto
                    array_push($carteUtente, $carta); //Mettilo nell'array
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