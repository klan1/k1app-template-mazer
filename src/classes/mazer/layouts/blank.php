<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Blank layout base class for Mazer template. Provides minimal page structure with head and body components without sidebar or additional features.
 */

namespace k1app\template\mazer\layouts;

use k1app\template\mazer\core;
use k1app\template\mazer\redefinitions\body;
use k1app\template\mazer\redefinitions\head;

/**
 * @description Blank layout class providing minimal page structure. Extends core to provide head and body elements without sidebar or additional page components. Used as base for other layout classes.
 * @extends core
 */
class blank extends core {

    /**
     * @description Constructor initializes the blank layout with head and body components.
     * @param string $lang Language code for the layout. Defaults to 'en'.
     * @param bool $generate_app_div Whether to generate the app div in body. Defaults to false.
     */
    function __construct($lang = 'en', $generate_app_div = false) {
        parent::__construct($lang, true, true);

        $this->head = new head();
        $this->append_child($this->head);

        $this->body = new body($generate_app_div);
        $this->append_child($this->body);
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
}