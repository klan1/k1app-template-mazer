<?php

/**
 * PAGE: STANDARD
 */

namespace k1app\template\mazer\pages;

use k1app\template\mazer\components\app\main;
use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\page_heading\page_title;
use k1app\template\mazer\components\app\main\page_heading\section;
use k1app\template\mazer\components\card;
use k1lib\html\div;
use k1lib\html\tag;

class standard {

    protected div $div;
    protected page_title $page_title;
    protected section $section;
    protected card $page_content_card;
    protected footer $footer;
    protected main $parent_main;

    function __construct(div $div, $title = 'Title', $subtitle = 'Subtitle') {
       $this->div = $div;

        $this->page_title = new page_title($title, $subtitle);
        $this->div->append_child($this->page_title);

        $this->section = new section();
        $this->div->append_child($this->section);

        $this->page_content_card = new card(
                'Title',
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam quaerat similique iusto temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic deleniti? Placeat delectus quibusdam ratione ullam!'
        );
        $this->section->append_child($this->page_content_card);
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

    public function set_content_title(tag|string|null $content_title): card {
        $this->page_content_card->set_title($content_title);
        return $this->page_content_card;
    }

    public function set_content(tag|string|null $content): card {
        $this->page_content_card->set_body($content);
        return $this->page_content_card;
    }


}
