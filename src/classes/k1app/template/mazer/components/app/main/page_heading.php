<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Page heading component for Mazer template. Contains the page title and subtitle, plus a k1lib output div for content rendering.
 */

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shortcuts;
use k1lib\html\div;

/**
 * @description Page heading container component. Contains page title and subtitle elements along with a k1lib output div for dynamic content rendering.
 * @extends div
 * @uses append_shortcuts
 */
class page_heading extends div {

    use append_shortcuts;

    /**
     * @description Constructor initializes the page heading container with a k1lib output div.
     */
    function __construct(): void {
        parent::__construct('page-heading');
        $this->append_child_head(new div(NULL, "k1lib-output"));
    }
}