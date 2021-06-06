<?php


class VCarta
{
    private $smarty;

    function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

}