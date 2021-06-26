<?php

require_once (dirname(__DIR__)  .'/Utility/autoload.php');
require_once (dirname(__DIR__) .'/Utility/USession.php');
require_once (dirname(__DIR__)  .'/Utility/StartSmarty.php');
class CFrontController
{

	

    public function __constructor(){

    }

    /**
     * Funzione che in base al path passato richiama la relativa classe control
     * @param $path
     * @return mixed
     * @throws SmartyException
     */
    public function run($path){


            $real_controller=null;
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
            if($real_controller!=null){
                if(count($resource)==3){
                    $method=$resource[1];
                    $param=$resource[2];
                    return $real_controller->$method($param);
                }
                $method=$resource[1];
                return $real_controller->$method();
            }
            else{
               $c= new CUtente();
               $c->home();
            }


    }



}

