<?php


class ETicketAssistenza
{
    private int $id;
    private String $oggetto;
    private String $messaggio;
    private DateTime $data;
    private string $autore;

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
     * @return EUtente
     */
    public function getAutore(): string
    {
        return $this->autore;
    }

    /**
     * @param EUtente $autore
     */
    public function setAutore(string $autore): void
    {
        $this->autore = $autore;
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
    public function getOggetto(): string
    {
        return $this->oggetto;
    }

    /**
     * @param String $oggetto
     */
    public function setOggetto(string $oggetto): void
    {
        $this->oggetto = $oggetto;
    }

    /**
     * @return String
     */
    public function getMessaggio(): string
    {
        return $this->messaggio;
    }

    /**
     * @param String $messaggio
     */
    public function setMessaggio(string $messaggio): void
    {
        $this->messaggio = $messaggio;
    }

    /**
     * @return DateTime
     */
    public function getData(): DateTime
    {
        return $this->data;
    }

    /**
     * @param DateTime $data
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }



}