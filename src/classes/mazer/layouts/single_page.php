<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\core;
use k1app\template\mazer\pages\standard as standar_page;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;

class single_page extends core {

    protected standar_page $page;

    function __construct($lang = 'en', $generate_app_div = false) {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body($generate_app_div);
        $this->append_child($this->body);

        $content_div = $this->body->append_div('container mt-3');
        $this->page = new standar_page($content_div);
    }

    function head(): head {
        return $this->head;
    }

    function body(): body {
        return $this->body;
    }

    /**
     * 
     * @return standar_page
     */
    function page(): standar_page {
        return $this->page;
    }
}
