<?php
require_once (__DIR__.'/Utility/autoload.php');
require_once (__DIR__ .'/Utility/USession.php');
require_once (__DIR__ .'/Utility/StartSmarty.php');
setcookie('testcookie',"hello",time()+3600,"/PolisportivaDDD");

    if(isset($_COOKIE['testcookie'])){
        $fcontroller=new CFrontController();
        $fcontroller->run($_SERVER['REQUEST_URI']);
    }
    else{
        $c= new CMessaggio();
        $c->cookieError();
    }





?>