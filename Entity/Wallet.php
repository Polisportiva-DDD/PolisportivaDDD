<?php


class Wallet
{
    //attributes

    private int $id;
    private array $gettoni = array();

    //constructor

    public function __construct(array $gettoni)
    {
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

    public function aggiungiGettoni(string $key, int $quantita):bool
    {
        try
        {
            if($key != null && $quantita != null)
            {
                $this -> gettoni[$key] = $quantita;
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $exception){
            //Gestione dell'eccezione
            return false;
        }
    }

    public function aggiungiGettoni2(Campo $campo, int $quantita):bool
    {
        try
        {

            if($campo != null && $quantita != null)
            {
                $nomecampo = $campo -> getNome();
                $this -> gettoni[$nomecampo] = $quantita;
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $exception){
            //Gestione dell'eccezione
            return false;
        }
    }

    public function rimuoviGettoni(string $key, int $quantita):bool
    {
        //da completare
    }
}