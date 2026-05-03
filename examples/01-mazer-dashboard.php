<?php

require_once __DIR__ . '/../vendor/autoload.php';

use k1lib\html\html_document;
use k1app\template\mazer\components\app;

$doc = new html_document();
$doc->head()->set_title("Dashboard - Mazer Admin Dashboard");
$doc->head()->append_meta("charset", "UTF-8");
$doc->head()->append_meta("viewport", "width=device-width, initial-scale=1.0");

$doc->head()->link_css("assets/compiled/css/app.css");
$doc->head()->link_css("assets/compiled/css/app-dark.css");
$doc->head()->link_css("assets/compiled/css/iconly.css");

$doc->head()->link_js("assets/static/js/initTheme.js");
$doc->head()->link_js("assets/compiled/js/app.js");
$doc->head()->link_js("assets/extensions/apexcharts/apexcharts.min.js");
$doc->head()->link_js("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js");
$doc->head()->link_js("assets/static/js/components/dark.js");
$doc->head()->link_js("assets/static/js/pages/dashboard.js");

$body = $doc->body();

$app = new app();
$app->set_id("app");
$body->append_child($app);

$app->sidebar()->set_id("sidebar");
$app->main()->set_id("main");

$menu = new \k1lib\html\bootstrap\menu();

$app->sidebar()->wrapper()->sidebar_menu()->menu($menu);

$menu->add_menu_title("Menu");

$dashboardItem = $menu->add_item("Dashboard", "index.html", "bi bi-grid-fill");
$dashboardItem->nav_is_active();

$componentsItem = $menu->add_item("Components", "#", "bi bi-stack")->nav_is_sub();
$componentsItem->add_subitem("Accordion", "component-accordion.html");
$componentsItem->add_subitem("Alert", "component-alert.html");
$componentsItem->add_subitem("Badge", "component-badge.html");
$componentsItem->add_subitem("Breadcrumb", "component-breadcrumb.html");
$componentsItem->add_subitem("Button", "component-button.html");
$componentsItem->add_subitem("Card", "component-card.html");
$componentsItem->add_subitem("Carousel", "component-carousel.html");
$componentsItem->add_subitem("Collapse", "component-collapse.html");
$componentsItem->add_subitem("Dropdown", "component-dropdown.html");
$componentsItem->add_subitem("List Group", "component-list-group.html");
$componentsItem->add_subitem("Modal", "component-modal.html");
$componentsItem->add_subitem("Navs", "component-navs.html");
$componentsItem->add_subitem("Pagination", "component-pagination.html");
$componentsItem->add_subitem("Placeholder", "component-placeholder.html");
$componentsItem->add_subitem("Progress", "component-progress.html");
$componentsItem->add_subitem("Spinner", "component-spinner.html");
$componentsItem->add_subitem("Toasts", "component-toasts.html");
$componentsItem->add_subitem("Tooltip", "component-tooltip.html");

$extraItem = $menu->add_item("Extra Components", "#", "bi bi-collection-fill")->nav_is_sub();
$extraItem->add_subitem("Avatar", "extra-component-avatar.html");
$extraItem->add_subitem("Comment", "extra-component-comment.html");
$extraItem->add_subitem("Divider", "extra-component-divider.html");
$extraItem->add_subitem("Date Picker", "extra-component-date-picker.html");
$extraItem->add_subitem("Flag", "extra-component-flag.html");
$extraItem->add_subitem("Sweet Alert", "extra-component-sweetalert.html");
$extraItem->add_subitem("Toastify", "extra-component-toastify.html");
$extraItem->add_subitem("Rating", "extra-component-rating.html");

$layoutsItem = $menu->add_item("Layouts", "#", "bi bi-grid-1x2-fill")->nav_is_sub();
$layoutsItem->add_subitem("Default Layout", "layout-default.html");
$layoutsItem->add_subitem("1 Column", "layout-vertical-1-column.html");
$layoutsItem->add_subitem("Vertical Navbar", "layout-vertical-navbar.html");
$layoutsItem->add_subitem("RTL Layout", "layout-rtl.html");
$layoutsItem->add_subitem("Horizontal Menu", "layout-horizontal.html");

$menu->add_menu_title("Forms & Tables");

$formElementsItem = $menu->add_item("Form Elements", "#", "bi bi-hexagon-fill")->nav_is_sub();
$formElementsItem->add_subitem("Input", "form-element-input.html");
$formElementsItem->add_subitem("Input Group", "form-element-input-group.html");
$formElementsItem->add_subitem("Select", "form-element-select.html");
$formElementsItem->add_subitem("Radio", "form-element-radio.html");
$formElementsItem->add_subitem("Checkbox", "form-element-checkbox.html");
$formElementsItem->add_subitem("Textarea", "form-element-textarea.html");

$menu->add_item("Form Layout", "form-layout.html", "bi bi-file-earmark-medical-fill");

$formValidationItem = $menu->add_item("Form Validation", "#", "bi bi-journal-check")->nav_is_sub();
$formValidationItem->add_subitem("Parsley", "form-validation-parsley.html");

$formEditorItem = $menu->add_item("Form Editor", "#", "bi bi-pen-fill")->nav_is_sub();
$formEditorItem->add_subitem("Quill", "form-editor-quill.html");
$formEditorItem->add_subitem("CKEditor", "form-editor-ckeditor.html");
$formEditorItem->add_subitem("Summernote", "form-editor-summernote.html");
$formEditorItem->add_subitem("TinyMCE", "form-editor-tinymce.html");

$menu->add_item("Table", "table.html", "bi bi-grid-1x2-fill");

$datatablesItem = $menu->add_item("Datatables", "#", "bi bi-file-earmark-spreadsheet-fill")->nav_is_sub();
$datatablesItem->add_subitem("Datatable", "table-datatable.html");
$datatablesItem->add_subitem("Datatable (jQuery)", "table-datatable-jquery.html");

$menu->add_menu_title("Extra UI");

$widgetsItem = $menu->add_item("Widgets", "#", "bi bi-pentagon-fill")->nav_is_sub();
$widgetsItem->add_subitem("Chatbox", "ui-widgets-chatbox.html");
$widgetsItem->add_subitem("Pricing", "ui-widgets-pricing.html");
$widgetsItem->add_subitem("To-do List", "ui-widgets-todolist.html");

$iconsItem = $menu->add_item("Icons", "#", "bi bi-egg-fill")->nav_is_sub();
$iconsItem->add_subitem("Bootstrap Icons", "ui-icons-bootstrap-icons.html");
$iconsItem->add_subitem("Fontawesome", "ui-icons-fontawesome.html");
$iconsItem->add_subitem("Dripicons", "ui-icons-dripicons.html");

$chartsItem = $menu->add_item("Charts", "#", "bi bi-bar-chart-fill")->nav_is_sub();
$chartsItem->add_subitem("ChartJS", "ui-chart-chartjs.html");
$chartsItem->add_subitem("Apexcharts", "ui-chart-apexcharts.html");

$menu->add_item("File Uploader", "ui-file-uploader.html", "bi bi-cloud-arrow-up-fill");

$mapsItem = $menu->add_item("Maps", "#", "bi bi-map-fill")->nav_is_sub();
$mapsItem->add_subitem("Google Map", "ui-map-google-map.html");
$mapsItem->add_subitem("JS Vector Map", "ui-map-jsvectormap.html");
$mapsItem->add_subitem("Leaflet Map", "ui-map-leaflet.html");
$mapsItem->add_subitem("OpenLayers Map", "ui-map-openlayers.html");

$multiLevelItem = $menu->add_item("Multi-level Menu", "#", "bi bi-three-dots")->nav_is_sub();
$multiLevelItem->add_subitem("First Level", "ui-multi-level-menu.html");

$menu->add_menu_title("Pages");

$menu->add_item("Email", "application-email.html", "bi bi-envelope-fill");
$menu->add_item("Chat", "application-chat.html", "bi bi-chat-dots-fill");
$menu->add_item("Gallery", "application-gallery.html", "bi bi-image-fill");
$menu->add_item("Checkout", "application-checkout.html", "bi bi-basket-fill");

$accountItem = $menu->add_item("Account", "#", "bi bi-person-circle")->nav_is_sub();
$accountItem->add_subitem("Profile", "account-profile.html");
$accountItem->add_subitem("Security", "account-security.html");

$authItem = $menu->add_item("Authentication", "#", "bi bi-person-badge-fill")->nav_is_sub();
$authItem->add_subitem("Login", "auth-login.html");
$authItem->add_subitem("Register", "auth-register.html");
$authItem->add_subitem("Forgot Password", "auth-forgot-password.html");

$errorsItem = $menu->add_item("Errors", "#", "bi bi-x-octagon-fill")->nav_is_sub();
$errorsItem->add_subitem("403", "error-403.html");
$errorsItem->add_subitem("404", "error-404.html");
$errorsItem->add_subitem("500", "error-500.html");

$menu->add_menu_title("Raise Support");

$menu->add_item("Documentation", "https://zuramai.github.io/mazer/docs", "bi bi-life-preserver");
$menu->add_item("Contributing", "https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md", "bi bi-puzzle");
$menu->add_item("Donation", "https://github.com/zuramai/mazer#donation", "bi bi-cash");

$main = $app->main();

$main->set_class("main flex-grow-1 p-4");

$main->append_h1("Dashboard")->set_class("mb-4");

$statsRow = $main->append_div("row");

$statCards = [
    ["icon" => "bi bi-people-fill", "label" => "Profile Views", "value" => "112.000", "color" => "blue"],
    ["icon" => "bi bi-heart-fill", "label" => "Likes", "value" => "183.000", "color" => "purple"],
    ["icon" => "bi bi-person-plus-fill", "label" => "Following", "value" => "80.000", "color" => "green"],
    ["icon" => "bi bi-bookmark-fill", "label" => "Saved Post", "value" => "112", "color" => "red"],
];

foreach ($statCards as $card) {
    $col = $statsRow->append_div("col-6 col-lg-3 col-md-6");
    $cardDiv = $col->append_div("card");
    $cardBody = $cardDiv->append_div("card-body px-4 py-4-5");
    $innerRow = $cardBody->append_div("row");

    $iconCol = $innerRow->append_div("col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start");
    $iconBox = $iconCol->append_div("stats-icon {$card['color']} mb-2");
    $iconBox->append_i(null, $card['icon']);

    $textCol = $innerRow->append_div("col-md-8 col-lg-12 col-xl-12 col-xxl-7");
    $textCol->append_h6($card['label'])->set_class("text-muted font-semibold");
    $textCol->append_h6($card['value'])->set_class("font-extrabold mb-0");
}

$chartRow = $main->append_div("row mt-4");
$chartCol = $chartRow->append_div("col-12");
$chartCard = $chartCol->append_div("card");
$chartCard->append_div("card-header")->append_h4("Profile Visit")->set_class("mb-0");
$chartCardBody = $chartCard->append_div("card-body");
$chartCardBody->append_div("") ->set_id("chart-profile-visit");

$tableRow = $main->append_div("row mt-4");
$tableCol = $tableRow->append_div("col-12");
$tableCard = $tableCol->append_div("card");
$tableCard->append_div("card-header")->append_h4("Latest Comments") ->set_class("mb-0");

$tableBody = $tableCard->append_div("card-body");
$tableResponsive = $tableBody->append_div("table-responsive");

$table = $tableResponsive->append_child(new \k1lib\html\table("table table-hover table-lg"));
$tableHead = $table->append_thead();
$tableHeaderRow = $tableHead->append_tr();
$tableHeaderRow->append_child(new \k1lib\html\th("Name"));
$tableHeaderRow->append_child(new \k1lib\html\th("Comment"));

$tableBody = $table->append_tbody();

$comments = [
    ["name" => "Si Cantik", "comment" => "Congratulations on your graduation!"],
    ["name" => "Si Ganteng", "comment" => "Wow amazing design! Can you make another tutorial for this design?"],
    ["name" => "Singh Eknoor", "comment" => "What a stunning design! You are so talented and creative!"],
    ["name" => "Rani Jhadav", "comment" => "I love your design! It's so beautiful and unique!"],
];

foreach ($comments as $row) {
    $tr = $tableBody->append_tr();
    $nameTd = $tr->append_td("");
    $nameTd->set_class("col-3");
    $nameDiv = $nameTd->append_div("d-flex align-items-center");
    $nameDiv->append_div("avatar avatar-md")->append_child(new \k1lib\html\img("./assets/compiled/jpg/5.jpg", "Avatar"))->set_class("rounded-circle");
    $nameDiv->append_p($row['name'])->set_class("font-bold ms-3 mb-0");

    $commentTd = $tr->append_td("");
    $commentTd->set_class("col-auto");
    $commentTd->append_p($row['comment'])->set_class("mb-0");
}

$footer = $app->append_child(new \k1lib\html\footer());
$footer->set_class("footer mt-auto py-3 bg-light");
$footerContainer = $footer->append_div("container text-center");
$footerContainer->append_span("2026 © Mazer. Generated with k1lib.html.") ->set_class("text-muted");

echo $doc->generate();
