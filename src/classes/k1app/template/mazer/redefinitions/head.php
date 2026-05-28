<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Mazer template head component extending html_head. Provides HTML head section with Mazer-specific CSS includes, meta tags, favicon, and shortcut icon configuration.
 */

namespace k1app\template\mazer\redefinitions;

use const k1app\K1APP_ASSETS_IMAGES_URL;
use const k1app\K1APP_BASE_URL;
use const k1app\template\mazer\TPL_URL;
use k1lib\html\head as html_head;
use k1lib\html\link;

/**
 * @description Head component for Mazer template. Extends html_head to provide Mazer-specific head elements including CSS framework, meta tags, and icon configuration.
 * @extends html_head
 */
class head extends html_head {

    /**
     * @description Favicon link element for the page.
     * @var link
     */
    protected link $favico;

    /**
     * @description Shortcut icon link element for the page.
     * @var link
     */
    protected link $shortcut_icon;

    /**
     * @description Alternative shortcut icon link element (currently unused).
     * @var link
     */
    protected link $shortcut_icon_x;

    /**
     * @description Constructor initializes the head section with Mazer template resources. Sets up meta tags, canonical link, CSS includes, and favicon configuration.
     */
    public function __construct() {
        parent::__construct();
        $this->append_meta()->set_attrib("charset", "utf-8");
        $this->append_meta("viewport", "width=device-width, initial-scale=1.0");

        $canonical = new link(K1APP_BASE_URL, 'canonical', null);
        $this->append_child_head($canonical);

        $this->link_css(TPL_URL . "assets/compiled/css/app.css")
                ->set_attrib('crossorigin', true);
        $this->link_css(TPL_URL . "assets/compiled/css/app-dark.css")
                ->set_attrib('crossorigin', true);

        $this->favico = new link('/favico.png', 'icon', 'image/x-icon');
        $this->shortcut_icon = new link('/favico.png', 'shortcut icon', 'image/png');

        $this->append_child_tail($this->favico);
        $this->append_child_tail($this->shortcut_icon);
    }

    /**
     * @description Sets the shortcut icon image URL.
     * @param string $img The URL path to the shortcut icon image.
     */
    public function set_shotcut_icon(string $img): void {
        $this->shortcut_icon->set_value($img);
    }

    /**
     * @description Sets the favicon image URL.
     * @param string $img The URL path to the favicon image.
     */
    public function set_favico(string $img): void {
        $this->favico->set_value($img);
    }
}