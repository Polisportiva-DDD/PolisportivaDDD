<?php


class ERecensione
{
    //attributes

    private int $id;
    private float $voto;
    private string $titolo;
    private string $testo;
    private DateTime $data;

    //constructors

    public function __construct(int $id,float $voto,string $titolo,string $testo,DateTime $data)
    {
        $this -> id = $id;
        $this -> voto = $voto;
        $this -> titolo = $titolo;
        $this -> testo = $testo;
        $this -> data = $data;
    }

    //methods

    /**
     * Restituisce l'ID della recensione
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Restituisce il voto della recensione
     * @return float
     */
    public function getVoto(): float
    {
        return $this->voto;
    }

    /**
     * Restituisce il titolo della recensione
     * @return string
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * Restituisce il testo della recensione
     * @return string
     */
    public function getTesto(): string
    {
        return $this->testo;
    }

    /**
     * Restituisce la data della recensione
     * @return DateTime
     */
    public function getData(): DateTime
    {
        return $this->data;
    }

    /**
     * Imposta l'ID della recensione
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Imposta il voto della recensione
     * @param float $voto
     */
    public function setVoto(float $voto): void
    {
        $this->voto = $voto;
    }

    /**
     * Imposta il titolo della recensione
     * @param string $titolo
     */
    public function setTitolo(string $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * Imposta il testo della recensione
     * @param string $testo
     */
    public function setTesto(string $testo): void
    {
        $this->testo = $testo;
    }

    /**
     * Imposta la data della recensione
     * @param DateTime $data
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }
}