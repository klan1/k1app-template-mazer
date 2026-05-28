<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Sidebar blank layout providing a page structure with sidebar navigation, page heading, and footer. Extends the blank layout with sidebar-specific components.
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

/**
 * @description Sidebar blank layout class providing a complete page structure with sidebar navigation, page heading section, and optional footer. Used as base for pages requiring sidebar navigation.
 * @extends blank
 */
class sidebar_blank extends blank {

    /**
     * @description Shortcut reference to the sidebar header component.
     * @var header
     */
    protected header $sidebar_header;

    /**
     * @description Shortcut reference to the sidebar menu component.
     * @var menu
     */
    protected menu $menu;

    /**
     * @description Shortcut reference to the page heading component.
     * @var page_heading
     */
    protected page_heading $page_heading;

    /**
     * @description Shortcut reference to the main footer component.
     * @var footer
     */
    protected footer $footer;

    /**
     * @description Constructor initializes the sidebar blank layout with shortcut references to key components.
     * @param string $lang Language code for the layout. Defaults to 'en'.
     */
    function __construct($lang = 'en') {
        parent::__construct($lang, true);

        $this->sidebar_header = $this->body()->app()->sidebar()->wrapper()->header();
        $this->menu = $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu();
        $this->page_heading = $this->body()->app()->main()->page_heading();
        $this->footer = $this->body()->app()->main()->footer();
    }

    /**
     * @description Gets the sidebar logo anchor element.
     * @return a Returns the anchor element containing the logo.
     */
    function sidebar_logo_a(): a {
        return $this->body()->app()->sidebar()->wrapper()->header()->get_logo_a();
    }

    /**
     * @description Gets the sidebar logo image element.
     * @return img Returns the image element for the logo.
     */
    function sidebar_logo_img(): img {
        return $this->body()->app()->sidebar()->wrapper()->header()->get_logo_img();
    }

    /**
     * @description Sets a custom menu for the sidebar.
     * @param menu $menu_obj The menu instance to set as the sidebar menu.
     * @return menu Returns the set menu instance.
     */
    function set_menu(menu $menu_obj): menu {
        $this->menu = $menu_obj;
        return $this->body()->app()->sidebar()->wrapper()->sidebar_menu()->menu($this->menu);
    }

    /**
     * @description Gets the sidebar menu instance.
     * @return menu Returns the menu instance.
     */
    function menu(): menu {
        return $this->menu;
    }

    /**
     * @description Gets the page heading content div element.
     * @return div Returns the page heading div element.
     */
    function content(): div {
        return $this->page_heading;
    }

    /**
     * @description Sets the main content of the page heading.
     * @param string|tag $content The content to set in the page heading.
     */
    function set_content(string|tag $content): void {
        $this->page_heading->set_value($content);
    }

    /**
     * @description Sets the footer content with left and right sections.
     * @param mixed $left Content for the left footer section.
     * @param mixed $rigth Content for the right footer section.
     */
    function set_footer($left, $rigth): void {
        $this->footer->set_content_left($left);
        $this->footer->set_content_right($rigth);
    }

    /**
     * @description Removes the footer from the layout.
     */
    function remove_footer(): void {
        $this->footer->decatalog();
    }
}