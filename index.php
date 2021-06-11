<?php
require_once (get_include_path() .'/utility/autoload.php');

$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);


?>