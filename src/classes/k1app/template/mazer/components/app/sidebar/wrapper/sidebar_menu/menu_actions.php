<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Trait providing navigation-specific actions for menu and submenu items. Includes methods for submenu creation and active state management.
 */

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\tag_catalog;
use k1lib\html\ul;

/**
 * @description Trait providing navigation functionality for sidebar menu items including submenu support and active state management.
 * @uses tag_catalog
 */
trait menu_actions {

    /**
     * @description The submenu container element (ul) for nested menu items.
     * @var ul|null
     */
    protected ul $submenu;

    /**
     * @description Converts the current menu item to have a nested submenu. Creates and appends a submenu container.
     * @return ul Returns the newly created submenu element.
     */
    function nav_is_sub() {
        $this->set_class('has-sub', true);

        $this->submenu = new menu(null, true);
        $this->submenu->append_to($this);

        return $this->submenu;
    }

    /**
     * @description Marks the current menu item as active and propagates the active state to its parent if applicable.
     * @return self Returns $this for method chaining.
     */
    function nav_is_active() {
        $this->set_class('active', true);
        if (!empty($this->parent_id)) {
            $parent = tag_catalog::get_by_index($this->parent_id);
            $parent->set_class('active', true);
        }
        return $this;
    }
}