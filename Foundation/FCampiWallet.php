<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.inc.php';

class FCampiWallet
{


    private static $tableName="campiwallet";
    private static $values="(:idCampo,:idWallet,:gettoni)";
    
    public function __construct(){}

    public static function bindAssociazione($stmt, $valuesAssociazione)
    {
        $stmt->bindValue(':idCampo', $valuesAssociazione[1], PDO::PARAM_INT);
        $stmt->bindValue(':idWallet', $valuesAssociazione[0], PDO::PARAM_INT);
        $stmt->bindValue(':gettoni', $valuesAssociazione[2], PDO::PARAM_INT);
    }

    public static function store(array $campiWallet,$id){
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
     * @param EWallet $wallet wallet da aggiornare
     * @return bool
     */
    public static function update($id,array $campiwallet){

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

    public static function update2($idCampo, $idWallet, $quantita)
    {
        $sql = "UPDATE " . static::$tableName . " SET gettoni='" . $quantita . "' WHERE idCampo='" . $idCampo . "' and idWallet='" . $idWallet . "';";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }





 
    

    /**
     * Carica il wallet dell'utente passando l'id del wallet
     * @param int $id del wallet
     * @return array  restituisce array di ECampiWallet dell'utente
     */


    public static function load($id){
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

