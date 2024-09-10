<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\pages\standard;
use k1lib\html\a;
use k1lib\html\div;
use k1lib\html\img;

class sidebar_page extends sidebar_blank {

    protected standard $page_content;

    function __construct($lang = 'en') {
        parent::__construct($lang);

        $this->page_content = new standard($this->content());
    }

    function page_content() : standard {
        return $this->page_content;
    }
}
