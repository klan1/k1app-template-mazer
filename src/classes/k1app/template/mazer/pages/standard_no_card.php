<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Standard page layout without card wrapper. Provides a page structure with page title, section, and content area but without the card component surrounding the content.
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
 * @description Standard page class without card wrapper. Provides a simplified page structure with page title, section, and direct content area for layouts that don't require card styling.
 */
class standard_no_card {

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
     * @description The section component containing page content.
     * @var section
     */
    protected section $section;

    /**
     * @description The div containing the page content without card wrapper.
     * @var div
     */
    protected div $page_content;

    /**
     * @description Reference to the parent main component.
     * @var footer|null
     */
    protected footer $footer;

    /**
     * @description Reference to the parent main component.
     * @var main|null
     */
    protected main $parent_main;

    /**
     * @description Constructor initializes the standard page without card.
     * @param div $parent The parent div container to append this page to.
     * @param string $title The page title text. Defaults to 'Title'.
     * @param string $subtitle The page subtitle text. Defaults to 'Subtitle'.
     */
    function __construct(div $parent, $title = 'Title', $subtitle = 'Subtitle'): void {
        $this->parent = $parent;

        $this->page_title = new page_title($title, $subtitle);
        $this->parent->append_child($this->page_title);

        $this->section = new section();
        $this->parent->append_child($this->section);

        $this->page_content = new div('no-card-page-content');
        $this->section->append_child($this->page_content);
    }

    /**
     * @description Sets the parent main component reference.
     * @param main $main_component The parent main component to associate.
     */
    function set_obj_parent(main $main_component): void {
        $this->parent_main = $main_component;
    }

    /**
     * @description Sets the page title text.
     * @param tag|string|null $title The title to set.
     * @return page_title Returns the page_title instance for method chaining.
     */
    public function set_title(tag|string|null $title): page_title {
        $this->page_title->set_title($title);
        return $this->page_title;
    }

    /**
     * @description Sets the page subtitle text.
     * @param tag|string|null $subtitle The subtitle to set.
     * @return page_title Returns the page_title instance for method chaining.
     */
    public function set_subtitle(tag|string|null $subtitle): page_title {
        $this->page_title->set_subtitle($subtitle);
        return $this->page_title;
    }

    /**
     * @description Sets the page content.
     * @param tag|string|null $content The content to set in the page content div.
     * @return card|div Returns the page_content div instance.
     */
    public function set_content(tag|string|null $content): card|div {
        $this->page_content->set_value($content);
        return $this->page_content;
    }

    /**
     * @description Gets the page content div element.
     * @return div Returns the page_content div instance.
     */
    public function content(): div {
        return $this->page_content;
    }
}