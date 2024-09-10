<?php

/**
 * LAYOUT: STANDARD
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\page_heading;
use k1app\template\mazer\components\app\sidebar\wrapper\header;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;
use k1lib\html\a;
use k1lib\html\div;
use k1lib\html\img;
use k1lib\html\tag;

class sidebar_blank extends blank {

    /**
     * SHORTCUTS
     */
    protected header $sidebar_header;
    protected menu $menu;
    protected page_heading $page_heading;
    protected footer $footer;

    function __construct($lang = 'en') {
        parent::__construct($lang, true);

        $this->sidebar_header = $this->body()->app()->sidebar()->wrapper()->header();
        $this->menu = $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu();
        $this->page_heading = $this->body()->app()->main()->page_heading();
        $this->footer = $this->body()->app()->main()->footer();
    }

    function sidebar_logo_a(): a {
        return $this->body()->app()->sidebar()->wrapper()->header()->get_logo_a();
    }

    function sidebar_logo_img(): img {
        return $this->body()->app()->sidebar()->wrapper()->header()->get_logo_img();
    }

    function set_menu(menu $menu_obj): menu {
        $this->menu = $menu_obj;
        return $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu($this->menu);
    }

    function menu(): menu {
        return $this->menu;
    }

    function content(): div {
        return $this->page_heading;
    }

    function set_content(string|tag $content) {
        $this->page_heading->set_value($content);
    }

    function set_footer($left, $rigth) {
        $this->footer->set_content_left($left);
        $this->footer->set_content_right($rigth);
    }

    function remove_footer() {
        $this->footer->decatalog();
    }
}
