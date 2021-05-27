<?php

require_once("../Utility/autoload.php");
require_once 'config.inc.php';

class FGruppo
{
    private static $tableName="gruppo";
    private static $values="(:admin,:nomeCampo,:nome,:etaMinima,:etaMassima,:votoMinimo, :descrizione, :partecipanti, :dataEOra)";

    public function __construct(){}

    public static function bind($stmt, EGruppo $gruppo){
        $stmt->bindValue(':admin', $gruppo->getAdmin()->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':nomeCampo', $gruppo->getCampo()->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':nome', $gruppo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':etaMinima', $gruppo->getEtaMinima(), PDO::PARAM_INT);
        $stmt->bindValue(':etaMassima', $gruppo->getEtaMassima(), PDO::PARAM_INT);
        $stmt->bindValue(':votoMinimo', $gruppo->getVotoMinimo(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $gruppo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':partecipanti', $gruppo->getPartecipanti()->serialize(), PDO::PARAM_STR);
        $stmt->bindValue(':dataEOra', $gruppo->getDataEOra()->format("Y-m-d"), PDO::PARAM_STR);
    }

    public static function store(EGruppo $gruppo){
        try {
            $db = FDatabase::getInstance();
            $sql = "INSERT INTO " . static::$tableName .
                "(admin, campo, nome, etaMinima, etaMassima, votoMinimo, descrizione, partecipanti, dataEOra) VALUES" .
                static::$values;
            $id = $db->store($sql, "FGruppo", $gruppo);
            if ($id) return $id;
            else return null;
        }
        catch (Exception $e){
            echo "Error";
        }
    }

    public static function delete(int $idGruppo){
        try{
            $sql = "DELETE FROM " . static::$tableName . " WHERE id=" . $idGruppo;
            $db=FDatabase::getInstance();
            if($db->delete($sql)) return true;
            else return false;
        }
        catch(Exception $e){
            echo ("Error");
        }
    }

    public static function loadById(int $idGruppo){
        try{
            $sql = "SELECT * FROM " . static::$tableName . " WHERE id=" . $idGruppo;
            $db=FDatabase::getInstance();
            return $db->load($sql);
        }
        catch(Exception $e){
            echo ("Error");
        }
    }




}


/*	  public function __construct(String $username,String $nome,
								  String $cognome,String $email,
								  String $password,DateTime $dataDiNascita,
								  array $recensioni){*/
$r1=new ERecensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new ERecensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$d = new DateTime("1999-07-16");

$arr=array($r1,$r2,$r3);
$u=new EUtente("lollo1","lorenzo","Diella","ccc","pass", $d, $arr);
$c = new ECampo("calcio a 5", 3, 10, "descrizione campo", 11.5);
$g1 = new EGruppo("Ciao",1,10,11,"forse",new DateTime('now'),$arr,$u,$c);

$row = FGruppo::loadById(3);
print_r($row);

?>