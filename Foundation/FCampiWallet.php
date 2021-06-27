<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.php';

class FCampiWallet
{

    /**
     * tabella con la quale opera
     * @var string
     */
    private static  $tableName="campiwallet";

    /**
     * valori della tabella
     * @var string
     */
    private static $values="(:idCampo,:idWallet,:gettoni)";

    /**
     * FCampiWallet constructor.
     */
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi del campoWallet da inserire con i parametri della INSERT
     * @param $stmt
     * @param $valuesAssociazione
     */
    public static function bindAssociazione($stmt, $valuesAssociazione)
    {
        $stmt->bindValue(':idCampo', $valuesAssociazione[1], PDO::PARAM_INT);
        $stmt->bindValue(':idWallet', $valuesAssociazione[0], PDO::PARAM_INT);
        $stmt->bindValue(':gettoni', $valuesAssociazione[2], PDO::PARAM_INT);
    }

    /**
     * Memorizza sul db i campiWallet legati all'id del wallet passati come parametro
     * @param array $campiWallet array dei CampiWallet
     * @param int $id id del wallet
     * @return bool
     */
    public static function store(array $campiWallet, int $id): bool
    {
        $sql="INSERT INTO ".static::$tableName." VALUES ".static::$values;
        $idwallet=$id;
        foreach ($campiWallet as $valore){
            $db=FDatabase::getInstance();
            $valuesAssociazione=array($idwallet,$valore->getCampo()->getId(),$valore->getGettoni());
            $id=$db->store3($sql,__CLASS__,$valuesAssociazione);
            if($id==null){
                return false;
            }
        }
        return true;




    }


    /**
     * aggiorna l'intero wallet
     * @param int $id
     * @param array $campiwallet
     * @return bool
     */
    public static function update(int $id,array $campiwallet): bool
    {

            $sql1="";
            foreach ($campiwallet as  $valore) {//per ogni campo, aggiorno la quantità di gettoni
            $sql = "UPDATE " . static::$tableName . " SET gettoni='" . $valore->getGettoni() . "' WHERE idCampo='" .  $valore->getCampo()->getId() . "' and idWallet='" . $id . "';";
            $sql1.=$sql;//creo un un'unica query da eseguire
            }
            $db=FDatabase::getInstance();
            if($db->update($sql1)) return true;
            else return false;
    }


    /**
     * Aggiorna la quantità di gettoni di un certo wallet relativo ad un certo campo
     * @param $idCampo
     * @param $idWallet
     * @param $quantita
     * @return bool
     */

    public static function update2($idCampo, $idWallet, $quantita): bool
    {
        $sql = "UPDATE " . static::$tableName . " SET gettoni='" . $quantita . "' WHERE idCampo='" . $idCampo . "' and idWallet='" . $idWallet . "';";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }


    /**
     * Carica il wallet dell'utente passando l'id del wallet
     * @param int $id del wallet
     * @return array|null restituisce array di ECampiWallet dell'utente
     */


    public static function load(int $id): ?array
    {
        $sql="SELECT * FROM ".static::$tableName." WHERE idWallet='".$id."';";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        $campiWallet=array();
        if($result!=null){
            for($i=0; $i<count($result); $i++){

                $campo=FCampo::load($result[$i]['idCampo']);
                $campiWallet[]=new ECampiWallet($result[$i]['gettoni'],$campo);

            }
            return $campiWallet;
        }
        else return null;
    }





    
    
}

