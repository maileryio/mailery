<?php

declare(strict_types=1);

namespace Mailery\Middleware;

use Mailery\Handler\NotFoundHandler;
use Yiisoft\Http\Status;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Message\ResponseInterface as Response;

class NotFoundCatcher implements MiddlewareInterface
{

    /**
     * @param NotFoundHandler $handler
     */
    public function __construct(
        private NotFoundHandler $handler
    )
    {}

    /**
     * @param Request $request
     * @param Handler $handler
     * @return Response
     */
    public function process(Request $request, Handler $handler): Response
    {
        $response = $handler->handle($request);

        if ($response->getStatusCode() === Status::NOT_FOUND) {
            return $this->handler->handle($request);
        }

        return $response;
    }

}