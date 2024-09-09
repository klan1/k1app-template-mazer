<?php

namespace k1app\template\mazer\components\app\main;

use k1lib\html\append_shotcuts;
use k1lib\html\p;
use k1lib\html\tag;

class footer extends tag
{

    use append_shotcuts;

    protected p $content_left;
    protected p $content_right;

    // protected footer $footer;
    // protected menu $menu;

    function __construct($content_left = '2013-2024 © Alejandro Trujillo J.', $content_rigth = '<a href="https://github.com/j0hnd03" class="klan1-site-link" target="_blank">GitHub.com/j0hnd03</a>')
    {
        parent::__construct("footer", FALSE);

        $footer_div = $this->append_div('footer clearfix mb-0 text-muted', 'k1app-footer');

        $this->content_left = $footer_div->append_div('float-start', 'k1app-footer-right')->append_p($content_left);
        $this->content_right = $footer_div->append_div('float-end', 'k1app-footer-left')->append_p($content_rigth);
    }



    /**
     * Set the value of content_right
     *
     * @return  self
     */
    public function set_content_right($content_right)
    {
        if (!empty($content_right)) {
            $this->content_right->set_value($content_right);
        }
        return $this;
    }

    /**
     * Set the value of content_left
     *
     * @return  self
     */
    public function set_content_left($content_left)
    {
        if (!empty($content_left)) {
            $this->content_left->set_value($content_left);
        }
        return $this;
    }
}
