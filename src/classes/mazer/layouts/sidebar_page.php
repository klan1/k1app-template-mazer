<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\pages\standard;
use k1app\template\mazer\pages\standard_no_card;

class sidebar_page extends sidebar_blank {

    protected standard|standard_no_card $page_content;

    function __construct($lang = 'en', $use_card_as_content = true) {
        parent::__construct($lang);
        if ($use_card_as_content) {
            $this->page_content = new standard($this->content());
        } else {
            $this->page_content = new standard_no_card($this->content());
        }
    }

    function page_content(): standard|standard_no_card {
        return $this->page_content;
    }
}
