<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.inc.php';

class FWallet
{
    private static $tableName="wallet";
    private static $values="(:id)";

    
    public function __construct(){}

    public static function bind($stmt, EWallet $wallet)
    {
        $stmt->bindValue(':id',null, PDO::PARAM_INT);
    }

    public static function store(EWallet $wallet){
        $sql="INSERT INTO ".static::$tableName." VALUES ".static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$wallet);
        if($id!=null){

            if(FCampiWallet::store($wallet->getListaCampiWallet(),$id)==true){
                return true;
            }
            else{
                self::delete($id);//cancello il wallet creato nell tabella "wallet" in caso di errori
                return false;
            }
        }
        else return false;


    }

    public static function load($id){
        $campiWallet=FCampiWallet::load($id);
        $wallet=new EWallet($campiWallet,$id);
        if ($campiWallet==null){
            return false; //errore durante il caricamento
        }
        else return $wallet;
    }

    public static function update(EWallet $wallet){

       if(FCampiWallet::update($wallet->getId(),$wallet->getListaCampiWallet())==true){
           return true;
       }
       else return false;
    }
   



    /** 
     * Funzione che permette la delete del wallet di un utente passando l'id del wallet
     * @param int $id del wallet che si vuole eliminare
     * @return bool 
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::$tableName." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    
    
}

