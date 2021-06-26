<?php

//require_once '../Utility/autoload.php';

class EWallet
{
    //attributes

    private  $id;
    private $listaCampiWallet;

    /**
     * EWallet constructor.
     * @param array $listaCampiWallet
     * @param int $id
     */
    public function __construct(array $listaCampiWallet,int $id=-1)
    {
        $this -> id=$id;
        $this -> listaCampiWallet = $listaCampiWallet;

    }


    /**
     * Restituisce la listaCampiWallet
     * @return array
     */
    public function getListaCampiWallet(): array
    {
        return $this->listaCampiWallet;
    }

    /**
     * Setta l'array listaCampiWallet
     * @param array $listaCampiWallet
     */
    public function setListaCampiWallet(array $listaCampiWallet): void
    {
        $this->listaCampiWallet = $listaCampiWallet;
    }



    /**
     * Restituisce id wallet
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * setta l'id del wallet
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * Funzione che permette di aggiungere gettoni relativamente al campo passato
     * @param ECampo $campo campo a cui vanno aggiunti i gettoni
     * @param int $quantita gettoni da aggiungere
     * @return bool
     */
    public function aggiungiGettoni(ECampo $campo, int $quantita):bool
    {
        foreach ($this->listaCampiWallet as $valore){
            if($valore->getCampo()->getId()==$campo->getId()){
                $g=$valore->getGettoni();
                $g+=$quantita;
                $valore->setGettoni($g);
                return true;
            }
        }
        return false;
    }


    /**
     * Funzione che permette di rimuovere gettoni relativamente al campo passato
     * @param ECampo $campo campo a cui vanno rimossi i gettoni
     * @param int $quantita gettoni da rimuovere
     * @return bool
     */
    public function rimuoviGettoni(ECampo $campo, int $quantita):bool
    {
        foreach ($this->listaCampiWallet as $valore){
            if($valore->getCampo()->getId()==$campo->getId()){
                $g=$valore->getGettoni();
                if($g >= $quantita){
                    $g-=$quantita;
                    $valore->setGettoni($g);
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        return false;
    }

}

