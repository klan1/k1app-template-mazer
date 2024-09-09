<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\append_shotcuts;
use k1lib\html\div;
use k1lib\html\i;
use k1lib\html\li;
use k1lib\html\span;
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

        //         $this->set_value(<<<HTML
        //                     <ul class="menu">
        //                         <li class="sidebar-title">Menu</li>

        //                         <li class="sidebar-item  active">
        //                             <a href="/" class='sidebar-link'>
        //                                 <i class="bi bi-grid-fill"></i>
        //                                 <span>Dashboard</span>
        //                             </a>
        //                         </li>

        //                         <li class="sidebar-item  has-sub">
        //                             <a href="#" class='sidebar-link'>
        //                                 <i class="bi bi-grid-1x2-fill"></i>
        //                                 <span>Layouts</span>
        //                             </a>

        //                             <ul class="submenu ">

        //                                 <li class="submenu-item  ">
        //                                     <a href="/layout/standard/" class="submenu-link">Default Layout</a>

        //                                 </li>

        //                                 <li class="submenu-item  ">
        //                                     <a href="layout-vertical-1-column.html" class="submenu-link">1 Column</a>

        //                                 </li>

        //                                 <li class="submenu-item  ">
        //                                     <a href="layout-vertical-navbar.html" class="submenu-link">Vertical Navbar</a>

        //                                 </li>

        //                                 <li class="submenu-item  ">
        //                                     <a href="layout-rtl.html" class="submenu-link">RTL Layout</a>

        //                                 </li>

        //                                 <li class="submenu-item  ">
        //                                     <a href="layout-horizontal.html" class="submenu-link">Horizontal Menu</a>

        //                                 </li>
        //                             </ul>
        //                         </li>
        //                         <li class="sidebar-item  has-sub">
        //                             <a href="#" class='sidebar-link'>
        //                                 <i class="bi bi-person-circle"></i>
        //                                 <span>Account</span>
        //                             </a>

        //                             <ul class="submenu ">

        //                                 <li class="submenu-item  ">
        //                                     <a href="/profile" class="submenu-link">Profile</a>

        //                                 </li>

        //                             </ul>


        //                         </li>
        //                     </ul>
        // HTML);

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
        $item = new submenu_item($value, $href, $id);
        $this->append_child($item);
        return $item;
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

    function is_sub()
    {
        $this->set_class('has-sub', true);
        return $this;
    }
}

class submenu_item extends li
{
    use menu_actions;
    protected a $link;

    function __construct($value = 'item', $href = '#', $id = null)
    {
        parent::__construct(null, 'submenu-item', $id);
        $this->link = $this->append_a($href, $value, null, 'sidebar-link');
    }
}

trait menu_actions
{
    function is_sub()
    {
        $this->set_class('has-sub', true);
        return $this;
    }
    function is_active()
    {
        $this->set_class('active', true);
        return $this;
    }
}
