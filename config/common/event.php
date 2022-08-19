<?php

declare(strict_types=1);

use Mailery\Event\SymfonyDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/** @var array $params */
return [
    EventDispatcherInterface::class => SymfonyDispatcher::class,
];
