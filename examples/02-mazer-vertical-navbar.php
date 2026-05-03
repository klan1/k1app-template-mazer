<?php

require_once __DIR__ . '/../vendor/autoload.php';

use k1lib\html\html_document;
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;

class vertical_navbar_menu extends menu {

    function __construct() {
        parent::__construct();

        $this->add_menu_title("Menu");

        $this->add_item("Dashboard", "index.html", "bi bi-grid-fill");

        $layoutsItem = $this->add_item("Layouts", "#", "bi bi-grid-1x2-fill")->nav_is_sub();
        $layoutsItem->add_subitem("Default Layout", "layout-default.html");
        $layoutsItem->add_subitem("1 Column", "layout-vertical-1-column.html");
        $verticalItem = $layoutsItem->add_subitem("Vertical Navbar", "layout-vertical-navbar.html");
        $verticalItem->nav_is_active();
        $layoutsItem->add_subitem("RTL Layout", "layout-rtl.html");
        $layoutsItem->add_subitem("Horizontal Menu", "layout-horizontal.html");
    }
}

$doc = new html_document();
$doc->head()->set_title("Vertical Navbar - Mazer Admin Dashboard");
$doc->head()->append_meta("charset", "UTF-8");
$doc->head()->append_meta("viewport", "width=device-width, initial-scale=1.0");

$doc->head()->link_css("assets/compiled/css/app.css");
$doc->head()->link_css("assets/compiled/css/app-dark.css");

$doc->head()->link_js("assets/static/js/initTheme.js");
$doc->head()->link_js("assets/compiled/js/app.js");
$doc->head()->link_js("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js");
$doc->head()->link_js("assets/static/js/components/dark.js");

$body = $doc->body();

$app = $body->append_div("d-flex");
$app->set_id("app");

$sidebar = $app->append_div("sidebar-wrapper active");
$sidebar->set_id("sidebar");

$sidebarHeader = $sidebar->append_div("sidebar-header position-relative");
$headerInner = $sidebarHeader->append_div("d-flex justify-content-between align-items-center");
$logo = $headerInner->append_div("logo");
$logo->append_child(new \k1lib\html\a("index.html", "Mazer", null, null, null));

$menu = new vertical_navbar_menu();
$menu->append_to($sidebar);

$main = $app->append_child(new \k1lib\html\main());
$main->set_id("main");
$main->set_class("layout-navbar navbar-fixed");

$header = $main->append_child(new \k1lib\html\header());
$nav = $header->append_child(new \k1lib\html\nav());
$nav->set_class("navbar navbar-expand navbar-light navbar-top");

$navContainer = $nav->append_div("container-fluid");

$burgerBtn = $navContainer->append_child(new \k1lib\html\a("#", ""));
$burgerBtn->set_class("burger-btn d-block");
$burgerBtn->append_i(null, "bi bi-justify fs-3");

$navCollapse = $navContainer->append_div("collapse navbar-collapse");
$navCollapse->set_id("navbarSupportedContent");

$navUl = $navCollapse->append_child(new \k1lib\html\ul());
$navUl->set_class("navbar-nav ms-auto mb-lg-0");

$mailItem = $navUl->append_li();
$mailItem->set_class("nav-item dropdown me-1");
$mailLink = $mailItem->append_child(new \k1lib\html\a("#", ""));
$mailLink->set_class("nav-link active dropdown-toggle text-gray-600");
$mailLink->set_attrib("data-bs-toggle", "dropdown");
$mailLink->set_attrib("aria-expanded", "false");
$mailLink->append_i(null, "bi bi-envelope bi-sub fs-4");

$mailDropdown = $mailItem->append_child(new \k1lib\html\ul());
$mailDropdown->set_class("dropdown-menu dropdown-menu-lg-end");
$mailDropdown->set_attrib("aria-labelledby", "dropdownMenuButton");
$mailDropdown->append_li()->append_h6("Mail")->set_class("dropdown-header");
$mailDropdown->append_li()->append_child(new \k1lib\html\a("#", "No new mail"))->set_class("dropdown-item");

$notifItem = $navUl->append_li();
$notifItem->set_class("nav-item dropdown me-3");
$notifLink = $notifItem->append_child(new \k1lib\html\a("#", ""));
$notifLink->set_class("nav-link active dropdown-toggle text-gray-600");
$notifLink->set_attrib("data-bs-toggle", "dropdown");
$notifLink->set_attrib("data-bs-display", "static");
$notifLink->set_attrib("aria-expanded", "false");
$notifLink->append_i(null, "bi bi-bell bi-sub fs-4");

$notifBadge = $notifLink->append_span("7");
$notifBadge->set_class("badge badge-notification bg-danger");

$notifDropdown = $notifItem->append_child(new \k1lib\html\ul());
$notifDropdown->set_class("dropdown-menu dropdown-center dropdown-menu-sm-end notification-dropdown");
$notifDropdown->set_attrib("aria-labelledby", "dropdownMenuButton");

$notifHeader = $notifDropdown->append_li();
$notifHeader->set_class("dropdown-header");
$notifHeader->append_h6("Notifications");

$notifications = [
    ["icon" => "bi bi-cart-check", "color" => "bg-primary", "title" => "Successfully check out", "subtitle" => "Order ID #256"],
    ["icon" => "bi bi-file-earmark-check", "color" => "bg-success", "title" => "Homework submitted", "subtitle" => "Algebra math homework"],
];

foreach ($notifications as $notif) {
    $notifLi = $notifDropdown->append_li();
    $notifLi->set_class("dropdown-item notification-item");
    $notifA = $notifLi->append_child(new \k1lib\html\a("#", ""));
    $notifA->set_class("d-flex align-items-center");
    $notifIcon = $notifA->append_div("notification-icon {$notif['color']}");
    $notifIcon->append_i(null, $notif['icon']);
    $notifText = $notifA->append_div("notification-text ms-4");
    $notifText->append_p($notif['title'])->set_class("notification-title font-bold");
    $notifText->append_p($notif['subtitle'])->set_class("notification-subtitle font-thin text-sm");
}

$seeAllLi = $notifDropdown->append_li();
$seeAllLi->append_p("See all notification") ->set_class("text-center py-2 mb-0");
$seeAllLi->append_child(new \k1lib\html\a("#", ""));

$userDropdown = $navCollapse->append_div("dropdown");
$userDropdownLink = $userDropdown->append_child(new \k1lib\html\a("#", ""));
$userDropdownLink->set_attrib("data-bs-toggle", "dropdown");
$userDropdownLink->set_attrib("aria-expanded", "false");

$userMenu = $userDropdownLink->append_div("user-menu d-flex");
$userName = $userMenu->append_div("user-name text-end me-3");
$userName->append_h6("John Ducky") ->set_class("mb-0 text-gray-600");
$userName->append_p("Administrator") ->set_class("mb-0 text-sm text-gray-600");

$userImg = $userMenu->append_div("user-img d-flex align-items-center");
$userImg->append_div("avatar avatar-md") ->append_child(new \k1lib\html\img("./assets/compiled/jpg/1.jpg", "User"));

$userMenuDropdown = $userDropdown->append_child(new \k1lib\html\ul());
$userMenuDropdown->set_class("dropdown-menu dropdown-menu-end");
$userMenuDropdown->set_attrib("aria-labelledby", "dropdownMenuButton");
$userMenuDropdown->set_style("min-width: 11rem;");
$userMenuDropdown->append_li()->append_h6("Hello, John!") ->set_class("dropdown-header");
$userMenuDropdown->append_li()->append_child(new \k1lib\html\a("#", "My Profile"))->set_class("dropdown-item");
$userMenuDropdown->append_li()->append_child(new \k1lib\html\a("#", "Settings"))->set_class("dropdown-item");
$userMenuDropdown->append_li()->append_child(new \k1lib\html\a("#", "Wallet"))->set_class("dropdown-item");
$userMenuDropdown->append_li()->append_child(new \k1lib\html\hr(""))->set_class("dropdown-divider");
$userMenuDropdown->append_li()->append_child(new \k1lib\html\a("#", "Logout"))->set_class("dropdown-item");

$mainContent = $main->append_div("");
$mainContent->set_id("main-content");

$pageHeading = $mainContent->append_div("page-heading");
$pageTitle = $pageHeading->append_div("page-title");

$titleRow = $pageTitle->append_div("row");
$titleLeft = $titleRow->append_div("col-12 col-md-6 order-md-1 order-last");
$titleLeft->append_h3("Vertical Layout with Navbar");
$titleLeft->append_p("Navbar will appear on the top of the page.") ->set_class("text-subtitle text-muted");

$titleRight = $titleRow->append_div("col-12 col-md-6 order-md-2 order-first");
$breadcrumbNav = $titleRight->append_child(new \k1lib\html\nav());
$breadcrumbNav->set_attrib("aria-label", "breadcrumb");
$breadcrumbNav->set_class("breadcrumb-header float-start float-lg-end");
$breadcrumbOl = $breadcrumbNav->append_child(new \k1lib\html\ol());
$breadcrumbOl->set_class("breadcrumb");
$breadcrumbOl->append_li()->append_child(new \k1lib\html\a("index.html", "Dashboard"))->set_class("breadcrumb-item");
$breadcrumbOl->append_li("Layout Vertical Navbar") ->set_class("breadcrumb-item active");

$section = $pageHeading->append_child(new \k1lib\html\section());
$section->set_class("section");

$aboutCard = $section->append_div("card");
$aboutCard->append_div("card-header") ->append_h4("About Vertical Navbar") ->set_class("card-title");
$aboutCardBody = $aboutCard->append_div("card-body");
$aboutCardBody->append_p("Vertical Navbar is a layout option that you can use with Mazer.");
$aboutCardBody->append_p("In case you want the navbar to be sticky on top while scrolling, add .navbar-fixed class alongside with .layout-navbar class.");

$dummyCard = $section->append_div("card");
$dummyCard->append_div("card-header") ->append_h4("Dummy Text") ->set_class("card-title");
$dummyCardBody = $dummyCard->append_div("card-body");
$dummyCardBody->append_p("Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis tincidunt tempus. Duis vitae facilisis enim, at rutrum lacus.");
$dummyCardBody->append_p("Proin accumsan nec arcu sit amet volutpat. Proin non risus luctus, tempus quam quis, volutpat orci. Phasellus commodo arcu dui, ut convallis quam sodales maximus.");
$dummyCardBody->append_p("In pharetra quam vel lobortis fermentum. Nulla vel risus ut sapien porttitor volutpat eu ac lorem.");

$footer = $main->append_child(new \k1lib\html\footer());
$footer->set_class("footer clearfix mb-0 text-muted");
$footerRow = $footer->append_div("float-start");
$footerRow->append_p("2023 &copy; Mazer");
$footerRight = $footer->append_div("float-end");
$footerRight->append_p("Crafted with by Saugi") ->set_class("text-danger");

echo $doc->generate();
