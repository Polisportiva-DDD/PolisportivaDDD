<?php

//require_once 'StartSmarty.php';
require_once (get_include_path() .'/Utility/autoload.php');

//require_once '../Control/CCreazioneGruppo';
//require_once '../Foundation/config.inc.php';
require_once (get_include_path() .'/Utility/USession.php');
class CFrontController
{

    //commento
	

    public function __constructor(){

    }



    public function run($path){
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
				//print("ciao3");
                header('HTTP/1.1 404 Not Found');
                exit;
            }

        }
        if(count($resource)==3){
            $params=$resource[2];
			//print("ciao");
            return $real_controller->$resource[1]($params);
        }
        $method=$resource[1];
        return $real_controller->$method();
    }

}

//$c=new CFrontController();
//$c->run("PolisportivaDDD/CreazioneGruppo/scegliData");
