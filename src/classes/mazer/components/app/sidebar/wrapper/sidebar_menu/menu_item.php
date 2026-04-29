<?php

namespace k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;

use k1lib\html\a;
use k1lib\html\i;
use k1lib\html\li;
use k1lib\html\span;

class menu_item extends li {

    use menu_actions;

    protected a $link;
    protected i $icon;
    protected span $label;

    function __construct($value = 'item', $href = '#', $icon = 'bi bi-play', $id = null) {
        parent::__construct(null, 'sidebar-item', $id);
        $this->link = $this->append_a($href, null, null, 'sidebar-link');
        if (!empty($icon)) {
            $this->icon = $this->link->append_i(null, $icon);
        }
        $this->label = $this->link->append_span();
        $this->label->set_value($value);
    }
}
