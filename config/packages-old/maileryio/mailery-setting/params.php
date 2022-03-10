<?php

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'yiisoft/yii-cycle' => [
        'entity-paths' => [
            '@vendor/maileryio/mailery-setting/src/Entity',
        ],
    ],

    'maileryio/mailery-setting' => [
        'groups' => [],
    ],

    'maileryio/mailery-menu-navbar' => [
        'items' => [
            'system' => [
                'items' => [
                    'settings' => [
                        'label' => static function () {
                            return 'System Settings';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/setting/default/index');
                        },
                    ],
                ],
            ]
        ],
    ],
];
