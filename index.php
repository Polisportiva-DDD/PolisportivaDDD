<?php
require_once (__DIR__.'/Utility/autoload.php');
require_once (__DIR__ .'/Utility/USession.php');
setcookie('testcookie',"hello",time()+3600);

    if(isset($_COOKIE['testcookie'])){
        $fcontroller=new CFrontController();
        $fcontroller->run($_SERVER['REQUEST_URI']);
    }
    else{
        print ("COOKIE NON ABILITATI");
        header('Location: /PolisportivaDDD/Utente/home');

    }



?>