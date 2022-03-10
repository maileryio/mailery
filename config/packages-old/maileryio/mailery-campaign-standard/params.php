<?php

declare(strict_types=1);

use Yiisoft\Definitions\Reference;
use Mailery\Campaign\Standard\Model\StandardCampaignType;

return [
    'maileryio/mailery-campaign' => [
        'types' => [
            Reference::to(StandardCampaignType::class),
        ],
    ],

    'yiisoft/yii-cycle' => [
        'entity-paths' => [
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
                            '/campaign/standard/sendout',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
