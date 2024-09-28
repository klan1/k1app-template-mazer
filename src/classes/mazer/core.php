<?php
namespace k1app\template\mazer;

use const k1app\K1APP_BASE_URL;

const VERSION = "0.4";
const TPL_PATH = __DIR__;
define('k1app\template\mazer\TPL_URL', K1APP_BASE_URL . strstr(dirname(__DIR__, 3), 'vendor') . '/dist/');

use k1lib\html\html_document;

class core extends html_document
{

}
