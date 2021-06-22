<?php


class ERecensione
{
    //attributes

    private  $id;
    private  $voto;
    private  $titolo;
    private  $testo;
    private  $data;
    private  $autore;
    private  $possessore;


    /**
     * ERecensione constructor.
     * @param int $id
     * @param int $voto
     * @param string $titolo
     * @param string $testo
     * @param DateTime $data
     * @param EUtente $autore
     * @param EUtente $possessore
     */
    public function __construct(EUtente $autore,int $voto,string $titolo,string $testo,DateTime $data,
                                EUtente $possessore,int $id=-1)
    {
        $this -> id = $id;
        $this -> autore = $autore;
        $this -> voto = $voto;
        $this -> titolo = $titolo;
        $this -> testo = $testo;
        $this -> data = $data;
        $this -> possessore = $possessore;
    }

    //methods

    /**
     * Restituisce chi ha fatto la recensione
     * @return EUtente
     */
    public function getAutore(): EUtente
    {
        return $this->autore;
    }

    /**
     * Restituisce a chi è stata fatta la recensione
     * @return EUtente
     */
    public function getPossessore(): EUtente
    {
        return $this->possessore;
    }

    /**
     * Imposta chi ha fatto la recensione
     * @param EUtente $autore
     */
    public function setAutore(EUtente $autore): void
    {
        $this->autore = $autore;
    }

    /**
     * Imposta a chi è stata fatta la recensione
     * @param EUtente $possessore
     */
    public function setPossessore(EUtente $possessore): void
    {
        $this->possessore = $possessore;
    }

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
     * @return int
     */
    public function getVoto(): int
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