<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Standard page layout with card component wrapper. Provides a complete page structure including page title, section, and card-wrapped content area.
 */

namespace k1app\template\mazer\pages;

use k1app\template\mazer\components\app\main;
use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\page_heading\page_title;
use k1app\template\mazer\components\app\main\page_heading\section;
use k1app\template\mazer\components\card;
use k1lib\html\div;
use k1lib\html\tag;

/**
 * @description Standard page class with card wrapper. Provides a full page structure with page title, section, and card-based content container for standard page layouts.
 */
class standard {

    /**
     * @description The parent div container for this page.
     * @var div
     */
    protected div $parent;

    /**
     * @description The page title component displaying title and subtitle.
     * @var page_title
     */
    protected page_title $page_title;

    /**
     * @description The section component containing the card and page content.
     * @var section
     */
    protected section $section;

    /**
     * @description The card component wrapping the page content.
     * @var card
     */
    protected card $page_content_card;

    /**
     * @description Reference to the parent footer component.
     * @var footer|null
     */
    protected footer $footer;

    /**
     * @description Reference to the parent main component.
     * @var main|null
     */
    protected main $parent_main;

    /**
     * @description Constructor initializes the standard page with card wrapper.
     * @param div $parent The parent div container to append this page to.
     * @param string $title The page title text. Defaults to 'Title'.
     * @param string $subtitle The page subtitle text. Defaults to 'Subtitle'.
     */
    function __construct(div $parent, $title = 'Title', $subtitle = 'Subtitle') {
        $this->parent = $parent;

        $this->page_title = new page_title($title, $subtitle);
        $this->parent->append_child($this->page_title);

        $this->section = new section();
        $this->parent->append_child($this->section);

        $this->page_content_card = new card(
                'Title',
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam quaerat similique iusto temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic deleniti? Placeat delectus quibusdam ratione ullam!'
        );
        $this->page_content_card->set_id('k1lib-page-content');
        $this->section->append_child($this->page_content_card);
    }

    /**
     * @description Sets the parent main component reference.
     * @param main $main_component The parent main component to associate.
     */
    function set_obj_parent(main $main_component) {
        $this->parent_main = $main_component;
    }

    /**
     * @description Sets the page title text.
     * @param tag|string|null $title The title to set.
     * @return page_title Returns the page_title instance for method chaining.
     */
    public function set_title(tag|string|null $title) {
        $this->page_title->set_title($title);
        return $this->page_title;
    }

    /**
     * @description Sets the page subtitle text.
     * @param tag|string|null $subtitle The subtitle to set.
     * @return page_title Returns the page_title instance for method chaining.
     */
    public function set_subtitle(tag|string|null $subtitle) {
        $this->page_title->set_subtitle($subtitle);
        return $this->page_title;
    }

    /**
     * @description Sets the card title text.
     * @param tag|string|null $content_title The title to set on the card.
     * @return card Returns the card instance for method chaining.
     */
    public function set_content_title(tag|string|null $content_title): card {
        $this->page_content_card->set_title($content_title);
        return $this->page_content_card;
    }

    /**
     * @description Sets the card body content.
     * @param tag|string|null $content The content to set in the card body.
     * @return card Returns the card instance for method chaining.
     */
    public function set_content(tag|string|null $content): card {
        $this->page_content_card->set_body($content);
        return $this->page_content_card;
    }

    /**
     * @description Gets the card content div element.
     * @return div Returns the card content div instance.
     */
    public function content(): div {
        return $this->page_content_card->content();
    }

    /**
     * @description Gets the section component.
     * @return section Returns the section instance.
     */
    public function section(): section {
        return $this->section;
    }
}