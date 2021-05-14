<?php


class Wallet
{
    //attributes

    private int $id;
    private array $gettoni;

    //constructor

    public function __construct(int $id,array $gettoni)
    {
        $this -> id = $id;
        $this -> gettoni = $gettoni;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getGettoni(): array
    {
        return $this->gettoni;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param array $gettoni
     */
    public function setGettoni(array $gettoni): void
    {
        $this->gettoni = $gettoni;
    }

    public function aggiungiGettoni(string $key, int $quantita)
    {

    }

    public function rimuoviGettoni(string $key, int $quantita)
    {

    }
}