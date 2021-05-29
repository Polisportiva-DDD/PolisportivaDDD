<?php

require_once("../Utility/autoload.php");
require_once 'config.inc.php';

class FRecensione
{
    /** tabella con la quale opera */
    private static $tableName = "recensione";

    /** valori della tabella */
    private static $values="(:id,:autore,:voto,:titolo,:testo,:data,:possessore)";

    /** costruttore */
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
     * @return $id della Recensione salvata
     */

    public static function store(ERecensione $recensione) {
        try {
            $db = FDatabase::getInstance();
            $sql = "INSERT INTO ". static::$tableName . " VALUES " . static::$values;
            $id = $db->store($sql,'FRecensione', $recensione);
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
     * @param string $username
     * @return array|null
     */
    public static function loadRecensioniUtente(string $username){
        try{
            $sql="SELECT * FROM " . static::$tableName . " WHERE possessore=" . $username;
            $db=FDatabase::getInstance();
            $result=$db->loadMultiple($sql);
            if($result!=null){
                $recensioniUtente = array();
                for($i=0; $i<count($result); $i++){
                    $recensioniUtente[] = new ERecensione($result[$i]['id'],$result[$i]['autore'],$result[$i]['voto'],$result[$i]['titolo'],$result[$i]['testo'],new DateTime($result[$i]['data']),$result[$i]['possessore']);
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
     * @param ERecensione $recensione
     * @return array|null
     */
    public static function loadRecensioniEffettuate(string $username){
        try{
            $sql="SELECT * FROM " . static::$tableName . " WHERE autore=" . $username;
            $db=FDatabase::getInstance();
            $result=$db->loadMultiple($sql);
            if($result!=null){
                $recensioniEffettuate = array();
                for($i=0; $i<count($result); $i++){
                    $recensioniEffettuate[] = new ERecensione($result[$i]['id'],$result[$i]['autore'],$result[$i]['voto'],$result[$i]['titolo'],$result[$i]['testo'],new DateTime($result[$i]['data']),$result[$i]['possessore']);
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
$w1=new EWallet(array(),1);
$w2=new EWallet(array(),2);
$w3=new EWallet(array(),3);


$datadinascita = new DateTime('1999-11-22');
$datadinascita2 = new DateTime("1999-07-16");
$datadinascita3 = new DateTime("1999-06-20");

$utente1 = new EUtente('Urwen99','Giorgio','Di Nunzio','dinunziogiorgio.99@gmail.com','pippo',$datadinascita,'imm',$w1);
$utente2 = new EUtente('Lorediel','Lorenzo',"D'Amico",'nonsapreiproprio@gmial.com','pippo',$datadinascita2,'imm2',$w2);
$utente3 = new EUtente('Andreinho','Andrea','Franco','bo@gmail.com','pippo',$datadinascita3,'imm3',$w3);

$r1 = new ERecensione(1,$utente1,2.5,'Bravissimo','tante belle cose',new DateTime('now'),$utente2);
$r2 = new ERecensione(2,$utente2,4.8,'bo','forse si dai',new DateTime('now'),$utente3);
$r3 = new ERecensione(3,$utente3,2.5,'certo','tante',new DateTime('now'),$utente1);
$r4 = new ERecensione(4,$utente2,4.8,'bo o no','forse si ',new DateTime('now'),$utente1);


print_r(FRecensione::loadRecensioniEffettuate('Urwen99'));

