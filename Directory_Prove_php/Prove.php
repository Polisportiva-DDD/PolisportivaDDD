<?php
require_once('../Utility/autoload.php');
require_once ('../Foundation/config.inc.php');
require('../Smarty/Smarty.class.php');


$smarty= new Smarty();

$smarty->setTemplateDir('../Smarty/templates');
$smarty->setCompileDir('../Smarty/templates_c');
$smarty->setCacheDir('../Smarty/cache');
$smarty->setConfigDir('../Smarty/configs');
/*
$campi = FCampo::load();

$results=array();
foreach($campi as $campo){
    $row=array();
    $row['nome'] = $campo->getNome();
    $row['descrizione'] = $campo->getDescrizione();
    $results[] = $row;
}
*/
/*
$invitati=array('Utente1', 'Utente2');


$gruppo = array('admin'=>'urwen', 'nome'=>'aa', 'campo'=>'calcio a cinque', 'dataEOra' => '11/11/11',
    'postiDisponibili'=>3, 'etaMinima'=>16, 'etaMassima'=>25, 'limiteLivello'=>2, 'descrizione'=>'Siamo una squadra fortissimi');
$gruppo2 = array('admin'=>'aaaa', 'nome'=>'vb', 'campo'=>'calcio a aaaa', 'dataEOra' => '1111/11/11',
    'postiDisponibili'=>5, 'etaMinima'=>122, 'etaMassima'=>354, 'limiteLivello'=>3, 'descrizione'=>'Siamo una squadra fordasdstissimi');

$gruppi=array($gruppo, $gruppo2);
$smarty->error_reporting= 0;
*/

$isRegistrato=true;
$isUtente=true;
$isAmministratore=true;

$smarty->assign('isRegistrato', $isRegistrato);
$smarty->assign('isUtente', $isUtente);
$smarty->assign('isAmministratore', $isAmministratore);
$smarty->display('navBar.tpl');






/*
$c5 = new ECalcioACinque(1, "calcio a cinque", 1, 10, "desc", 12.2);
$c7 = new ECalcioACinque(0, "calcio a sette", 1, 10, "desc", 12.2);
$c8 = new ECalcioACinque(0, "calcio a otto", 1, 10, "desc", 12.2);
$c11 = new ECalcioACinque(0, "calcio a undici", 1, 10, "desc", 12.2);

$gettoni = array($c5->getId()=>1, $c7->getId()=>4, $c8->getId()=>3, $c11->getId()=>9);
$wallet = new EWallet($gettoni, 1);
FWallet::store($wallet);

*/
//$utente = new EAmministratore("aaaaaaaaaaaaaaa", "lo", "da", "em", "pass", new DateTime("now"), "aa", $wallet);

//$gruppo = new EGruppo(null , "GruppoNome", 15, 22, 2.5, "Descr", new DateTime("now"), array(), $utente, $c5);

//FGruppo::addPartecipante('usern', 3);

?>