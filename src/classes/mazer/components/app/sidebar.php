<?php

namespace k1app\template\mazer\components\app;

use k1app\template\mazer\components\app\sidebar\wrapper;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class sidebar extends div
{

    use append_shotcuts;

    protected wrapper $wrapper;

    // /**
    //  * Create a DIV html tag with VALUE as data. Use $div->set_value($data)
    //  * @param string $class
    //  * @param string $id
    //  */
    function __construct()
    {
        parent::__construct(null, 'sidebar');
        $this->wrapper = new wrapper();
        $this->wrapper->append_to($this);

    }
}
