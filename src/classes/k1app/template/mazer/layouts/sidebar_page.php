<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Sidebar page layout for Mazer template. Extends sidebar_blank layout to add a page content component with optional card wrapper around the content.
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\pages\standard;
use k1app\template\mazer\pages\standard_no_card;

/**
 * @description Sidebar page layout class. Extends sidebar_blank to add page content component with optional card styling. Provides a complete sidebar page structure with content area.
 * @extends sidebar_blank
 */
class sidebar_page extends sidebar_blank {

    /**
     * @description The page component (either standard or standard_no_card) containing the page content.
     * @var standard|standard_no_card
     */
    protected standard|standard_no_card $page;

    /**
     * @description Constructor initializes the sidebar page with content component.
     * @param string $lang Language code for the layout. Defaults to 'en'.
     * @param bool $use_card_as_content Whether to use card wrapper for content. Defaults to true.
     */
    function __construct($lang = 'en', $use_card_as_content = true): void {
        parent::__construct($lang);
        if ($use_card_as_content) {
            $this->page = new standard($this->content());
        } else {
            $this->page = new standard_no_card($this->content());
        }
    }

    /**
     * @description Gets the page component instance.
     * @return standard|standard_no_card Returns the page component.
     */
    function page(): standard|standard_no_card {
        return $this->page;
    }
}