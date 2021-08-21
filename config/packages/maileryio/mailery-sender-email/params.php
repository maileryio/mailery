<?php

use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Factory\Definition\Reference;
use Mailery\Sender\Email\Model\EmailType;

return [
    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-sender-email/src/Entity',
        ],
    ],

    'maileryio/mailery-sender' => [
        'types' => [
            Reference::to(EmailType::class),
        ],
    ],

    'maileryio/mailery-sender-email' => [
        'messageBodyTemplate' => [
            'viewPath' => '@vendor/maileryio/mailery-sender-email/resources/mail',
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'senders' => [
                'items' => [
                    'email-addresses' => [
                        'label' => static function () {
                            return 'Email addresses';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/sender/email/index');
                        },
                        'activeRouteNames' => [
                            '/sender/email/index',
                            '/sender/email/view',
                            '/sender/email/create',
                            '/sender/email/edit',
                        ],
                    ],
                ],
                'activeRouteNames' => [
                    '/sender/email/index',
                    '/sender/email/view',
                    '/sender/email/create',
                    '/sender/email/edit',
                ],
            ],
        ],
    ],
];
