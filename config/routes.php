<?php

declare(strict_types=1);

use Mailery\Controller\DefaultController;
use Psr\Http\Message\ResponseFactoryInterface as ResponseFactory;
use Yiisoft\Http\Status;
use Yiisoft\Http\Header;
use Yiisoft\Router\Route;
use Yiisoft\Router\CurrentRoute;

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    Route::get('/')
        ->name('/default/index')
        ->action([DefaultController::class, 'index']),

    Route::get('/beanstalkd/console')
        ->name('/beanstalkd/console')
        ->action(static function (CurrentRoute $currentRoute, ResponseFactory $responseFactory) use($params) {
            return $responseFactory
                ->createResponse(Status::FOUND)
                ->withHeader(
                    Header::LOCATION,
                    implode(
                        '',
                        array_filter([
                            $currentRoute->getUri()->getScheme() . '://',
                            $currentRoute->getUri()->getHost(),
                            ':' . ($params['beanstalkd.console']['port'] ?? $currentRoute->getUri()->getPort()),
                            '/'
                        ])
                    )
                );
        }),
];
