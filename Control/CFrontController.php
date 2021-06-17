<?php

//require_once 'StartSmarty.php';
require_once (get_include_path() .'/Utility/autoload.php');

//require_once '../Control/CGruppo';
//require_once '../Foundation/config.inc.php';
require_once (get_include_path() .'/Utility/USession.php');
class CFrontController
{

	

    public function __constructor(){

    }

    public function run($path){
        //if(self::isLogged()){
            $resource = explode('/', $path);
            array_shift($resource);
            array_shift($resource);
            if($resource[0] != ''){
                $controller = "C" . $resource[0];
                if(class_exists($controller)){
                    if(method_exists($controller,$resource[1])){
                        $real_controller=new $controller();
                    }
                    else{
                        header('HTTP/1.1 405 Method Not Allowed');
                        exit;
                    }
                }

                else{
                    header('HTTP/1.1 404 Not Found');
                    exit;
                }

            }
            if(count($resource)==3){
                $method=$resource[1];
                $param=$resource[2];
                return $real_controller->$method($param);
            }
            $method=$resource[1];
            return $real_controller->$method();
       // }
        /*else{
            $u=new CUtente();
            $u->home();
        }*/
    }


   /* static function isLogged() {
        $identificato = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
        if (isset($_SESSION['username'])) {
            $identificato = true;
        }
        return $identificato;
    }*/

}

//$c=new CFrontController();
//$c->run("localhost/Polisportiva/Gruppo/Gruppi/2");
