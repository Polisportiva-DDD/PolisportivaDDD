<?php

/**
 * Metodo che autocarica le classi richieste.
 * @param String $class_name Nome della classe da autocaricare
 * @return bool
 */
function myAutoload($class_name){

    $entityClass = get_include_path()  . "/Entity/". $class_name . ".php";
    $foundationClass = get_include_path()  . "/Foundation/". $class_name . ".php";
    $controlClass = get_include_path()  . "/Control/" . $class_name . ".php";
    $viewClass = get_include_path()  . "/View/" . $class_name . ".php";

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