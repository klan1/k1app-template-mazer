<?php

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shotcuts;
use k1lib\html\tag;

class footer extends tag
{

    use append_shotcuts;

    // protected footer $footer;
    // protected menu $menu;

    function __construct($class = NULL, $id = NULL)
    {
        parent::__construct("footer", FALSE);
        $this->set_class($class, TRUE);
        $this->set_id($id);

        $this->set_value(<<<HTML
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>

HTML);
    }
}
