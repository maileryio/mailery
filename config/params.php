<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Cycle\ORM\Promise\ProxyFactory;
use Cycle\Schema\Generator;
use Mailery\Controller\DefaultController;
use Spiral\Database\Driver\Postgres\PostgresDriver;
use Yiisoft\Router\Route;
use Yiisoft\Yii\Cycle\Logger\StdoutQueryLogger;

return [
    'aliases' => [
        '@root' => dirname(__DIR__),
        '@vendor' => '@root/vendor',
        '@public' => '@root/web',
        '@views' => '@root/views',
        '@runtime' => '@root/runtime',
        '@npm' => '@root/node_modules',
        '@web' => '/assets',
    ],

    'assetManager' => [
        'publisher' => [
            'forceCopy' => getenv('ENV') === 'dev',
            'appendTimestamp' => true,
        ],
    ],

    'debugger.enabled' => true,

    'i18n' => [
        'defaultLocale' => 'en-US',
    ],

    // cycle DBAL config
    'cycle.dbal' => [
        'default' => 'default',
        'aliases' => [],
        'databases' => [
            'default' => ['connection' => 'postgres'],
        ],
        'connections' => [
            'postgres' => [
                'driver' => PostgresDriver::class,
                'connection' => 'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_NAME'),
                'username' => getenv('DB_USER'),
                'password' => getenv('DB_PASSWORD'),
            ],
        ],
    ],

    // cycle common config
    'cycle.common' => [
        'entityPaths' => [],
        'cacheEnabled' => getenv('ENV') === 'prod',
        'cacheKey' => 'Cycle-ORM-Schema',
        'generators' => [
            // sync table changes to database
            Generator\SyncTables::class,
        ],
        'promiseFactory' => ProxyFactory::class,
        'queryLogger' => StdoutQueryLogger::class,
    ],

    // cycle migration config
    'cycle.migrations' => [
        'directory' => '@root/migrations',
        'namespace' => 'App\\Migration',
        'table' => 'migration',
        'safe' => false,
    ],

    'router' => [
        'routes' => [
            '/' => Route::get('/', [DefaultController::class, 'index'])
                ->name('/'),
        ],
    ],
];
