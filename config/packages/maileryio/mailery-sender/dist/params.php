<?php

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-sender/src/Entity',
        ],
    ],

    'maileryio/mailery-sender' => [
        'types' => [],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'senders' => [
                'label' => static function () {
                    return 'Senders';
                },
                'icon' => 'at',
                'items' => [
                    'senders' => [
                        'label' => static function () {
                            return 'All Senders';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/sender/default/index');
                        },
                    ],
                ],
                'activeRouteNames' => [
                    '/sender/default/index',
                ],
            ],
        ],
    ],
];
