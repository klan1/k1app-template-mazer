<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Submenu item element for nested sidebar navigation. Extends li element to create a clickable submenu item within a parent menu item.
 */

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\li;

/**
 * @description Submenu item class representing a nested navigation item in the sidebar. Contains a link and tracks its parent menu item ID.
 * @extends li
 * @uses menu_actions
 */
class submenu_item extends li {

    use menu_actions;

    /**
     * @description The anchor element containing the submenu item link.
     * @var a
     */
    protected a $link;

    /**
     * @description The unique identifier of the parent menu item for hierarchical relationship tracking.
     * @var int|null
     */
    protected int $parent_id;

    /**
     * @description Constructor initializes a submenu item with value, link, and parent tracking.
     * @param string $value The display text for the submenu item.
     * @param string $href The URL for the submenu item link. Defaults to '#'.
     * @param string|null $id Optional unique identifier for the submenu item.
     * @param int|null $obj_id Optional parent menu item ID for nesting.
     */
    function __construct($value = 'item', $href = '#', $id = null, $obj_id = null) {
        parent::__construct(null, 'submenu-item', $id);
        $this->link = $this->append_a($href, $value, null, 'submenu-item', 'a-' . $id);
        $this->parent_id = $obj_id;
    }
}