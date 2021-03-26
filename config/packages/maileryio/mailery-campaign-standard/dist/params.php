<?php

declare(strict_types=1);

use Mailery\Campaign\Standard\Model\StandardCampaignType;

return [
    'maileryio/mailery-campaign' => [
        'types' => [
            StandardCampaignType::class => StandardCampaignType::class,
        ],
    ],

    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-campaign-standard/src/Entity',
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'campaigns' => [
                'items' => [
                    'campaigns' => [
                        'activeRouteNames' => [
                            '/campaign/standard/view',
                            '/campaign/standard/create',
                            '/campaign/standard/edit',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
