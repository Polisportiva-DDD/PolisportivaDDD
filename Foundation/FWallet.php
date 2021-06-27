<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.php';

class FWallet
{
    /**
     * tabella con la quale opera
     * @var string
     */
    private static $tableName="wallet";

    /**
     * valori della tabella
     * @var string
     */
    private static $values="(:id)";

    /**
     * FWallet constructor.
     */
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi del Wallet da inserire con i parametri della INSERT
     * @param $stmt
     * @param EWallet $wallet
     */
    public static function bind($stmt, EWallet $wallet)
    {
        $stmt->bindValue(':id',null, PDO::PARAM_INT);
    }

    /**
     * Carica il wallet sul db.
     * @param EWallet $wallet
     * @return false|string
     */
    public static function store(EWallet $wallet): bool|string
    {
        $sql="INSERT INTO ".static::$tableName." VALUES ".static::$values;
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$wallet);
        if($id!=null){

            if(FCampiWallet::store($wallet->getListaCampiWallet(),$id)==true){
                return $id;
            }
            else{
                self::delete($id);//cancello il wallet creato nell tabella "wallet" in caso di errori
                return false;
            }
        }
        else return false;


    }

    /**
     * Carica il wallet dal db in base all'id passatogli.
     * @param $id
     * @return EWallet|false
     */
    public static function load($id){
        $campiWallet=FCampiWallet::load($id);
        $wallet=new EWallet($campiWallet,$id);
        if ($campiWallet==null){
            return false; //errore durante il caricamento
        }
        else return $wallet;
    }

    /**
     *
     * @param EWallet $wallet
     * @return bool
     */
    public static function update(EWallet $wallet): bool
    {

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

    public static function delete(int $id): bool
    {
        $sql="DELETE FROM ".static::$tableName." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    
    
}

