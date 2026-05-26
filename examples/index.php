<?php
/**
 * k1.app-template-mazer - Mazer Layouts Showcase - Index
 *
 * @author Alejandro Trujillo J. (J0hnd03)
 * @link https://github.com/klan1/k1.app-template-mazer
 * @license Apache-2.0
 */

require_once __DIR__ . '/../vendor/autoload.php';

use k1app\template\mazer\layouts\single_page;

$doc = new single_page();

$doc->page()->set_title("Layouts Showcase");
$doc->page()->set_subtitle("PHP template library for building Mazer dashboard layouts");

$doc->page()->set_content('
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-square me-2"></i>Blank</h5>
                <p class="card-text text-muted small">Empty layout with no sidebar or header. Base for custom layouts.</p>
                <code class="text-primary small">\\k1app\\template\\mazer\\layouts\\blank</code>
            </div>
            <div class="card-footer">
                <a href="layouts/blank.php" class="btn btn-outline-primary btn-sm w-100">View Example</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-sidebar me-2"></i>Sidebar Blank</h5>
                <p class="card-text text-muted small">Layout with sidebar, no page content wrapper. Manual content building.</p>
                <code class="text-primary small">\\k1app\\template\\mazer\\layouts\\sidebar_blank</code>
            </div>
            <div class="card-footer">
                <a href="layouts/sidebar_blank.php" class="btn btn-outline-primary btn-sm w-100">View Example</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-layout-sidebar me-2"></i>Sidebar Page</h5>
                <p class="card-text text-muted small">Layout with sidebar and page content wrapper. Standard dashboard layout.</p>
                <code class="text-primary small">\\k1app\\template\\mazer\\layouts\\sidebar_page</code>
            </div>
            <div class="card-footer">
                <a href="layouts/sidebar_page.php" class="btn btn-outline-primary btn-sm w-100">View Example</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-app me-2"></i>Single Page</h5>
                <p class="card-text text-muted small">Single page layout without sidebar. Ideal for login, register, error pages.</p>
                <code class="text-primary small">\\k1app\\template\\mazer\\layouts\\single_page</code>
            </div>
            <div class="card-footer">
                <a href="layouts/single_page.php" class="btn btn-outline-primary btn-sm w-100">View Example</a>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info">
    <i class="bi bi-info-circle me-2"></i>
    Browse the complete Mazer component gallery at <a href="/mazer/index.html" class="alert-link" target="_blank">/mazer/index.html</a>
</div>
');

echo $doc->generate();
