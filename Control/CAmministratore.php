<?php

require_once (dirname(__DIR__)  .'/Utility/USession.php');
require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
require_once (dirname(__DIR__)  .'/Utility/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require dirname(__DIR__) .'/Utility/vendor/autoload.php';


class CAmministratore
{

    /**
     * Costruttore vuoto
     * CAmministratore constructor.
     */
    public function __construct(){}


    /**
     * Funzione che ottiene tutte le segnalazioni dal DB oppure solamente quella specificata dal parametro id, chiamando
     * infine la view per mostrarla.
     * @param int $id id della segnalazione
     * @throws SmartyException
     */
    public function segnalazioni($id=-1){
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){
            $view = new VAmministratore();
            $pm = FPersistentManager::getInstance();
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
                $session->setValue('emailUtenteSegnalazione', $utente->getEmail());
                $session->setValue('oggettoSegnalazione', $oggetto);
                $session->setValue('messaggioSegnalazione', $messaggio);
                $session->setValue('idSegnalazione', $id);

                $view->showAmministratoreResponse($userAutore, $nome, $cognome, $eta, $oggetto, $messaggio,$pic64);

            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    /**
     * Funzione che gestisce la risposta a una particolare segnalazione da parte dell'amministratore. Manda una mail
     * all'utente che ha fatto la segnalazione
     */
    public function rispondiSegnalazione(){
        $pm = FPersistentManager::getInstance();
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){

            $emailUtente = $session->readValue('emailUtenteSegnalazione');
            $oggetto = $session->readValue('oggettoSegnalazione');
            $messaggio = $session->readValue('messaggioSegnalazione');
            if (isset($_POST['risposta'])){
                $risposta = $_POST['risposta'];
                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = 3;
                    $mail->isSMTP();
                    $mail->Host = 'outlook.office365.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'polisportivaddd@outlook.it';
                    $mail->Password = 'polisportivaUnivaq';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('polisportivaddd@outlook.it', 'polisportivaddd@outlook.it');

                    $mail->addAddress($emailUtente);


                    $mail->isHTML(true);
                    $mail->Subject = 'Risposta segnalazione PolisportivaDDD';
                    $mail->Body = "Ciao, la risposta alla tua segnalazione con oggetto: $oggetto è la seguente: $risposta";
                    $mail->AltBody = "Ciao, la risposta alla tua segnalazione con oggetto: $oggetto è la seguente: $risposta";

                    $session->deleteValue('emailUtenteSegnalazione');
                    $session->deleteValue('oggettoSegnalazione');
                    $session->deleteValue('messaggioSegnalazione');
                    $pm->delete($session->readValue('idSegnalazione'), 'FTicketAssistenza');
                    $session->deleteValue('idSegnalazione');
                    header('Location: /PolisportivaDDD/Utente/home');

                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

            }
        }else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    /**
     * Funzione che mostra la sezione modifica prezzi dei campi
     * @throws SmartyException
     */
    public function modificaPrezzi(){
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $pm= FPersistentManager::getInstance();
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



    /**
     *Funzione che va modificare i prezzi dei campi sul db e poi effettua il reidirizzamento sulla pagina di modifica prezzo
     */
    public function modifica(){
        if(CUtente::isLogged()){
            if ($_POST){
                foreach($_POST as $chiave => $prezzo){
                    if($prezzo>0){
                        EAmministratore::modificaPrezzo($prezzo,$chiave);
                    }
                }
                header('Location: /PolisportivaDDD/Amministratore/modificaPrezzi');
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }


    /**
     * Funzione che mostra la sezione aggiungi gettoni
     * @throws SmartyException
     */
    public function aggiungiGettoni(){
        if(CUtente::isLogged()){
            $view = new VGettoni();
            $pm= FPersistentManager::getInstance();
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

    //

    /**
     *Funzione che permette di aggiungere i gettoni al wallet e lo memorizza sul db
     */
    public function aggiungi(){
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm= FPersistentManager::getInstance();
            $utente =unserialize($session->readValue('utente'));
            $wallet=$utente->getWallet();
            if ($_POST){
                foreach($_POST as $chiave => $quantita){
                    $campo=$pm->load($chiave,"FCampo");
                    $wallet->aggiungiGettoni($campo,$quantita);
                }
                $pm->update($wallet);
                header('Location: /PolisportivaDDD/Utente/utenti/'.$utente->getUsername());
            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

    /**
     * Funzione che elimina il gruppo specificato
     * @param int $id id del gruppo da eliminare
     */
    public function eliminaGruppo($id=-1){
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm= FPersistentManager::getInstance();

            $usernameAmm = $session->readValue('username');
            if ($id!=-1){
                if($gruppo = $pm->load($id, 'FGruppo')) {
                    ;
                    $campo = $gruppo->getCampo();
                    $partecipanti = $gruppo->getPartecipanti();
                    $amministratore = $pm->load($usernameAmm, 'FAmministratore');
                    $amministratore->rimborsaGruppo($partecipanti, $campo);
                    $pm->delete($id, 'FGruppo');
                }
            }
            header("Location: /PolisportivaDDD/Utente/home");
        }
        else{
            header("Location: /PolisportivaDDD/Utente/home");
        }


    }


    /**
     * Funzione che mostra la pagina in cui si banna un utente
     * @throws SmartyException
     */
    public function banna(){
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){
            $pm = FPersistentManager::getInstance();
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
            $view->showBannaUtente($username, $nome, $cognome, $eta, $valutazioneMedia,$pic64);
        }else{
            header("Location: /PolisportivaDDD/Utente/home");
        }


    }

    /**
     *Funzione che permette di bannare un utente
     */
    public function inviaBan(){
        $session = USession::getInstance();
        $session->startSession();
        if(CUtente::isLogged()){
            if ($_POST['motivazione']){
                $motivazione = $_POST['motivazione'];
                $utente =unserialize($session->readValue('utente'));
                $username=$utente->getUsername();
                EAmministratore::banna($username,$motivazione);
                header('Location: /PolisportivaDDD/Utente/home');

            }
        }
        else{
            header('Location: /PolisportivaDDD/Utente/home');
        }

    }

}