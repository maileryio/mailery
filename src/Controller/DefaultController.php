<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ResponseFactoryInterface as ResponseFactory;
use Yiisoft\Router\UrlGeneratorInterface as UrlGenerator;

class DefaultController
{
    /**
     * @var ResponseFactory
     */
    private ResponseFactory $responseFactory;

    /**
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param UrlGenerator $urlGenerator
     * @return Response
     */
    public function index(UrlGenerator $urlGenerator): Response
    {
        return $this->responseFactory
            ->createResponse(302)
            ->withAddedHeader('Location', $urlGenerator->generate('/brand/default/index'));
    }
}
