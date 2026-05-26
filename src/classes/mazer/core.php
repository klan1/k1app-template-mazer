<?php

namespace k1app\template\mazer;

use k1lib\html\html_document;

const VERSION = "0.4";
const TPL_PATH = __DIR__;

if (!defined('k1app\K1APP_BASE_URL')) {
    define('k1app\K1APP_BASE_URL', '/');
}

if (!defined('k1app\template\mazer\TPL_URL')) {
    define('k1app\template\mazer\TPL_URL', '/mazer/');
}

if (!defined('k1app\template\mazer\K1APP_ASSETS_IMAGES_URL')) {
    define('k1app\template\mazer\K1APP_ASSETS_IMAGES_URL', '/mazer/assets/static/images/');
}

class core extends html_document {
    
}
