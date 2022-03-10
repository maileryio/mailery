<?php

declare(strict_types=1);

/**
 * File storage module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-storage
 * @package   Mailery\Storage
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@storage' => '@root/storage',
        ],
    ],

    'yiisoft/yii-cycle' => [
        'entity-paths' => [
            '@vendor/maileryio/mailery-storage/src/Entity',
        ],
    ],

    'maileryio/mailery-storage' => [
        'buckets' => [],
    ],
];
