<?php

/**
 * @package k1-app-template-mazer
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @description Trait providing common utility methods for Mazer template components. Includes methods for attribute manipulation, alignment, column sizing, and close button functionality.
 */

namespace k1app\template\mazer\components;

use k1lib\html\button;

/**
 * @description Trait providing common utility methods for Mazer template components. Provides reusable functionality for alignment, responsive column sizing, attribute manipulation, and close button handling.
 */
trait common_methods {

    /**
     * @description Small screen column count value.
     * @var int|null
     */
    protected $small = NULL;

    /**
     * @description Medium screen column count value.
     * @var int|null
     */
    protected $medium = NULL;

    /**
     * @description Large screen column count value.
     * @var int|null
     */
    protected $large = NULL;

    /**
     * @description Searches for a text pattern with a number suffix in an attribute and replaces the number with a new value. Used for updating responsive column classes like 'small-1' to 'small-6'.
     * @param string $attribute The attribute name to modify (e.g., 'class').
     * @param string $text The text prefix to search for (e.g., 'small' finds 'small-5').
     * @param int $new_number The new number to replace the existing number with.
     * @return string Returns the modified attribute value.
     */
    public function replace_attribute_number($attribute, $text, $new_number): string {
        $attribute_value = $this->get_attribute($attribute);
        $text_regexp = "/({$text}-[0-9]+)/";
        $regexp_match = [];
        if (preg_match($text_regexp, $attribute_value, $regexp_match)) {
            $string_new = str_replace($regexp_match[1], "{$text}-{$new_number}", $attribute_value);
            $this->set_attrib($attribute, $string_new);
            return $string_new;
        } else {
            $this->set_attrib($attribute, $attribute_value . " {$text}-{$new_number}");
            return $attribute_value . " {$text}-{$new_number}";
        }
    }

    /**
     * @description Removes a specific text pattern from an attribute value.
     * @param string $attribute The attribute name to modify.
     * @param string $text The text pattern to remove from the attribute.
     * @return string Returns the modified attribute value.
     */
    public function remove_attribute_text($attribute, $text): string {
        $attribute_value = $this->get_attribute($attribute);
        $text_regexp = "/(\s*$text\s*)/";
        $regexp_match = [];
        if (preg_match($text_regexp, $attribute_value, $regexp_match)) {
            $string_new = str_replace($regexp_match[1], "", $attribute_value);
            $this->set_attrib($attribute, $string_new);
            return $string_new;
        } else {
            return $attribute_value;
        }
    }

    /**
     * @description Appends a Bootstrap-style close button to the element with proper data-bs-dismiss and aria-label attributes.
     */
    public function append_close_button(): void {
        $close_button = new \k1lib\html\button(NULL, "btn-close");
        $close_button->set_attrib('data-bs-dismiss', 'alert');
        $close_button->set_attrib("aria-label", "Close");
        $this->append_child_tail($close_button);
    }

    /**
     * @description Sets text alignment to center for the element.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function align_center(): \k1lib\html\div {
        $this->set_attrib("class", "align-center", TRUE);
        return $this;
    }

    /**
     * @description Sets text alignment to left for the element.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function align_left(): \k1lib\html\div {
        $this->set_attrib("class", "align-left", TRUE);
        return $this;
    }

    /**
     * @description Sets text alignment to right for the element.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function align_right(): \k1lib\html\div {
        $this->set_attrib("class", "align-right", TRUE);
        return $this;
    }

    /**
     * @description Sets text alignment to justify for the element.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function align_justify(): \k1lib\html\div {
        $this->set_attrib("class", "align-justify", TRUE);
        return $this;
    }

    /**
     * @description Sets the small screen (mobile) column span for responsive layouts using Bootstrap's col-sm-* classes.
     * @param int $cols Number of columns (1-12) for small screens.
     * @param bool $clear Whether to clear existing column classes before setting. Defaults to false.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function small($cols, $clear = FALSE): \k1lib\html\div {
        $this->small = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-sm-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "small", $cols);
        }

        return $this;
    }

    /**
     * @description Sets the medium screen (tablet) column span for responsive layouts using Bootstrap's col-md-* classes.
     * @param int $cols Number of columns (1-12) for medium screens.
     * @param bool $clear Whether to clear existing column classes before setting. Defaults to false.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function medium($cols, $clear = FALSE): \k1lib\html\div {
        $this->medium = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-md-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "medium", $cols);
        }

        return $this;
    }

    /**
     * @description Sets the large screen (desktop) column span for responsive layouts using Bootstrap's col-lg-* classes.
     * @param int $cols Number of columns (1-12) for large screens.
     * @param bool $clear Whether to clear existing column classes before setting. Defaults to false.
     * @return \k1lib\html\div Returns $this for method chaining.
     */
    public function large($cols, $clear = FALSE): \k1lib\html\div {
        $this->large = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-lg-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "large", $cols);
        }

        return $this;
    }

    /**
     * @description Gets the small screen column count value.
     * @return int|null Returns the small screen column count.
     */
    public function get_small(): ?int {
        return $this->small;
    }

    /**
     * @description Gets the medium screen column count value.
     * @return int|null Returns the medium screen column count.
     */
    public function get_medium(): ?int {
        return $this->medium;
    }

    /**
     * @description Gets the large screen column count value.
     * @return int|null Returns the large screen column count.
     */
    public function get_large(): ?int {
        return $this->large;
    }
}