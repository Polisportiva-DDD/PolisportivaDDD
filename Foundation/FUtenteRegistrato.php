<?php

//require_once '../Utility/autoload.php';
//require_once '../Foundation/config.inc.php';

class FUtenteRegistrato
{
    private static $tables="utenteregistrato";
    private static $values="(:username,:bannato,:motivazione)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EUtenteRegistrato $user l'utente i cui dati devono essere inseriti nel DB
     */
    
    public static function bind(PDOStatement $stmt, EUtenteRegistrato $user){
        $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':bannato', $user->getBannato(), PDO::PARAM_BOOL); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':motivazione', $user->getMotivazione(), PDO::PARAM_STR);
        
     
    }
  /**
     *
     *  restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(): string
    {
        return static::$tables;
    }

     /**
     * restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */

    public static function getValues(): string
    {
        return static::$values;
    }


    public static function store($user): ?string
    {
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$user);
        if($id) return $id;
        else return null;
    }
 
    

    /**
     * Carica l'utente in base all'username passato
     * @param string $username dell'utente
     * @return EUtenteRegistrato Utente
     */


    //SERVE?????????????????????????????????????????????????????????????

    public static function load(string $username): ?EUtenteRegistrato
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){

            $wallet=new EWallet(array(),-1);
            $user=new EUtenteRegistrato( $result['bannato'], $result['motivazione'],$result['username'],"","","","",new DateTime(),"",$wallet);

            return $user;
        }
        else return null;
    }



    /**
     * Carica tutti gli utenti bannati
     * @return array|null
     */
    public static function loadList(): ?array
    {
        $sql = "SELECT * FROM " . static::$tables." WHERE bannato=1" ;
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $bannati = array();
            foreach($result as $row){
                $bannato = FUtenteRegistrato::load($row['username']);
                array_push($bannati, $bannato);
            }
            return $bannati;
        }
        else return null;
    }

    /** 
     * Funzione che permette la delete dell'utente in base all'username
     * @param string $username dell'utente che si vuole eliminare
     * @return bool true se è andato a buon fine la cancellazione, false altrimenti
     */

    public static function delete(string $username): bool
    {
        $sql="DELETE FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

     
     /** 
     * Metodo che permette di bandire, sbandire utente
     * @param String $username (utente che bisogna bannare,sbandire)
     * @param bool $bannato  (flag che indica se è bisogna bannare o sbandire l'utente)
     * @return bool (restituisce true se va tutto a buon fine false altrimenti)
     */

    public static function updateBannato(string $username, bool $bannato, String $motivazione): bool
    {
        $sql="UPDATE ".static::getTables()." SET bannato='".$bannato."', motivazione='".$motivazione."' WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }


    /**
     * Metodo che permette di vedere se un utente è bandito o meno
     * @param String $username username dell'utente
     * @return bool
     */

    public static function isBannato(string $username): ?bool
    {
        $sql="SELECT bannato FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $b=$db->loadSingle($sql);
        if($b!=null){
            return $b['bannato'];//ritorno se l'utente e bannato o meno
        }
        else{
            return null;//ritorno null in caso di errore
        }
    }
       
    






   
    
    
}

