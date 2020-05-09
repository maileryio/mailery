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

use Mailery\Web\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Yiisoft\Http\Status;
use Yiisoft\Router\UrlGeneratorInterface as UrlGenerator;

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
