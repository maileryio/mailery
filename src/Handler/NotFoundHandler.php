<?php

declare(strict_types=1);

namespace Mailery\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Http\Status;
use Yiisoft\Yii\View\ViewRenderer;

class NotFoundHandler implements RequestHandlerInterface
{
    /*
     * @var ViewRenderer
     */
    private ViewRenderer $viewRenderer;

    /**
     * @param ViewRenderer $viewRenderer
     */
    public function __construct(ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer
            ->withControllerName('default')
            ->withLayout('@views/layout/guest');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->render('404')
            ->withStatus(Status::NOT_FOUND);
    }
}
