<?php


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

}