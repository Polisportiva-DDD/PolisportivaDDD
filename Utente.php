<?php
 class Utente{
	private string $username;
	private string $nome;
	private string $cognome;
	private string $email;
	private string $password;
	private  DateTime $data;
	private double $mediaRecensioni;

	
	  public function __construct($u,$n,$c,$e,$p,$d,$m){
		$this->username=$n;
        $this->nome=$n;
        $this->cognome=$c;
        $this->email=$e;
		$this->password=$p;
        $this->data=$d;
        $this->mediaRecensioni=$d;
    }
	
	public function getUsername():String{
		return $this->username;
	}
	
	public function getNome():String{
		return $this->nome;
	}
	
	public function getCognome():String{
		return $this->cognome;
	}
	
	public function getEmail():String{
		return $this->email;
	}
	
	public function getPassword():String{
		return $this->password;
	}
	
	public function getData():DateTime{
		return $this->data;
	}
	
	public function getMediaRecensioni():Double{
		return $this->mediaRecensioni;
	}
	
	
	public function setUsername(String $u):void{
		 $this->username=$u;
	}
	
	public function setNome(String $n):void{
		 $this->nome=$n;
	}
	
	public function setCognome(String $c):void{
		 $this->cognome=$c;
	}
	
	public function setEmail(String $e):void{
		 $this->email=$e;
	}
	
	public function setPassword(String $p):void{
		 $this->password=$p;
	}
	
	public function setData(DateTime $d):void{
		 $this->data=$d;
	}
	
	public function setMediaRecensioni(Double $m):void{
		 $this->mediaRecensioni=$m;
	}
	
}
?>