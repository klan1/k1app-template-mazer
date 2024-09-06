<?php

namespace k1app\template\mazer\components\app\main;

use k1app\template\mazer\components\app\main\page_heading\page_title;
use k1app\template\mazer\components\app\main\page_heading\section;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

class page_heading extends div
{

    use append_shotcuts;

    protected page_title $page_title;
    protected section $section;

    // protected footer $footer;
    // protected menu $menu;

    function __construct()
    {
        parent::__construct('page-heading');

        $this->page_title = new page_title();
        $this->section = new section();
    }

    function page_title()
    {
        return $this->page_title;
    }

    function section()
    {
        return $this->section;
    }
}
