<?php
 class Campo{
	private string $nome;
	private int $numeroMinimo;
	private int $numeroMassimo;
	private string $descrizione;
	private Double $prezzo;
	
	public function __construct($n,$nMin,$nMax,$d,$p){
        $this->nome=$n;
        $this->numeroMinimo=$nMin;
		$this->numeroMassimo=$nMax;
        $this->descrizione=$d;
		$this->prezzo=$p;
    }
	
	public function getNome():String{
		return $this->nome;
	}
	
	public function getNumeroMinimo():int{
		return $this->numeroMinimo;
	}
	
	public function getNumeroMassimo():int{
		return $this->numeroMassimo;
	}
	
	public function getDescrizione():String{
		return $this->descrizione;
	}
	
	public function getPrezzo(Double $p):Double{
		 return $this->prezzo;
	}
	
	
	
	
	public function setNome(string $n):void{
		 $this->nome=$n;
	}
	
	public function setNumeroMinimo(int $nMin):void{
		this->numeroMinimo=$nMin;
	}
	public function setNumeroMassimo(int $nMax):void{
		this->numeroMassimo=$nMax;
	}
	
	public function setDescrizione(string $d):void{
		 $this->descrizione=$d;
	}
	
	public function setPrezzo(Double $p):void{
		 $this->prezzo=$p;
	}
	
}
?>