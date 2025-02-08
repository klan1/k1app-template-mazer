<?php

// class blank extends core

namespace k1app\template\mazer\redefinitions;

use const k1app\K1APP_ASSETS_IMAGES_URL;
use const k1app\K1APP_BASE_URL;
use const k1app\template\mazer\TPL_URL;
use k1lib\html\head as html_head;
use k1lib\html\link;

class head extends html_head {

    protected link $favico;
    protected link $shortcut_icon;
    protected link $shortcut_icon_x;

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

//        $icon_x = "data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2033%2034'%20fill-rule='evenodd'%20stroke-linejoin='round'%20stroke-miterlimit='2'%20xmlns:v='https://vecta.io/nano'%3e%3cpath%20d='M3%2027.472c0%204.409%206.18%205.552%2013.5%205.552%207.281%200%2013.5-1.103%2013.5-5.513s-6.179-5.552-13.5-5.552c-7.281%200-13.5%201.103-13.5%205.513z'%20fill='%23435ebe'%20fill-rule='nonzero'/%3e%3ccircle%20cx='16.5'%20cy='8.8'%20r='8.8'%20fill='%2341bbdd'/%3e%3c/svg%3e";

        $this->favico = new link(K1APP_ASSETS_IMAGES_URL . 'favico.png', 'icon', 'image/x-icon');
        $this->shortcut_icon = new link(K1APP_ASSETS_IMAGES_URL . 'favico.png', 'shortcut icon', 'image/png');
//        $this->shortcut_icon_x = new link($icon_x, 'shortcut icon', 'image/x-icon');

        $this->append_child_tail($this->favico);
        $this->append_child_tail($this->shortcut_icon);
//        $this->append_child_tail($this->shortcut_icon_x);
    }

    public function set_shotcut_icon(string $img) {
        $this->shortcut_icon->set_value($img);
    }

    public function set_favico(string $img) {
        $this->favico->set_value($img);
    }
}
