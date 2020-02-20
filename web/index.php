<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use hiqdev\composer\config\Builder;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Di\Container;
use Yiisoft\Yii\Web\Application;

(function () {
    $dirName = dirname(__DIR__);

    require_once $dirName . '/vendor/autoload.php';

    $container = new Container(require Builder::path('web'));

    require $dirName . '/src/globals.php';

    $request = $container->get(ServerRequestInterface::class);
    $container->get(Application::class)->handle($request);
})();
