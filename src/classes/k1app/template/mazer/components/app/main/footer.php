<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Main footer component for Mazer template. Displays copyright information and links in the page footer with left and right content sections.
 */

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shortcuts;
use k1lib\html\p;
use k1lib\html\tag;

/**
 * @description Footer component for the main content area. Displays left and right content sections with copyright and links information.
 * @extends tag
 * @uses append_shortcuts
 */
class footer extends tag {

    use append_shortcuts;

    /**
     * @description The left content paragraph element.
     * @var p
     */
    protected p $content_left;

    /**
     * @description The right content paragraph element.
     * @var p
     */
    protected p $content_right;

    /**
     * @description Constructor initializes the footer with left and right content sections.
     * @param string $content_left The left content text (typically copyright). Defaults to '2013-2024 © Alejandro Trujillo J.'.
     * @param string $content_rigth The right content text (typically links). Defaults to GitHub link.
     */
    function __construct($content_left = '2013-2024 © Alejandro Trujillo J.', $content_rigth = '<a href="https://github.com/j0hnd03" class="klan1-site-link" target="_blank">GitHub.com/j0hnd03</a>') {
        parent::__construct("footer", FALSE);

        $footer_div = $this->append_div('footer clearfix mb-0 text-muted', 'k1app-footer');

        $this->content_left = $footer_div->append_div('float-start', 'k1app-footer-right')->append_p($content_left);
        $this->content_right = $footer_div->append_div('float-end', 'k1app-footer-left')->append_p($content_rigth);
    }

    /**
     * @description Sets the right content section of the footer.
     * @param string $content_right The content text to set in the right section.
     * @return self Returns $this for method chaining.
     */
    public function set_content_right($content_right) {
        if (!empty($content_right)) {
            $this->content_right->set_value($content_right);
        }
        return $this;
    }

    /**
     * @description Sets the left content section of the footer.
     * @param string $content_left The content text to set in the left section.
     * @return self Returns $this for method chaining.
     */
    public function set_content_left($content_left) {
        if (!empty($content_left)) {
            $this->content_left->set_value($content_left);
        }
        return $this;
    }
}