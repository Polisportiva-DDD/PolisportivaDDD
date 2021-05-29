
<?php
/*
require_once '../Utility/autoload.php';
require_once '../Foundation/config.inc.php';

class FConnection
{
    private static $instance = null;

    private PDO $connection;


    private function __construct()
    {
        global $host,$database,$username,$password;
        try{
            $dsn = "mysql:host=". $host . ";" . " dbname=" . $database;
            //connessione a mysql database a cui si passano nome dell'host, del db, username, password
            $this->connection = new PDO("mysql:host=localhost; dbname=progettoweb", "root","pippo");
        }
        catch(PDOException $e)
        {
            echo "ERROR: ".$e->getMessage();
        }
    }
*/
/*
    /**
     * @return PDO
     */
/*
    public function getConnection(): PDO
    {
        return $this->connection;
    }


    public static function getInstance(){ //restituisce l'unica istanza
        if(self::$instanza==null){
            self::$instanza=new FConnection(); //se è null creo l'instanza
        }
        return self::$instanza;

    }




}
*/