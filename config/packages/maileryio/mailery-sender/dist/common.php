<?php

use Mailery\Sender\Repository\SenderRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Sender\Entity\Sender;
use Mailery\Sender\Model\SenderTypeList;

return [
    SenderTypeList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-sender']['types'],
        ],
    ],

    SenderRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Sender::class);
    },
];
