<?php

namespace k1app\template\mazer\components;

use k1lib\html\div;
use k1lib\html\h4;
use k1lib\html\h6;
use k1lib\html\i;
use k1lib\html\tag_catalog;
use const k1app\template\mazer\TPL_URL;

class dashboard_card extends div {

    protected h4 $title;
    protected div $body;
    protected i $icon;
    protected div $content;
    protected h6 $content_message;
    protected h6 $content_value;

    function __construct($icon, $color, $message, $value) {
        parent::__construct('card');
        tag_catalog::get_by_index(1)->head()->link_css(TPL_URL . "assets/compiled/css/iconly.css")
                ->set_attrib('crossorigin', true);

        $this->body = $this->append_div('card-body px-4 py-4-5')->append_div('row');
        $this->icon = $this->body
                ->append_div('col-md-3 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start')
                ->append_div("stats-icon {$color} mb-2")
                ->append_child(new i(NULL, $icon));
        $this->content = $this->body
                ->append_div('col-md-9 col-lg-12 col-xl-12 col-xxl-8');
        $this->content_message = $this->content->append_h6($message, 'text-muted font-semibold');
        $this->content_value = $this->content->append_h6($value, 'font-extrabold mb-0');
    }

    function set_messaje($message) {
        $this->content_message->set_value($message);
        return $this;
    }

    function set_value_($value) {
        $this->content_value->set_value($value);
        return $this;
    }
}
