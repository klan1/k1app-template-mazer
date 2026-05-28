<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Menu item element for sidebar navigation. Extends li element to create a clickable menu item with icon and label support.
 */

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\i;
use k1lib\html\li;
use k1lib\html\span;

/**
 * @description Menu item class representing a single navigation item in the sidebar menu. Includes link, icon, and label components.
 * @extends li
 * @uses menu_actions
 */
class menu_item extends li {

    use menu_actions;

    /**
     * @description The anchor element containing the menu item link.
     * @var a
     */
    protected a $link;

    /**
     * @description The icon element displayed before the menu label.
     * @var i|null
     */
    protected i $icon;

    /**
     * @description The label element containing the menu item text.
     * @var span
     */
    protected span $label;

    /**
     * @description Constructor initializes a menu item with value, link, and icon.
     * @param string $value The display text for the menu item.
     * @param string $href The URL for the menu item link. Defaults to '#'.
     * @param string $icon The Bootstrap icon class for the item icon. Defaults to 'bi bi-play'.
     * @param string|null $id Optional unique identifier for the menu item.
     */
    function __construct($value = 'item', $href = '#', $icon = 'bi bi-play', $id = null) {
        parent::__construct(null, 'sidebar-item', $id);
        $this->link = $this->append_a($href, null, null, null, 'sidebar-link');
        if (!empty($icon)) {
            $this->icon = $this->link->append_i(null, $icon);
        }
        $this->label = $this->link->append_span();
        $this->label->set_value($value);
    }
}