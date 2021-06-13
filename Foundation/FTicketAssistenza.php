<?php

require_once (get_include_path() .'/Utility/autoload.php');
require_once (get_include_path() .'/Foundation/config.inc.php');

class FTicketAssistenza
{
    private static $tables="ticketassistenza";
    private static $values="(:id,:autore,:messaggio,:oggetto,:data)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param ETicketAssistenza $user l'utente i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, ETicketAssistenza $ticket){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT);
        $stmt->bindValue(':autore', $ticket->getAutore(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':messaggio', $ticket->getMessaggio(), PDO::PARAM_STR);
        $stmt->bindValue(':oggetto', $ticket->getOggetto(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $ticket->getData()->format('Y-m-d'), PDO::PARAM_STR);

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


    public static function store(ETicketAssistenza  $ticket){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$ticket);
        if($id) return $id;
        else return null;
    }
 
    

    /**
     * Carica il ticket in base all'id passato
     * @param int $id del ticket
     * @return ETicketAssistenza ETicketAssistenza
     */


    public static function load($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $ticket=new ETicketAssistenza( $result['autore'], $result['messaggio'],$result['oggetto'],new DateTime($result['data']),$result['id']);
            return $ticket;
        }
        else return null;
    }

    /**
     * Carica tutti i ticket
     * @param int $id del ticket
     * @return array array<ETicketAssistenza>
     */


    public static function loadList(){
        $sql="SELECT * FROM ".static::getTables();
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $ticket=array();
            for($i=0; $i<count($result); $i++){
                $ticket[]=new ETicketAssistenza( $result[$i]['autore'], $result[$i]['messaggio'],$result[$i]['oggetto'],new DateTime($result[$i]['data']),$result[$i]['id']);
            }
            return $ticket;

        }
        else return null;
    }




    /** 
     * Funzione che permette la delete di un ticket in base all'id
     * @param int $id del ticket che si vuole eliminare
     * @return bool 
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }



     

    



   
    
    
}

