<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\append_shotcuts;
use k1lib\html\i;
use k1lib\html\li;
use k1lib\html\span;
use k1lib\html\tag_catalog;
use k1lib\html\ul;

class menu extends ul
{
    use append_shotcuts;

    protected li $menu_title;
    protected bool $is_submenu;

    function __construct($menu_title = NULL, $is_submenu = false)
    {
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

    function add_menu_title($title): li
    {
        $this->menu_title = new li($title, 'sidebar-title', 'k1app-menu-title');
        $this->append_child($this->menu_title);
        return $this->menu_title;
    }

    function add_item($value = 'Item', $href = '#', $icon = 'bi bi-play', $id = null): menu_item
    {
        $item = new menu_item($value, $href, $icon, $id);
        $this->append_child($item);
        return $item;
    }
    function add_subitem($value = 'Item', $href = '#', $id = null): submenu_item
    {
        $subitem = new submenu_item($value, $href, $id, $this->get_parent()->get_tag_id());
        $this->append_child($subitem);
        return $subitem;
    }
}

class menu_item extends li
{
    use menu_actions;

    protected a $link;
    protected i $icon;
    protected span $label;

    function __construct($value = 'item', $href = '#', $icon = 'bi bi-play', $id = null)
    {
        parent::__construct(null, 'sidebar-item', $id);
        $this->link = $this->append_a($href, null, null, 'sidebar-link');
        if (!empty($icon)) {
            $this->icon = $this->link->append_i(null, $icon);
        }
        $this->label = $this->link->append_span();
        $this->label->set_value($value);
    }
}

class submenu_item extends li
{
    use menu_actions;
    protected a $link;
    protected int $parent_id;

    function __construct($value = 'item', $href = '#', $id = null, $obj_id = null)
    {
        parent::__construct(null, 'submenu-item', $id);
        $this->link = $this->append_a($href, $value, null, 'submenu-item');
        $this->parent_id = $obj_id;
    }
}

trait menu_actions
{
    function nav_is_sub()
    {
        $this->set_class('has-sub', true);
        return $this;
    }
    function nav_is_active()
    {
        $this->set_class('active', true);
        if (!empty($this->parent_id)) {
            $parent = tag_catalog::get_by_index($this->parent_id);
            $parent->set_class('active', true);
        }
        return $this;
    }
}
