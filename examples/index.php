<?php
/**
 * k1.app-template-mazer - Mazer Layouts Showcase - Index
 *
 * @author Alejandro Trujillo J. (J0hnd03)
 * @link https://github.com/klan1/k1.app-template-mazer
 * @license Apache-2.0
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/redefinitions/example_menu.php';

use k1app\template\mazer\layouts\sidebar_page;

$doc = new sidebar_page();

$menu = new example_menu();
$menu->set_active('menu-overview');

$doc->set_menu($menu);
$doc->page()->set_title("Layouts Showcase");
$doc->page()->set_subtitle("PHP template library for building Mazer dashboard layouts");

echo $doc->generate();
