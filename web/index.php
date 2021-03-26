<?php

declare(strict_types=1);

use Mailery\ApplicationRunner;
use Dotenv\Dotenv;

// PHP built-in server routing.
if (PHP_SAPI === 'cli-server') {
    // Serve static files as is.
    if (is_file(__DIR__ . $_SERVER['REQUEST_URI'])) {
        return false;
    }

    // Explicitly set for URLs with dot.
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

$runner = new ApplicationRunner();
// Development mode:
$runner->debug();
// Run application:
$runner->run();
