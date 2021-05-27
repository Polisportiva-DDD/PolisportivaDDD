<?php


class EAmministratore extends EUtente
{

    public function bandisci(EUtente $utente): bool{
        //Da implementare
    }

    public function rimuoviBan(EUtente $utente): bool{
        //Da implementare
    }

    public function rispondiSegnalazione(ETicketAssistenza $ticketAssistenza): bool{
        //Da implementare
    }

    public function aggiungiGettoni(array $quantita, EWallet $wallet): bool {
        //Da implementare
    }

    public function eliminaRecensione(ERecensione $recensione): bool{
        //Da implementare
    }

    public function eliminaGruppo(EGruppo $gruppo): bool{
        //Da implementare
    }

    public function modificaPrezzo(ECampo $campo, float $prezzo): bool{
        //Da implementare
    }
}