<?php

require_once __DIR__ . '/../vendor/autoload.php';

use k1lib\html\html_document;
use k1app\template\mazer\components\app;
use k1app\template\mazer\components\card;
use k1app\template\mazer\components\app\main\page_heading\page_title;
use k1app\template\mazer\components\app\main\page_heading\section;

$doc = new html_document();
$doc->head()->set_title("Mazer Components Example");
$doc->head()->append_meta("charset", "UTF-8");
$doc->head()->append_meta("viewport", "width=device-width, initial-scale=1.0");

$doc->head()->link_css("assets/compiled/css/app.css");
$doc->head()->link_css("assets/compiled/css/app-dark.css");

$doc->head()->link_js("assets/static/js/initTheme.js");
$doc->head()->link_js("assets/compiled/js/app.js");
$doc->head()->link_js("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js");
$doc->head()->link_js("assets/static/js/components/dark.js");

$body = $doc->body();

$app = new app();
$app->set_id("app");
$body->append_child($app);

$app->sidebar()->set_id("sidebar");
$app->main()->set_id("main");

$menu = $app->sidebar()->wrapper()->sidebar_menu()->menu();

$menu->add_menu_title("Dashboard");

$menu->add_item("Dashboard", "index.html", "bi bi-grid-fill");

$layoutsItem = $menu->add_item("Layouts", "#", "bi bi-grid-1x2-fill")->nav_is_sub();
$layoutsItem->add_subitem("Default Layout", "layout-default.html");
$layoutsItem->add_subitem("Vertical Navbar", "layout-vertical-navbar.html")->nav_is_active();
$layoutsItem->add_subitem("1 Column", "layout-vertical-1-column.html");

$componentsItem = $menu->add_item("Components", "#", "bi bi-stack")->nav_is_sub();
$componentsItem->add_subitem("Accordion", "component-accordion.html");
$componentsItem->add_subitem("Alert", "component-alert.html");
$componentsItem->add_subitem("Badge", "component-badge.html");

$menu->add_menu_title("Forms & Tables");
$menu->add_item("Form Layout", "form-layout.html", "bi bi-file-earmark-medical-fill");
$menu->add_item("Table", "table.html", "bi bi-grid-1x2-fill");

$main = $app->main();

$pageTitle = new page_title("Component Example", "Built with k1app-template-mazer classes");
$main->page_heading()->append_child($pageTitle);

$section = new section();
$main->page_heading()->append_child($section);

$welcomeCard = new card("Welcome", "This page is built using the component classes from k1app-template-mazer.");
$section->append_child($welcomeCard);

$statsRow = $section->append_div("row mt-4");

$stats = [
    ["icon" => "bi bi-people-fill", "color" => "blue", "message" => "Profile Views", "value" => "112.000"],
    ["icon" => "bi bi-heart-fill", "color" => "purple", "message" => "Likes", "value" => "183.000"],
    ["icon" => "bi bi-person-plus-fill", "color" => "green", "message" => "Following", "value" => "80.000"],
];

foreach ($stats as $stat) {
    $col = $statsRow->append_div("col-6 col-lg-3 col-md-6");
    $card = $col->append_div("card");
    $cardBody = $card->append_div("card-body px-4 py-4-5");
    $innerRow = $cardBody->append_div("row");

    $iconCol = $innerRow->append_div("col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start");
    $iconBox = $iconCol->append_div("stats-icon {$stat['color']} mb-2");
    $iconBox->append_i(null, $stat['icon']);

    $textCol = $innerRow->append_div("col-md-8 col-lg-12 col-xl-12 col-xxl-7");
    $textCol->append_h6($stat['message'])->set_class("text-muted font-semibold");
    $textCol->append_h6($stat['value'])->set_class("font-extrabold mb-0");
}

$aboutCard = new card("About Components", "The k1app-template-mazer package provides reusable components on top of k1lib.html.");
$section->append_child($aboutCard);

$main->footer()->set_content_left("2026 © Component Example");
$main->footer()->set_content_right("Built with k1lib.html + k1app-template-mazer");

echo $doc->generate();
