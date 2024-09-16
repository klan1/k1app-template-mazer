<?php

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shotcuts;
use k1lib\html\div;

class page_heading extends div {

    use append_shotcuts;

    // protected footer $footer;
    // protected menu $menu;

    function __construct() {
        parent::__construct('page-heading');
        $this->append_child_head(new div(NULL, "k1lib-output"));
    }
}
