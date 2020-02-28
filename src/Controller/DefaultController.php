<?php

namespace Mailery\Controller;

use Mailery\Web\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Yiisoft\Router\UrlGeneratorInterface as UrlGenerator;
use Yiisoft\Http\Status;

class DefaultController extends Controller
{
    /**
     * @param UrlGenerator $urlGenerator
     * @return Response
     */
    public function index(UrlGenerator $urlGenerator): Response
    {
        return $this->getResponseFactory()
            ->createResponse(Status::FOUND)
            ->withAddedHeader('Location', $urlGenerator->generate('/brand/default/index'));
    }
}