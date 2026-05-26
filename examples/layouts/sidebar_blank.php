<?php
/**
 * k1.app-template-mazer - Sidebar Blank Layout Example
 */

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../redefinitions/example_menu.php';

use k1app\template\mazer\layouts\sidebar_page;

$doc = new sidebar_page();

$menu = new example_menu();
$menu->set_active('menu-sidebar-blank');
$doc->set_menu($menu);

$doc->page()->set_title("Sidebar Blank Layout");
$doc->page()->set_subtitle("\\k1app\\template\\mazer\\layouts\\sidebar_blank");

$doc->page()->set_content('
<p class="text-muted">Layout with sidebar, no page content wrapper. Manual content building.</p>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="bi bi-code me-2"></i>Class Signature</h5>
    </div>
    <div class="card-body">
        <pre class="mb-0"><code>new \\k1app\\template\\mazer\\layouts\\sidebar_blank(
    $lang = \'en\'
);</code></pre>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="bi bi-play-circle me-2"></i>Live Preview</h5>
    </div>
    <div class="card-body p-0">
        <iframe src="/layouts/preview/sidebar_blank.php" style="width:100%; height:400px; border:none;"></iframe>
    </div>
</div>
');

echo $doc->generate();
