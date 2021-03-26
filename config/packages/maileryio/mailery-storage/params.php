<?php

declare(strict_types=1);

/**
 * File storage module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-storage
 * @package   Mailery\Storage
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use Mailery\Storage\Filesystem\FileStorageInterface;
use Mailery\Storage\Filesystem\RuntimeStorageInterface;
use Yiisoft\Aliases\Aliases;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@storage' => '@root/storage',
        ],
    ],

    'yiisoft/yii-cycle' => [
        'annotated-entity-paths' => [
            '@vendor/maileryio/mailery-storage/src/Entity',
        ],
    ],

    'maileryio/mailery-storage' => [
        'buckets' => [],
    ],

    'file.storage' => [
        FileStorageInterface::class => [
            'adapter' => [
                '__class' => LocalFilesystemAdapter::class,
                '__construct()' => [
                    static function (Aliases $aliases) {
                        return $aliases->get('@storage');
                    },
                    PortableVisibilityConverter::fromArray([
                        'file' => [
                            'public' => 0644,
                            'private' => 0600,
                        ],
                        'dir' => [
                            'public' => 0755,
                            'private' => 0700,
                        ],
                    ]),
                    LOCK_EX,
                    LocalFilesystemAdapter::DISALLOW_LINKS,
                ],
            ],
        ],
        RuntimeStorageInterface::class => [
            'adapter' => [
                '__class' => LocalFilesystemAdapter::class,
                '__construct()' => [
                    static function (Aliases $aliases) {
                        return $aliases->get('@runtime');
                    },
                    PortableVisibilityConverter::fromArray([
                        'file' => [
                            'public' => 0644,
                            'private' => 0600,
                        ],
                        'dir' => [
                            'public' => 0755,
                            'private' => 0700,
                        ],
                    ]),
                    LOCK_EX,
                    LocalFilesystemAdapter::DISALLOW_LINKS,
                ],
            ],
        ],
    ],
];
