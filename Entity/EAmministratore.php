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



    public function modificaPrezzo(ECampo $campo, float $prezzo): bool{
        //Da implementare 1123

    }

    public function RimborsaGruppo(array $partecipanti, ECampo $campo): bool{
        $pm = FPersistentManager::getInstance();
        if($partecipanti) {
            foreach ($partecipanti as $partecipante) {
                $wallet = $partecipante->getWallet();
                $wallet->aggiungiGettoni($campo, 1);
                $pm->update($wallet);
                return true;
            }
        }
        else return false;

    }
}