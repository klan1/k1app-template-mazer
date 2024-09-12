<?php
namespace k1app\template\mazer\components;

use k1lib\html\div;

class alert extends div
{

    use common_methods;

    /**
     * @var grid_cell[]
     */
    protected $cols = [];
    protected $title = "";
    protected $message = "no message";
    protected $margin = '';

    protected $class = "alert show fade";
    protected $type = '';

    public function __construct($message = null, $title = null, $closable = true, $type = "primary")
    {
        $this->message = $message;
        $this->title = $title;

        parent::__construct(null, null);
        if ($closable) {
            $this->class .= ' alert-dismissible';
            $this->append_close_button();
        }

        $this->type = $type;
    }

    public function set_class($type, $nonused = false)
    {
        $this->type = $type;
    }

    public function set_margin($margin)
    {
        $this->margin = $margin;
    }

    public function get_message()
    {
        return $this->message;
    }

    public function set_message($message)
    {
        $this->message = $message;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function generate($with_childs = \TRUE, $n_childs = 0)
    {
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
