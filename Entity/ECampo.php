<?php
 Interface ECampo{

     /**
      * ECampo constructor.
      * @param $id
      * @param $n
      * @param $nMax
      * @param $d
      * @param $p
      * @param $immagine
      */
     public function __construct($id, $n, $nMax, $d, $p, $immagine);

     /**
      * Restituisce il nome del campo
      * @return String
      */
     public function getNome():String;


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
      * @return float
      */
     public function getPrezzo():float;

     /**
      * Restituisce l'id del campo
      * @return int
      */
     public function getId(): int;


     /**
      * Imposta il nome del campo
      * @param string $n
      */
     public function setNome(string $n):void;


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

     /**
      * Imposta l'id del campo
      * @param int $id
      */
     public function setId(int $id): void;

     /**
      * Restituisce l'immagine del campo.
      * @return string
      */
     public function getImmagine(): string;

     /**
      * Imposta l'immagine del campo.
      * @param string $immagine
      */
     public function setImmagine(string $immagine): void;
}
