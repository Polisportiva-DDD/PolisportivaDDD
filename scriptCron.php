<?php
require_once (__DIR__.'/Utility/autoload.php');
require_once (__DIR__ .'/Utility/USession.php');
$pm=new FPersistentManager();
$gruppi=$pm->loadGruppiScaduti();
foreach ($gruppi as $gruppo){
    $pm->delete($gruppo->getId(),"FGruppo");
}
?>