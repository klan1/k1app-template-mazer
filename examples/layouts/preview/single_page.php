<?php
require_once '../../../vendor/autoload.php';

$layout = new \k1app\template\mazer\layouts\single_page('en', false);
echo $layout->generate();
