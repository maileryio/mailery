<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Composer\Config\Builder;
use Yiisoft\Di\Container;
use Yiisoft\Http\Method;
use Yiisoft\Yii\Web\Application;
use Yiisoft\Yii\Web\SapiEmitter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = (function (): ContainerInterface {
    $container = new Container(
        require Builder::path('web', dirname(__DIR__)),
        require Builder::path('providers', dirname(__DIR__))
    );

    return $container->get(ContainerInterface::class);
})();

(function (ContainerInterface $container) {
    $application = $container->get(Application::class);
    $request = $container->get(ServerRequestInterface::class);

    try {
        $application->start();
        $response = $application->handle($request);
        $emitter = new SapiEmitter();
        $emitter->emit($response, $request->getMethod() === Method::HEAD);
    } finally {
        $application->afterEmit($response);
        $application->shutdown();
    }
})($container);
