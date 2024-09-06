<?php

namespace k1app\template\mazer\components;

use k1app\template\mazer\components\app\main;
use k1app\template\mazer\components\app\sidebar;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class app extends div
{
    use append_shotcuts;
    protected sidebar $sidebar;
    protected main $main;

    // /**
    //  * Create a DIV html tag with VALUE as data. Use $div->set_value($data)
    //  * @param string $class
    //  * @param string $id
    //  */
    function __construct()
    {
        parent::__construct(null, 'app');

        $this->sidebar = new sidebar();
        $this->sidebar->append_to($this);

        $this->main = new main();
        $this->main->append_to($this);
    }

    function sidebar(): sidebar
    {
        return $this->sidebar;
    }
    function main(): main
    {
        return $this->main;
    }
}
