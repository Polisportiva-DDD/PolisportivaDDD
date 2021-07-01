<?php

//require_once (get_include_path() .'/Utility/autoload.php');
//require_once (get_include_path() .'/Foundation/config.php');

require_once('config.php');

/** Qui vi è l'implementazione del modello Singleton ovvero si crea un'unica instanza della classe
 *  In questo caso tale classe ha lo scopo di fornire un unico accesso al dbms
 */


class FDatabase
{

    /**istanza della classe (l'unica) */
    private static $instanza=null;
	
    /** oggetto PDO che effettua la connessione al dbms */
    private $db;

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }



    /** costruttore privato poichè l'unico accesso è dato dal metodo getInstance() */
    private function __construct()
    {
        try{
            $dsn = "mysql:host=". $GLOBALS['host'] . ";" . " dbname=" . $GLOBALS['database'];
            $u=$GLOBALS['username'];
            $p=$GLOBALS['password'];
			//connessione a mysql database a cui si passano nome dell'host, del db, username, password
            $this->db=new PDO($dsn, $u,$p);
        }
        catch(PDOException $e)
        {
          echo "ERROR: ".$e->getMessage();
          die;
        }
    }

    /**
     * Metodo che restituisce l'unica instanza dell'oggetto.
     * @return FDatabase|null l'instanza dell'oggetto.
     */
    public static function getInstance(): ?FDatabase
    { //restituisce l'unica istanza
        if(self::$instanza==null){
            self::$instanza=new FDatabase(); //se è null creo l'instanza
        }
        return self::$instanza;

    }
     /**
     * Metodo che permette di memorizzare le informazioni contenute in un oggetto Entity sul database.
	 * @param String $query è la query da eseguire
	 * $EOggetto oggetto di $classe va memorizza
     *
     */


    public function store(string $query, $EOggetto): ?string
    {
        try{
            $this->db->beginTransaction();  //Disattiva la modalità autocommit e quindi le  modifiche apportate al database tramite l'istanza dell'oggetto PDO non vengono salvate fino a quando non si termina la transazione chiamando PDO :: commit () . La chiamata a PDO :: rollBack () 
            $stmt=$this->db->prepare($query);  //Prepara un'istruzione per l'esecuzione e restituisce un PDOStatement
            $Eclass = get_class($EOggetto);
            $Fclass = "F" . substr($Eclass, 1);
            $Fclass::bind($stmt,$EOggetto);
            $stmt->execute(); //Esegue un'istruzione preparata
            $id=$this->db->lastInsertId(); //Restituisce l'ID dell'ultima riga o valore di sequenza inseriti
            $this->db->commit(); //Effettua la transizione
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();//Rolls back a transaction
            return null;
        }
    }


    /**
     * Il metodo store3 viene usato per memorizzare i valori sulle tabelle nate dalle associazioni
     * $query sarà la query da eseguire
     * $classe classe da richiamare per eseguire il metodo bindAssociazione
     * $valuesAssociazione un array contenente i dati da memorizzare sul db
     * @param $query
     * @param $classe
     * @param $valuesAssociazione
     * @return string|null
     */
    public function store3($query, $classe, $valuesAssociazione): ?string
    {
        try{
            $this->db->beginTransaction();  //Disattiva la modalità autocommit e quindi le  modifiche apportate al database tramite l'istanza dell'oggetto PDO non vengono salvate fino a quando non si termina la transazione chiamando PDO :: commit () . La chiamata a PDO :: rollBack ()
            $stmt=$this->db->prepare($query);  //Prepara un'istruzione per l'esecuzione e restituisce un PDOStatement
            $classe::bindAssociazione($stmt,$valuesAssociazione);
            $stmt->execute(); //Esegue un'istruzione preparata
            $id=$this->db->lastInsertId(); //Restituisce l'ID dell'ultima riga o valore di sequenza inseriti
            $this->db->commit(); //Effettua la transizione
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();//Rolls back a transaction
            return null;
        }

    }


    /**
     * Funzione che passata una query permette di eliminare una riga da una tabella del db
     * @param $sql
     * @return bool
     */
    public function delete($sql): bool
    {
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
            return false;
        }
    }


    /**
     * Metodo che passata una query in ingresso permette di aggiornare le righe di una tabella del db
     * @param $sql
     * @return bool
     */
    public function update($sql): bool
    {
        try{
             $this->db->beginTransaction();
              $stmt=$this->db->prepare($sql);
              $stmt->execute();
              $stmt->closeCursor();
              $this->db->commit();
              $this->closeDbConnection();
              return true;
            }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            $this->db->rollBack();
            return false;
        }
    }


    /**
     * Metodo che passata una query ci restituisce true se la query restituisce uno o più risultati, altrimenti false
     * @param $sql
     * @return bool|null
     */
    public function exist($sql): ?bool
    {
        try{
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->closeDbConnection();
            if(count($rows)>=1){
				return true;
			}
            else {
				return false;
			}

        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            return null;
        }
    }


    /**
     *Metodo che chiude la connesione con il db
     */
    public function closeDbConnection(){
        static::$instanza=null;
    }

	
	

	
	/**
     * Funzione che viene utilizzata per la load quando ci si aspetta che la query produca più di un risultato.
     * 
     * @param String $sql query da eseguire
     */
    public function loadMultiple(string $sql): ?array
    {
        try{
            $rows=array();
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row=$stmt->fetch()){
                $rows[]=$row;
            }
            $this->closeDbConnection();
            return $rows;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            return null;
        }
    }

       /**
     * Metodo usato per la load quando ci si aspetta che la query produca un solo risultato
     * 
     * @param $sql String query da eseguire
     */
    public function loadSingle(string $sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->closeDbConnection();
            return $row;
        }
        catch(PDOException $e){
            echo "Errore: ".$e->getMessage();
            return null;
        }
    }








}