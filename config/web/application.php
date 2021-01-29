<?php
declare(strict_types=1);

use Yiisoft\Csrf\CsrfMiddleware;
use Yiisoft\ErrorHandler\ErrorCatcher;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Injector\Injector;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\Application;
use Yiisoft\Auth\Middleware\Authentication;
use Yiisoft\Router\UrlGeneratorInterface;
use Mailery\Handler\NotFoundHandler;
use Mailery\User\Middleware\CurrentUserMiddleware;

return [
    Application::class => [
        '__construct()' => [
            'dispatcher' => static function (Injector $injector) use($params) {
                $middlewares = array_merge(
                    [
                        Router::class,
                        CsrfMiddleware::class,
                        CurrentUserMiddleware::class,
                        static function (UrlGeneratorInterface $urlGenerator, Injector $injector) {
                            return $injector->make(Authentication::class)
                                ->withOptionalPatterns([
                                    $urlGenerator->generate('/user/auth/login'),
                                ]);
                        },
                        SessionMiddleware::class,
                        ErrorCatcher::class,
                    ],
                    $params['dispatcher']['middlewares']
                );

                return ($injector->make(MiddlewareDispatcher::class))
                    ->withMiddlewares($middlewares);
            },
            'fallbackHandler' => Reference::to(NotFoundHandler::class),
        ],
    ],
];
