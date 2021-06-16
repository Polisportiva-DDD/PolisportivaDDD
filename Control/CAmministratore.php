<?php

require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CAmministratore
{

    public function __construct(){}


    public function segnalazioni($id=-1){
        $view = new VAmministratore();
        $pm = new FPersistentManager();
        if($id==-1) {
            $segnalazioni = $pm->loadList('FTicketAssistenza');
            $listaSegnalazioni = array();
            foreach ($segnalazioni as $segnalazione) {
                $s = array();
                $s['username'] = $segnalazione->getAutore();
                $s['testoSegnalazione'] = $segnalazione->getMessaggio();
                $s['idSegnalazione'] = $segnalazione->getId();
                $listaSegnalazioni[] = $s;
            }
            $view->showSegnalazioniAmministratore($listaSegnalazioni);
        }
        else{
            $segnalazione = $pm->load($id, 'FTicketAssistenza');
            $userAutore = $segnalazione->getAutore();
            $utente = $pm->load($userAutore, 'FUtente');
            $nome = $utente->getNome();
            $cognome = $utente->getCognome();
            $eta = $utente->getEta();
            $oggetto = $segnalazione->getOggetto();
            $messaggio = $segnalazione->getMessaggio();
            $session = new USession();
            $session->startSession();
            $session->setValue('emailUtenteSegnalazione', $utente->getEmail());
            $session->setValue('oggettoSegnalazione', $oggetto);
            $session->setValue('messaggioSegnalazione', $messaggio);

            $view->showAmministratoreResponse($userAutore, $nome, $cognome, $eta, $oggetto, $messaggio);

        }
    }

    public function rispondiSegnalazione(){
        $session = new USession();
        $session->startSession();
        $emailUtente = $session->readValue('emailUtenteSegnalazione');
        $oggetto = $session->readValue('oggettoSegnalazione');
        $messaggio = $session->readValue('messaggioSegnalazione');
        $emailPolisportiva = '';
        $headers = 'From:' . $emailPolisportiva;
        if (isset($_POST['risposta'])){
            $risposta = $_POST['risposta'];


            //Invio della mail all'utente con la risposta
            print_r(mail($emailUtente, 'Risposta segnalazione',
            'La ringraziamo per la sua segnalazione con oggetto: ' . $oggetto . '\ne 
            messaggio' . $messaggio . ', di seguito la risposta:' .
            $risposta, $headers));

            $session->deleteValue('emailUtenteSegnalazione');
            $session->deleteValue('oggettoSegnalazione');
            $session->deleteValue('messaggioSegnalazione');



        }
    }
    public function modificaPrezzi(){
        $view = new VGettoni();
        $pm= new FPersistentManager();
        $campi = $pm->loadList('FCampo');
        $resultsCampi = array();
        foreach($campi as $campo){
            $c = array();
            $nome = $campo->getNome();
            $prezzo = $campo->getPrezzo();
            $id=$campo->getId();
            $c['nome'] = $nome;
            $c['prezzo'] = $prezzo;
            $c['idCampo'] = $id;
            $resultsCampi[] = $c;
        }
        $view->showAmministratoreModificaPrezzo($resultsCampi);
    }

    public function modifica(){
        $pm = new FPersistentManager();
        if ($_POST){
            foreach($_POST as $chiave => $prezzo){
                if($prezzo>0){
                    $pm->updateCampo($prezzo,$chiave);
                }
            }
            header('Location: /PolisportivaDDD/Utente/home');
        }
    }

    public function aggiungiGettoni(){
        $view = new VGettoni();
        $pm= new FPersistentManager();
        $campi = $pm->loadList('FCampo');
        $resultsCampi = array();
        foreach($campi as $campo){
            $c = array();
            $nome = $campo->getNome();
            $prezzo = $campo->getPrezzo();
            $id=$campo->getId();
            $c['nome'] = $nome;
            $c['prezzo'] = $prezzo;
            $c['idCampo'] = $id;
            $resultsCampi[] = $c;
        }
        $view->showAmministratoreAggiungiGettoni($resultsCampi);
    }

    public function aggiungi(){
        $pm= new FPersistentManager();
        $session = new USession();
        $session->startSession();
        $utente =unserialize($session->readValue('utente'));
        $wallet=$utente->getWallet();
        if ($_POST){
            foreach($_POST as $chiave => $quantita){
                $campo=$pm->load($chiave,"FCampo");
                $wallet->aggiungiGettoni($campo,$quantita);
            }
            $pm->update($wallet);
            //se va male l'update??
            header('Location: /PolisportivaDDD/Utente/home');
        }
    }

    public function eliminaGruppo($id=-1){
        $pm= new FPersistentManager();
        $session = new USession();
        $session->startSession();
        $usernameAmm = $session->readValue('username');
        if ($id!=-1){
            $gruppo = $pm->load($id, 'FGruppo');
            $campo = $gruppo->getCampo();
            $partecipanti = $gruppo->getPartecipanti();
            $amministratore = $pm->load($usernameAmm, 'FAmministratore');
            $amministratore->rimborsaGruppo($partecipanti, $campo);
            $pm->delete($id, 'FGruppo');
        }
        header("Location: /PolisportivaDDD/Utente/home");

    }

}