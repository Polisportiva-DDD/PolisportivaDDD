<?php


class CartadiCredito
{
    //attributes

    private string $numero;
    private string $nome_titolare;
    private string $cognome_titolare;
    private string $CVC;
    private DateTime $scadenza;

    //constructors

    public function __construct(string $numero,string $nome_titolare,string $cognome_titolare,string $CVC,DateTime $scadenza)
    {
        $this -> numero = $numero;
        $this -> nome_titolare = $nome_titolare;
        $this -> cognome_titolare = $cognome_titolare;
        $this -> CVC = $CVC;
        $this -> scadenza = $scadenza;
    }

    //methods

    /**
     * Restituisce il numero della carta di credito
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Restituisce il nome del titolare della carta di credito
     * @return string
     */
    public function getNomeTitolare(): string
    {
        return $this->nome_titolare;
    }

    /**
     * Restituisce il cognome del titolare della carta di credito
     * @return string
     */
    public function getCognomeTitolare(): string
    {
        return $this->cognome_titolare;
    }

    /**
     * Restituisce il codice di sicurezza della carta di credito
     * @return string
     */
    public function getCVC(): string
    {
        return $this->CVC;
    }

    /**
     * Restituisce la data di scadenza della carta di credito
     * @return DateTime
     */
    public function getScadenza(): DateTime
    {
        return $this->scadenza;
    }

    /**
     * Imposta il numero della carta di credito
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * Imposta il nome del titolare della carta di credito
     * @param string $nome_titolare
     */
    public function setNomeTitolare(string $nome_titolare): void
    {
        $this->nome_titolare = $nome_titolare;
    }

    /**
     * Imposta il cognome del titolare della carta di credito
     * @param string $cognome_titolare
     */
    public function setCognomeTitolare(string $cognome_titolare): void
    {
        $this->cognome_titolare = $cognome_titolare;
    }

    /**
     * Imposta il codice di sicurezza della carta di credito
     * @param string $CVC
     */
    public function setCVC(string $CVC): void
    {
        $this->CVC = $CVC;
    }

    /**
     * Imposta la data di scadenza della carta di credito
     * @param DateTime $scadenza
     */
    public function setScadenza(DateTime $scadenza): void
    {
        $this->scadenza = $scadenza;
    }
}