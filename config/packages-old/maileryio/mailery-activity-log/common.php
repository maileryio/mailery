<?php

use Psr\Container\ContainerInterface;
use Mailery\Activity\Log\Repository\EventRepository;
use Mailery\Activity\Log\Entity\Event;
use Cycle\ORM\ORMInterface;

return [
    EventRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Event::class);
    },
];
