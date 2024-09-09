<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * K1 Lib loader
 *
 * PHP version 8.2
 *
 * LICENSE:  
 *
 * @author          Alejandro Trujillo J. <alejo@klan1.com>
 * @copyright       2024 @j0hnd03
 * @license         Apache 2.0
 * @version         0.1
 * @since           0.1
 */
/*
 * App run time vars
 */

namespace k1app\template\mazer;

use const k1app\K1APP_BASE_URL;

const VERSION = "0.1";
const TPL_PATH = __DIR__;
// define('k1app\template\mazer\TPL_URL', K1APP_BASE_URL . strstr(dirname(__DIR__, 1), 'vendor') . '/dist/');