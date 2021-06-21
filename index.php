<?php
require_once (__DIR__.'/Utility/autoload.php');
$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);


?>