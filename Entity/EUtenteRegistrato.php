<?php

 class EUtenteRegistrato extends EUtente {

	private $bannato;
	private $motivazione;


	 /**
	  * EUtenteRegistrato constructor.
	  * @param bool $bannato
	  * @param String $motivazione
	  * @param String $username
	  * @param String $nome
	  * @param String $cognome
	  * @param String $email
	  * @param String $password
	  * @param DateTime $dataDiNascita
	  * @param String $immagine
	  * @param EWallet $wallet
	  */
	  public function __construct(bool $bannato,String $motivazione,String $username,String $nome,
								  String $cognome,String $email,
								  String $password, DateTime $dataDiNascita,String $immagine,EWallet $wallet){

	  	parent::__construct( $username, $nome,
								   $cognome, $email,
								   $password,  $dataDiNascita, $immagine,$wallet);
        $this->motivazione=$motivazione;
        $this->bannato=$bannato;


    }

	 /**
	  * Restituisce true se l'utente è bannato, false altrimenti.
	  * @return bool
	  */
	 public function getBannato(): bool
	 {
		 return $this->bannato;
	 }

	 /**
	  * Imposta true se l'utente è bannato, false altrimenti.
	  * @param bool $bannato
	  */
	 public function setBannato(bool $bannato): void
	 {
		 $this->bannato = $bannato;
	 }

	 /**
	  * Restituisce la motivazione del ban.
	  * @return string
	  */
	 public function getMotivazione(): string
	 {
		 return $this->motivazione;
	 }

	 /**
	  * Imposta la motivazione del ban.
	  * @param string $motivazione
	  */
	 public function setMotivazione(string $motivazione): void
	 {
		 $this->motivazione = $motivazione;
	 }




}


?>
