<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Sidebar component for Mazer template. Contains the sidebar wrapper with header and menu components to form the complete sidebar navigation area.
 */

namespace k1app\template\mazer\components\app;

use k1app\template\mazer\components\app\sidebar\wrapper;
use k1lib\html\append_shortcuts;
use k1lib\html\div;

/**
 * @description Sidebar component containing the sidebar wrapper with header and navigation menu. Acts as the main sidebar container within the app component.
 * @extends div
 * @uses append_shortcuts
 */
class sidebar extends div {

    use append_shortcuts;

    /**
     * @description The sidebar wrapper component containing header and menu.
     * @var wrapper
     */
    protected wrapper $wrapper;

    /**
     * @description Constructor initializes the sidebar with its wrapper component.
     */
    function __construct() {
        parent::__construct(null, 'sidebar');
        $this->wrapper = new wrapper();
        $this->wrapper->append_to($this);
    }

    /**
     * @description Gets the sidebar wrapper component.
     * @return wrapper Returns the wrapper component instance.
     */
    function wrapper(): wrapper {
        return $this->wrapper;
    }
}