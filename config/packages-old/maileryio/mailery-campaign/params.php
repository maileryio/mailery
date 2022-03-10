<?php

declare(strict_types=1);

/**
 * Campaign module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-campaign
 * @package   Mailery\Campaign
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Router\UrlGeneratorInterface;

return [
    'maileryio/mailery-campaign' => [
        'types' => [],
    ],

    'yiisoft/yii-cycle' => [
        'entity-paths' => [
            '@vendor/maileryio/mailery-campaign/src/Entity',
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'campaigns' => [
                'label' => static function () {
                    return 'Campaigns';
                },
                'icon' => 'campaign',
                'items' => [
                    'campaigns' => [
                        'label' => static function () {
                            return 'All Campaigns';
                        },
                        'url' => static function (UrlGeneratorInterface $urlGenerator) {
                            return $urlGenerator->generate('/campaign/default/index');
                        },
                        'activeRouteNames' => [
                            '/campaign/default/index',
                            '/campaign/default/view',
                            '/campaign/default/create',
                            '/campaign/default/edit',
                            '/campaign/default/delete',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
