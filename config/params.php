<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Middleware\NotFoundCatcher;
use Mailery\ViewInjection\CommonViewInjection;
use Mailery\ViewInjection\LayoutViewInjection;
use Mailery\ViewInjection\LinkTagsViewInjection;
use Mailery\ViewInjection\MetaTagsViewInjection;
use Mailery\Command\Router\ListCommand;
use Yiisoft\Definitions\Reference;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\CsrfViewInjection;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Yii\Cycle\Schema\Provider\FromConveyorSchemaProvider;
use Cycle\Annotated\TableInheritance;
use Cycle\Schema\Generator\SyncTables;
use Cycle\Database\Config\PostgresDriverConfig;
use Cycle\Database\Config\Postgres\DsnConnectionConfig;
use Yiisoft\Yii\Cycle\Schema\Conveyor\AttributedSchemaConveyor;
use Mailery\User\Middleware\UserMiddleware;
use Mailery\Brand\Middleware\BrandMiddleware;
use Yiisoft\Cookies\CookieMiddleware;
use Yiisoft\User\Login\Cookie\CookieLoginMiddleware;
use Yiisoft\Auth\Middleware\Authentication;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Yii\Cycle\Schema\Provider\PhpFileSchemaProvider;
use Yiisoft\Request\Body\RequestBodyParser;
use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\MessageReaderInterface;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Yii\Middleware\Locale;
use Yiisoft\Yii\Cycle\Logger\StdoutQueryLogger;
use Yiisoft\Form\Field\SubmitButton;

return [
    'locale' => [
        'locales' => [
            'en' => 'en-US',
            'ru' => 'ru-RU',
        ],
        'ignoredRequests' => [
            '/debug**',
        ],
    ],

    'middlewares' => [
        ErrorCatcher::class,
        NotFoundCatcher::class,
        SessionMiddleware::class,
        CookieMiddleware::class,
        CookieLoginMiddleware::class,
        RequestBodyParser::class,
        BrandMiddleware::class,
        UserMiddleware::class,
        Authentication::class,
        Locale::class,
        Router::class,
    ],

    'yiisoft/user' => [
        'authUrl' => '/user/login',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => $_ENV['ROOT_PATH'],
            '@assets' => '@root/web/assets',
            '@assetsUrl' => '@baseUrl/assets',
            '@baseUrl' => '/',
            '@messages' => '@resources/messages',
            '@npm' => '@root/node_modules',
            '@public' => '@root/web',
            '@resources' => '@root/resources',
            '@runtime' => '@root/runtime',
            '@src' => '@root/src',
            '@vendor' => '@root/vendor',
            '@layout' => '@root/views/layout',
            '@views' => '@root/views',
        ],
    ],

    'yiisoft/form' => [
        'configs' => [
            'default' => [
                'enrichmentFromRules' => true,
                'containerClass' => 'mb-3',
                'validClass' => 'is-valid',
                'invalidClass' => 'is-invalid',
                'inputValidClass' => 'is-valid',
                'inputInvalidClass' => 'is-invalid',
                'errorClass' => 'text-danger fst-italic',
                'hintClass' => 'form-text',
                'inputClass' => 'form-control',
                'labelClass' => 'form-label',

                'fieldConfigs' => [
                    SubmitButton::class => [
                        'buttonClass()' => ['btn btn-primary float-right mt-2'],
                    ],
                ],
            ],
        ],
    ],

    'yiisoft/session' => [
        'options' => [
            'cookie_secure' => 0,
        ],
    ],

    'yiisoft/translator' => [
        'locale' => 'en',
        'fallbackLocale' => 'en',
        'defaultCategory' => 'app',
        'categorySources' => [
            DynamicReference::to([
                'class' => CategorySource::class,
                '__construct()' => [
                    'app',
                    Reference::to(MessageReaderInterface::class),
                    Reference::to(MessageFormatterInterface::class),
                ],
            ]),
        ],
    ],

    'yiisoft/view' => [
        'parameters' => [
            'url' => Reference::to(UrlGeneratorInterface::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'translator' => Reference::to(TranslatorInterface::class),
        ],
    ],

    'yiisoft/yii-console' => [
        'commands' => [
            'router/list' => ListCommand::class,
        ],
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CommonViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
            Reference::to(LinkTagsViewInjection::class),
            Reference::to(MetaTagsViewInjection::class),
        ],
    ],

    'yiisoft/cookies' => [
        'secretKey' => $_ENV['COOKIES_SECRET'],
    ],

    'yiisoft/yii-cycle' => [
        'dbal' => [
            'query-logger' => PHP_SAPI === 'cli' ? null : StdoutQueryLogger::class,
            'default' => 'default',
            'aliases' => [],
            'databases' => [
                'default' => [
                    'connection' => 'postgres',
                ],
            ],
            'connections' => [
                'postgres' => new PostgresDriverConfig(
                    connection: new DsnConnectionConfig(
                        dsn: 'pgsql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'],
                        user: $_ENV['DB_USER'],
                        password: $_ENV['DB_PASSWORD'],
                    ),
                ),
            ],
        ],
        'migrations' => [
            'directory' => '@root/migrations',
            'namespace' => 'Mailery\\Migration',
            'table' => 'migration',
            'safe' => false,
        ],
        'schema-providers' => [
            PhpFileSchemaProvider::class => [
                'mode' => PhpFileSchemaProvider::MODE_WRITE_ONLY,
                'file' => 'runtime/schema.php',
            ],
            FromConveyorSchemaProvider::class => [
                'generators' => [
                    TableInheritance::class,
                    SyncTables::class,
                ],
            ],
        ],
        'entity-paths' => [],
        'conveyor' => AttributedSchemaConveyor::class,
    ],

    // redis parameters config
    'redis.parameters' => [
        'scheme' => 'tcp',
        'host' => $_ENV['REDIS_HOST'],
        'port' => (int) $_ENV['REDIS_PORT'],
    ],

    // redis options config
    'redis.options' => [
        'replication' => true,
        'parameters' => [
            'password' => $_ENV['REDIS_PASSWORD'],
            'database' => $_ENV['REDIS_DATABASE'],
        ],
    ],

    // beanstalkd options config
    'beanstalkd' => [
        'host' => $_ENV['BEANSTALKD_HOST'],
        'port' => (int) $_ENV['BEANSTALKD_PORT'],
        'timeout' => (int) $_ENV['BEANSTALKD_TIMEOUT'],
    ],

    'beanstalkd.console' => [
        'port' => (int) $_ENV['BEANSTALKD_CONSOLE_PORT'],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'dashboard' => [
                'order' => 1,
            ],
            'campaigns' => [
                'order' => 2,
            ],
            'subscribers' => [
                'order' => 3,
                'items' => [
                    'subscribers' => [
                        'order' => 1,
                    ],
                    'groups' => [
                        'order' => 2,
                    ],
                    'imports' => [
                        'order' => 3,
                    ],
                ],
            ],
            'templates' => [
                'order' => 4,
            ],
            'senders' => [
                'order' => 5,
                'items' => [
                    'senders' => [
                        'order' => 1,
                    ],
                    'email-addresses' => [
                        'order' => 2,
                    ],
                ],
            ],
            'settings' => [
                'order' => 6,
            ],
        ],
    ],

    'maileryio/mailery-menu-navbar' => [
        'items' => [
            'system' => [
                'order' => 1,
                'items' => [
                    'users' => [
                        'order' => 1,
                    ],
                    'channels' => [
                        'order' => 2,
                    ],
                    'activity-log' => [
                        'order' => 3,
                    ],
                    'rbac' => [
                        'order' => 4,
                    ],
                    'settings' => [
                        'order' => 5,
                    ],
                    'beanstalkd' => [
                        'label' => static function () {
                            return 'Beanstalkd console';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return strtok($urlGenerator->generate('/beanstalkd/console'), '?');
                        },
                        'order' => 6,
                    ],
                ],
            ],
            'brands' => [
                'order' => 2,
            ],
            'profile' => [
                'order' => 3,
                'items' => [
                    'profile' => [
                        'order' => 1,
                    ],
                    'settings' => [
                        'order' => 2,
                    ],
                    'logout' => [
                        'order' => 3,
                    ],
                ],
            ],
        ],
    ],

    'maileryio/mailery-brand' => [
        'settings-menu' => [
            'items' => [
                'general' => [
                    'order' => 1,
                ],
                'domain' => [
                    'order' => 2,
                ],
                'aws' => [
                    'order' => 3,
                ],
//                'smtp-settings' => [
//                    'label' => static function () {
//                        return 'SMTP Settings';
//                    },
//                    'url' => static function (UrlGeneratorInterface $urlGenerator) {
//                        return $urlGenerator->generate('/brand/default/index');
//                    },
//                    'order' => 3,
//                ],
//                'bounce-handling' => [
//                    'label' => static function () {
//                        return 'Bounce Handling';
//                    },
//                    'url' => static function (UrlGeneratorInterface $urlGenerator) {
//                        return $urlGenerator->generate('/brand/default/index');
//                    },
//                    'order' => 4,
//                ],
//                'api-settings' => [
//                    'label' => static function () {
//                        return 'API Settings';
//                    },
//                    'url' => static function (UrlGeneratorInterface $urlGenerator) {
//                        return $urlGenerator->generate('/brand/settings/basic');
//                    },
//                    'order' => 5,
//                ],
            ],
        ],
    ],

    'maileryio/mailery-security' => [
        'secretKey' => $_ENV['SECURITY_SECRET'],
    ],

    'maileryio/mailery-setting' => [
        'groups' => [
            'general' => [
                'order' => 1,
            ],
            'user' => [
                'order' => 2,
            ],
        ],
    ],
];
