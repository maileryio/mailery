<?php

use Mailery\User\Repository\UserRepository;
use Cycle\ORM\ORMInterface;
use Mailery\User\Entity\User;
use Psr\Container\ContainerInterface;

return [
    UserRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(User::class);
    },
];
