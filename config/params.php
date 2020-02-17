<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    'aliases' => [
        '@root' => dirname(__DIR__),
        '@vendor' => '@root/vendor',
        '@public' => '@root/web',
        '@runtime' => '@root/runtime',
        '@npm' => '@root/node_modules',
        '@web' => '/assets',
    ],

    'assetManager' => [
        'publisher' => [
            'forceCopy' => YII_ENV === 'dev',
            'appendTimestamp' => true,
        ],
    ],
];
