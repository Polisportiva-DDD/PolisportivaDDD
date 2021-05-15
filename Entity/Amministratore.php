<?php


class Amministratore extends Utente
{

    public function bandisci(Utente $utente): bool{
        //Da implementare
    }

    public function rimuoviBan(Utente $utente): bool{
        //Da implementare
    }

    public function rispondiSegnalazione(TicketAssistenza $ticketAssistenza): bool{
        //Da implementare
    }

    public function aggiungiGettoni(array $quantita, Wallet $wallet): bool {
        //Da implementare
    }

    public function eliminaRecensione(Recensione $recensione): bool{
        //Da implementare
    }

    public function eliminaGruppo(Gruppo $gruppo): bool{
        //Da implementare
    }

    public function modificaPrezzo(Campo $campo, float $prezzo): bool{
        //Da implementare
    }
}