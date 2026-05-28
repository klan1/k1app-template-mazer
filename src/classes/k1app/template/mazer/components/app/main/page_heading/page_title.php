<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Page title component for Mazer template. Displays the page heading with title and subtitle in a responsive layout.
 */

namespace k1app\template\mazer\components\app\main\page_heading;

use k1lib\html\div;
use k1lib\html\h3;
use k1lib\html\p;
use k1lib\html\tag;

/**
 * @description Page title component for displaying page heading with title and subtitle. Creates a responsive container with h3 title and paragraph subtitle elements.
 * @extends div
 */
class page_title extends div {

    /**
     * @description The page title h3 element.
     * @var h3|null
     */
    protected h3 $page_title;

    /**
     * @description The page subtitle paragraph element.
     * @var p|null
     */
    protected p $page_subtitle;

    /**
     * @description The container div for title and subtitle layout.
     * @var div
     */
    protected div $container;

    /**
     * @description Constructor initializes the page title with title and subtitle.
     * @param string $title The page title text. Defaults to 'Title'.
     * @param string $subtitle The page subtitle text. Defaults to 'Subtitle'.
     */
    function __construct($title = 'Title', $subtitle = 'Subtitle'): void {
        parent::__construct('page-title');

        $this->container = $this
                ->append_div('row')
                ->append_div('col-12 col-md-6 order-md-1 order-last');

        if (!empty($title)) {
            $this->set_title($title);
        }
        if (!empty($subtitle)) {
            $this->set_subtitle($subtitle);
        }
    }

    /**
     * @description Sets or updates the page title. Can add, update, or remove the title element.
     * @param tag|string|null $title The title text or tag to set. Pass null to remove title.
     * @return self Returns $this for method chaining.
     */
    function set_title(tag|string|null $title): self {
        if (empty($title) && isset($this->page_title)) {
            $this->page_title->decatalog();
            unset($this->page_title);
        } else if (!empty($title) && !isset($this->page_title)) {
            $this->page_title = $this->container->append_h3($title, null, 'k1app-page-title');
        } else if (!empty($title) && isset($this->page_title)) {
            $this->page_title->set_value($title);
        }
        return $this;
    }

    /**
     * @description Sets or updates the page subtitle. Can add, update, or remove the subtitle element.
     * @param tag|string|null $subtitle The subtitle text or tag to set. Pass null to remove subtitle.
     * @return self Returns $this for method chaining.
     */
    function set_subtitle(tag|string|null $subtitle): self {
        if (empty($subtitle) && isset($this->page_subtitle)) {
            $this->page_subtitle->decatalog();
            unset($this->page_subtitle);
        } else if (!empty($subtitle) && !isset($this->page_subtitle)) {
            $this->page_subtitle = $this->container->append_p($subtitle, 'text-subtitle text-muted', 'k1app-page-subtitle');
        } else if (!empty($subtitle) && isset($this->page_subtitle)) {
            $this->page_subtitle->set_value($subtitle);
        }
        return $this;
    }
}