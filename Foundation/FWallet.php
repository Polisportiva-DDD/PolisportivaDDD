<?php

require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';

class FWallet
{
    private static $tables="wallet";
    private static $values="(:id)";

    private static $tablesAssociazione="campiwallet";
    private static $valuesAssociazione="(:idCampo,:idWallet,:gettoni)";
    
    public function __construct(){}

    public static function bind($stmt, EWallet $wallet){
        $stmt->bindValue(':id',null, PDO::PARAM_INT);
    }

    public static function store(EWallet $wallet){
        $sql="INSERT INTO ".static::$tables." VALUES ".static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$wallet);
        if($id!=null){
            $wallet->setId($id);
            $db=FDatabase::getInstance();
            if($db->store2($wallet,self::$tablesAssociazione,self::$valuesAssociazione)==true){
                return true;
            }
            else{
                self::delete($id);//cancello il wallet creato nell tabella "wallet" in caso di errori
                return false;
            }
        }
        else return false;


    }


   

    /**
     * @param EWallet $wallet wallet da aggiornare
     * @return bool
     */
    public static function update(EWallet $wallet){
            $arrG = $wallet->getGettoni();
            $idWallet = $wallet->getId();
            $sql1="";
            foreach ($arrG as $chiave => $valore) {//per ogni campo, aggiorno la quantità di gettoni
                $sql = "UPDATE " . static::$tablesAssociazione . " SET gettoni='" . $valore . "' WHERE idCampo='" . $chiave . "' and idWallet='" . $idWallet . "';";
                $sql1.=$sql;//creo un un'unica grande query da eseguire
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
        $sql = "UPDATE " . static::$tablesAssociazione . " SET gettoni='" . $quantita . "' WHERE idCampo='" . $idCampo . "' and idWallet='" . $idWallet . "';";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }





 
    

    /**
     * Carica il wallet dell'utente passando l'id del wallet
     * @param int $id del wallet
     * @return EWallet wallet dell'utente
     */


    public static function loadById($id){
        $sql="SELECT * FROM ".static::$tablesAssociazione." WHERE idWallet='".$id."';";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        $gettoni=array();
        if($result!=null){
            for($i=0; $i<count($result); $i++){
                $gettoni[$result[$i]['idCampo']]=$result[$i]['gettoni'];
            }
            return new EWallet($gettoni,$id);
        }
        else return null;
    }


    /** 
     * Funzione che permette la delete del wallet di un utente passando l'id del wallet
     * @param int $id del wallet che si vuole eliminare
     * @return bool 
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::$tables." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }


    
    
}

