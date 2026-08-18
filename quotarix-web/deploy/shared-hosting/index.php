<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../quotarix-app/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../quotarix-app/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__.'/../quotarix-app/bootstrap/app.php';

// Set public path dynamically for cPanel shared hosting (public_html)
$app->usePublicPath(__DIR__);

$app->handleRequest(Request::capture());
