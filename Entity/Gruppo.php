<?php


class Gruppo
{
    private int $id;
    private String $nome;
    private int $etaMinima;
    private int $etaMassima;
    private float $votoMinimo;
    private String $descrizione;
    private DateTime $dataEOra;
    private array $partecipanti;
    private Utente $admin;
    private Campo $campo;

    /**
     * Gruppo constructor.
     * @param String $nome
     * @param int $etaMinima
     * @param int $etaMassima
     * @param float $votoMinimo
     * @param String $descrizione
     * @param DateTime $dataEOra
     * @param array $partecipanti
     * @param Utente $admin
     * @param Campo $campo
     */
    public function __construct(string $nome, int $etaMinima,
                                int $etaMassima, float $votoMinimo, string $descrizione,
                                DateTime $dataEOra, array $partecipanti,
                                Utente $admin, Campo $campo)
    {
        $this->nome = $nome;
        $this->etaMinima = $etaMinima;
        $this->etaMassima = $etaMassima;
        $this->votoMinimo = $votoMinimo;
        $this->descrizione = $descrizione;
        $this->dataEOra = $dataEOra;
        $this->partecipanti = $partecipanti;
        $this->admin = $admin;
        $this->campo = $campo;
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

    /**
     * @return String
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getEtaMinima(): int
    {
        return $this->etaMinima;
    }

    /**
     * @param int $etaMinima
     */
    public function setEtaMinima(int $etaMinima): void
    {
        $this->etaMinima = $etaMinima;
    }

    /**
     * @return int
     */
    public function getEtaMassima(): int
    {
        return $this->etaMassima;
    }

    /**
     * @param int $etaMassima
     */
    public function setEtaMassima(int $etaMassima): void
    {
        $this->etaMassima = $etaMassima;
    }

    /**
     * @return float
     */
    public function getVotoMinimo(): float
    {
        return $this->votoMinimo;
    }

    /**
     * @param float $votoMinimo
     */
    public function setVotoMinimo(float $votoMinimo): void
    {
        $this->votoMinimo = $votoMinimo;
    }

    /**
     * @return String
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param String $descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return DateTime
     */
    public function getDataEOra(): DateTime
    {
        return $this->dataEOra;
    }

    /**
     * @param DateTime $dataEOra
     */
    public function setDataEOra(DateTime $dataEOra): void
    {
        $this->dataEOra = $dataEOra;
    }

    /**
     * @return array
     */
    public function getPartecipanti(): array
    {
        return $this->partecipanti;
    }

    /**
     * @param array $partecipanti
     */
    public function setPartecipanti(array $partecipanti): void
    {
        $this->partecipanti = $partecipanti;
    }

    /**
     * @return Utente
     */
    public function getAdmin(): Utente
    {
        return $this->admin;
    }

    /**
     * @param Utente $admin
     */
    public function setAdmin(Utente $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @return Campo
     */
    public function getCampo(): Campo
    {
        return $this->campo;
    }

    /**
     * @param Campo $campo
     */
    public function setCampo(Campo $campo): void
    {
        $this->campo = $campo;
    }

    public function aggiungiPartecipante(Utente $utente): bool{

        $numeroMaxPartecipanti = $this->campo->getNumeroMassimo();

        //Se il gruppo è già al completo restituisci false
        $numeroPartecipanti = count($this->partecipanti);

        if ($numeroPartecipanti == $numeroMaxPartecipanti){
            return false;
        }

        else{
            array_push($this->partecipanti, $utente);
            return true;
        }
    }

    public function rimuoviPartecipante(Utente $utente): bool{
        //Da implementare
    }

    public function isPronto(): bool{
        //Da implementare
    }




}