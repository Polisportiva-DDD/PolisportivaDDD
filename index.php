<?php

require_once 'Utility/autoload.php';
$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);


?>