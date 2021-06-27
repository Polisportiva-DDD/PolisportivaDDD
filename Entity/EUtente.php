<?php
//require_once '../Utility/autoload.php';

 class EUtente{
	private  $username;
	private  $nome;
	private  $cognome;
	private  $email;
	private  $password;
	private  $dataDiNascita;
	private  $immagine;
	private  $cartedicredito=array();
	private  $listaGruppi = array();
	private  $wallet ;


	 /**
	  * EUtente constructor.
	  * @param String $username
	  * @param String $nome
	  * @param String $cognome
	  * @param String $email
	  * @param String $password
	  * @param DateTime $dataDiNascita
	  * @param String $immagine
	  * @param EWallet $wallet
	  */
	 public function __construct(String $username, String $nome,
								 String $cognome, String $email,
								 String $password, DateTime $dataDiNascita, String $immagine, EWallet $wallet){
		$this->username=$username;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
		$this->password=$password;
        $this->dataDiNascita=$dataDiNascita;
        $this->immagine=$immagine;
        $this->wallet=$wallet;

    }

	 /**
	  * @return EWallet
	  */
	 public function getWallet(): EWallet
	 {
		 return $this->wallet;
	 }

	 /**
	  * @param EWallet $wallet
	  */
	 public function setWallet(EWallet $wallet): void
	 {
		 $this->wallet = $wallet;
	 }

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

	 /**
	  * @return string
	  */
	 public function getImmagine(): string
	 {
		 return $this->immagine;
	 }

	 /**
	  * @param string $immagine
	  */
	 public function setImmagine(string $immagine): void
	 {
		 $this->immagine = $immagine;
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
     public function getDataDiNascita():DateTime{
		return $this->dataDiNascita;
	}


     /**
      * Imposta l'username dell'utente
      * @param String $u
      */
     public function setUsername(String $u):void{
		 $this->username=$u;
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
     public function setDataDiNascita(DateTime $d):void{
		 $this->dataDiNascita=$d;
	}

	 /**
	  * @param array $recensioni
	  * @return float
	  */
	 public function calcolaMediaRecensioni(array $recensioni):float{
		 $totale=0;
		 $c=0;
         if($recensioni!=null) {
             foreach ($recensioni as $valore) {
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

	 /**
	  * Restituisce l'età dell'utente
	  * @return int
	  */
	 public function getEta(): int
	{
		$data=$this->dataDiNascita;
		return  ((new DateTime('now'))->diff($data))->y;
	}

	 /**
	  * Rimuove un gruppo dall'array dei suoi gruppi
	  * @param int $id
	  * @return bool
	  */
	 public function rimuoviGruppo(int $id):bool{
     	foreach($this->listaGruppi as $chiave => $valore){
     		if($id==$valore->getId()){
				unset($this->listaGruppi[$chiave]);
     			return true;
			}
		}
     	return false;
	}

	 /**
	  * Aggiunge un gruppo alla lista dei gruppi dell'utente
	  * @param EGruppo $gruppo gruppo da aggiungere
	  * @return bool true se l'operazione è andata a buon fine, false altrimenti
	  */
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
	 /*
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

    }*/

	 /**
	  * Rimuove la carta di credito passata come parametro alla lista delle carte di credito dell'utente.
	  * Restituisce true se l'operazione è andata a buon fine, false altrimenti.
	  * @param ECartadiCredito $carta
	  * @return bool
	  */
	 /*
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

	}*/

}

?>
