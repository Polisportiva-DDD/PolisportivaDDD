<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.inc.php';

class FUtente
{
    private static $tableName="utente";
    private static $values="(:username,:nome,:cognome,:email,:password,:dataDiNascita,:immagine,:wallet)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EUtente $user l'utente i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, EUtente $user){
        $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $user->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':dataDiNascita', $user->getDataDiNascita()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', $user->getImmagine(), PDO::PARAM_STR);
        $stmt->bindValue(':wallet', $user->getWallet()->getId(), PDO::PARAM_INT);
     
    }
  /**
     * 
     *  restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTableName(){
        return static::$tableName;
    }

     /** 
     * restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }


    public static function store($user){
        $sql="INSERT INTO ".static::getTableName()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$user);
        if($id) return $id;
        else return null;
    }
 
    

    /**
     * Carica l'utente in base all'username passato
     * @param string $username dell'utente
     * @return EUtente Utente
     */


    public static function load($username){
        $sql="SELECT * FROM ".static::getTableName()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $wallet=FWallet::load($result['wallet']);
            $user=new EUtente($result['username'], $result['nome'], $result['cognome'],$result['email'],$result['password'],new DateTime($result['dataDiNascita']),$result['immagine'],$wallet);
            return $user;
        }
        else return null;
    }


    /** 
     * Funzione che permette la delete dell'utente in base all'username
     * @param string $username dell'utente che si vuole eliminare
     * @return bool 
     */

    public static function delete($username){
        $sql="DELETE FROM ".static::getTableName()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

     

    

     /** 
     * Metodo che verifica l'esistenza di un utente con quell'username e password
     * @param string $username username dell'utente che vuole effettuare la modifica
     * @param  string $password
     * @return EUtente Utente altrimenti false se non esiste l'utente
     */


    public static function Login($username,$password){
        $sql="SELECT * FROM ".static::getTableName()." WHERE username='".$username."' AND "."password='".$password."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        return $result;
    }

     /** 
     * Funzione che permette di verificare se esiste un utente con quell'username
     * @param string $username dell'utente 
     * @return bool 
     */

    public static function esisteUsername($username){
        $sql="SELECT * FROM ".static::getTableName()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

     /** 
     * Funzione che permette di verificare se esiste un utente con quell'email
     * @param string $email da cercare
     * @return bool 
     */


    public static function esisteMail($email){
        $sql="SELECT * FROM ".static::getTableName()." WHERE email='".$email."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

    public static function loadList(){
        $sql="SELECT * FROM ".static::getTableName();
        $db=FDatabase::getInstance();
        $rows = $db->loadMultiple($sql);
        $utenti =array();
        foreach($rows as $result){
            $wallet=FWallet::load($result['wallet']);
            $user=new EUtente($result['username'], $result['nome'], $result['cognome'],$result['email'],$result['password'],new DateTime($result['dataDiNascita']),$result['immagine'],$wallet);
            $utenti[] = $user;
        }
        return $utenti;
    }



   
    
    
}

