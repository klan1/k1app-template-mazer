<?php

// class app extends div

namespace k1app\template\mazer\components\app;

use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\header;
use k1app\template\mazer\components\app\main\page_heading;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class main extends div {

    use append_shotcuts;

    protected header $header;
    protected page_heading $page_heading;
    protected footer $footer;

    function __construct() {
        parent::__construct(null, 'main');

        $this->header = new header();
        $this->append_child_head($this->header);

        $this->page_heading = new page_heading();
        $this->append_child($this->page_heading);

        $this->footer = new footer();
        $this->append_child_tail($this->footer);
    }

    public function header() {
        return $this->header;
    }

    public function page_heading() {
        return $this->page_heading;
    }

    public function footer() {
        return $this->footer;
    }
}
