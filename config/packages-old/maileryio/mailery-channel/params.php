<?php

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'yiisoft/yii-cycle' => [
        'entity-paths' => [
            '@vendor/maileryio/mailery-channel/src/Entity',
        ],
    ],

    'maileryio/mailery-channel' => [
        'types' => [],
        'handlers' => [],
    ],

    'maileryio/mailery-menu-navbar' => [
        'items' => [
            'system' => [
                'items' => [
                    'channels' => [
                        'label' => static function () {
                            return 'Channels';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/channel/default/index');
                        },
                    ],
                ],
            ],
        ],
    ],
];
