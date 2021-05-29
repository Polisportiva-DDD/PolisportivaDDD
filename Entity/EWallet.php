<?php


class EWallet
{
    //attributes

    private int $id;
    private array $gettoni = array();

    //constructor

    public function __construct(array $gettoni,int $id=-1)
    {
        $this -> id=$id;
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



    public function aggiungiGettoni(ECampo $campo, int $quantita):bool
    {
        try
        {

            if($campo != null && $quantita != null)
            {
                $idcampo = $campo -> getId();
                $this -> gettoni[$idcampo] += $quantita;
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $exception){
            return false;
        }
    }


    public function rimuoviGettoni(ECampo $campo, int $quantita):bool
    {
        try
        {

            if($campo != null && $quantita != null)
            {
                $idcampo = $campo -> getId();
                $this -> gettoni[$idcampo] -=  $quantita;//sottrago la quantita di gettoni relativa a quel campo
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $exception){
            return false;
        }
    }

}

