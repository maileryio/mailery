<?php

namespace Mailery;

use Composer\Script\Event;
use RecursiveIteratorIterator as RIterator;
use FilesystemIterator as FSIterator;
use RecursiveDirectoryIterator as DirIterator;

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
