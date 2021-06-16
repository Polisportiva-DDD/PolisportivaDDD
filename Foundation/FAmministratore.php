<?php



class FAmministratore
{
    private static $tableName = "amministratore";
    private static $values = "(:username)";

    public static function bind($stmt, EAmministratore $amministratore){
        $stmt->bindValue(":username", $amministratore->getUsername(), PDO::PARAM_STR);
    }

    public static function store(EAmministratore $amministratore){
        $sql="INSERT INTO " . static::$tableName . " VALUES" . static::$values;
        $db=FDatabase::getInstance();
        $response = $db->store($sql, $amministratore);
        if($response) return true;
        else return false;
    }

    public static function exist(string $username){
        $sql = "SELECT * FROM " . static::$tableName . " WHERE username=" . "'".$username."'";
        $db=FDatabase::getInstance();
        $response = $db->exist($sql);
        if($response) return true;
        else return false;
    }

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