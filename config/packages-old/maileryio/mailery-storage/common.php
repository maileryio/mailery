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
use Yiisoft\Aliases\Aliases;

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

    FileStorageInterface::class => static function (Aliases $aliases) {
        $adapter = new LocalFilesystemAdapter(
            $aliases->get('@storage'),
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

        return new Filesystem($adapter, $aliases->getAll());
    },
    RuntimeStorageInterface::class => static function (Aliases $aliases) {
        $adapter = new LocalFilesystemAdapter(
            $aliases->get('@runtime'),
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

        return new Filesystem($adapter, $aliases->getAll());
    },
];
