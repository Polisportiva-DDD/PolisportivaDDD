<?php

require_once("../Utility/autoload.php");
require_once 'config.inc.php';


class FCampo
{

    private static $tableName = "campo";
    private static $values="(:nome, :numeroMinimo,:numeroMassimo,:descrizione,:prezzo,:id)";

    public function __construct() {}

    public static function bind($stmt, ECampo $campo){
        $stmt->bindValue(':nome', $campo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':numeroMinimo', $campo->getNumeroMinimo(), PDO::PARAM_INT);
        $stmt->bindValue(':numeroMassimo', $campo->getNumeroMassimo(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $campo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $campo->getPrezzo(), PDO::PARAM_STR);
        $stmt->bindValue(':id', null,  PDO::PARAM_INT);
    }


    public static function store(ECampo $campo){
        $sql="INSERT INTO " . static::$tableName . " VALUES " . static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql, $campo);
        if($id) return $id;
        else return null;
    }

    public static function load(){ //Carica tutti i campi presenti
        try {
            $sql = "SELECT * FROM " . static::$tableName;
            $db = FDatabase::getInstance();
            $rows = $db->loadMultiple($sql);
            $campi =array();
            foreach($rows as $row){
                $campo = self::buildCampo($row);
                array_push($campi, $campo);
            }
            return $campi;
        }
        catch(Exception $e)
        {
            echo ("ERROR"); //DA GESTIRE
        }
    }

    public static function loadCampo(int $idCampo)
    {
        try {
            $sql = "SELECT * FROM " . static::$tableName . " WHERE id=" . $idCampo;
            $db = FDatabase::getInstance();
            $row = $db->loadSingle($sql);
            $campo = self::buildCampo($row);
            return $campo;

        }
        catch(Exception $e)
        {
            echo ("ERROR"); //DA GESTIRE
        }
    }

    public static function update(float $prezzo, int $idCampo): bool{
        try {
            $sql = "UPDATE " . static::$tableName . " SET prezzo=" . $prezzo . " WHERE id=" . $idCampo;
            $db=FDatabase::getInstance();
            $response = $db->update($sql);
            return ($response);
        }
        catch (Exception $e)
        {
            echo ("ERROR");
        }

    }

    public static function delete(int $idCampo){
        $sql = "DELETE FROM " . static::$tableName . " WHERE id=" . $idCampo;
        $db=FDatabase::getInstance();
        $response = $db->delete($sql);
        return $response;
    }

    private static function buildCampo(array $row){
        if ($row){
            switch($row['nome']){
                case "calcio a cinque":
                    $campo = new ECalcioACinque($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "calcio a sette":
                    $campo = new ECalcioASette($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "calcio a otto":
                    $campo = new ECalcioAOtto($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "calcio a undici":
                    $campo = new ECalcioAUndici($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
            }
        }

    }

}