<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\append_shotcuts;
use k1lib\html\li;
use k1lib\html\ul;

class menu extends ul {

    use append_shotcuts;

    protected li $menu_title;
    protected bool $is_submenu;

    function __construct($menu_title = NULL, $is_submenu = false) {
        $this->is_submenu = $is_submenu;
        if (!$is_submenu) {
            parent::__construct('menu', 'k1app-menu');
        } else {
            parent::__construct('submenu');
        }

        // $this->menu = new ul('menu', 'k1app-menu');
        // $this->append_child($this->menu);

        if (!empty($menu_title)) {
            $this->add_menu_title($menu_title);
        }
    }

    function add_menu_title($title): li {
        $this->menu_title = new li($title, 'sidebar-title', 'k1app-menu-title');
        $this->append_child($this->menu_title);
        return $this->menu_title;
    }

    function add_item($value = 'Item', $href = '#', $icon = 'bi bi-play', $id = null): menu_item {
        $item = new menu_item($value, $href, $icon, $id);
        $this->append_child($item);
        return $item;
    }

    function add_subitem($value = 'Item', $href = '#', $id = null): submenu_item {
        $subitem = new submenu_item($value, $href, $id, $this->get_parent()->get_tag_id());
        $this->append_child($subitem);
        return $subitem;
    }

    function set_active(string $id): self {
        $this->get_element_by_id($id)?->nav_is_active();
        return $this;
    }

    function get_item(string $id): ?menu_item {
        return $this->get_element_by_id($id);
    }
}
