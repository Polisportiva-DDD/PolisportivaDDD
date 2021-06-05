<?php

require_once '../Utility/autoload.php';

class ECampiWallet
{


    private int $gettoni;
    private ECampo $campo;
    private EWallet $wallet;


    public function __construct($gettoni, ECampo $campo,EWallet $wallet)
    {
        $this->gettoni = $gettoni;
        $this->campo = $campo;
        $this->wallet = $wallet;
    }

    /**
     * @return EWallet
     */
    public function getWallet(): EWallet
    {
        return $this->wallet;
    }

    /**
     * @param EWallet $wallet
     */
    public function setWallet(EWallet $wallet): void
    {
        $this->wallet = $wallet;
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
    }


    public function rimuoviGettoni( int $quantita):bool
    {
        $this->gettoni-=$quantita;

    }

}

