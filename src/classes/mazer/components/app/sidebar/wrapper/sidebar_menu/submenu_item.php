<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\li;

class submenu_item extends li {

    use menu_actions;

    protected a $link;
    protected int $parent_id;

    function __construct($value = 'item', $href = '#', $id = null, $obj_id = null) {
        parent::__construct(null, 'submenu-item', $id);
        $this->link = $this->append_a($href, $value, null, 'submenu-item', 'a-' . $id);
        $this->parent_id = $obj_id;
    }
}
