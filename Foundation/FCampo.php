<?php

//require_once (get_include_path() .'/Utility/autoload.php');
//require_once (get_include_path() .'/Foundation/config.php');


class FCampo
{
    /**
     * Tabella con la quale opera.
     * @var string
     */
    private static $tableName = "campo";

    /**
     * Valori della tabella.
     * @var string
     */
    private static $values="(:nome, :numeroMinimo,:numeroMassimo,:descrizione,:prezzo,:id, :discriminante, :immagine)";

    /**
     * FCampo constructor.
     */
    public function __construct() {}

    /**
     * Questo metodo lega gli attributi della Carta di Credito da inserire con i parametri della INSERT
     * @param $stmt
     * @param ECampo $campo
     */
    public static function bind($stmt, ECampo $campo){
        $stmt->bindValue(':nome', $campo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':numeroMassimo', $campo->getNumeroMassimo(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $campo->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $campo->getPrezzo(), PDO::PARAM_STR);
        $stmt->bindValue(':id', null,  PDO::PARAM_INT);
        $stmt->bindValue(":immagine", $campo->getImmagine(), PDO::PARAM_STR);
    }

    /**
     * Carica sul db il campo.
     * @param ECampo $campo
     * @return string|null
     */
    public static function store(ECampo $campo): ?string
    {
        $sql="INSERT INTO " . static::$tableName . " VALUES " . static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql, $campo);
        if($id) return $id;
        else return null;
    }


    /**
     * Carica dal db tutti i campi presenti.
     * @return array
     */
    public static function loadList(): array
    {
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

    /**
     * Carica dal db il campo dato l'id.
     * @param int $idCampo
     * @return mixed|null
     */
    public static function load(int $idCampo)
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

    /**
     * Aggiorna il prezzo del campo sul db.
     * @param float $prezzo
     * @param int $idCampo
     * @return bool
     */
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

    /**
     * Elimina un campo dal db.
     * @param int $idCampo
     * @return bool
     */
    public static function delete(int $idCampo): bool
    {
        $sql = "DELETE FROM " . static::$tableName . " WHERE id=" . $idCampo;
        $db=FDatabase::getInstance();
        $response = $db->delete($sql);
        return $response;
    }


    /**
     * Funzione che prende in ingresso la riga restituita dalla load e costruisce l'oggetto ECampo corretto
     * @param array $row
     * @return mixed|null
     */
    private static function buildCampo(array $row){
        if ($row){
            $class = $row['discriminante'];
            $campo = new $class($row['id'], $row['nome'], $row['numeroMassimo'], $row['descrizione'], $row['prezzo'], base64_encode($row['immagine']));
            return $campo;
        }
        else return null;
    }

}