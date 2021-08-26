<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\ViewInjection\ContentViewInjection;
use Mailery\ViewInjection\LayoutViewInjection;
use Mailery\ViewInjection\LinkTagsViewInjection;
use Mailery\ViewInjection\MetaTagsViewInjection;
use Mailery\Menu\Navbar\NavbarMenu;
use Mailery\Menu\Sidebar\SidebarMenu;
use Mailery\Brand\BrandLocatorInterface;
use Mailery\Command\Router\ListCommand;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Factory\Definition\Reference;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\CsrfViewInjection;
use Yiisoft\Router\CurrentRoute;

return [
    'yiisoft/yii-debug' => [
        'enabled' => $_ENV['ENV'] === 'dev',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => $_ENV['ROOT_PATH'],
            '@vendor' => '@root/vendor',
            '@public' => '@root/web',
            '@views' => '@root/views',
            '@layout' => '@root/views/layout',
            '@resources' => '@root/resources',
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

    'yiisoft/view' => [
        'commonParameters' => [
            'assetManager' => Reference::to(AssetManager::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'navbarMenu' => Reference::to(NavbarMenu::class),
            'sidebarMenu' => Reference::to(SidebarMenu::class),
            'brandLocator' => Reference::to(BrandLocatorInterface::class),
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
            Reference::to(ContentViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
            Reference::to(LinkTagsViewInjection::class),
            Reference::to(MetaTagsViewInjection::class),
        ],
    ],

    // redis parameters config
    'redis.parameters' => [
        'scheme' => 'tcp',
        'host' => $_ENV['REDIS_HOST'],
        'port' => $_ENV['REDIS_PORT'],
    ],

    // redis options config
    'redis.options' => [
        'replication' => true,
        'parameters' => [
            'password' => $_ENV['REDIS_PASSWORD'],
            'database' => $_ENV['REDIS_DATABASE'],
        ],
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
                ],
            ],
            'brands' => [
                'order' => 2,
            ],
            'profile' => [
                'order' => 3,
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
];
