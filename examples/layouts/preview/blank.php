<?php 
require_once '../../../vendor/autoload.php';

$layout = new \k1app\template\mazer\layouts\blank('en', false);
echo $layout->generate();
