<?php

declare(strict_types=1);

use Yiisoft\Yii\Cycle\Schema\Provider\SimpleCacheSchemaProvider;

return [
    'yiisoft/yii-debug' => [
        'enabled' => false,
    ],

    'yiisoft/yii-debug-api' => [
        'enabled' => false,
    ],

    'yiisoft/yii-cycle' => [
        'schema-providers' => [
            SimpleCacheSchemaProvider::class => [
                'key' => 'cycle-orm-cache-key',
            ],
        ],
    ],
];
