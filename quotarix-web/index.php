<?php

/**
 * Quotarix Web — Root Entry Point
 * Redirects / forwards requests to the public/ directory.
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// If file exists in public directory, serve it or let public/index.php handle it
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
