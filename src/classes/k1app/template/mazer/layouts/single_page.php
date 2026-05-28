<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Single page layout for Mazer template. Provides a page structure without sidebar, with a centered container and page content component.
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\core;
use k1app\template\mazer\pages\standard;
use k1app\template\mazer\pages\standard_no_card;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;

/**
 * @description Single page layout class. Extends core to provide a page structure without sidebar navigation. Uses a centered container layout with page content component.
 * @extends core
 */
class single_page extends core {

    /**
     * @description The page component (either standard or standard_no_card) containing the page content.
     * @var standard|standard_no_card
     */
    protected standard|standard_no_card $page;

    /**
     * @description Constructor initializes the single page layout with head, body, and page content.
     * @param string $lang Language code for the layout. Defaults to 'en'.
     * @param bool $use_card_as_content Whether to use card wrapper for content. Defaults to true.
     */
    function __construct($lang = 'en', $use_card_as_content = true): void {
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

    /**
     * @description Gets the head component.
     * @return head Returns the head component instance.
     */
    function head(): head {
        return $this->head;
    }

    /**
     * @description Gets the body component.
     * @return body Returns the body component instance.
     */
    function body(): body {
        return $this->body;
    }

    /**
     * @description Gets the page component instance.
     * @return standard|standard_no_card Returns the page component.
     */
    function page(): standard|standard_no_card {
        return $this->page;
    }
}