<?php

require_once 'EUtente.php';
require_once 'FDatabase.php';


class FUtente
{
    private static $tables="utente";
    private static $values="(:username,:nome,:cognome,:email,:password,:dataDiNascita)";
    
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
        $stmt->bindValue(':dataDiNascita', $user->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
     
    }
  /**
     * 
     *  restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

     /** 
     * restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }


    public static function store($user){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FUtente",$user);
        if($id) return $id;
        else return null;
    }
 
    

    /**
     * Carica l'utente in base all'username passato
     * @param string $username dell'utente
     * @return oggetto EUtente
     */

    /*
    public static function loadByUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->load($sql);
        if($result!=null){
            $user=new EUtente($result['username'], $result['nome'], $result['cognome'],$result['email'],$result['password'],new DateTime($result['dataDiNascita']));

            return $user;
        }
        else return null;
    }

    */
    /** 
     * Funzione che permette la delete dell'utente in base all'username
     * @param string $username dell'utente che si vuole eliminare
     * @return bool 
     */

    public static function delete($username){
        $sql="DELETE FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

     
     /** 
     * Metodo che permette di bandire, sbandire utente
     * @param String username (utente che bisogna bannare,sbandire)
     * @param bool $bannato  (flag che indica se è bisogna bannare o sbandire l'utente)
     * @return bool (restituisce true se va tutto a buon fine false altrimenti)
     */
     /*
		//quando facciamo db aggiornato si prova
    public static function UpdateBannato($username,$bannato){
        $colonna="bannato";//collonna da modificare
        if(FUtente::update($username,$field,$bannato)) return true;
        else return false;
    }
       */
    

     /** 
     * Metodo che verifica l'esistenza di un utente con quell'username e password
     * @param string $username username dell'utente che vuole effettuare la modifica
     * @param  string $password
     * @return Oggetto EUtente altrimenti false se non esiste l'utente
     */


    public static function Login($username,$password){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."' AND "."password='".$password."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null){
             $user=new EUtente($result['username'],$result['password'], $result['nome'], $result['cognome'],$result['dataDiNascita'], $result['email'],$result['amministratore']);
             return $user;
        }
        else return false;
    }

     /** 
     * Funzione che permette di verificare se esiste un utente con quell'username
     * @param string $username dell'utente 
     * @return bool 
     */

    public static function EsisteUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
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


    public static function EsisteMail($email){
        $sql="SELECT * FROM ".static::getTables()." WHERE email='".$email."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

    public static function loadUtenteByUsername(String $username){

    }

   
    
    
}

