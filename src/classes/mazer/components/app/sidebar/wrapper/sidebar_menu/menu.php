<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Menu list component for sidebar navigation. Renders a unordered list (ul) that contains menu items and submenu items with Bootstrap menu styling.
 */

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\append_shotcuts;
use k1lib\html\li;
use k1lib\html\ul;

/**
 * @description Menu class representing an unordered list for sidebar navigation. Supports menu titles, items, and subitems with active state management.
 * @extends ul
 * @uses append_shotcuts
 */
class menu extends ul {

    use append_shotcuts;

    /**
     * @description Optional title element displayed at the top of the menu.
     * @var li|null
     */
    protected li $menu_title;

    /**
     * @description Flag indicating whether this is a submenu (nested menu).
     * @var bool
     */
    protected bool $is_submenu;

    /**
     * @description Constructor initializes the menu as either a main menu or submenu.
     * @param string|null $menu_title Optional title text for the menu.
     * @param bool $is_submenu Whether this is a nested submenu. Defaults to false.
     */
    function __construct($menu_title = NULL, $is_submenu = false) {
        $this->is_submenu = $is_submenu;
        if (!$is_submenu) {
            parent::__construct('menu', 'k1app-menu');
        } else {
            parent::__construct('submenu');
        }

        if (!empty($menu_title)) {
            $this->add_menu_title($menu_title);
        }
    }

    /**
     * @description Adds a title element to the menu.
     * @param string $title The title text to display.
     * @return li Returns the created li element.
     */
    function add_menu_title($title): li {
        $this->menu_title = new li($title, 'sidebar-title', 'k1app-menu-title');
        $this->append_child($this->menu_title);
        return $this->menu_title;
    }

    /**
     * @description Creates and appends a new menu item to the menu.
     * @param string $value The display text for the menu item.
     * @param string $href The URL link for the menu item. Defaults to '#'.
     * @param string $icon The Bootstrap icon class for the item icon. Defaults to 'bi bi-play'.
     * @param string|null $id Optional unique identifier for the menu item.
     * @return menu_item Returns the created menu_item instance.
     */
    function add_item($value = 'Item', $href = '#', $icon = 'bi bi-play', $id = null): menu_item {
        $item = new menu_item($value, $href, $icon, $id);
        $this->append_child($item);
        return $item;
    }

    /**
     * @description Creates and appends a new submenu item to the menu.
     * @param string $value The display text for the submenu item.
     * @param string $href The URL link for the submenu item. Defaults to '#'.
     * @param string|null $id Optional unique identifier for the submenu item.
     * @return submenu_item Returns the created submenu_item instance.
     */
    function add_subitem($value = 'Item', $href = '#', $id = null): submenu_item {
        $subitem = new submenu_item($value, $href, $id, $this->get_parent()->get_tag_id());
        $this->append_child($subitem);
        return $subitem;
    }

    /**
     * @description Sets the active state for a menu item by its ID and marks parent as active if applicable.
     * @param string $id The unique identifier of the menu item to mark as active.
     * @return self Returns $this for method chaining.
     */
    function set_active(string $id): self {
        $this->get_element_by_id($id)?->nav_is_active();
        return $this;
    }

    /**
     * @description Retrieves a menu item by its unique identifier.
     * @param string $id The unique identifier of the menu item.
     * @return menu_item|null Returns the menu_item if found, null otherwise.
     */
    function get_item(string $id): ?menu_item {
        return $this->get_element_by_id($id);
    }
}