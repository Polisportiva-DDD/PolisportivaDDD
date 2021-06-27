<?php

//require_once (get_include_path() .'/Utility/autoload.php');
//require_once (get_include_path() .'/Foundation/config.php');

class FTicketAssistenza
{
    /**
     * Tabella con la quale opera.
     * @var string
     */
    private static $tableName="ticketassistenza";

    /**
     * Valori della tabella
     * @var string
     */
    private static $values="(:id,:autore,:messaggio,:oggetto,:data)";

    /**
     * FTicketAssistenza constructor.
     */
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt
     * @param ETicketAssistenza $ticket
     */
    
    public static function bind(PDOStatement $stmt, ETicketAssistenza $ticket){
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

    public static function getTableName(): string
    {
        return static::$tableName;
    }

     /** 
     * restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(): string
    {
        return static::$values;
    }

    /**
     * Carica sul db il ticket.
     * @param ETicketAssistenza $ticket
     * @return string|null
     */
    public static function store(ETicketAssistenza  $ticket): ?string
    {
        $sql="INSERT INTO ".static::getTableName()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,$ticket);
        if($id) return $id;
        else return null;
    }


    /**
     * Carica il ticket presente nel db in base all'id passatogli.
     * @param int $id
     * @return ETicketAssistenza|null
     * @throws Exception
     */
    public static function load(int $id): ?ETicketAssistenza
    {
        $sql="SELECT * FROM ".static::getTableName()." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $ticket=new ETicketAssistenza( $result['autore'], $result['messaggio'],$result['oggetto'],new DateTime($result['data']),$result['id']);
            return $ticket;
        }
        else return null;
    }


    /**
     * Carica tutti i ticket presenti sul db.
     * @return array|null
     * @throws Exception
     */
    public static function loadList(): ?array
    {
        $sql="SELECT * FROM ".static::getTableName();
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

    public static function delete(int $id): bool
    {
        $sql="DELETE FROM ".static::getTableName()." WHERE id='".$id."';";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }


    
}

