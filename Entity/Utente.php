<?php
include "Campo.php";
include "Gruppo.php";
include "CartadiCredito.php";
include "Recensione.php";
 class Utente{
	private string $username;
	private string $nome;
	private string $cognome;
	private string $email;
	private string $password;
	private DateTime $data;
	private float $mediaRecensioni;
	private array  $recensioni=array() ;
	private CartadiCredito $carta;
	private array $cartedicredito;
	private array $gruppo=array();

	 /**
	  * @return array
	  */
	 public function getGruppo(): array
	 {
		 return $this->gruppo;
	 }

	 /**
	  * @param array $gruppo
	  */
	 public function setGruppo(array $gruppo): void
	 {
		 $this->gruppo = $gruppo;
	 }


	  public function __construct(String $username,String $nome,
								  String $cognome,String $email,
								  String $password,DateTime $dataDiNascita,
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
                 if(is_a($valore,Recensione::class)){//solo se è un' oggetto recensione vado a prendere il voto
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
     	foreach($this->gruppo as $chiave => $valore){
     		if($id==$valore->getId()){
				unset($this->gruppo[$chiave]);
     			return true;
			}
		}
     	return false;
	}

	public function aggiungiGruppo(Gruppo $gruppo):bool{
			array_push($this->gruppo, $gruppo);
     	return true;
	}

	public function aggiungiCarta(CartadiCredito $carta):bool{
        if($carta!=null){
        	$numerocarta = $this -> carta -> getNumero();
        	foreach ($this->cartedicredito as $valore){
        		if(is_a($valore, CartadiCredito::class)){
					if($numerocarta!=($valore->getNumero())){
						array_push($this->cartedicredito,$carta);
						return true;
					}
					else{
						return false;
					}
				}
        		else{
        			return false;
				}
			}
		}
        else{
        	return false;
		}
    }

	public function rimuoviCarta(CartadiCredito $carta)
	{
		//da completare
	}

	 /**
	  * Aggiunge la recensione passata come parametro alla lista delle recensioni dell'utente. Restituisce true se
	  * l'operazione è andata a buon fine, false altrimenti.
	  * @return bool
	  */
	 public function aggiungiRecensione(Recensione $recensione): bool{

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
			 //Errore
			 return false;
		 }
	 }

}

$r1=new Recensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new Recensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$arr=array($r1,$r2,$r3);

$u=new Utente("lor","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$arr=array($u);
$c=new Campo("c5", 5,6,"Ciao",1.5);
$g1=new Gruppo(1,"g",10,11,4,"ciao",new DateTime("2011-01-01T15:03:01.012345Z"),$arr,$u,$c);
$g2=new Gruppo(2,"g",10,11,4,"ciao",new DateTime("2011-01-01T15:03:01.012345Z"),$arr,$u,$c);
$g3=new Gruppo(3,"g",10,11,4,"ciao",new DateTime("2011-01-01T15:03:01.012345Z"),$arr,$u,$c);
$g4=new Gruppo(4,"g",10,11,4,"ciao",new DateTime("2011-01-01T15:03:01.012345Z"),$arr,$u,$c);

$u->aggiungiGruppo($g4);
//print(count($u->getGruppo()));
$g=array($g1,$g4,$g3);
$u->setGruppo($g);

print(count($u->getGruppo()));

?>
