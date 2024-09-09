<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper;

use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class sidebar_menu extends div
{
    use append_shotcuts;

    protected menu $menu;

    function __construct()
    {
        parent::__construct(null, 'sidebar-menu');

        $this->menu = new menu();
        $this->menu($this->menu);
    }

    function menu(menu $custom_menu = null): menu
    {
        if ($custom_menu instanceof menu) {
            $this->menu->decatalog();
            unset($this->menu);
            $this->menu = $custom_menu;
            $this->append_child($this->menu);
        }
        return $this->menu;
    }
}
