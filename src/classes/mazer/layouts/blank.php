<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\core;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;


class blank extends core {

    function __construct($lang = 'en', $generate_app_div = false) {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body($generate_app_div);
        $this->append_child($this->body);
    }

    function head(): head {
        return $this->head;
    }

    function body(): body {
        return $this->body;
    }
}
