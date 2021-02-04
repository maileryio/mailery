<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Timer;
use Yiisoft\Composer\Config\Merger\Modifier\ReverseBlockMerge;
use Yiisoft\Yii\Console\Event\ApplicationStartup;

return [
    ApplicationStartup::class => [
        static fn (Timer $timer) => $timer->start('overall'),
    ],
    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
