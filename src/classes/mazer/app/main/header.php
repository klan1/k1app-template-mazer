<?php

namespace k1app\template\mazer\app\main;

use k1lib\html\append_shotcuts;
use k1lib\html\tag;

class header extends tag
{

    use append_shotcuts;

    // protected header $header;
    // protected menu $menu;

    function __construct($class = 'mb-3', $id = NULL)
    {
        parent::__construct("header", FALSE);
        $this->set_class($class, TRUE);
        $this->set_id($id);

        $this
            ->append_a('#', null, null, 'burger-btn d-block d-xl-none')
            ->append_i(NULL, 'bi bi-justify fs-3');
    }
}
