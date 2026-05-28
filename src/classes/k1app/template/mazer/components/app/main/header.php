<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Main header component for Mazer template. Contains the mobile navigation toggle button (burger menu) for responsive sidebar navigation.
 */

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shortcuts;
use k1lib\html\tag;

/**
 * @description Header component for the main content area. Contains a mobile navigation toggle button that shows/hides the sidebar on smaller screens.
 * @extends tag
 * @uses append_shortcuts
 */
class header extends tag {

    use append_shortcuts;

    /**
     * @description Constructor initializes the main header with mobile navigation toggle.
     * @param string $class CSS classes for the header. Defaults to 'mb-3'.
     * @param string|null $id Optional HTML ID attribute.
     */
    function __construct($class = 'mb-3', $id = NULL) {
        parent::__construct("header", FALSE);
        $this->set_class($class, TRUE);
        $this->set_id($id);

        $this
                ->append_a('#', null, null, 'burger-btn d-block d-xl-none')
                ->append_i(NULL, 'bi bi-justify fs-3');
    }
}