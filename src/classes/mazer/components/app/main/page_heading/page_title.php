<?php

namespace k1app\template\mazer\components\app\main\page_heading;

use k1lib\html\div;
use k1lib\html\h3;
use k1lib\html\p;
use k1lib\html\tag;

class page_title extends div
{
    protected h3 $page_title;
    protected p $page_subtitle;

    protected div $container;

    function __construct($title = 'Title', $subtitle = 'Subtitle')
    {
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

    function set_title(tag|string|null $title)
    {
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
    function set_subtitle(tag|string|null $subtitle)
    {
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
