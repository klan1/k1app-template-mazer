<?php

/**
 * @package k1-app-template-mazer
 * @author k1lib
 * @description Alert component for Mazer template. Extends div to create Bootstrap-style alert messages with title, content, and optional close functionality.
 */

namespace k1app\template\mazer\components;

use k1lib\html\div;

/**
 * @description Alert component for creating Bootstrap-style alert messages. Supports titles, customizable types, closable behavior, and margin configuration.
 * @extends div
 * @uses common_methods
 */
class alert extends div {

    use common_methods;

    /**
     * @description Collection of grid cells (unused in current implementation).
     * @var array
     */
    protected $cols = [];

    /**
     * @description The alert title text.
     * @var string
     */
    protected $title = "";

    /**
     * @description The alert message content.
     * @var string
     */
    protected $message = "no message";

    /**
     * @description CSS margin value for the alert element.
     * @var string
     */
    protected $margin = '';

    /**
     * @description CSS classes for the alert element.
     * @var string
     */
    protected $class = "alert show fade";

    /**
     * @description The alert type/class suffix (e.g., 'primary', 'danger', 'success').
     * @var string
     */
    protected $type = '';

    /**
     * @description Constructor initializes an alert with message, title, closability, and type.
     * @param string|null $message The alert message content.
     * @param string|null $title Optional title for the alert.
     * @param bool $closable Whether the alert should have a close button. Defaults to true.
     * @param string $type The alert type/class suffix. Defaults to "primary".
     */
    public function __construct($message = null, $title = null, $closable = true, $type = "primary") {
        $this->message = $message;
        $this->title = $title;

        parent::__construct(null, null);
        if ($closable) {
            $this->class .= ' alert-dismissible';
            $this->append_close_button();
        }

        $this->type = $type;
    }

    /**
     * @description Sets the alert type/class suffix.
     * @param string $type The type to set (e.g., 'primary', 'danger').
     * @param bool $nonused Unused parameter retained for compatibility.
     */
    public function set_class($type, $nonused = false) {
        $this->type = $type;
    }

    /**
     * @description Sets the CSS margin for the alert.
     * @param string $margin The margin CSS value to set.
     */
    public function set_margin($margin) {
        $this->margin = $margin;
    }

    /**
     * @description Gets the alert message content.
     * @return string Returns the message text.
     */
    public function get_message() {
        return $this->message;
    }

    /**
     * @description Sets the alert message content.
     * @param string $message The message text to set.
     */
    public function set_message($message) {
        $this->message = $message;
    }

    /**
     * @description Gets the alert title text.
     * @return string Returns the title text.
     */
    public function get_title() {
        return $this->title;
    }

    /**
     * @description Sets the alert title text.
     * @param string $title The title text to set.
     */
    public function set_title($title) {
        $this->title = $title;
    }

    /**
     * @description Generates and renders the alert HTML with title and message combined.
     * @param bool $with_childs Whether to include child elements. Defaults to true.
     * @param int $n_childs Number of children to render. Defaults to 0.
     * @return string Returns the generated HTML string.
     */
    public function generate($with_childs = \TRUE, $n_childs = 0) {
        if (!empty($this->title)) {
            $h6 = new \k1lib\html\h6($this->title);
        } else {
            $h6 = "";
        }

        $this->set_value("{$h6}{$this->message}");

        if (!empty($this->margin)) {
            $this->set_attrib("style", "margin: {$this->margin}");
        }
        parent::set_class($this->class . ' alert-' . $this->type);

        return parent::generate($with_childs, $n_childs);
    }
}