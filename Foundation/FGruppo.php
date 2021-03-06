<?php

//require_once(get_include_path() ."/Utility/autoload.php");
//require_once (get_include_path() .'/Foundation/config.php');

class FGruppo
{
    /**
     * tabella con la quale opera
     * @var string
     */
    private static $tableName="gruppo";

    /**
     * tabella relazionale tra gruppo e utente
     * @var string
     */
    private static $tablePartecipanti = "partecipazionegruppo";

    /**
     * valori della tabella
     * @var string
     */
    private static $values="(:id,:admin,:idCampo,:nome,:etaMinima,:etaMassima,:votoMinimo,:descrizione, :dataEOra)";

    /**
     * FGruppo constructor.
     */
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'associazione partecipazioneGruppo da inserire con i parametri della INSERT
     * @param $stmt
     * @param $valuesAssociazione
     */
    public static function bindAssociazione($stmt, $valuesAssociazione){

        $stmt->bindValue(':idGruppo', $valuesAssociazione[0] , PDO::PARAM_INT);
        $stmt->bindValue(':utente', $valuesAssociazione[1] , PDO::PARAM_STR);

    }

    /**
     * Questo metodo lega gli attributi del gruppo da inserire con i parametri della INSERT
     * @param $stmt
     * @param EGruppo $gruppo
     */
    public static function bind($stmt, EGruppo $gruppo){
        $stmt->bindValue(':id', null,  PDO::PARAM_INT);
        $stmt->bindValue(':admin', $gruppo->getAdmin()->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':idCampo', $gruppo->getCampo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nome', $gruppo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':etaMinima', $gruppo->getEtaMinima(), PDO::PARAM_INT);
        $stmt->bindValue(':etaMassima', $gruppo->getEtaMassima(), PDO::PARAM_INT);
        $stmt->bindValue(':votoMinimo', $gruppo->getVotoMinimo(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $gruppo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':dataEOra', $gruppo->getDataEOra()->format("Y-m-d H:i:s"), PDO::PARAM_STR);
    }


    /**
     * Memorizza il gruppo passato per parametro su DB
     * @param EGruppo $gruppo
     * @return string|null
     */
    public static function store(EGruppo $gruppo): ?string
    {
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

    /**
     * Cancella il gruppo specificato dall'id dal DB
     * @param int $idGruppo
     * @return bool
     */
    public static function delete(int $idGruppo): bool
    {
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
    /**
     * Carica il gruppo specificato dall'id
     * @param int $idGruppo
     * @return EGruppo|null
     */
    public static function load(int $idGruppo): ?EGruppo
    {
        try{
            $sql = "SELECT * FROM " . static::$tableName . " WHERE id=" . $idGruppo; //Query per ottenere un gruppo dall'id
            $db=FDatabase::getInstance(); //Ottieni il DB
            $row = $db->loadSingle($sql); //Ottieni la riga corrispondente dal DB
            if ($row){ //Se row non ?? vuoto
                $admin = FUtente::load($row['admin']); //Load dell'utente con id dell'admin
                $campo = FCampo::load($row['idcampo']); //Load del campo con id corrispondente
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

    /**
     * Carica i gruppi scaduti dal DB
     * @return array
     */
    public static function loadGruppiScaduti()
    {
        $data=(new DateTime("now"))->format('Y-m-d H:i:s');
        try{
            $sql = "SELECT * FROM " . static::$tableName . " WHERE dataEOra<" ."' $data'"; //Query per ottenere un gruppo dall'id
            $db=FDatabase::getInstance(); //Ottieni il DB
            $rows = $db->loadMultiple($sql); //Ottieni la riga corrispondente dal DB
            $result=array();
            foreach ($rows as $row){

                    $admin = FUtente::load($row['admin']); //Load dell'utente con id dell'admin
                    $campo = FCampo::load($row['idcampo']); //Load del campo con id corrispondente
                    $partecipanti = self::loadPartecipanti($row['id']); //Carica i partecipanti del gruppo che stiamo caricando
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['dataEOra']); //Ricrea la data dalla stringa recuperata dal DB
                    $gruppo = new EGruppo($row['id'], $row['nome'], $row['etaMinima'],$row['etaMassima'],
                        $row['votoMinimo'], $row['descrizione'], $date,
                        $partecipanti, $admin, $campo);
                    $result[]= $gruppo;


            }
            return $result;


        }
        catch(Exception $e){
            echo ("Error");
        }
    }

    /**
     * Carica i partecipanti del gruppo specificato dall'id passato come parametro
     * @param int $idGruppo
     * @return array
     */
    public static function loadPartecipanti(int $idGruppo): array
    {
        try {
            $partecipanti = array();
            $sql = "SELECT utente FROM " . static::$tablePartecipanti . " WHERE idGruppo=" . $idGruppo; //Query per prendere gli username degli utenti che partecipano a questo gruppo
            $db = FDatabase::getInstance();
            $rows = $db->loadMultiple($sql);
            foreach ($rows as $row) { //Per ogni row
                $utente = FUtente::load($row['utente']); //Carica l'utente corrispondente all'username ottenuto
                array_push($partecipanti, $utente); //Mettilo nell'array
            }
            return $partecipanti;
        }
        catch (Exception $e){
            echo("ERROR"); //Da gestire
        }

    }


    /**
     * Carica i gruppi filtrati dai parametri, se un parametro ?? null allora non lo considera come filtro
     * @param string|null $nomeGruppo
     * @param string|null $admin
     * @param string|null $data
     * @param string|null $tipoCampo
     * @param int|null $etaMin
     * @param int|null $etaMax
     * @param float|null $valMin
     * @return array
     */
    public static function loadGruppi(?string $nomeGruppo, ?string $admin, ?string $data, ?string $tipoCampo,
                                      ?int $etaMin, ?int $etaMax, ?float $valMin): array
    {
        try{
            $sql = "SELECT * FROM " . static::$tableName; //Prendi tutti i gruppi
            $conditions = array(); //Array delle condizioni

            if (isset($nomeGruppo)){ //Se nomegruppo != null
                $conditions[] = "nome=". "'" . $nomeGruppo . "'"; //Aggiungi nome=nomeGruppo per poi aggiungerlo alla query
            }

            if (isset($admin)){
                $conditions[] = "admin=". "'" . $admin . "'" ;
            }

            if (isset($data)){
                $conditions[] = "dataEOra LIKE '" . $data ."%'";
            }

            if (isset($tipoCampo)){
                $campi = FCampo::loadList();
                foreach($campi as $campo){
                    $nomec = $campo->getNome();
                    if ($tipoCampo == $nomec)
                    {
                        $conditions[] = "idCampo=" . $campo->getId();
                    }
                }
            }

            if (isset($etaMin)){
                $conditions[] = "etaMinima >= ".$etaMin;
            }

            if (isset($etaMax)){
                $conditions[] = "etaMassima <= ".$etaMax;
            }

            if (isset($valMin)){
                $conditions[] = "votoMinimo >= ".$valMin;
            }

            if (count($conditions) > 0) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }

            $db = FDatabase::getInstance();
            $rows = $db->loadMultiple($sql);
            $gruppi = array();
            foreach($rows as $row){
                $admin = FUtente::load($row['admin']); //Load dell'utente con id dell'admin
                $campo = FCampo::load($row['idcampo']); //Load del campo con id corrispondente
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

    /**
     * Aggiunge un partecipante alla tabella della partecipazioneGruppo
     * @param String $username
     * @param int $idGruppo
     * @return bool
     */
    public static function addPartecipante(String $username, int $idGruppo ): bool
    {
        try {
            $sql = "INSERT INTO " . static::$tablePartecipanti . " VALUES (:idGruppo, :utente)";
            $valuesAssociazione = array($idGruppo, $username);
            $db = FDatabase::getInstance();
            $result = $db->store3($sql, __CLASS__, $valuesAssociazione );
            if($result) return true;
            else return false;

        }
        catch (PDOException $e){
            echo "ERROR: ".$e->getMessage();
        }
    }

    /**
     * Carica solamente una colonna della tabella Gruppo
     * @param $field
     * @return array|null
     */
    public static function loadField($field): ?array
    {
        $sql = "SELECT " . $field . " FROM " . static::$tableName;
        $db = FDatabase::getInstance();
        $rows = $db->loadMultiple($sql);
        return $rows;
    }

    /**
     * Carica tutti i gruppi dell'utente
     * @param string $username
     * @return array|null
     */
    public static function loadGruppiUtente(string $username): ?array
    {
        $sql="SELECT idGruppo FROM " . static::$tablePartecipanti . " WHERE utente='" . $username . "';";
        $db=FDatabase::getInstance();
        $rows=$db->loadMultiple($sql);
        if($rows!=null){
            $gruppiUtente = array();
            foreach ($rows as $row) { //Per ogni row
                $gruppo = FGruppo::load($row['idGruppo']); //Carica il gruppo corrispondente all'id ottenuto
                array_push($gruppiUtente, $gruppo); //Mettilo nell'array
            }
            return $gruppiUtente;
        }
        else return null;
    }

}


?>