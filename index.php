<?php
//require_once dirname(__FILE__). '\Utility/StartSmarty.php';
//require_once dirname(__FILE__). '\Utility/autoload.php';

require_once 'Control/CFrontController.php';

$fcontroller=new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);

?>