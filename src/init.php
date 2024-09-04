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

namespace k1app\template\maze;

const VERSION = "0.1";

// Peace for user, info for the developer with ZendZerver and Z-Ray Live!
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);

/*
 * PATH AUTO CONFIG
 */
define("K1APP_TEMPLATE_BASE_PATH", dirname(__FILE__));
