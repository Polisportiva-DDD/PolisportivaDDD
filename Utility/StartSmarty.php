<?php

//caricamento delle librerie di Smarty
require_once dirname(__FILE__). '\..\Smarty\Smarty.class.php';

//require('../Smarty/Smarty.class.php');

class StartSmarty extends Smarty {
    static function configuration(): Smarty
    {
        $smarty=new Smarty();
        $smarty->template_dir='../Smarty/templates/';
        $smarty->compile_dir='../Smarty/templates_c/';
        $smarty->config_dir='../Smarty/configs/';
        $smarty->cache_dir='../Smarty/cache/';
        return $smarty;
    }
}
