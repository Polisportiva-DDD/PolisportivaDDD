<?php


class ECalcioAOtto implements ECampo
{

    private int $id;
    private string $nome;
    private int $numeroMinimo;
    private int $numeroMassimo;
    private string $descrizione;
    private float $prezzo;
    private string $immagine;

    public function __construct($id, $n, $nMin, $nMax, $d, $p, $immagine)
    {
        $this->id=$id;
        $this->nome=$n;
        $this->numeroMinimo=$nMin;
        $this->numeroMassimo=$nMax;
        $this->descrizione=$d;
        $this->prezzo=$p;
        $this->immagine=$immagine;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Restituisce il nome del campo
     * @return String
     */
    public function getNome():String{
        return $this->nome;
    }

    /**
     * Restituisce il numero minimo di giocatori del campo
     * @return int
     */
    public function getNumeroMinimo():int{
        return $this->numeroMinimo;
    }

    /**
     * Restituisce il numero massimo di giocatori del campo
     * @return int
     */
    public function getNumeroMassimo():int{
        return $this->numeroMassimo;
    }

    /**
     * Restituisce la descrizione del campo
     * @return String
     */
    public function getDescrizione():String{
        return $this->descrizione;
    }

    /**
     * Restituisce il prezzo del campo
     * @param float $p
     * @return float
     */
    public function getPrezzo():float{
        return $this->prezzo;
    }


    /**
     * Imposta il nome del campo
     * @param string $n
     */
    public function setNome(string $n):void{
        $this->nome=$n;
    }

    /**
     * Imposta il numero minimo di giocatori del campo
     * @param int $nMin
     */
    public function setNumeroMinimo(int $nMin):void{
        $this->numeroMinimo=$nMin;
    }

    /**
     * Imposta il numero massimo di giocatori del campo
     * @param int $nMax
     */
    public function setNumeroMassimo(int $nMax):void{
        $this->numeroMassimo=$nMax;
    }

    /**
     * Imposta la descrizione del campo
     * @param string $d
     */
    public function setDescrizione(string $d):void{
        $this->descrizione=$d;
    }

    /**
     * Imposta il prezzo del campo
     * @param float $p
     */
    public function setPrezzo(float $p):void{
        $this->prezzo=$p;
    }

    public function getImmagine(): string
    {
        return $this->immagine;
    }

    public function setImmagine(string $immagine): void
    {
        $this->immagine=$immagine;
    }
}