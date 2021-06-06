<?php

require_once("../Utility/autoload.php");
require_once '../Foundation/config.inc.php';
require_once "../Utility/StartSmarty.php";


$c5 = new ECalcioACinque(1, "calcio a cinque", 1, 10, "desc", 12.2);
$c7 = new ECalcioACinque(2, "calcio a sette", 1, 10, "desc", 12.2);
$c8 = new ECalcioACinque(3, "calcio a otto", 1, 10, "desc", 12.2);
$c11 = new ECalcioACinque(4, "calcio a undici", 1, 10, "desc", 12.2);

$gettoni = array($c5->getId()=>1, $c7->getId()=>4, $c8->getId()=>3, $c11->getId()=>9);

$w1=new EWallet($gettoni,37);
$w2=new EWallet($gettoni,38);
$w3=new EWallet($gettoni,39);
$w4 = new EWallet($gettoni,50);


//FWallet::store($w1);
//FWallet::store($w2);
//FWallet::store($w3);

$datadinascita = new DateTime('1999-11-22');
$datadinascita2 = new DateTime("1999-07-16");
$datadinascita3 = new DateTime("1999-06-20");
$datadinascita4 = new DateTime("1998-05-25");

$utente1 = new EUtente('Urwen99','Giorgio','Di Nunzio','dinunziogiorgio.99@gmail.com','pippo',$datadinascita,'imm',$w1);
$utente2 = new EUtente('Lorediel','Lorenzo',"D'Amico",'nonsapreiproprio@gmial.com','pippo',$datadinascita2,'imm2',$w2);
$utente3 = new EUtente('Andreinho','Andrea','Franco','bo@gmail.com','pippo',$datadinascita3,'imm3',$w3);
$utente4 = new EUtente('zioFrack','Franco','Deucalion','bobobo@gmail.com','ciccio',$datadinascita4,'imm4',$w4);

//FWallet::update($utente1->getWallet());

//FUtente::store($utente1);
//FUtente::store($utente2);
//FUtente::store($utente4);

$utenteBannato = new EUtenteRegistrato('true','scemo',$utente4->getUsername(),$utente4->getNome(),$utente4->getCognome(),$utente4->getEmail(),$utente4->getPassword(),$utente4->getDataDiNascita(),$utente4->getImmagine(),$utente4->getWallet());

//FUtenteRegistrato::store($utenteBannato);

//FWallet::update2(1,$utente1->getWallet()->getId(),10);

$r1 = new ERecensione(1,$utente1,2.5,'Bravissimo','tante belle cose',new DateTime('now'),$utente2);
$r2 = new ERecensione(2,$utente2,4.8,'bo','forse si dai',new DateTime('now'),$utente3);
$r3 = new ERecensione(3,$utente3,2.5,'certo','tante',new DateTime('now'),$utente1);
$r4 = new ERecensione(4,$utente2,4.8,'bo o no','forse si ',new DateTime('now'),$utente1);
$recensioni = array($r3,$r4,$r1,$r2);
//FRecensione::store($r1);
//FRecensione::store($r2);
//FRecensione::store($r3);
//FRecensione::store($r4);

//FRecensione::delete(4);

//print_r(FRecensione::loadRecensioniEffettuate('Urwen99'));
//print_r(FRecensione::loadRecensioniUtente('Lorediel'));


$carta1 = new ECartadiCredito('5555555555','Giorgio','Di Nunzio','111',new DateTime('now'));
$carta2 = new ECartadiCredito('0000000000','Giorgio','Di Nunzio','111',new DateTime('now'));
$carta3 = new ECartadiCredito('1111111111','Giorgio','Di Nunzio','111',new DateTime('now'));
$carta4 = new ECartadiCredito('2222222222','Giorgio','Di Nunzio','111',new DateTime('now'));

//print_r(FCartaDiCredito::loadCarta('5555555555'));
//FCartaDiCredito::store($carta4);
//FCartaDiCredito::delete($carta1);
//print_r(FCartaDiCredito::loadCarteUtente('Urwen99'));

//FCartaDiCredito::addCartaDiCredito('Lorediel','5555555555');

//print_r(FCartaDiCredito::loadCarteUtente('Urwen99'));


//prova per la template di profiloUtenteRegistrato
//$smarty = StartSmarty::configuration();
//$smarty -> assign('username',$utente2->getUsername());
//$smarty -> assign('nome',$utente2->getNome());
//$smarty -> assign('cognome',$utente2->getCognome());
//
//$dataodierna = new DateTime('now');
//$dataUtente2 = $utente2->getDataDiNascita();
//$eta = $dataodierna->diff($dataUtente2);
//
//$smarty -> assign('eta',$eta->y);
//
//$recensioni = FRecensione::loadRecensioniUtente('Urwen99');
//$c=0;
//$totale = 0;
//for($i=0; $i<count($recensioni); $i++){
//    $voto = $recensioni[$i]->getVoto();
//    $totale = $totale + $voto;
//    $c++;
//}
//$media_recensioni = $totale/$c;
//
//$smarty -> assign('valutazioneMedia',$media_recensioni);
//
//$results = array();
// for($i=0; $i<count($recensioni); $i++){
//    $tmp = array(
//        'username' => $recensioni[$i]->getAutore()->getUsername(),
//        'valutazione' => (int) $recensioni[$i]->getVoto(),
//        'titoloRecensione' => $recensioni[$i]->getTitolo(),
//        'dataRecensione' => $recensioni[$i]->getData()->format('d-m-y'),
//        'descrizioneRecensione' => $recensioni[$i]->getTesto()
//    );
//    $results[] = $tmp;
//}
////print_r($results);
//$smarty->assign('results', $results);
//
//$smarty -> display('profiloUtenteRegistrato.tpl');


//prova per il template di utenteRegistratoHome
//$smarty = StartSmarty::configuration();
//$smarty -> assign('username',$utente2->getUsername());
//$smarty -> assign('nome',$utente2->getNome());
//$smarty -> assign('cognome',$utente2->getCognome());
//
//$dataodierna = new DateTime('now');
//$dataUtente2 = $utente2->getDataDiNascita();
//$eta = $dataodierna->diff($dataUtente2);
//
//$smarty -> assign('eta',$eta->y);
//
//$recensioni = FRecensione::loadRecensioniUtente($utente2->getUsername());
//$c=0;
//$totale = 0;
//for($i=0; $i<count($recensioni); $i++){
//    $voto = $recensioni[$i]->getVoto();
//    $totale = $totale + $voto;
//    $c++;
//}
//$media_recensioni = $totale/$c;
//
//$smarty -> assign('valutazioneMedia',$media_recensioni);
//
//$walletUtente2 = FWallet::loadById($utente2->getWallet()->getId());
//$arrayGettoni = $walletUtente2->getGettoni();
//$results = array();
//foreach($arrayGettoni as $chiave => $valore){
//    $tmp = array(
//        'nomeCampo' => FCampo::loadCampo($chiave)->getNome(),
//        'quantitaGettoni' => $valore,
//    );
//    $results[] = $tmp;
//}
////print_r($results);
//$smarty->assign('results', $results);
//
//$smarty -> display('MioProfilo.tpl');


//prova per il template di UtentiBannati
//$smarty = StartSmarty::configuration();
//
//$results = array();
//$arrayBannati = FUtenteRegistrato::loadBannati();
//for($i=0; $i<count($arrayBannati); $i++){
//    $tmp = array(
//        'username' => $arrayBannati[$i]->getUsername(),
//        'motivoBan' => $arrayBannati[$i]->getMotivazione()
//    );
//    $results[] = $tmp;
//}
//$smarty->assign('results', $results);
//
//$smarty -> display("utentiBannati.tpl");

//prova per il template di le_tue_carte
$smarty = StartSmarty::configuration();

$results = array();
$carteUtente = FCartaDiCredito::loadCarteUtente($utente1->getUsername());
for ($i=0;$i<count($carteUtente); $i++){
    $tmp = array(
      'numeroCarta' => $carteUtente[$i]->getNumero(),
      'titolareCarta' => $carteUtente[$i]->getNomeTitolare(). " " . $carteUtente[$i]->getCognomeTitolare(),
      'dataScadenza' => $carteUtente[$i]->getScadenza()->format('d-m-y')
    );
    $results[]=$tmp;
}

$smarty -> assign('results', $results);

$smarty ->display("le_tue_carte.tpl");
?>