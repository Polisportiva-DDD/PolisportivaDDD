<?php

require_once("../Utility/autoload.php");
require_once '../Foundation/config.inc.php';

class FGruppo
{
    private static $tableName="gruppo";
    private static $tablePartecipanti = "partecipazionegruppo";
    private static $values="(:id,:admin,:idCampo,:nome,:etaMinima,:etaMassima,:votoMinimo,:descrizione, :dataEOra)";
    private static $classeEntity = "EUtente";

    public function __construct(){}

    public static function bind($stmt, EGruppo $gruppo){
        $stmt->bindValue(':id', null,  PDO::PARAM_INT);
        $stmt->bindValue(':admin', $gruppo->getAdmin()->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':idCampo', $gruppo->getCampo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $gruppo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':etaMinima', $gruppo->getEtaMinima(), PDO::PARAM_INT);
        $stmt->bindValue(':etaMassima', $gruppo->getEtaMassima(), PDO::PARAM_INT);
        $stmt->bindValue(':votoMinimo', $gruppo->getVotoMinimo(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $gruppo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':dataEOra', $gruppo->getDataEOra()->format("Y-m-d"), PDO::PARAM_STR);
    }


    public static function store(EGruppo $gruppo){
        try {
            $db = FDatabase::getInstance();
            $sql="INSERT INTO ". static::$tableName ." VALUES ".static::$values;
            $id = $db->store($sql, $gruppo);
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

    /*
     * public function __construct(?int $id, string $nome, int $etaMinima,
                                int $etaMassima, float $votoMinimo, string $descrizione,
                                DateTime $dataEOra, array $partecipanti,
                                Utente $admin, Campo $campo)
     */
    public static function loadGruppoById(int $idGruppo){
        try{
            $sql = "SELECT * FROM " . static::$tableName . " WHERE id=" . $idGruppo; //Query per ottenere un gruppo dall'id
            $db=FDatabase::getInstance(); //Ottieni il DB
            $row = $db->loadSingle($sql, static::$classeEntity); //Ottieni la riga corrispondente dal DB
            if ($row){ //Se row non è vuoto
                $admin = FUtente::loadByUsername($row['admin']); //Load dell'utente con id dell'admin
                $campo = FCampo::loadCampo($row['idcampo']); //Load del campo con id corrispondente
                $partecipanti = self::loadPartecipanti($row['id']); //Carica i partecipanti del gruppo che stiamo caricando
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['dataEOra']); //Ricrea la data dalla stringa recuperata dal DB
                $gruppo = new EGruppo($row['id'], $row['nome'], $row['etaMinima'],$row['etaMassima'],
                                        $row['votoMinimo'], $row['descrizione'], $date,
                                        $partecipanti, $admin, $campo);
                return $gruppo;
            }
            else{
                return null;
            }

        }
        catch(Exception $e){
            echo ("Error");
        }
    }


    public static function loadPartecipanti(int $idGruppo){
        try {
            $partecipanti = array();
            $sql = "SELECT utente FROM " . static::$tablePartecipanti . " WHERE idGruppo=" . $idGruppo; //Query per prendere gli username degli utenti che partecipano a questo gruppo
            $db = FDatabase::getInstance();
            $rows = $db->loadMultiple($sql);
            foreach ($rows as $row) { //Per ogni row
                $utente = FUtente::loadUtenteByUsername($row['utente']); //Carica l'utente corrispondente all'username ottenuto
                array_push($partecipanti, $utente); //Mettilo nell'array
            }
            return $partecipanti;
        }
        catch (Exception $e){
            echo("ERROR"); //Da gestire
        }

    }


    public static function loadGruppi(?string $nomeGruppo, ?string $admin, ?DateTime $data, ?string $tipoCampo,
                                      ?int $etaMin, ?int $etaMax, ?float $valMin){
        try{
            $sql = "SELECT * FROM " . static::$tableName; //Prendi tutti i gruppi
            $conditions = array(); //Array delle condizioni

            if (isset($nomeGruppo)){ //Se nomegruppo != null
                $conditions[] = "nome=".$nomeGruppo; //Aggiungi nome=nomeGruppo per poi aggiungerlo alla query
            }

            if (isset($admin)){
                $conditions[] = "admin=".$admin;
            }

            if (isset($data)){
                $conditions[] = "dataEOra > ".data;
            }

            if (isset($tipoCampo)){
                $campi = FCampo::loadCampi();
                foreach($campi as $campo){
                    $nomec = $campo->getNome();
                    if ($tipoCampo = $nomec)
                    {
                        $conditions[] = "campo=" . $campo->getId();
                    }
                }
            }

            if (isset($etaMin)){
                $conditions[] = "etaMinima > ".$etaMin;
            }

            if (isset($etaMax)){
                $conditions[] = "etaMassima < ".$etaMax;
            }

            if (isset($valMin)){
                $conditions[] = "votoMinimo > ".$valMin;
            }

            if (count($conditions) > 0) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }

            $db = FDatabase::getInstance();
            $rows = $db->loadMultiple($sql);
            $gruppi = array();
            foreach($rows as $row){
                $admin = FUtente::loadByUsername($row['admin']); //Load dell'utente con id dell'admin
                $campo = FCampo::loadCampo($row['idcampo']); //Load del campo con id corrispondente
                $partecipanti = self::loadPartecipanti($row['id']); //Carica i partecipanti del gruppo che stiamo caricando
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['dataEOra']);
                $gruppo = new EGruppo($row['id'], $row['nome'], $row['etaMinima'],$row['etaMassima'],
                    $row['votoMinimo'], $row['descrizione'], $date,
                    $partecipanti, $admin, $campo);
                array_push($gruppi, $gruppo);
            }
            return $gruppi;




        }
        catch (Exception $e)
        {
            echo("ERROR"); //Da gestire
        }
    }

    public static function addPartecipante(String $username, int $idGruppo ){
        try {
            $db = FDatabase::getInstance();
            $db->beginTransaction();
            $sql = "INSEERT INTO " . static::$tablePartecipanti . "VALUES (:idGruppo, :utente)";
            $stmt=$db->prepare($sql);
            $stmt->bindValue(':idGruppo', $idGruppo , PDO::PARAM_INT);
            $stmt->bindValue(':utente', $username, PDO::PARAM_STR);
            $stmt->execute();
            $db->commit();
            $db->closeConnection();

        }
        catch (Exception $exception){
            echo ("ERRORE"); //Da gestire
        }
    }



}

/*
$r1=new ERecensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new ERecensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$d = new DateTime("1999-07-16");

$arr=array($r1,$r2,$r3);
$u=new EUtente("lollo1","lorenzo","Diella","ccc","pass", $d, $arr);
//$c = new ECampo("calcio a 5", 3, 10, "descrizione campo", 11.5);
//$g1 = new EGruppo("Ciao",1,10,11,"forse",new DateTime('now'),$arr,$u,$c);

$row = FGruppo::loadById(3);
print_r($row);
*/
?>