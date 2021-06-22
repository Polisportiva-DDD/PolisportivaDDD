<?php
//include "EUtente.php";
//include "ECampo.php";
//include "ERecensione.php";

class EGruppo
{
    private  $id;
    private  $nome;
    private  $etaMinima;
    private  $etaMassima;
    private  $votoMinimo;
    private  $descrizione;
    private  $dataEOra;
    private $partecipanti;
    private  $admin;
    private  $campo;

    /**
     * EGruppo constructor.
     * @param int|null $id
     * @param String $nome
     * @param int $etaMinima
     * @param int $etaMassima
     * @param float $votoMinimo
     * @param String $descrizione
     * @param DateTime $dataEOra
     * @param array $partecipanti
     * @param EUtente $admin
     * @param ECampo $campo
     */
    public function __construct(?int $id, string $nome, int $etaMinima,
                                int $etaMassima, float $votoMinimo, string $descrizione,
                                DateTime $dataEOra, array $partecipanti,
                                EUtente $admin, ECampo $campo)
    {
        $this->id = $id;
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
     * @return EUtente
     */
    public function getAdmin(): EUtente
    {
        return $this->admin;
    }

    /**
     * @param EUtente $admin
     */
    public function setAdmin(EUtente $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @return ECampo
     */
    public function getCampo(): ECampo
    {
        return $this->campo;
    }

    /**
     * @param ECampo $campo
     */
    public function setCampo(ECampo $campo): void
    {
        $this->campo = $campo;
    }



    /**
     * Aggiunge un partecipante al gruppo
     * @param EUtente $utente
     * @return bool
     */
    /*
    public function aggiungiPartecipante(EUtente $utente): bool{

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
    }*/

    /**
     * Restituisce true se il gruppo è al completo, false altrimenti
     * @return bool
     */
    public function isPieno(): bool{
        $numeroMaxPartecipanti = $this->campo->getNumeroMassimo();

        //Se il gruppo è già al completo restituisci false
        $numeroPartecipanti = count($this->partecipanti);
        if ($numeroPartecipanti == $numeroMaxPartecipanti){
            return true;
        }
        else return false;
    }

    /**
     * Rimuove un partecipante dal gruppo
     * @param EUtente $utente
     * @return bool
     */
    public function rimuoviPartecipante(EUtente $utente): bool{
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

    public function hasPartecipante($username): bool
    {
        $pm = new FPersistentManager();
        $utente = $pm->load($username, 'FUtente');
        return in_array($utente, $this->partecipanti);
    }

    /**
     * Funzione che verifica se un utente può partecipare o meno al gruppo, true in caso affermativo, false altrimenti
     * @param $utente
     * @return bool
     */
    public function verificaCondizioni($utente): bool{
        $etaUtente = $utente->getEta();
        $pm = new FPersistentManager();
        $recensioni = $pm->loadRecensioniUtente($utente->getUsername());
        $val = round($utente->calcolaMediaRecensioni($recensioni));
        $etaMin = $this->etaMinima;
        $etaMax = $this->etaMassima;
        $valMin = $this->votoMinimo;

        if ($etaMin<=$etaUtente && $etaUtente<=$etaMax && $val>=$valMin){
            return true;
        }
        else{
            return false;
        }
    }

    public function toArray(): array{
        $objArray = array();
        $objArray["id"] = $this->id;
        $objArray["nome"] = $this->nome;
        $objArray["admin"] = $this->admin;
        $objArray["etaMinima"] = $this->etaMinima;
        $objArray["etaMassima"] = $this->etaMassima;
        $objArray["votoMinimo"] = $this->votoMinimo;
        $objArray["descrizione"] = $this->descrizione;
        $objArray["dataEOra"] = $this->dataEOra;
        $objArray["partecipanti"] = $this->partecipanti;
        $objArray["campo"] = $this->campo;
        return $objArray;
    }

    public function getPostiDisponibili(): int
    {
        $postiOccupati = count($this->partecipanti);
        $postiMassimi = $this->getCampo()->getNumeroMassimo();
        return $postiMassimi - $postiOccupati;
    }




}
/*
$r1=new ERecensione(1,2.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r2=new ERecensione(1,4.4,"Natale","ciao",new DateTime("2011-01-01T15:03:01.012345Z"));
$r3=4;
$arr=array($r1,$r2,$r3);
$u=new EUtente("lor","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$u1=new EUtente("lor1","lorenzo","Diella","ccc","pass",new DateTime("2012-01-01T15:03:01.012345Z"),$arr);
$arr=array($u,$u1);
$c=new ECampo("c5", 5,6,"Ciao",1.5);
$g1 = new EGruppo("Ciao",1,10,11,"forse",new DateTime('now'),$arr,$u,$c);
print(count($g1->getPartecipanti()));

$g1->rimuoviPartecipante($u1);
print(count($g1->getPartecipanti()));
*/
?>