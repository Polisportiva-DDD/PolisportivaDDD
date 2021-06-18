<?php

//caricamento delle librerie di Smarty
require(dirname(__DIR__)  .'/Smarty/Smarty.class.php');

class StartSmarty extends Smarty {
    static function configuration(): Smarty
    {
        $smarty=new Smarty();
        $smarty->template_dir=dirname(__DIR__) .'/Smarty/templates/';
        $smarty->compile_dir=dirname(__DIR__) .'/Smarty/templates_c/';
        $smarty->config_dir=dirname(__DIR__) .'/Smarty/configs/';
        $smarty->cache_dir=dirname(__DIR__) .'/Smarty/cache/';
        return $smarty;
    }
}
