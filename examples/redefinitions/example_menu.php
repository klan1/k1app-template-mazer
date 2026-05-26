<?php

use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu as base_menu;

class example_menu extends base_menu {

    function __construct() {
        parent::__construct();

        $this->add_menu_title("Navigation");
        $this->add_item("Overview", "/", "bi bi-bookmark-fill", "menu-overview");

        $this->add_menu_title("Layouts");
        $this->add_item("Blank", "/layouts/blank.php", "bi bi-square", "menu-blank");
        $this->add_item("Sidebar Blank", "/layouts/sidebar_blank.php", "bi bi-sidebar", "menu-sidebar-blank");
        $this->add_item("Sidebar Page", "/layouts/sidebar_page.php", "bi bi-layout-sidebar", "menu-sidebar-page");
        $this->add_item("Single Page", "/layouts/single_page.php", "bi bi-app", "menu-single-page");

        $this->add_menu_title("Reference");
        $this->add_item("Mazer Components", "/mazer/index.html", "bi bi-grid-3x3-gap", "menu-mazer-components");
    }
}
