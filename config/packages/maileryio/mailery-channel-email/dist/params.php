<?php

use Mailery\Channel\Email\EmailChannel;
use Yiisoft\Factory\Definitions\Reference;

return [
    'maileryio/mailery-channel' => [
        'channels' => [
            Reference::to(EmailChannel::class),
        ],
    ],
];
