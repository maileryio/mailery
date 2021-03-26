<?php

declare(strict_types=1);

/**
 * Subscriber module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-subscriber
 * @package   Mailery\Subscriber
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Factory\Definitions\Reference;
use Mailery\Subscriber\Model\SubscriberImportBucket;

return [
    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-subscriber/src/Entity',
        ],
    ],

    'maileryio/mailery-storage' => [
        'buckets' => [
            Reference::to(SubscriberImportBucket::class),
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'subscribers' => [
                'label' => static function () {
                    return 'Subscribers';
                },
                'icon' => 'account-multiple-outline',
                'items' => [
                    'subscribers' => [
                        'label' => static function () {
                            return 'All Subscribers';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/subscriber/subscriber/index');
                        },
                        'activeRouteNames' => [
                            '/subscriber/subscriber/index',
                            '/subscriber/subscriber/view',
                            '/subscriber/subscriber/create',
                            '/subscriber/subscriber/edit',
                            '/subscriber/subscriber/delete',
                            '/subscriber/subscriber/import',
                        ],
                    ],
                    'groups' => [
                        'label' => static function () {
                            return 'Groups & Segments';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/subscriber/group/index');
                        },
                        'activeRouteNames' => [
                            '/subscriber/group/index',
                            '/subscriber/group/view',
                            '/subscriber/group/create',
                            '/subscriber/group/edit',
                            '/subscriber/group/delete',
                        ],
                    ],
                    'imports' => [
                        'label' => static function () {
                            return 'Import Lists';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/subscriber/import/index');
                        },
                        'activeRouteNames' => [
                            '/subscriber/import/index',
                            '/subscriber/import/view',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
