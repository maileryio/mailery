<?php

declare(strict_types=1);

use Yiisoft\Config\Config;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Csrf\CsrfMiddleware;
use Yiisoft\Router\Group;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectionInterface;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Yii\Debug\Viewer\Middleware\ToolbarMiddleware;

/** @var Config $config */
/** @var array $params */

return [
    RouteCollectionInterface::class => static function (RouteCollectorInterface $collector) use ($config, $params) {
        $collector
            ->middleware(CsrfMiddleware::class)
            ->middleware(FormatDataResponse::class)
            ->addGroup(
                Group::create(null)
                    ->routes(...$config->get('routes'))
            );

        if ($params['yiisoft/yii-debug']['enabled'] ?? false) {
            $collector->middleware(ToolbarMiddleware::class);
        }

        return new RouteCollection($collector);
    },
];
