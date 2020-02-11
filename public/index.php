<?php

use hiqdev\composer\config\Builder;
use Yiisoft\Di\Container;
use Yiisoft\Yii\Web\Application;
use Psr\Http\Message\ServerRequestInterface;

(function () {
    $dirName = dirname(__DIR__);

    require_once $dirName . '/vendor/autoload.php';

    $container = new Container(require Builder::path('frontend'));

    require $dirName . '/src/globals.php';

    $request = $container->get(ServerRequestInterface::class);
    $container->get(Application::class)->handle($request);
})();
