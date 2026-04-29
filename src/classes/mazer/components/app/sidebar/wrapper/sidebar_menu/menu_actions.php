<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\tag_catalog;
use k1lib\html\ul;

trait menu_actions {

    protected ul $submenu;

    function nav_is_sub() {
        $this->set_class('has-sub', true);

        $this->submenu = new menu(null, true);
        $this->submenu->append_to($this);

        return $this->submenu;
    }

    function nav_is_active() {
        $this->set_class('active', true);
        if (!empty($this->parent_id)) {
            $parent = tag_catalog::get_by_index($this->parent_id);
            $parent->set_class('active', true);
        }
        return $this;
    }
}
