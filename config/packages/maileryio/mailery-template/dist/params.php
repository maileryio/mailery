<?php

declare(strict_types=1);

/**
 * Template module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-template
 * @package   Mailery\Template
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-template/src/Entity',
        ],
    ],

    'maileryio/mailery-template' => [
        'types' => [],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'templates' => [
                'label' => static function () {
                    return 'Templates';
                },
                'icon' => 'email-multiple-outline',
                'items' => [
                    'templates' => [
                        'label' => 'All Templates',
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/template/default/index');
                        },
                        'activeRouteNames' => [
                            '/template/default/index',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
