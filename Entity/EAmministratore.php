<?php


class EAmministratore extends EUtente
{


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