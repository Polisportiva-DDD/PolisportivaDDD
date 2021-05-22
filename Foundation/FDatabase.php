<?php
require_once 'EUtente.php';
require_once 'FUtente.php';

if(file_exists('config.inc.php')) require_once 'config.inc.php';


/** Qui vi è l'implementazione del modello Singleton ovvero si crea un'unica instanza della classe
 *  In questo caso tale classe ha lo scopo di fornire un unico accesso al dbms 
 
 */
class FDatabase
{
    /**istanza della classe (l'unica) */
    private static $instanza=null;
	
    /** oggetto PDO che effettua la connessione al dbms */
    private $db;

	
	
	

    /** costruttore privato poichè l'unico accesso è dato dal metodo getInstance() */
    private function __construct()
    {                              
        global $host,$database,$username,$password;
        try{
			//connessione a mysql database a cui si passano nome dell'host, del db, username, password
            $this->db=new PDO("mysql:host=$host; dbname=$database", $username,$password);
        }
        catch(PDOException $e)
        {
          echo "ERRORE: ".$e->getMessage();
          die;
        }
    }
     /**
     * Metodo che restituisce l'unica instanza dell'oggetto.
     * @return l'instanza dell'oggetto.
     */
    public static function getInstance(){ //restituisce l'unica istanza
        if(static::$instanza==null){
            static::$instanza=new FDatabase(); //se è null creo l'instanza
        }
        return static::$instanza;

    }
     /**
     * Metodo che permette di memorizzare le informazioni contenute in un oggetto
	 * $query da eseguire 
	 * $classe nome della classe dell'oggetto
	 * $EOggetto oggetto di $classe va memorizza
     * Entity sul database.
     */
    public function store($query,$classe,$EOggetto){
        try{
            $this->db->beginTransaction();  //Disattiva la modalità autocommit e quindi le  modifiche apportate al database tramite l'istanza dell'oggetto PDO non vengono salvate fino a quando non si termina la transazione chiamando PDO :: commit () . La chiamata a PDO :: rollBack () 
            $stmt=$this->db->prepare($query);  //Prepara un'istruzione per l'esecuzione e restituisce un PDOStatement
            $classe::bind($stmt,$EOggetto); 
            $stmt->execute(); //Esegue un'istruzione preparata
            $id=$this->db->lastInsertId(); //Restituisce l'ID dell'ultima riga o valore di sequenza inseriti
            $this->db->commit(); //Effettua la transizione
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();//Rolls back a transaction
            die;
            return null;
        }
    }

    



    public function delete($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }

	//chiamata ad esempio per modificare lo stato di un utente (bannato o no)
    public function update($sql){
        try{
             $this->db->beginTransaction();
              $stmt=$this->db->prepare($sql);
              $stmt->execute();
              $this->db->commit();
              $this->closeDbConnection();
              return true;
            }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }
	
	//chiamata ad esempio per verificare se esiste già username o email di un'utente
    public function exist($sql){
        try{
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)>=1){
				return true;
			}
            else {
				return false;
			}
            $this->closeDbConnection();
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            die;
            return null;
        }
    }



    public function closeDbConnection(){
        static::$instanza=null;
    }

	
	
	public function load($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $this->closeDbConnection();
            return $row;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            die;
            return null;
        }
    }





}