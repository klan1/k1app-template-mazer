<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Card component for Mazer template. Extends div to create a Bootstrap card container with title and body content areas.
 */

namespace k1app\template\mazer\components;

use k1lib\html\div;
use k1lib\html\h4;
use k1lib\html\tag;

/**
 * @description Card component for creating Bootstrap-style card containers. Provides methods for setting card title and body content with fluent interface.
 * @extends div
 */
class card extends div {

    /**
     * @description The card title element (h4) displayed in the card header.
     * @var h4|null
     */
    protected h4 $title;

    /**
     * @description The card body div containing the main content.
     * @var div
     */
    protected div $body;

    /**
     * @description Constructor initializes a card with title and body content.
     * @param string|tag|null $title The card title text or tag.
     * @param string|tag $content The card body content text or tag.
     */
    function __construct($title, string|tag $content): void {
        parent::__construct('card');

        $this->body = $this->append_div('card-body');
        $this->set_title($title);
        $this->body->set_value($content);
    }

    /**
     * @description Sets or updates the card title. Can add, update, or remove the title element.
     * @param string|tag|null $title The title text or tag to set. Pass null to remove title.
     * @return card Returns $this for method chaining.
     */
    function set_title(tag|string|null $title): card {
        if (empty($title) && isset($this->title)) {
            d("NULL");
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

    /**
     * @description Sets the card body content.
     * @param string|tag|null $body_content The content to set in the card body.
     * @return card Returns $this for method chaining.
     */
    function set_body(tag|string|null $body_content): card {
        $this->body->set_value($body_content);
        return $this;
    }

    /**
     * @description Gets the card body div element.
     * @return div Returns the card body div for content manipulation.
     */
    function content(): div {
        return $this->body;
    }
}