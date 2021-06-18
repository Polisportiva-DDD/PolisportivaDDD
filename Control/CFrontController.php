<?php

require_once (get_include_path() .'/Utility/autoload.php');
require_once (get_include_path() .'/Utility/USession.php');
class CFrontController
{

	

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

    }



}

