<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($uri, '/mazer/')) {
    $file = __DIR__ . '/dist/' . substr($uri, 6);
    if (is_file($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'map' => 'application/json',
        ];
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
        }
        readfile($file);
        return true;
    }
    if (is_dir($file)) {
        $index = $file . '/index.html';
        if (is_file($index)) {
            readfile($index);
            return true;
        }
    }
}


return false;
