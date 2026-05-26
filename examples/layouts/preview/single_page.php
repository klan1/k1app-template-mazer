<?php
require_once '../../../vendor/autoload.php';

$layout = new \k1app\template\mazer\layouts\single_page('en', true);
$layout->head()->set_title('HTML title');
$layout->page()->set_title("Page Title");
$layout->page()->set_subtitle("Page sub title");

$layout->page()->set_content_title("Card Title");
$layout->page()->set_content("Card Content");
echo $layout->generate();
