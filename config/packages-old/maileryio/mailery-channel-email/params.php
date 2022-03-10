<?php

use Yiisoft\Definitions\Reference;
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
        'entity-paths' => [
            '@vendor/maileryio/mailery-channel-email/src/Entity',
        ],
    ],
];
