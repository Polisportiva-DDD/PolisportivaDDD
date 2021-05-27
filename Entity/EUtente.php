<?php
include_once "ECampo.php";
include_once "EGruppo.php";
include_once "ECartadiCredito.php";
include_once "ERecensione.php";
include_once "ECalcioAUndici.php";
 class EUtente{
	private string $username;
	private string $nome;
	private string $cognome;
	private string $email;
	private string $password;
	private DateTime $data;
	private float $mediaRecensioni;
	private array  $recensioni=array();
	private array $cartedicredito=array();
	private array $listaGruppi = array();
	private array $wallet = array();
	 /**
	  * @return array
	  */
	 public function getListaGruppi(): array
	 {
		 return $this->listaGruppi;
	 }

	 /**
	  * @param array $listaGruppi
	  */
	 public function setListaGruppi(array $listaGruppi): void
	 {
		 $this->listaGruppi = $listaGruppi;
	 }

	 /**
	  * @return array
	  */
	 public function getCartedicredito(): array
	 {
		 return $this->cartedicredito;
	 }

	 /**
	  * @param array $cartedicredito
	  */
	 public function setCartedicredito(array $cartedicredito): void
	 {
		 $this->cartedicredito = $cartedicredito;
	 }

	  public function __construct(String $username,String $nome,
								  String $cognome,String $email,
								  String $password, DateTime $dataDiNascita,
								  array $recensioni){
		$this->username=$username;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
		$this->password=$password;
        $this->data=$dataDiNascita;
        $this->recensioni=$recensioni;
    }

	 /**
      * Restituisce l'array delle recensioni
      * @return array
      */
     public function getRecensioni():array{
		return $this->recensioni;
	}

     /**
      * Restituisce l'username dell'utente
      * @return String
      */
     public function getUsername():String{
		return $this->username;
	}


     /**
      * Restituisce il nome dell'utente
      * @return String
      */
     public function getNome():String{
		return $this->nome;
	}

     /**
      * Restituisce il cognome dell'utente
      * @return String
      */
     public function getCognome():String{
		return $this->cognome;
	}

     /**
      * Restituisce l'email dell'utente
      * @return String
      */
     public function getEmail():String{
		return $this->email;
	}

     /**
      * Restituisce la password dell'utente
      * @return String
      */
     public function getPassword():String{
		return $this->password;
	}

     /**
      * Restituisce la data dell'utente
      * @return DateTime
      */
     public function getData():DateTime{
		return $this->data;
	}

     /**
      * Restituisce la media delle recensioni dell'utente
      * @return float
      */
     public function getMediaRecensioni():float{
		return $this->mediaRecensioni;
	}


     /**
      * Imposta l'username dell'utente
      * @param String $u
      */
     public function setUsername(String $u):void{
		 $this->username=$u;
	}

	/**
      * Imposta l'array delle recensioni
      * @param array arr
      */
	 public function setRecensioni(array $arr):void{
		 $this->recensioni=$arr;
	}

     /**
      * Imposta il nome dell'utente
      * @param String $n
      */
     public function setNome(String $n):void{
		 $this->nome=$n;
	}

     /**
      * Imposta il cognome dell'utente
      * @param String $c
      */
     public function setCognome(String $c):void{
		 $this->cognome=$c;
	}

     /**
      * Imposta l'email dell'utente
      * @param String $e
      */
     public function setEmail(String $e):void{
		 $this->email=$e;
	}

     /**
      * Imposta la password dell'utente
      * @param String $p
      */
     public function setPassword(String $p):void{
		 $this->password=$p;
	}

     /**
      * Imposta la data dell'utente
      * @param DateTime $d
      */
     public function setData(DateTime $d):void{
		 $this->data=$d;
	}

     /**
      * Imposta la media delle recensioni dell'utente
      * @param float $m
      */
     public function setMediaRecensioni(float $m):void{
		 $this->mediaRecensioni=$m;
	}

     public function calcolaMediaRecensioni():float{
		 $totale=0;
		 $c=0;
         if($this->recensioni!=null) {
             foreach ($this->recensioni as $valore) {
                 if(is_a($valore,ERecensione::class)){//solo se è un' oggetto recensione vado a prendere il voto
                 $totale = $totale + $valore->getVoto();
                 $c++;
             }
             }
         }
		if($c>0){
			return $totale/$c;
		}
		else{
			return 0;
		}
	}

	public function rimuoviGruppo(int $id):bool{
     	foreach($this->listaGruppi as $chiave => $valore){
     		if($id==$valore->getId()){
				unset($this->listaGruppi[$chiave]);
     			return true;
			}
		}
     	return false;
	}

	public function aggiungiGruppo(EGruppo $gruppo):bool{
		try{
			if ($gruppo != null){
				array_push($this->listaGruppi, $gruppo);
				return true;
			}
			else{
				return false;
			}
		}
		catch (Exception $exception){
			echo("Server error");
			return false;
		}
	}

	 /**
	  * Aggiunge la carta di credito passata come parametro alla lista delle carte di credito dell'utente.
	  * Restituisce true se l'operazione è andata a buon fine, false altrimenti.
	  * @param ECartadiCredito $carta
	  * @return bool
	  */
	public function aggiungiCarta(ECartadiCredito $carta):bool
	{
		try
		{
			if($carta != null)
			{
				array_push($this->cartedicredito,$carta);
				return true;
			}
			else {
				return false;
			}
		}
		catch (Exception $exception){
			//Gestione dell'eccezione
			return false;
		}

    }

	 /**
	  * Rimuove la carta di credito passata come parametro alla lista delle carte di credito dell'utente.
	  * Restituisce true se l'operazione è andata a buon fine, false altrimenti.
	  * @param ECartadiCredito $carta
	  * @return bool
	  */
	public function rimuoviCarta(ECartadiCredito $carta):bool
	{
		try
		{
			$numero = $carta ->getNumero();
			foreach($this->cartedicredito as $chiave => $valore)
			{
				if($numero==$valore->getNumero())
				{
					unset($this->cartedicredito[$chiave]);
					return true;
				}
			}
			return false;
		}
		catch(Exception $exception){
			//Errore
			return false;
		}

	}

	 /**
	  * Aggiunge la recensione passata come parametro alla lista delle recensioni dell'utente. Restituisce true se
	  * l'operazione è andata a buon fine, false altrimenti.
	  * @return bool
	  */
	 public function aggiungiRecensione(ERecensione $recensione): bool{

		 try{
			 if ($recensione != null){
				 array_push($this->recensioni, $recensione);
				 return true;
			 }
			 else{
				 return false;
			 }
		 }
		 catch (Exception $exception){
			 //Gestione dell'eccezione
			 return false;
		 }
	 }

	 /**
	  * Rimuove la recensione passata come parametro alla lista delle recensioni dell'utente. Restituisce true se
	  * l'operazione è andata a buon fine, false altrimenti.
	  * @return bool
	  */
	 public function rimuoviRecensione(int $idRecensione): bool{
		 $offset = 0;
		 $found = false;
		 try{
			 foreach($this->recensioni as $recensione)
			 {
				 if($recensione->getId == $idRecensione) {
					 //rimuovi la recensione trovata
					 array_splice($this->recensioni, $offset, 1);
				 }
				 $offset++;
			 }
			 return $found;
		 }
		 catch(Exception $exception){
			 echo("Server error");
			 return false;
		 }
	 }

}

$r1=new ERecensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new ERecensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$arr=array($r1,$r2,$r3);

$carta1 = new ECartadiCredito("0000111122223333","Giorgio","Di Nunzio","222",new DateTime('now'));
$carta2 = new ECartadiCredito("0000111122224444","luca","bo","333",new DateTime('now'));
$carta3 = new ECartadiCredito("0000111122225555","lorenzo","forse","444",new DateTime('now'));
$carta4 = new ECartadiCredito("0000111122226666","franco","ma si","555",new DateTime('now'));

$u=new EUtente("lor","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$arr=array($u);

$c11 = new ECalcioAUndici('c11', 22,44,'Ciao',15);

//print(ECampo.getNome($c11));

$g1 = new EGruppo("Ciao",1,10,11,"forse",new DateTime('now'),$arr,$u,$c11);
$g2 = new EGruppo("izo",1,10,11,"si",new DateTime('now'),$arr,$u,$c11);
$g3 = new EGruppo("Giorgio",1,10,11,"no",new DateTime('now'),$arr,$u,$c11);
$g4 = new EGruppo("Franco",1,10,11,"dino",new DateTime('now'),$arr,$u,$c11);

$u->aggiungiGruppo($g4);
//print(count($u->getGruppo()));
$g=array($g1,$g4,$g3);
$u->setListaGruppi($g);
//print(count($u->getGruppo()));


$u->aggiungiCarta($carta1);
$u->aggiungiCarta($carta2);
$u->aggiungiCarta($carta3);
$u->aggiungiCarta($carta4);
$u->rimuoviCarta($carta2);
//print(count($u->getCartedicredito()));

//$u->setCartedicredito($carta);
//print(count($u->getCartedicredito()));



?>
