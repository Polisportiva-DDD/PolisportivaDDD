<?php

require_once (get_include_path() .'/Utility/USession.php');
require_once (get_include_path() .'/Utility/StartSmarty.php');
require_once (get_include_path() .'/Utility/autoload.php');
class CAmministratore
{

    public function __construct(){}


    public function segnalazioni($id=-1){
        if(CUtente::isLogged()){
            $view = new VAmministratore();
            $pm = new FPersistentManager();
            if($id==-1) {
                $segnalazioni = $pm->loadList('FTicketAssistenza');
                $listaSegnalazioni = array();
                if($segnalazioni!=null){
                    foreach ($segnalazioni as $segnalazione) {
                        $s = array();
                        $s['username'] = $segnalazione->getAutore();
                        $s['testoSegnalazione'] = $segnalazione->getMessaggio();
                        $s['idSegnalazione'] = $segnalazione->getId();
                        $listaSegnalazioni[] = $s;
                    }
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
                $pic64=base64_encode($utente->getImmagine());
                $session = new USession();
                $session->startSession();
                $session->setValue('emailUtenteSegnalazione', $utente->getEmail());
                $session->setValue('oggettoSegnalazione', $oggetto);
                $session->setValue('messaggioSegnalazione', $messaggio);

                $view->showAmministratoreResponse($userAutore, $nome, $cognome, $eta, $oggetto, $messaggio,$pic64);

            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    public function rispondiSegnalazione(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
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
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }
    //Funzione che mostra la sezione modifica prezzi dei campi
    public function modificaPrezzi(){
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $pm= new FPersistentManager();
            $campi = $pm->loadList('FCampo');
            $resultsCampi = array();
            foreach($campi as $campo){
                $c = array();
                $nome = $campo->getNome();
                $prezzo = $campo->getPrezzo();
                $id=$campo->getId();
                $c['pic64']=$campo->getImmagine();
                $c['nome'] = $nome;
                $c['prezzo'] = $prezzo;
                $c['idCampo'] = $id;
                $resultsCampi[] = $c;
            }
            $view->showAmministratoreModificaPrezzo($resultsCampi);
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    //Funzione che modifica i prezzi dei campi
    public function modifica(){
        if(CUtente::isLogged()){
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
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    //Funzione che mostra la sezione aggiungi gettoni
    public function aggiungiGettoni(){
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $pm= new FPersistentManager();
            $campi = $pm->loadList('FCampo');
            $resultsCampi = array();
            foreach($campi as $campo){
                $c = array();
                $nome = $campo->getNome();
                $prezzo = $campo->getPrezzo();
                $id=$campo->getId();
                $c['pic64']=$campo->getImmagine();
                $c['nome'] = $nome;
                $c['prezzo'] = $prezzo;
                $c['idCampo'] = $id;
                $resultsCampi[] = $c;
            }
            $view->showAmministratoreAggiungiGettoni($resultsCampi);
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    //Funzione che permette di aggiungere i gettoni gettoni al wallet
    public function aggiungi(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm= new FPersistentManager();
            $utente =unserialize($session->readValue('utente'));
            $wallet=$utente->getWallet();
            if ($_POST){
                foreach($_POST as $chiave => $quantita){
                    $campo=$pm->load($chiave,"FCampo");
                    $wallet->aggiungiGettoni($campo,$quantita);
                }
                $pm->update($wallet);
                header('Location: /PolisportivaDDD/Utente/home');
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    public function eliminaGruppo($id=-1){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm= new FPersistentManager();

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
        else{
            header("Location: /PolisportivaDDD/Utente/home");
        }


    }



    /**
     *Funzione che mostra la pagina in cui si banna un utente
     */
    public function banna(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = new FPersistentManager();
            $view = new VAmministratore();
            $utente =unserialize($session->readValue('utente'));
            $username=$utente->getUsername();
            $nome=$utente->getNome();
            $cognome=$utente->getCognome();
            $eta=$utente->getEta();
            $recensioni=$pm->loadRecensioniUtente($username);
            if($recensioni!=null){
                $valutazioneMedia=round($utente->calcolaMediaRecensioni($recensioni));
            }
            else{
                $valutazioneMedia=0;
            }
            $pic64=base64_encode($utente->getImmagine());
            $type="";
            $view->showBannaUtente($username, $nome, $cognome, $eta, $valutazioneMedia,$pic64, $type);
        }else{
            header("Location: /PolisportivaDDD/Utente/home");
        }


    }

    public function inviaBan(){
        $session = new USession();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = new FPersistentManager();
            if ($_POST['motivazione']){
                $motivazione = $_POST['motivazione'];
                $utente =unserialize($session->readValue('utente'));
                $username=$utente->getUsername();
                $pm->updateUtenteRegistrato($username,true,$motivazione);
                header('Location: /PolisportivaDDD/Utente/home');

            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

}