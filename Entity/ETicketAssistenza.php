<?php


class ETicketAssistenza
{
    private  $id;
    private  $oggetto;
    private  $messaggio;
    private  $data;
    private  $autore;

    /**
     * TicketAssistenza constructor.
     * @param int $id
     * @param String $oggetto
     * @param String $messaggio
     * @param DateTime $data
     *  @param String $a
     */
    public function __construct(string $a,string $messaggio, string $oggetto,DateTime $data,int $id=-1 )
    {
        $this->id = $id;
        $this->oggetto = $oggetto;
        $this->messaggio = $messaggio;
        $this->data = $data;
        $this->autore=$a;
    }

    /**
     * Restituisce l'autore del ticket di assistenza.
     * @return string
     */
    public function getAutore(): string
    {
        return $this->autore;
    }

    /**
     * Imposta l'autore del ticket di assistenza.
     * @param string $autore
     */
    public function setAutore(string $autore): void
    {
        $this->autore = $autore;
    }

    /**
     * Restituisce l'id del ticket di assistenza.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Imposta l'id del ticket di assistenza.
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Restituisce l'oggetto del ticket di assistenza.
     * @return String
     */
    public function getOggetto(): string
    {
        return $this->oggetto;
    }

    /**
     * Imposta l'oggetto del ticket di assistenza.
     * @param String $oggetto
     */
    public function setOggetto(string $oggetto): void
    {
        $this->oggetto = $oggetto;
    }

    /**
     * Restituisce il messaggio del ticket di assistenza.
     * @return String
     */
    public function getMessaggio(): string
    {
        return $this->messaggio;
    }

    /**
     * Imposta il messaggio del ticket di assistenza.
     * @param String $messaggio
     */
    public function setMessaggio(string $messaggio): void
    {
        $this->messaggio = $messaggio;
    }

    /**
     * Restituisce la data del ticket di assistenza.
     * @return DateTime
     */
    public function getData(): DateTime
    {
        return $this->data;
    }

    /**
     * Imposta la data del ticket di assistenza.
     * @param DateTime $data
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }



}