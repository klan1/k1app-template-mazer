<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Sidebar menu container component. Wraps a menu instance and provides methods for menu management within the sidebar wrapper.
 */

namespace k1app\template\mazer\components\app\sidebar\wrapper;

use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1lib\html\append_shortcuts;
use k1lib\html\div;

/**
 * @description Sidebar menu container that extends div. Manages a menu instance and provides fluent interface for menu manipulation.
 * @extends div
 * @uses append_shortcuts
 */
class sidebar_menu extends div {

    use append_shortcuts;

    /**
     * @description The menu instance contained within this sidebar menu container.
     * @var menu
     */
    protected menu $menu;

    /**
     * @description Constructor initializes the sidebar menu container with a div wrapper and creates a new menu instance.
     */
    function __construct(): void {
        parent::__construct('sidebar-menu');

        $this->menu = new menu();
        $this->menu($this->menu);
    }

    /**
     * @description Gets or sets the menu instance. Accepts a custom menu object to replace the current one.
     * @param menu|bool $custom_menu Optional menu instance to set. If null or empty, returns existing menu.
     * @return menu Returns the menu instance.
     */
    function menu(\k1lib\html\bootstrap\components\menu|menu|bool $custom_menu = null): menu {
        if (!empty($custom_menu) && ($custom_menu instanceof menu)) {
            if ($this->menu !== $custom_menu) {
                $this->menu->decatalog();
                $this->menu = $custom_menu;
            }
        } elseif (empty($this->menu)) {
            $this->menu = new menu();
        }

        if (!$this->menu->is_cataloged()) {
            $this->append_child($this->menu);
        }
        return $this->menu;
    }
}