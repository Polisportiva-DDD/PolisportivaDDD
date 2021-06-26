<?php



class FAmministratore
{
    private static $tableName = "amministratore";
    private static $values = "(:username)";

    /**
     * Questo metodo lega gli attributi dell'amministratore da inserire con i parametri della INSERT
     * @param $stmt
     * @param EAmministratore $amministratore
     */
    public static function bind($stmt, EAmministratore $amministratore){
        $stmt->bindValue(":username", $amministratore->getUsername(), PDO::PARAM_STR);
    }

    /**
     * Memorizza su DB l'amministratore passato come parametro
     * @param EAmministratore $amministratore
     * @return bool
     */
    public static function store(EAmministratore $amministratore): bool
    {
        $sql="INSERT INTO " . static::$tableName . " VALUES" . static::$values;
        $db=FDatabase::getInstance();
        $response = $db->store($sql, $amministratore);
        if($response) return true;
        else return false;
    }

    /**
     * Controlla se l'username dell'amministratore esiste sulla tabella del DB
     * @param string $username
     * @return bool
     */
    public static function exist(string $username): bool
    {
        $sql = "SELECT * FROM " . static::$tableName . " WHERE username=" . "'".$username."'";
        $db=FDatabase::getInstance();
        $response = $db->exist($sql);
        if($response) return true;
        else return false;
    }

    /**
     * Carica l'amministratore dal DB
     * @param string $username
     * @return EAmministratore|int
     * @throws Exception
     */
    public static function load(string $username){
        if(self::exist($username)){
            $u =FUtente::load($username);
            $amm = new EAmministratore($username, $u->getNome(),$u->getCognome(), $u->getEmail(), $u->getPassword(),
            $u->getDataDiNascita(), $u->getImmagine(), $u->getWallet());
            return $amm;
        }
        else{
            return 0;
        }
    }

}