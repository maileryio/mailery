<?php

use Mailery\Channel\Entity\Channel;
use Mailery\Channel\Model\ChannelTypeList;
use Mailery\Channel\Repository\ChannelRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Channel\Handler\HandlerInterface;
use Mailery\Channel\Handler\RootHandler;

return [
    ChannelTypeList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-channel']['types'],
        ],
    ],

    HandlerInterface::class => [
        'class' => RootHandler::class,
        '__construct()' => [
            'handlers' => $params['maileryio/mailery-channel']['handlers'],
        ],
    ],

    ChannelRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Channel::class);
    },
];
