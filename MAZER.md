# Mazer PHP Classes Reference

Mapping of [Mazer template](https://zuramai.github.io/mazer/demo/index.html) components to PHP classes in `src/classes/mazer/`.

## Layouts

| Mazer HTML | PHP Class | Description |
|------------|-----------|-------------|
| — | `layouts\blank` | Minimal page, no sidebar or app shell |
| — | `layouts\sidebar_blank` | Full sidebar layout, no pre-built content |
| — | `layouts\sidebar_page` | Full sidebar with standard page content |
| — | `layouts\single_page` | No sidebar, container-based (login pages) |

## App Shell Components

| HTML Element | PHP Class | Description |
|--------------|-----------|-------------|
| `<div class="app">` | `components\app` | Root container. Auto-creates `sidebar` and `main` |
| `<div id="sidebar">` | `components\app\sidebar` | Sidebar wrapper |
| `<div class="sidebar-wrapper">` | `components\app\sidebar\wrapper` | Contains header and menu |
| `.sidebar-header` | `components\app\sidebar\wrapper\header` | Logo + theme toggle |
| `<div class="sidebar-menu">` | `components\app\sidebar\wrapper\sidebar_menu` | Menu container |
| `<ul class="menu">` | `components\app\sidebar\wrapper\sidebar_menu\menu` | Main menu list |
| `<li class="menu-item">` | `components\app\sidebar\wrapper\sidebar_menu\menu_item` | Menu item |
| `<li class="menu-item sub">` | `components\app\sidebar\wrapper\sidebar_menu\submenu_item` | Submenu item |
| `<div class="main">` | `components\app\main` | Main content area |
| `.main-header` | `components\app\main\header` | Top header with burger toggle |
| `.page-heading` | `components\app\main\page_heading` | Page title section |
| `.section` | `components\app\main\page_heading\section` | Content section container |
| `.main-footer` | `components\app\main\footer` | Footer with copyright |

## Page Content Components

| HTML Element | PHP Class | Description |
|--------------|-----------|-------------|
| `.page-title` | `components\app\main\page_heading\page_title` | H3 title + subtitle |
| `.card` | `components\card` | Card with header and body |
| `.card .card-body` | `components\card` | Card body content |
| `.alert` | `components\alert` | Bootstrap alert |
| `.card .dashboard-card` | `components\dashboard_card` | Stat card with icon |

## Menu System

```
menu (ul)
  ├── menu_title (li) — section label
  ├── menu_item (li) — nav link → nav_is_sub() → submenu
  └── submenu (ul) — nested list
        └── submenu_item (li) — nested nav link
```

### Menu Methods

- `add_menu_title(string)` — Add section label
- `add_item(string $label, string $href, string $icon)` — Add menu item
- `nav_is_active()` — Mark item as active
- `nav_is_sub()` — Convert to expandable submenu, returns `submenu`
- `add_subitem(string $label, string $href)` — Add item to submenu

## Pages

| PHP Class | Description |
|-----------|-------------|
| `pages\standard` | page_title + section + card |
| `pages\standard_no_card` | page_title + section (no card wrapper) |

## Page Content Methods

```php
$doc->page_content()->set_title("Page Title");
$doc->page_content()->set_subtitle("Subtitle text");
$doc->page_content()->set_content("HTML content");
```

## Component Hierarchy

```
layouts\blank|sidebar_blank|sidebar_page|single_page (extends core)
  └── core (extends html_document)
        ├── head — auto-links Mazer CSS
        └── body
              └── app
                  ├── sidebar
                  │     └── wrapper
                  │           ├── header
                  │           └── sidebar_menu → menu
                  │                 ├── menu_title
                  │                 ├── menu_item → submenu
                  │                 └── submenu_item
                  └── main
                        ├── header
                        ├── page_heading
                        │     ├── page_title
                        │     └── section → card|alert|dashboard_card
                        └── footer
```

## Sidebar Navigation Path

```php
$menu = $app
    ->sidebar()           // components\app\sidebar
    ->wrapper()            // components\app\sidebar\wrapper
    ->sidebar_menu()       // components\app\sidebar\wrapper\sidebar_menu
    ->menu();              // components\app\sidebar\wrapper\sidebar_menu\menu
```

## Complete Usage Example

```php
require_once __DIR__ . '/../vendor/autoload.php';

use k1app\template\mazer\layouts\sidebar_page;

$doc = new sidebar_page();

$doc->page_content()->set_title("Dashboard");
$doc->page_content()->set_subtitle("Welcome back!");

$doc->menu()->add_menu_title("Menu");
$doc->menu()->add_item("Dashboard", "index.html", "bi bi-grid-fill")->nav_is_active();

$submenu = $doc->menu()->add_item("Components", "#", "bi bi-stack")->nav_is_sub();
$submenu->add_subitem("Accordion", "component-accordion.html");

echo $doc->generate();
```
