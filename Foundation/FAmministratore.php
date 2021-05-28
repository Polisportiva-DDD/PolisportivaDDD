<?php


class FAmministratore
{
    private static $tableName = "amministratore";
    private static $values = (":username");

    public static function bind(PDO $stmt, EAmministratore $amministratore){
        $stmt->bindValue(":username", $amministratore->getUsername(), PDO::PARAM_STR);
    }

    public function store(EAmministratore $amministratore){
        $sql="INSERT INTO " . static::$tableName . " VALUES " . static::$values;
        $db=FDatabase::getInstance();
        $response = $db->store($sql, $amministratore);
        if($response) return true;
        else return false;
    }

    public function exist(string $username){
        $sql = "SELECT * FROM " . static::$tableName . " WHERE username=" . $username;
        $db=FDatabase::getInstance();
        $response = $db->exist($sql);
        if($response) return true;
        else return false;
    }

}