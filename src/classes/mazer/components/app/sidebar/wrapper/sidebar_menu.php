<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper;

use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class sidebar_menu extends div {

    use append_shotcuts;

    protected menu $menu;

    function __construct() {
        parent::__construct(null, 'sidebar-menu');

        $this->menu = new menu();
        $this->menu($this->menu);
    }

    function menu(\k1lib\html\bootstrap\menu|menu|bool $custom_menu = null): menu {
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
