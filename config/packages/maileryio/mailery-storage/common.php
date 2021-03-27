<?php

declare(strict_types=1);

use Mailery\Storage\Repository\FileRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Storage\Entity\File;
use Mailery\Storage\Model\BucketList;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use Mailery\Storage\Filesystem\FileStorageInterface;
use Mailery\Storage\Filesystem\RuntimeStorageInterface;
use Yiisoft\Yii\Filesystem\Filesystem;

return [
    BucketList::class => [
        '__construct()' => [
            'buckets' => $params['maileryio/mailery-storage']['buckets'],
        ],
    ],

    FileRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(File::class);
    },

    FileStorageInterface::class => static function () use($params) {
        $aliases = $params['yiisoft/aliases']['aliases'] ?? [];
        if (!isset($aliases['@storage'])) {
            throw new \RuntimeException('Alias of the storage directory is not defined.');
        }

        $adapter = new LocalFilesystemAdapter(
            $aliases['@storage'],
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
            LocalFilesystemAdapter::DISALLOW_LINKS
        );

        return new Filesystem($adapter, $aliases);
    },
    RuntimeStorageInterface::class => static function () use($params) {
        $aliases = $params['yiisoft/aliases']['aliases'] ?? [];
        if (!isset($aliases['@runtime'])) {
            throw new \RuntimeException('Alias of the runtime directory is not defined.');
        }

        $adapter = new LocalFilesystemAdapter(
            $aliases['@runtime'],
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
            LocalFilesystemAdapter::DISALLOW_LINKS
        );

        return new Filesystem($adapter, $aliases);
    },
];
