<?php

/**
 * LAYOUT: Single Page
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\core;
use k1app\template\mazer\pages\standard;
use k1app\template\mazer\pages\standard_no_card;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;

class single_page extends core {

    protected standard|standard_no_card $page;

    function __construct($lang = 'en', $use_card_as_content = true) {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body(false);
        $this->append_child($this->body);

        $content_div = $this->body->append_div('container mt-3');

        if ($use_card_as_content) {
            $this->page = new standard($content_div);
        } else {
            $this->page = new standard_no_card($content_div);
        }
    }

    function head(): head {
        return $this->head;
    }

    function body(): body {
        return $this->body;
    }

    function page(): standard|standard_no_card {
        return $this->page;
    }
}
