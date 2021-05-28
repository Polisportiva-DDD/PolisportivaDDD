<?php
 Interface ECampo{


     public function __construct($id, $n, $nMin, $nMax, $d, $p);

     /**
      * Restituisce il nome del campo
      * @return String
      */
     public function getNome():String;

     /**
      * Restituisce il numero minimo di giocatori del campo
      * @return int
      */
     public function getNumeroMinimo():int;

     /**
      * Restituisce il numero massimo di giocatori del campo
      * @return int
      */
     public function getNumeroMassimo():int;

     /**
      * Restituisce la descrizione del campo
      * @return String
      */
     public function getDescrizione():String;

     /**
      * Restituisce il prezzo del campo
      * @param float $p
      * @return float
      */
     public function getPrezzo(float $p):float;


     /**
      * Imposta il nome del campo
      * @param string $n
      */
     public function setNome(string $n):void;

     /**
      * Imposta il numero minimo di giocatori del campo
      * @param int $nMin
      */
     public function setNumeroMinimo(int $nMin):void;

     /**
      * Imposta il numero massimo di giocatori del campo
      * @param int $nMax
      */
     public function setNumeroMassimo(int $nMax):void;

     /**
      * Imposta la descrizione del campo
      * @param string $d
      */
     public function setDescrizione(string $d):void;

     /**
      * Imposta il prezzo del campo
      * @param float $p
      */
     public function setPrezzo(float $p):void;
	
}
