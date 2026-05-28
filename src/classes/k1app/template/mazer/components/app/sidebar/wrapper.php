<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Sidebar wrapper component for Mazer template. Contains header and sidebar_menu components to form the complete sidebar navigation container.
 */

namespace k1app\template\mazer\components\app\sidebar;

use k1app\template\mazer\components\app\sidebar\wrapper\header;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;
use k1lib\html\append_shortcuts;
use k1lib\html\div;

/**
 * @description Sidebar wrapper container that holds the header and sidebar_menu components. Acts as the main sidebar structure within the app component.
 * @extends div
 * @uses append_shortcuts
 */
class wrapper extends div {

    use append_shortcuts;

    /**
     * @description The sidebar header component containing logo and branding.
     * @var header
     */
    protected header $header;

    /**
     * @description The sidebar menu component containing navigation items.
     * @var sidebar_menu
     */
    protected sidebar_menu $sidebar_menu;

    /**
     * @description Constructor initializes the sidebar wrapper with header and menu components.
     */
    function __construct() {
        parent::__construct('sidebar-wrapper active');

        $this->header = new header();
        $this->header->append_to($this);

        $this->sidebar_menu = new sidebar_menu();
        $this->sidebar_menu->append_to($this);
    }

    /**
     * @description Gets the sidebar header component.
     * @return header Returns the header component instance.
     */
    function header(): header {
        return $this->header;
    }

    /**
     * @description Gets the sidebar menu component.
     * @return sidebar_menu Returns the sidebar_menu component instance.
     */
    function sidebar_menu(): sidebar_menu {
        return $this->sidebar_menu;
    }
}