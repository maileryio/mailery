<?php

declare(strict_types=1);

/**
 * Mailery package for provide web components
 * @link      https://github.com/maileryio/mailery-web
 * @package   Mailery\Web
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    'maileryio/mailery-menu-navbar' => [
        'items' => [
            'system' => [
                'label' => static function () {
                    return 'System';
                },
            ],
        ],
    ],
];
