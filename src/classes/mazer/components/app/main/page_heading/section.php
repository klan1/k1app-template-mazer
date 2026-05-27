<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Page heading section component for Mazer template. Extends div to create a section container within the page heading area.
 */

namespace k1app\template\mazer\components\app\main\page_heading;

use k1lib\html\div;

/**
 * @description Section component for page heading. Represents a content section within the page heading area of the main content region.
 * @extends div
 */
class section extends div {

    /**
     * @description Constructor initializes the section with default styling.
     */
    function __construct() {
        parent::__construct('section');
    }
}