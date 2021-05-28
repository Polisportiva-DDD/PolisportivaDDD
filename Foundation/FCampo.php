<?php


class FCampo
{

    private static $tableName = "campo";
    private static $values="(:nome, :numeroMinimo,:numeroMassimo,:descrizione,:prezzo,:id)";

    public function __construct() {}

    public static function bind(PDO $stmt, ECampo $campo){
        $stmt->bindValue(':nome', $campo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':numeroMinimo', $campo->getNumeroMinimo(), PDO::PARAM_INT);
        $stmt->bindValue(':numeroMassimo', $campo->getNumeroMassimo(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $campo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $campo->getPrezzo(), PDO::PARAM_STR);
        $stmt->bindValue(':id', null,  PDO::PARAM_INT);
    }


    public function store(ECampo $campo){
        $sql="INSERT INTO " . static::$tableName . " VALUES " . static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql, $campo);
        if($id) return $id;
        else return null;
    }

    //Modificare
    public function load(){ //Carica tutti i campi presenti
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

    public function loadCampo(int $idCampo)
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

    public function update(float $prezzo, int $idCampo): bool{
        try {
            $sql = "UPDATE " . static::$tableName . "SET prezzo=" . $prezzo . " WHERE id=" . $idCampo;
            $db=FDatabase::getInstance();
            $response = $db->update($sql);
            return ($response);
        }
        catch (Exception $e)
        {
            echo ("ERROR");
        }

    }

    public function delete(int $idCampo){
        $sql = "DELETE FROM " . static::$tableName . "WHERE id=" . $idCampo;
        $db=FDatabase::getInstance();
        $response = $db->delete($sql);
        return $response;
    }

    private function buildCampo(array $row){
        if ($row){
            switch($row['nome']){
                case "Calcio a cinque":
                    $campo = new ECalcioACinque($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "Calcio a sette":
                    $campo = new ECalcioASette($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "Calcio a otto":
                    $campo = new ECalcioAOtto($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
                case "Calcio a undici":
                    $campo = new ECalcioAUndici($row['id'], $row['nome'], $row['numeroMinimo'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'] );
                    return $campo;
            }
        }

    }

}