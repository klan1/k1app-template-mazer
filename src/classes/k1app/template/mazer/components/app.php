<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Main app container component for Mazer template. Contains sidebar and main content area components to form the complete page layout structure.
 */

namespace k1app\template\mazer\components;

use k1app\template\mazer\components\app\main;
use k1app\template\mazer\components\app\sidebar;
use k1lib\html\append_shortcuts;
use k1lib\html\div;

/**
 * @description Main app container component. Contains sidebar and main content area components to form the complete two-column page layout structure in Mazer template.
 * @extends div
 * @uses append_shortcuts
 */
class app extends div {

    use append_shortcuts;

    /**
     * @description The sidebar component containing navigation and branding.
     * @var sidebar
     */
    protected sidebar $sidebar;

    /**
     * @description The main content area component containing header, page heading, and footer.
     * @var main
     */
    protected main $main;

    /**
     * @description Constructor initializes the app container with sidebar and main components.
     */
    function __construct() {
        parent::__construct(null, 'app');

        $this->sidebar = new sidebar();
        $this->sidebar->append_to($this);

        $this->main = new main();
        $this->main->append_to($this);
    }

    /**
     * @description Gets the sidebar component.
     * @return sidebar Returns the sidebar component instance.
     */
    function sidebar(): sidebar {
        return $this->sidebar;
    }

    /**
     * @description Gets the main content area component.
     * @return main Returns the main component instance.
     */
    function main(): main {
        return $this->main;
    }
}