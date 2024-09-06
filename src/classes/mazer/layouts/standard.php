<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\pages\standard as pages_standard;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;
use k1lib\html\html_document;


class standard extends html_document
{
    protected pages_standard $page_content;

    function __construct($lang = 'en')
    {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body();
        $this->append_child($this->body);

        $this->page_content = new pages_standard('Layout Standar', 'For pages.');
        $this->body()->app()->main()
            ->page_heading($this->page_content);
    }

    function head(): head
    {
        return $this->head;
    }
    function body(): body
    {
        return $this->body;
    }

    function page()
    {
        return $this->page_content;
    }
}
