<?php

declare(strict_types=1);

return [
    'yiisoft/assets' => [
        'assetConverter' => [
            'commands' => [
                'scss' => ['css', '@npm/.bin/sass {options} {from} {to}'],
            ],
            'forceConvert' => false,
        ],
        'assetLoader' => [
            'appendTimestamp' => false,
            'assetMap' => [],
            'basePath' => null,
            'baseUrl' => null,
        ],
        'assetPublisher' => [
            'appendTimestamp' => true,
            'forceCopy' => $_ENV['ENV'] === 'dev',
            'linkAssets' => false,
        ],
        'assetManager' => [
            'allowedBundleNames' => [],
            'customizedBundles' => [],
            'register' => [],
        ],
    ],
];
