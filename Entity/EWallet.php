<?php

require_once '../Utility/autoload.php';

class EWallet
{
    //attributes

    private int $id;
    private array $listaCampiWallet = array();


    public function __construct(array $listaCampiWallet,int $id=-1)
    {
        $this -> id=$id;
        $this -> listaCampiWallet = $listaCampiWallet;

    }


    /**
     * @return array
     */
    public function getListaCampiWallet(): array
    {
        return $this->listaCampiWallet;
    }

    /**
     * @param array $listaCampiWallet
     */
    public function setListaCampiWallet(array $listaCampiWallet): void
    {
        $this->listaCampiWallet = $listaCampiWallet;
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




    public function aggiungiGettoni(ECampo $campo, int $quantita):bool
    {
        foreach ($this->listaCampiWallet as $valore){
            if($valore->getId()==$campo->getId()){
                $valore::aggiungiGettoni($quantita);
                return true;
            }
        }
        return false;
    }


    public function rimuoviGettoni(ECampo $campo, int $quantita):bool
    {
        foreach ($this->listaCampiWallet as $valore){
            if($valore->getId()==$campo->getId()){
                $valore::aggiungiGettoni($quantita);
                return true;
            }
        }
        return false;
    }

}

