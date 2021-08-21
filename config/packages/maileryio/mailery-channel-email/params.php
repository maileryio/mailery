<?php

use Yiisoft\Factory\Definition\Reference;
use Mailery\Channel\Email\Model\EmailChannelType;
use Mailery\Channel\Email\Handler\EmailChannelHandler;

return [
    'maileryio/mailery-channel' => [
        'types' => [
            Reference::to(EmailChannelType::class),
        ],
        'handlers' => [
            Reference::to(EmailChannelHandler::class),
        ],
    ],

    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-channel-email/src/Entity',
        ],
    ],
];
