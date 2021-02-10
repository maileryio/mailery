<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Files\FileHelper;

function shouldRebuildConfigs(string $baseDir): bool
{
    $sourceDirectory = $baseDir . '/config/';
    $buildDirectory = $baseDir . '/runtime/build/config/';

    if (FileHelper::isEmptyDirectory($buildDirectory)) {
        return true;
    }

    $sourceTime = FileHelper::lastModifiedTime($sourceDirectory);
    $buildTime = FileHelper::lastModifiedTime($buildDirectory);
    return $buildTime < $sourceTime;
}
