<?php

namespace k1app\template\mazer\components\app\sidebar;

use k1app\template\mazer\components\app\sidebar\wrapper\header;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class wrapper extends div
{

    use append_shotcuts;

    protected header $header;
    protected sidebar_menu $sidebar_menu;

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

        $this->sidebar_menu = new sidebar_menu();
        $this->sidebar_menu->append_to($this);
    }

    function header(): header
    {
        return $this->header;
    }
    function sidebar_menu(): sidebar_menu
    {
        return $this->sidebar_menu;
    }
}
