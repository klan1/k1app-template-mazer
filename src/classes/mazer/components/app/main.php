<?php

namespace k1app\template\mazer\components\app;

use k1app\template\mazer\components\app\main\footer;
use k1app\template\mazer\components\app\main\header;
use k1lib\html\append_shotcuts;
use k1lib\html\div;

use const k1app\template\maze\TPL_URL;

class main extends div
{

    use append_shotcuts;

    protected header $header;
    protected div $page_heading;
    protected footer $footer;

    // protected wrapper $wrapper;

    // /**
    //  * Create a DIV html tag with VALUE as data. Use $div->set_value($data)
    //  * @param string $class
    //  * @param string $id
    //  */
    function __construct()
    {
        parent::__construct(null, 'main');

        $this->header = new header();
        $this->append_child_head($this->header);

        // $this->page_heading = new standard();
        // $this->append_child($this->page_heading);
        // $this->page_heading->append_to($this);
        // $this->div_heading_content();

        $this->footer = new footer();
        $this->append_child_tail($this->footer);
    }

    public function header(?string $value = null)
    {
        if (!empty($value)) {
            $this->header->set_value($value);
        }
        return $this->header;
    }

    public function page_heading(string|div|null $value = null)
    {
        if (!empty($value)) {
            if (is_string($value)) {
                $this->page_heading->set_value($value);
            } else {
                if (isset($this->page_heading)) {
                    $this->page_heading->decatalog();
                }
                $this->page_heading = $value;
                $this->append_child($this->page_heading);
            }
        }
        return $this->page_heading;
    }
    public function footer(?string $value = null)
    {
        if (!empty($value)) {
            $this->footer->set_value($value);
        }
        return $this->footer;
    }
}
