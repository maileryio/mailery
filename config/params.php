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
use Mailery\ViewInjection\ContentViewInjection;
use Mailery\ViewInjection\LayoutViewInjection;
use Mailery\ViewInjection\LinkTagsViewInjection;
use Mailery\ViewInjection\MetaTagsViewInjection;
use Mailery\Menu\Navbar\NavbarMenuInterface;
use Mailery\Menu\Sidebar\SidebarMenuInterface;
use Mailery\Brand\Service\BrandLocatorInterface;
use Spiral\Database\Driver\Postgres\PostgresDriver;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\Cycle\Logger\StdoutQueryLogger;
use Yiisoft\Yii\Cycle\Schema\Provider\SimpleCacheSchemaProvider;
use Yiisoft\Yii\Cycle\Schema\Provider\FromConveyorSchemaProvider;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/yii-debug' => [
        'enabled' => getenv('ENV') === 'dev',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => getenv('ROOT_PATH'),
            '@vendor' => '@root/vendor',
            '@public' => '@root/web',
            '@views' => '@root/views',
            '@runtime' => '@root/runtime',
            '@npm' => '@root/node_modules',
            '@web' => '/assets',
        ],
    ],

    'yiisoft/session' => [
        'options' => [
            'cookie_secure' => 0,
        ],
    ],

    'yiisoft/assets' => [
        'assetPublisher' => [
            'appendTimestamp' => true,
            'forceCopy' => getenv('ENV') === 'dev',
        ],
    ],

    'yiisoft/view' => [
        'basePath' => '@views',
        'defaultParameters' => [
            'assetManager' => Reference::to(AssetManager::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'urlMatcher' => Reference::to(UrlMatcherInterface::class),
            'navbarMenu' => Reference::to(NavbarMenuInterface::class),
            'sidebarMenu' => Reference::to(SidebarMenuInterface::class),
            'brandLocator' => Reference::to(BrandLocatorInterface::class),
            'translator' => Reference::to(TranslatorInterface::class),
        ],
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(ContentViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
            Reference::to(LinkTagsViewInjection::class),
            Reference::to(MetaTagsViewInjection::class),
        ],
    ],

    'yiisoft/router' => [
        'enableCache' => getenv('ENV') !== 'dev',
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
            ReverseBlockMerge::class => new ReverseBlockMerge(),
        ]),
        'annotated-entity-paths' => [],
    ],

    'i18n' => [
        'locale' => 'en-US',
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
