<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Provider\CacheProvider;
use Mailery\Provider\EventDispatcherProvider;
use Mailery\Provider\LoggerProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    CacheProvider::class => CacheProvider::class,
    EventDispatcherProvider::class => EventDispatcherProvider::class,
    LoggerProvider::class => LoggerProvider::class,
    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
