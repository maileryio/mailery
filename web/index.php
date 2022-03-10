<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Yiisoft\Yii\Runner\Http\HttpApplicationRunner;

/**
 * @psalm-var string $_SERVER['REQUEST_URI']
 */

// PHP built-in server routing.
if (PHP_SAPI === 'cli-server') {
    // Serve static files as is.
    /** @psalm-suppress MixedArgument */
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file(__DIR__ . $path)) {
        return false;
    }

    // Explicitly set for URLs with dot.
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

$rootPath = dirname(__DIR__);
$eventGroups = [
    'events',
    'events-web',
    'events-console',
];

chdir($rootPath);
require_once $rootPath . '/vendor/autoload.php';

if (getenv('YII_ENV') === 'test') {
    $c3 = 'c3.php';
    if (file_exists($c3)) {
        require_once $c3;
    }
}

$dotenv = Dotenv::createImmutable($rootPath);
$dotenv->load();

// Run HTTP application runner
$runner = new HttpApplicationRunner($rootPath, (bool) $_ENV['DEBUG'], $_ENV['ENV']);
$runner->run();
