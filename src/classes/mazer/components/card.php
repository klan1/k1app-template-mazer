<?php

namespace k1app\template\mazer\components;

use k1lib\html\div;
use k1lib\html\h4;
use k1lib\html\tag;

class card extends div
{
    protected h4 $title;
    protected div $body;
    function __construct($title, $content)
    {
        parent::__construct('card');

        $this->body = $this->append_div('card-body');
        $this->set_title('Card Title');
        $this->body->set_value($content);
    }
    function set_title(tag|string|null $title): card
    {
        if (empty($title) && isset($this->title)) {
            // d($this->title->get_parent());
            $this->title->get_parent()->decatalog();
            unset($this->title);
        } else if (!empty($title) && !isset($this->title)) {
            $card_header = new div('card-header');
            $this->title = $card_header->append_h4($title, 'card-title');
            $this->append_child_head($card_header);
        } else if (!empty($title) && isset($this->title)) {
            $this->title->set_value($title);
        }
        return $this;
    }
    function set_body(tag|string|null $body_content): card
    {
        $this->body->set_value($body_content);
        return $this;
    }
}
