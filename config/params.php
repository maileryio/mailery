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
use Yiisoft\Yii\Cycle\Schema\Provider\SimpleCacheSchemaProvider;
use Yiisoft\Yii\Cycle\Schema\Provider\FromConveyorSchemaProvider;

return [
    'yiisoft/yii-debug' => [
        'enabled' => false,
    ],

    'aliases' => [
        '@root' => dirname(__DIR__),
        '@vendor' => '@root/vendor',
        '@public' => '@root/web',
        '@views' => '@root/views',
        '@runtime' => '@root/runtime',
        '@npm' => '@root/node_modules',
        '@web' => '/assets',
    ],

    'session' => [
        'options' => [
            'cookie_secure' => 0,
        ],
    ],

    'assetManager' => [
        'publisher' => [
            'forceCopy' => getenv('ENV') === 'dev',
            'appendTimestamp' => true,
        ],
    ],

    'i18n' => [
        'defaultLocale' => 'en-US',
    ],

    'yiisoft/yii-cycle' => [
        'dbal' => [
            'default'     => 'default',
            'aliases'     => [],
            'databases'   => [
                'default' => ['connection' => 'postgres']
            ],
            'connections' => [
                'postgres' => [
                    'driver' => PostgresDriver::class,
                    'connection' => 'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_NAME'),
                    'username' => getenv('DB_USER'),
                    'password' => getenv('DB_PASSWORD'),
                ],
            ],
            'query-logger' => StdoutQueryLogger::class,
        ],
        'orm-promise-factory' => ProxyFactory::class,
        'migrations' => [
            'directory' => '@root/migrations',
            'namespace' => 'Mailery\\Migration',
            'table' => 'migration',
            'safe' => false,
        ],
        'schema-providers' => array_filter([
            SimpleCacheSchemaProvider::class => getenv('ENV') === 'dev' ? null : [
                'key' => 'cycle-orm-cache-key'
            ],
            FromConveyorSchemaProvider::class => [
                'generators' => [
                    Generator\SyncTables::class, // sync table changes to database
                ]
            ],
        ]),
        'annotated-entity-paths' => [],
    ],

    // redis parameters config
    'redis.parameters' => [
        'scheme' => 'tcp',
        'host' => getenv('REDIS_HOST'),
        'port' => getenv('REDIS_PORT'),
    ],

    // redis options config
    'redis.options' => [
        'replication' => true,
        'parameters' => [
            'password' => getenv('REDIS_PASSWORD'),
            'database' => getenv('REDIS_DATABASE'),
        ],
    ],
];
