<?php

//require_once '../Utility/autoload.php';

class ECampiWallet
{


    private  $gettoni;
    private  $campo;

    /**
     * ECampiWallet constructor.
     * @param $gettoni
     * @param ECampo $campo
     */
    public function __construct($gettoni, ECampo $campo)
    {
        $this->gettoni = $gettoni;
        $this->campo = $campo;

    }



    /**
     * Imposta la quantità dei gettoni dei rispettivi campi.
     * @param int $gettoni
     */
    public function setGettoni(int $gettoni): void
    {
        $this->gettoni = $gettoni;
    }

    /**
     * Imposta il campo.
     * @param ECampo $campo
     */
    public function setCampo(ECampo $campo): void
    {
        $this->campo = $campo;
    }

    /**
     * Restituisce la quantità dei gettoni dei rispettivi campi.
     * @return int
     */
    public function getGettoni(): int
    {
        return $this->gettoni;
    }

    /**
     * Restituisce il campo.
     * @return ECampo
     */
    public function getCampo(): ECampo
    {
        return $this->campo;
    }



}

