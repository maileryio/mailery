<?php

declare(strict_types=1);

/**
 * Brand module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-brand
 * @package   Mailery\Brand
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Cycle\ORM\ORMInterface;
use Mailery\Brand\Middleware\BrandRequiredMiddleware;
use Mailery\Brand\Router\BrandUrlGenerator;
use Mailery\Brand\BrandLocator;
use Mailery\Brand\BrandLocatorInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Mailery\Menu\Menu;
use Mailery\Menu\Decorator\Normalizer;
use Mailery\Menu\Decorator\Instantiator;
use Mailery\Menu\Decorator\Sorter;
use Mailery\Brand\Menu\SettingsMenu;
use Yiisoft\Injector\Injector;

return [
    UrlGeneratorInterface::class => BrandUrlGenerator::class,
    BrandLocatorInterface::class => BrandLocator::class,
    BrandLocator::class => function (ContainerInterface $container) {
        $orm = $container->get(ORMInterface::class);

        return (new BrandLocator($orm))
            ->withRegexp('/^\/brand\/(?<brandId>\d+)\/?/');
    },
    BrandRequiredMiddleware::class => function (ContainerInterface $container) {
        $responseFactory = $container->get(ResponseFactoryInterface::class);
        $urlGenerator = $container->get(UrlGeneratorInterface::class);
        $brandLocator = $container->get(BrandLocator::class);

        return (new BrandRequiredMiddleware($responseFactory, $urlGenerator, $brandLocator))
            ->toRoute('/brand/default/index');
    },
    SettingsMenu::class => static function (Injector $injector) use($params) {
        return new SettingsMenu(
            (new Menu($params['maileryio/mailery-brand']['settings-menu']['items']))
                ->withNormalizer(new Normalizer($injector))
                ->withInstantiator(new Instantiator($injector))
                ->withSorter(new Sorter())
        );
    },
];
