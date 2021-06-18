<?php
/**
 * Metodo che autocarica le classi richieste.
 * @param String $class_name Nome della classe da autocaricare
 * @return bool
 */
function myAutoload($class_name){

    $entityClass = dirname(__DIR__)  . "/Entity/". $class_name . ".php";
    $foundationClass = dirname(__DIR__) . "/Foundation/". $class_name . ".php";
    $controlClass = dirname(__DIR__)  . "/Control/" . $class_name . ".php";
    $viewClass = dirname(__DIR__)  . "/View/" . $class_name . ".php";

    if( file_exists($entityClass)){
        include $entityClass;
    }
    elseif( file_exists($foundationClass)){
        include $foundationClass;
    }
    elseif( file_exists($controlClass)){
        include $controlClass;
    }
    elseif( file_exists($viewClass)){
        include $viewClass;
    }
    else{
        return false;
    }
    return true;
}

spl_autoload_register("myAutoload");

?>