<?php
/**
 * k1.app-template-mazer - Mazer Layouts Showcase
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link https://github.com/klan1/k1.app-template-mazer
 * @license Apache-2.0
 */

require_once __DIR__ . '/../../vendor/autoload.php';

$components_list = [
    'blank' => 'Blank Layout',
    'sidebar_blank' => 'Sidebar Blank',
    'sidebar_page' => 'Sidebar Page',
    'single_page' => 'Single Page',
];

$current_file = basename($_SERVER['REQUEST_URI'], '.php');
$current_file_full = '' . $current_file;
$current_index = array_search($current_file_full, array_keys($components_list));
$prev_file = $current_index > 0 ? array_keys($components_list)[$current_index - 1] : null;
$next_file = $current_index < count($components_list) - 1 ? array_keys($components_list)[$current_index + 1] : null;

$preview_file = __DIR__ . '/preview/' . $current_file . '.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $component_name ?? 'Layout' ?> - k1.app-template-mazer - Layouts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root { --bs-body-bg: #f8f9fa; }
        body { padding-top: 70px; background-color: var(--bs-body-bg); }
        .component-section {
            background: #fff;
            border-radius: .5rem;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }
        .component-title {
            color: #212529;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: .75rem;
            border-bottom: 2px solid #0d6efd;
        }
        .preview-box {
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        .preview-frame {
            width: 100%;
            height: 400px;
            border: none;
            background: #fff;
        }
        .code-block { background: #212529; border-radius: .375rem; overflow: hidden; }
        .code-header {
            background: #343a40;
            padding: .5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .code-dots span { width: 12px; height: 12px; border-radius: 50%; display: inline-block; }
        .code-dots span:nth-child(1) { background: #ff5f56; }
        .code-dots span:nth-child(2) { background: #ffbd2e; }
        .code-dots span:nth-child(3) { background: #27ca40; }
        .code-content {
            padding: 1rem; margin: 0; overflow-x: auto;
            font-size: .85rem; line-height: 1.5;
        }
        .code-content code { color: #f8f8f2; white-space: pre; }
        .preview-label {
            font-size: .75rem; text-transform: uppercase;
            color: #6c757d; margin-bottom: .5rem; font-weight: 600; letter-spacing: .05em;
        }
        .component-ref {
            font-size: .75rem; color: #6c757d; font-family: monospace;
            background: #f8f9fa; padding: .25rem .5rem; border-radius: .25rem;
            display: inline-block; margin-bottom: 1rem;
        }
        .nav-buttons {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 1000;
        }
        .nav-buttons .btn { border-radius: 2rem; }
        .nav-buttons .btn.active { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="../../index.php">
                <i class="bi bi-layout-sidebar me-2"></i> k1.app-template-mazer
            </a>
            <span class="navbar-text text-white-50 me-auto ms-3"><?= $component_name ?? 'Layout' ?></span>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-list"></i> Layouts
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <?php foreach ($components_list as $file => $name): ?>
                        <li>
                            <a class="dropdown-item <?= $file === $current_file_full ? 'active' : '' ?>"
                               href="<?= $file ?>.php">
                                <?= $name ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <section class="component-section">
            <h2 class="component-title"><?= $component_name ?></h2>
            <div class="component-ref">\k1app\template\mazer\layouts\<?= $current_file ?> &rarr; src/classes/mazer/layouts/<?= $current_file ?>.php</div>

            <div class="preview-label">Preview (Live Render)</div>
            <div class="preview-box">
                <iframe class="preview-frame" src="preview/<?= $current_file ?>.php"></iframe>
            </div>

            <div class="preview-label">Source Code</div>
            <div class="code-block">
                <div class="code-header">
                    <div class="code-dots"><span></span><span></span><span></span></div>
                    <span class="text-white-50" style="font-size: .75rem;">preview/<?= $current_file ?>.php</span>
                    <a href="source/<?= $current_file ?>.php" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-download"></i> Download
                    </a>
                </div>
                <pre class="code-content"><code><?= htmlspecialchars(file_get_contents(__DIR__ . '/preview/' . $current_file . '.php')) ?></code></pre>
            </div>
        </section>
    </div>

    <div class="nav-buttons">
        <?php if ($prev_file): ?>
            <a href="<?= $prev_file ?>.php" class="btn btn-outline-primary">
                <i class="bi bi-chevron-left"></i> Prev
            </a>
        <?php endif; ?>
        <?php if ($next_file): ?>
            <a href="<?= $next_file ?>.php" class="btn btn-primary">
                Next <i class="bi bi-chevron-right"></i>
            </a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
