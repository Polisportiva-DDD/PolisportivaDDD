<?php
//include "Utente.php";
//include "Campo.php";
//include "Recensione.php";

class EGruppo
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
     * EGruppo constructor.
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
        foreach($this->partecipanti as $chiave => $valore){
            if($utente->getUsername()==$valore->getUsername()){
                unset($this->partecipanti[$chiave]);
                return true;
            }
        }
        return false;
    }

    /**
     * Controlla se il gruppo rispetta il numero minimo di partecipanti per poter giocare
     * @return bool
     */
    public function isPronto(): bool{
        try {
            $numeroMinimo = $this->campo->getNumeroMinimo();
            $numeroPartecipanti = count($this->partecipanti);
            if ($numeroPartecipanti >= $numeroMinimo) {
                return true;
            } else {
                return false;
            }
        }
        catch(Exception $e){
            echo("Server error");
            return false;
        }

    }




}
/*
$r1=new Recensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new Recensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$arr=array($r1,$r2,$r3);
$u=new Utente("lor","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$u1=new Utente("lor1","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$arr=array($u,$u1);
$c=new Campo("c5", 5,6,"Ciao",1.5);
$g1 = new EGruppo("Ciao",1,10,11,"forse",new DateTime('now'),$arr,$u,$c);
print(count($g1->getPartecipanti()));

$g1->rimuoviPartecipante($u1);
print(count($g1->getPartecipanti()));
*/
?>