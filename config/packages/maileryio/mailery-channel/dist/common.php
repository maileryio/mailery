<?php

use Mailery\Channel\Model\ChannelList;

return [
    ChannelList::class => [
        '__construct()' => [
            'channels' => $params['maileryio/mailery-channel']['channels'],
        ],
    ],
];
