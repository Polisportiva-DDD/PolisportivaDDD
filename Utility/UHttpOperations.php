<?php


class UHttpOperations
{

    function __construct(){}

    function getPostValue($chiave){
        return $_POST[$chiave];
    }



}