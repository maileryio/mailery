<?php

declare(strict_types=1);

use Yiisoft\Router\UrlGeneratorInterface;
use Mailery\Brand\Router\BrandUrlGenerator;

return [
    UrlGeneratorInterface::class => [
        'class' => BrandUrlGenerator::class,
    ],
];
