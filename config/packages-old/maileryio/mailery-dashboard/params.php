<?php

declare(strict_types=1);

/**
 * Dashboard module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-dashboard
 * @package   Mailery\Dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'dashboard' => [
                'label' => static function () {
                    return 'Dashboard';
                },
                'icon' => 'dashboard-outline',
                'url' => static function (UrlGeneratorInterface $urlGenerator) {
                    return $urlGenerator->generate('/dashboard/default/index');
                },
            ],
        ],
    ],
];
