<?php
/**
 * k1.app-template-mazer - Mazer Layouts Showcase - Index
 *
 * @author Alejandro Trujillo J. (J0hnd03)
 * @link https://github.com/klan1/k1.app-template-mazer
 * @license Apache-2.0
 */

require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>k1.app-template-mazer - Layouts Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root { --bs-body-bg: #f8f9fa; }
        body { padding-top: 70px; background-color: var(--bs-body-bg); }
        .component-card {
            background: #fff;
            border-radius: .5rem;
            padding: 1.5rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        .component-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 .25rem .5rem rgba(0,0,0,.1);
        }
        .component-card h5 {
            color: #212529;
            font-weight: 600;
            margin-bottom: .5rem;
        }
        .component-card .ns {
            font-size: .75rem;
            color: #0d6efd;
            font-family: monospace;
        }
        .component-card .path {
            font-size: .7rem;
            color: #198754;
            font-family: monospace;
            margin-bottom: 1rem;
            display: block;
        }
        .component-card .btn {
            margin-top: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: .5rem;
            margin-bottom: 2rem;
        }
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: .5rem;
        }
        .hero-section p {
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        .section-title {
            color: #6c757d;
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: 1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-layout-sidebar me-2"></i> k1.app-template-mazer
            </a>
            <span class="navbar-text text-white-50">Mazer Layout Templates</span>
        </div>
    </nav>

    <div class="container">
        <div class="hero-section">
            <h1><i class="bi bi-layout-sidebar me-2"></i> Mazer Layouts</h1>
            <p>PHP template library for building Mazer dashboard layouts using an object-oriented interface.</p>
            <a href="https://github.com/klan1/k1.app-template-mazer" class="btn btn-light" target="_blank">
                <i class="bi bi-github me-1"></i> View on GitHub
            </a>
        </div>

        <div class="section-title">Available Layouts</div>
        <div class="row g-4 mb-4">
            <?php
            $layouts = [
                ['name' => 'Blank Layout', 'file' => 'blank.php', 'ns' => '\k1app\template\mazer\layouts\blank', 'desc' => 'Empty layout with no sidebar or header'],
                ['name' => 'Sidebar Blank', 'file' => 'sidebar_blank.php', 'ns' => '\k1app\template\mazer\layouts\sidebar_blank', 'desc' => 'Layout with sidebar, no page content wrapper'],
                ['name' => 'Sidebar Page', 'file' => 'sidebar_page.php', 'ns' => '\k1app\template\mazer\layouts\sidebar_page', 'desc' => 'Layout with sidebar and page content wrapper'],
                ['name' => 'Single Page', 'file' => 'single_page.php', 'ns' => '\k1app\template\mazer\layouts\single_page', 'desc' => 'Single page layout without sidebar'],
            ];

            foreach ($layouts as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-layout-sidebar me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="layouts/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <footer class="mt-5 mb-3 text-center text-muted">
            <p class="small">k1.app-template-mazer &copy; <?= date('Y') ?> &middot; Mazer Dashboard Templates</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
