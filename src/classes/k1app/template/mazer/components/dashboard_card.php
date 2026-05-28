<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Dashboard card component for displaying statistics. Extends div to create a card with icon, message, and value display for dashboard widgets.
 */

namespace k1app\template\mazer\components;

use k1lib\html\div;
use k1lib\html\h4;
use k1lib\html\h6;
use k1lib\html\i;
use k1lib\html\tag_catalog;
use const k1app\template\mazer\TPL_URL;

/**
 * @description Dashboard card component for displaying statistics and metrics. Creates a card-style container with icon, message label, and numeric/statistic value.
 * @extends div
 */
class dashboard_card extends div {

    /**
     * @description Title element for the card (unused in current implementation but retained for compatibility).
     * @var h4|null
     */
    protected h4 $title;

    /**
     * @description Body container div for card content layout.
     * @var div
     */
    protected div $body;

    /**
     * @description Icon element displaying the dashboard metric icon.
     * @var i
     */
    protected i $icon;

    /**
     * @description Content container div for message and value layout.
     * @var div
     */
    protected div $content;

    /**
     * @description Message label element showing the metric description.
     * @var h6
     */
    protected h6 $content_message;

    /**
     * @description Value element showing the actual metric value.
     * @var h6
     */
    protected h6 $content_value;

    /**
     * @description Constructor initializes a dashboard card with icon, color, message, and value.
     * @param string $icon Bootstrap icon class for the metric icon (e.g., 'bi bi-play').
     * @param string $color Color class for the icon styling (e.g., 'blue', 'purple').
     * @param string $message The description/label text for the metric.
     * @param mixed $value The value to display for the metric.
     */
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

    /**
     * @description Sets the message text for the card.
     * @param string $message The message text to set.
     * @return self Returns $this for method chaining.
     */
    function set_messaje($message): self {
        $this->content_message->set_value($message);
        return $this;
    }

    /**
     * @description Sets the value text for the card.
     * @param mixed $value The value to set.
     * @return self Returns $this for method chaining.
     */
    function set_value_($value): self {
        $this->content_value->set_value($value);
        return $this;
    }
}