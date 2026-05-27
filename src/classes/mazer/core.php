<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Core template class for Mazer template system. Extends html_document to provide base HTML document functionality with Mazer-specific structure and constants.
 */

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

/**
 * @description Core template class that extends html_document to provide base HTML document structure for the Mazer template system.
 * @extends html_document
 */
class core extends html_document {

}