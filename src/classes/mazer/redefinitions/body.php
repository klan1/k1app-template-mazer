<?php

namespace k1app\template\mazer\redefinitions;

use k1app\template\mazer\components\app;
use k1lib\html\body as html_body;
use k1lib\html\div;
use k1lib\html\script;
use const k1app\template\mazer\TPL_URL;

class body extends html_body {

    protected app $app;

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

        $this->append_child_tail((new div(NULL, "k1lib-output")));
    }

    public function app(): app {
        return $this->app;
    }
}
