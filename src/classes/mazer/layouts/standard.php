<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1app\template\mazer\pages\standard as pages_standard;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;
use k1lib\html\html_document;


class standard extends html_document
{
    protected sidebar_menu $sidebar_menu;
    protected menu $menu;
    protected pages_standard $page_content;


    function __construct($lang = 'en')
    {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body();
        $this->append_child($this->body);

        $this->page_content = new pages_standard('Layout Standar', 'For pages.');
        $this->page_content->set_obj_parent($this->body()->app()->main());

        $this->body()->app()->main()
            ->page_heading($this->page_content);

        $this->sidebar_menu = $this->body()->app()->sidebar()->wrapper()->sidebar_menu();
        $this->menu = $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu();
    }

    function head(): head
    {
        return $this->head;
    }
    function body(): body
    {
        return $this->body;
    }

    function sidebar_menu(): sidebar_menu
    {
        return $this->sidebar_menu;
    }

    function menu(): menu
    {
        return $this->menu;
    }

    function page(): pages_standard
    {
        return $this->page_content;
    }
}
