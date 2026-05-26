<?php

/**
 * PAGE: STANDARD NO CARD
 */

namespace k1app\template\mazer\pages;

use k1app\template\mazer\components\app\main;
use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\page_heading\page_title;
use k1app\template\mazer\components\app\main\page_heading\section;
use k1app\template\mazer\components\card;
use k1lib\html\div;
use k1lib\html\tag;

class standard_no_card {

    protected div $parent;
    protected page_title $page_title;
    protected section $section;
    protected div $page_content;
    protected footer $footer;
    protected main $parent_main;

    function __construct(div $parent, $title = 'Title', $subtitle = 'Subtitle') {
        $this->parent = $parent;

        $this->page_title = new page_title($title, $subtitle);
        $this->parent->append_child($this->page_title);

        $this->section = new section();
        $this->parent->append_child($this->section);

        $this->page_content = new div('no-card-page-content');
        $this->section->append_child($this->page_content);
    }

    function set_obj_parent(main $main_component) {
        $this->parent_main = $main_component;
    }

    public function set_title(tag|string|null $title) {
        $this->page_title->set_title($title);
        return $this->page_title;
    }

    public function set_subtitle(tag|string|null $subtitle) {
        $this->page_title->set_subtitle($subtitle);
        return $this->page_title;
    }

    public function set_content(tag|string|null $content): card|div {
        $this->page_content->set_value($content);
        return $this->page_content;
    }

    public function content(): div {
        return $this->page_content;
    }
}
