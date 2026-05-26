<?php
require_once '../../../vendor/autoload.php';

$layout = new \k1app\template\mazer\layouts\sidebar_page('en', true);
echo $layout->generate();
