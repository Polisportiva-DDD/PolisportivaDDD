<?php


class VUtente
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }
}