<?php


class EAmministratore extends EUtente
{

    public static  function modificaPrezzo($prezzo,$chiave){
        $pm = FPersistentManager::getInstance();
        $pm->updateCampo($prezzo,$chiave);
    }

    public static function banna($username,$motivazione){
        $pm = FPersistentManager::getInstance();
        $pm->updateUtenteRegistrato($username,true,$motivazione);
    }

    public static function sbanna($username){
        $pm = FPersistentManager::getInstance();
        $pm->updateUtenteRegistrato($username,0,"");
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