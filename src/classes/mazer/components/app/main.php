<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Main content area component for Mazer template. Contains header, page heading, and footer components to form the main content region of the page.
 */

namespace k1app\template\mazer\components\app;

use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\header;
use k1app\template\mazer\components\app\main\page_heading;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

/**
 * @description Main content area container component. Contains header, page_heading, and footer components. Forms the main content region of the page layout.
 * @extends div
 * @uses append_shotcuts
 */
class main extends div {

    use append_shotcuts;

    /**
     * @description The header component for the main area (mobile navigation toggle).
     * @var header
     */
    protected header $header;

    /**
     * @description The page heading component containing title and content sections.
     * @var page_heading
     */
    protected page_heading $page_heading;

    /**
     * @description The footer component for the main area.
     * @var footer
     */
    protected footer $footer;

    /**
     * @description Constructor initializes the main content area with header, page heading, and footer components.
     */
    function __construct() {
        parent::__construct(null, 'main');

        $this->header = new header();
        $this->append_child_head($this->header);

        $this->page_heading = new page_heading();
        $this->append_child($this->page_heading);

        $this->footer = new footer();
        $this->append_child_tail($this->footer);
    }

    /**
     * @description Gets the header component.
     * @return header Returns the header component instance.
     */
    public function header() {
        return $this->header;
    }

    /**
     * @description Gets the page heading component.
     * @return page_heading Returns the page_heading component instance.
     */
    public function page_heading() {
        return $this->page_heading;
    }

    /**
     * @description Gets the footer component.
     * @return footer Returns the footer component instance.
     */
    public function footer() {
        return $this->footer;
    }
}