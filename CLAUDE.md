# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

`k1app-template-mazer` is a PHP library (PHP 8.2+) that wraps the [Mazer Bootstrap 5 Admin Dashboard](https://github.com/zuramai/mazer) template as reusable PHP OOP components built on top of `k1lib.html`. Every Mazer layout element (sidebar, menu, cards, pages) is represented by a PHP class that generates HTML when rendered.

**Namespace:** `k1app\template\mazer`
**Autoload:** `src/classes/mazer/` maps to the namespace via PSR-4.
**Dependency:** Requires `klan1/k1lib.html` (the underlying HTML generation library).

## Architecture

### Layer 1 — Document & Layout Classes

These are high-level entry points. Pick one per page:

| Class | File | Use When |
|-------|------|----------|
| **`blank`** | `layouts/blank.php` | Minimal page, no sidebar or app shell |
| **`sidebar_blank`** | `layouts/sidebar_blank.php` | Full sidebar layout, no pre-built content |
| **`sidebar_page`** | `layouts/sidebar_page.php` | Full sidebar with standard page content (card or no-card) |
| **`single_page`** | `layouts/single_page.php` | No sidebar, container-based content (login pages, etc.) |

All extend `core` (which extends `html_document`) and auto-wire head/body with Mazer CSS/JS assets.

### Layer 2 — Core App Components

| Class | File | Description |
|-------|------|-------------|
| **`app`** | `components/app.php` | Root `<div class="app">`. Auto-creates `sidebar` and `main` children |
| **`sidebar`** | `components/app/sidebar.php` | `<div id="sidebar">`. Auto-creates `wrapper` child |
| **`wrapper`** | `components/app/sidebar/wrapper.php` | `<div class="sidebar-wrapper active">`. Contains `header` (logo, theme toggle) and `sidebar_menu` |
| **`main`** | `components/app/main.php` | `<div class="main">`. Contains `header`, `page_heading`, `footer` |

### Layer 3 — Menu System

The sidebar menu uses a `menu` (UL) → `menu_item` (LI) → `submenu` (UL) → `submenu_item` (LI) hierarchy.

```php
$menu = $app->sidebar()->wrapper()->sidebar_menu()->menu();
$menu->add_menu_title("Menu");
$menu->add_item("Dashboard", "index.html", "bi bi-grid-fill")->nav_is_active();

$submenu_parent = $menu->add_item("Components", "#", "bi bi-stack")->nav_is_sub();
$submenu_parent->add_subitem("Accordion", "component-accordion.html");
```

- `nav_is_sub()` marks an item as expandable and returns a `submenu` UL for chaining `add_subitem()` calls.
- `nav_is_active()` marks the item (and parent) as `active`.
- You can extend `menu` to create page-specific menu classes (see `examples/02-mazer-vertical-navbar.php`).

### Layer 4 — Page Content Components

| Class | File | Description |
|-------|------|-------------|
| **`page_title`** | `components/app/main/page_heading/page_title.php` | H3 title + P subtitle in a Bootstrap row layout |
| **`section`** | `components/app/main/page_heading/section.php` | `<section class="section">` container for cards |
| **`card`** | `components/card.php` | `<div class="card">` with header (H4) and body |
| **`dashboard_card`** | `components/dashboard_card.php` | Stat card with icon, label, and value |
| **`alert`** | `components/alert.php` | Bootstrap alert with optional close button |

### Layer 5 — Page Wrappers

| Class | File | Description |
|-------|------|-------------|
| **`standard`** | `pages/standard.php` | page_title + section + card (with card wrapper) |
| **`standard_no_card`** | `pages/standard_no_card.php` | page_title + section + plain div (no card) |

### Redefinitions

| Class | File | Description |
|-------|------|-------------|
| **`head`** | `redefinitions/head.php` | Auto-adds charset, viewport, canonical, `app.css`, `app-dark.css`, favicon |
| **`body`** | `redefinitions/body.php` | Auto-adds `initTheme.js`, `app.js`, `dark.js`, `perfect-scrollbar.js` |

### Shared Trait

- **`common_methods`** (`components/common_methods.php`) — Adds Bootstrap grid sizing (`small()`, `medium()`, `large()`) and alignment helpers to any class that uses it.

## Component Hierarchy

```
core (extends html_document)
  ├── head (redefinitions) — auto-links Mazer CSS
  └── body (redefinitions) — auto-links Mazer JS
        └── app
            ├── sidebar
            │     └── wrapper
            │           ├── header (logo, theme toggle)
            │           └── sidebar_menu
            │                 └── menu (ul)
            │                       ├── menu_title (li)
            │                       ├── menu_item (li) → nav_is_sub() → submenu
            │                       └── submenu_item (li)
            └── main
                  ├── header (burger toggle)
                  ├── page_heading
                  │     ├── page_title
                  │     └── section
                  │           └── card / dashboard_card / alert
                  └── footer
```

## Common Usage Patterns

### Pattern 1 — Layout Classes (Recommended)

```php
require_once __DIR__ . '/../vendor/autoload.php';

use k1app\template\mazer\layouts\sidebar_page;

$doc = new sidebar_page();

// Set page title
$doc->page_content()->set_title("My Page");
$doc->page_content()->set_subtitle("Page description");

// Set card content
$doc->page_content()->set_content("Hello, world!");

// Build menu
$doc->menu()->add_menu_title("Menu");
$doc->menu()->add_item("Dashboard", "index.html", "bi bi-grid-fill");

echo $doc->generate();
```

### Pattern 2 — Manual App Assembly (Full Control)

```php
require_once __DIR__ . '/../vendor/autoload.php';

use k1lib\html\html_document;
use k1app\template\mazer\components\app;
use k1app\template\mazer\components\card;
use k1app\template\mazer\components\page_title;
use k1app\template\mazer\components\section;

$doc = new html_document();
$app = new app();
$doc->body()->append_child($app);

// Menu
$menu = $app->sidebar()->wrapper()->sidebar_menu()->menu();
$menu->add_item("Dashboard", "index.html", "bi bi-grid-fill");

// Content
$pageTitle = new page_title("Title", "Subtitle");
$app->main()->page_heading()->append_child($pageTitle);

$section = new section();
$app->main()->page_heading()->append_child($section);
$section->append_child(new card("Card Title", "Card body text"));

// Footer
$app->main()->footer()->set_content_left("2026 © My App");

echo $doc->generate();
```

### Pattern 3 — Extending Menu for Page-Specific Nav

```php
use k1app\template\mazer\components\app\sidebar\wrapper\sidebar_menu\menu;

class my_menu extends menu {
    function __construct() {
        parent::__construct();
        $this->add_menu_title("Menu");
        $this->add_item("Home", "index.html", "bi bi-house-fill");

        $sub = $this->add_item("Settings", "#", "bi bi-gear")->nav_is_sub();
        $sub->add_subitem("Profile", "profile.html");
        $sub->add_subitem("Security", "security.html");
    }
}

// Use it:
$app->sidebar()->wrapper()->sidebar_menu()->menu(new my_menu());
```

## Static Assets

Pre-built Mazer HTML templates and compiled assets live in `dist/`. Key CSS/JS:
- `dist/assets/compiled/css/app.css` — core styles
- `dist/assets/compiled/css/app-dark.css` — dark theme
- `dist/assets/compiled/js/app.js` — main bundle
- `dist/assets/static/js/initTheme.js` — theme init (must load before app.js)

Extensions (DataTables, Chart.js, Flatpickr, TinyMCE, etc.) are in `dist/assets/extensions/`.

## Development

```bash
composer install
./start_server.sh          # starts PHP dev server on port 8081
./start_server.sh 9090     # custom port
```

Examples are served from `examples/` as the document root. Visit `http://localhost:8081/` to see the example index.
