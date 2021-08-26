<?php

use Mailery\Sender\Email\Service\SenderVerifyService;
use Yiisoft\Mailer\MessageBodyTemplate;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Mailer\MailerInterface;
use Yiisoft\Factory\Definition\DynamicReference;

return [
    SenderVerifyService::class => [
        '__construct()' => [
            'mailer' => DynamicReference::to(static function (MailerInterface $mailer, Aliases $aliases) use($params) {
                return $mailer->withTemplate(
                    new MessageBodyTemplate(
                        $aliases->get($params['maileryio/mailery-sender-email']['messageBodyTemplate']['viewPath']),
                        '',
                        ''
                    )
                );
            }),
        ],
    ],
];
