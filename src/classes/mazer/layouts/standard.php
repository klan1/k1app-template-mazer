<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\components\app\sidebar\wrapper\header;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1app\template\mazer\core;
use k1app\template\mazer\pages\standard as pages_standard;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;
use k1lib\html\a;
use k1lib\html\img;
use k1lib\html\tag;

class standard extends core
{
    protected header $sidebar_header;
    protected sidebar_menu $sidebar_menu;
    protected menu $menu;
    protected pages_standard $content;


    function __construct($lang = 'en', tag $content_obj = null)
    {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body();
        $this->append_child($this->body);

        $this->sidebar_header = $this->body()->app()->sidebar()->wrapper()->header();

        $this->menu = $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu();

        if (!empty($content_obj)) {
            $this->set_content($content_obj);
        } else {
            $page_content = new \k1app\template\mazer\pages\standard('Default Layout Title','Default Layout Subtile');
            $this->set_content($page_content);
        }
    }

    function head(): head
    {
        return $this->head;
    }
    function body(): body
    {
        return $this->body;
    }
    function sidebar_logo_a(): a
    {
        return  $this->body()->app()->sidebar()->wrapper()->header()->get_logo_a();
    }
    function sidebar_logo_img(): img
    {
        return  $this->body()->app()->sidebar()->wrapper()->header()->get_logo_img();
    }
    function set_menu(menu $menu_obj): menu
    {
        $this->menu = $menu_obj;
        return $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu($this->menu);
    }
    function menu(): menu
    {
        return $this->menu;
    }
    function content(): pages_standard
    {
        return $this->content;
    }
    function set_content($content_obj)
    {
        $this->content = $content_obj;
        $this->content->set_obj_parent($this->body()->app()->main());
        $this->body()->app()->main()
            ->page_heading($this->content);
    }
}
