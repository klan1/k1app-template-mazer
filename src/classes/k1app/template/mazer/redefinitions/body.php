<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Mazer template body component extending html_body. Provides HTML body section with Mazer-specific app structure, theme initialization, and required JavaScript includes.
 */

namespace k1app\template\mazer\redefinitions;

use k1app\template\mazer\components\app;
use k1lib\html\body as html_body;
use k1lib\html\div;
use k1lib\html\script;
use const k1app\template\mazer\TPL_URL;

/**
 * @description Body component for Mazer template. Extends html_body to provide Mazer-specific body elements including app structure, theme initialization, and JavaScript framework includes.
 * @extends html_body
 */
class body extends html_body {

    /**
     * @description The main app component containing sidebar and main content areas.
     * @var app|null
     */
    protected app $app;

    /**
     * @description Output div element for k1lib content rendering.
     * @var div|null
     */
    protected div $k1lib_output;

    /**
     * @description Constructor initializes the body section with Mazer template resources.
     * @param bool $load_app Whether to load the app component. Defaults to true.
     */
    function __construct(bool $load_app = true) {

        parent::__construct();
        if ($load_app) {
            $this->app = new app();
            $this->app->append_to($this);
        }
        /**
         * HTML BODY
         */
        $this->append_child_head(new script(TPL_URL . "assets/static/js/initTheme.js"));

        $this->append_child_tail(new script(TPL_URL . "assets/static/js/components/dark.js"));
        $this->append_child_tail(new script(TPL_URL . "assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"));
        $this->append_child_tail(new script(TPL_URL . "assets/compiled/js/app.js"));
    }

    /**
     * @description Gets the app component instance.
     * @return app Returns the app component.
     */
    public function app(): app {
        return $this->app;
    }

    /**
     * @description Gets the k1lib output div element.
     * @return div Returns the k1lib_output div instance.
     */
    public function k1lib_output(): div {
        return $this->k1lib_output;
    }
}