<?php

require_once("../Utility/autoload.php");
require_once '../Foundation/config.inc.php';


$w1=new EWallet(array(),35);
$w2=new EWallet(array(),34);
$w3=new EWallet(array(),36);

//FWallet::store($w1);
//FWallet::store($w2);
//FWallet::store($w3);

$datadinascita = new DateTime('1999-11-22');
$datadinascita2 = new DateTime("1999-07-16");
$datadinascita3 = new DateTime("1999-06-20");

$utente1 = new EUtente('Urwen99','Giorgio','Di Nunzio','dinunziogiorgio.99@gmail.com','pippo',$datadinascita,'imm',$w1);
$utente2 = new EUtente('Lorediel','Lorenzo',"D'Amico",'nonsapreiproprio@gmial.com','pippo',$datadinascita2,'imm2',$w2);
$utente3 = new EUtente('Andreinho','Andrea','Franco','bo@gmail.com','pippo',$datadinascita3,'imm3',$w3);

//FUtente::store($utente1);
//FUtente::store($utente2);
//FUtente::store($utente3);

$r1 = new ERecensione(1,$utente1,2.5,'Bravissimo','tante belle cose',new DateTime('now'),$utente2);
$r2 = new ERecensione(2,$utente2,4.8,'bo','forse si dai',new DateTime('now'),$utente3);
$r3 = new ERecensione(3,$utente3,2.5,'certo','tante',new DateTime('now'),$utente1);
$r4 = new ERecensione(4,$utente2,4.8,'bo o no','forse si ',new DateTime('now'),$utente1);

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
//FCartaDiCredito::store($carta3);
//FCartaDiCredito::delete($carta1);
//print_r(FCartaDiCredito::loadCarteUtente('Urwen99'));

//FCartaDiCredito::addCartaDiCredito('lor','1111111111');

//print_r(FCartaDiCredito::loadCarteUtente('Urwen99'));