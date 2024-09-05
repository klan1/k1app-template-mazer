<?php

namespace k1app\template\mazer\app\sidebar;

use k1app\template\mazer\app\sidebar\wrapper\header;
use k1app\template\mazer\app\sidebar\wrapper\menu;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class wrapper extends div
{

    use append_shotcuts;

    protected header $header;
    protected menu $menu;

    // /**
    //  * Create a DIV html tag with VALUE as data. Use $div->set_value($data)
    //  * @param string $class
    //  * @param string $id
    //  */
    function __construct()
    {
        parent::__construct('sidebar-wrapper active');

        $this->header = new header();
        $this->header->append_to($this);

        $this->menu = new menu();
        $this->menu->append_to($this);

    }
}
