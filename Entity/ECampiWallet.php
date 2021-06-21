<?php

//require_once '../Utility/autoload.php';

class ECampiWallet
{


    private  $gettoni;
    private  $campo;


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



}

