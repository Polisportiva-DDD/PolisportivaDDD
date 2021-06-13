<?php

//require_once '../Utility/autoload.php';

class ECampiWallet
{


    private int $gettoni;
    private ECampo $campo;


    public function __construct($gettoni, ECampo $campo)
    {
        $this->gettoni = $gettoni;
        $this->campo = $campo;

    }



    /**
     * @param int $gettoni
     */
    public function setGettoni(int $gettoni): void
    {
        $this->gettoni = $gettoni;
    }

    /**
     * @param ECampo $campo
     */
    public function setCampo(ECampo $campo): void
    {
        $this->campo = $campo;
    }

    /**
     * @return int
     */
    public function getGettoni(): int
    {
        return $this->gettoni;
    }

    /**
     * @return ECampo
     */
    public function getCampo(): ECampo
    {
        return $this->campo;
    }

    public function aggiungiGettoni( int $quantita):bool
    {
      $this->gettoni+=$quantita;
      return true;
    }


    public function rimuoviGettoni( int $quantita):bool
    {
        if ($this->gettoni < $quantita){
            return false;
        }
        else{
            $this->gettoni-=$quantita;
            return true;
        }
    }

}

