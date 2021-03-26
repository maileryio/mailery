<?php

declare(strict_types=1);

/**
 * Brand module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-brand
 * @package   Mailery\Brand
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Brand\Middleware\BrandRequiredMiddleware;
use Yiisoft\Router\UrlGeneratorInterface;

return [
    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-brand/src/Entity',
        ],
    ],

    'maileryio/mailery-menu-navbar' => [
        'items' => [
            'brands' => [
                'label' => static function () {
                    return 'My brands';
                },
                'url' => static function (UrlGeneratorInterface $urlGenerator) {
                    return $urlGenerator->generate('/brand/default/index');
                },
            ],
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'settings' => [
                'label' => static function () {
                    return 'Settings';
                },
                'icon' => 'settings',
                'url' => static function (UrlGeneratorInterface $urlGenerator) {
                    return $urlGenerator->generate('/brand/settings/basic');
                },
                'activeRouteNames' => [
                    '/brand/settings/basic',
                ],
            ],
        ],
    ],

    'maileryio/mailery-brand' => [
        'settings-menu' => [
            'items' => [
                'general' => [
                    'label' => static function () {
                        return 'General';
                    },
                    'url' => static function (UrlGeneratorInterface $urlGenerator) {
                        return $urlGenerator->generate('/brand/settings/basic');
                    },
                ],
            ],
        ],
    ],

    'dispatcher' => [
        'middlewares' => [
            BrandRequiredMiddleware::class,
        ],
    ],
];
