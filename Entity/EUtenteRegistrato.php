<?php

 class EUtenteRegistrato extends EUtente {

	private bool $bannato=false;
	private string $motivazione="";



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
	  * @return string
	  */
	 public function getBannato(): bool
	 {
		 return $this->bannato;
	 }

	 /**
	  * @param string $bannato
	  */
	 public function setBannato(bool $bannato): void
	 {
		 $this->bannato = $bannato;
	 }

	 /**
	  * @return string
	  */
	 public function getMotivazione(): string
	 {
		 return $this->motivazione;
	 }

	 /**
	  * @param string $motivazione
	  */
	 public function setMotivazione(string $motivazione): void
	 {
		 $this->motivazione = $motivazione;
	 }




}


?>
