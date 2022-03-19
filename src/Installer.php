<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery;

use Composer\Script\Event;
use FilesystemIterator as FSIterator;
use RecursiveDirectoryIterator as DirIterator;
use RecursiveIteratorIterator as RIterator;

final class Installer
{
    /**
     * @param Event $event
     * @return void
     */
    public static function postUpdate(Event $event = null): void
    {
        self::chmodRecursive('rbac', 0777);
        self::chmodRecursive('runtime', 0777);
        self::chmodRecursive('storage', 0777);
    }

    public static function copyEnvFile(): void
    {
        if (!file_exists('.env')) {
            copy('.env.dist', '.env');
        }
    }

    /**
     * @param string $path
     * @param int $mode
     * @return void
     */
    private static function chmodRecursive(string $path, int $mode): void
    {
        chmod($path, $mode);
        $iterator = new RIterator(
            new DirIterator($path, FSIterator::SKIP_DOTS | FSIterator::CURRENT_AS_PATHNAME),
            RIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            @chmod($item, $mode);
        }
    }
}
