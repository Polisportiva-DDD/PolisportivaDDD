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
/*
$isRegistrato=true;
$isUtente=true;
$isAmministratore=true;
*/
/*
$campi = FCampo::load();
$nomi=array();
foreach($campi as $campo){
    $nome = $campo->getNome();
    $nomi[] = $nome;
}

$dataScelta = "15/07/2021";
$ore=array("09:00-10:00", "10:00-11:00", "14:00-15:00");

$u1 = array("username"=>"urwen", "eta"=>22, "valutazione"=>2);
$u2 = array("username"=>"u22rwen", "eta"=>21, "valutazione"=>4);
$u3 = array("username"=>"pit", "eta"=>18, "valutazione"=>1);
$u4 = array("username"=>"errrr", "eta"=>30, "valutazione"=>0);
$results = array($u1,$u2,$u3,$u4);

$invitati=array("urwen","rrrr","cambioCanale");
$admin="adddd";
$campo="calcio a cinque";
$dataEOra = "10/08/20 15:00-16:00";
$postiDisponibili=8;
$etaMinima=15;
$etaMassima=20;
$votoMinimo=3;
$descrizione="prove prove prove prove";
$isAmministratore=true;


/*
$smarty->assign('isAmministratore', $isAmministratore);
$smarty->assign('invitati', $invitati);
$smarty->assign('admin', $admin);
$smarty->assign('campo', $campo);
$smarty->assign('dataEOra', $dataEOra);
$smarty->assign('postiDisponibili', $postiDisponibili);
$smarty->assign('etaMinima', $etaMinima);
$smarty->assign('etaMassima', $etaMassima);
$smarty->assign('votoMinimo', $votoMinimo);
$smarty->assign('descrizione', $descrizione);
*/

/*
$gruppo1 = array("nome"=>"gruppo 1", "admin"=>"urwen", "campo"=>"calcio a cinque", "dataEOra"=>"10/07/21 15:00-16:00");
$gruppo2 = array("nome"=>"gruppo 2", "admin"=>"urwen2", "campo"=>"calcio a sette", "dataEOra"=>"10/07/21 12:00-13:00");
$gruppo3 = array("nome"=>"gruppo 3", "admin"=>"urwen3", "campo"=>"calcio a cinque", "dataEOra"=>"12/07/21 11:00-12:00");
*/
//$gruppiDetails = array($gruppo1, $gruppo2, $gruppo3);
//$smarty->assign("gruppiDetails",$gruppiDetails);
//$smarty->display('i_tuoi_gruppi.tpl');

/*
$rows = FGruppo::loadField("dataEOra");
print_r($rows);
foreach ($rows as $row){
    $d = date('Y-m-d', strtotime($row['dataEOra']));
    $o = date('H:i:s', strtotime($row['dataEOra']));
    echo($d);
    echo("\n");
    echo($o);
    echo("\n");
}
*/
/*
$pm = new FPersistentManager();
$carte = $pm->loadField('numero', 'FcartaDiCredito');


foreach($carte as $carta){
    print_r($carta['numero']);
}

*/
$data =  ('2021-05-05');
$data = strtotime($data);
$ora= '10:00:00';
$dataString = date('Y-m-d', $data);
$dataEOra = DateTime::createFromFormat('Y-m-d H:i:s', $dataString . $ora);
print_r($dataEOra);


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