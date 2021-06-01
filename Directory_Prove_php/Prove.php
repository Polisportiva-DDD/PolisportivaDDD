<?php
require_once("../Utility/autoload.php");
require_once '../Foundation/config.inc.php';
require('../Smarty/Smarty.class.php');


$smarty= new Smarty();

$smarty->setTemplateDir('../Smarty/templates');
$smarty->setCompileDir('../Smarty/templates_c');
$smarty->setCacheDir('../Smarty/cache');
$smarty->setConfigDir('../Smarty/configs');


$campi = FCampo::load();
$nomi_campi = array();
foreach($campi as $campo){
    $nomi_campi[] = $campo->getNome();
}
//$smarty->assign('results', $nomi_campi);
//$smarty->display('creaGruppo_dettagliFinali.tpl');








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