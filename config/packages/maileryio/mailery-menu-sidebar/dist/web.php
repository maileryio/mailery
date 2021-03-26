<?php

declare(strict_types=1);

/**
 * Menu Sidebar Module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-menu-sidebar
 * @package   Mailery\Menu\Sidebar
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Menu\Menu;
use Mailery\Menu\Sidebar\SidebarMenu;
use Mailery\Menu\Decorator\Normalizer;
use Mailery\Menu\Decorator\Instantiator;
use Mailery\Menu\Decorator\Sorter;
use Yiisoft\Injector\Injector;

return [
    SidebarMenu::class => static function (Injector $injector) use($params) {
        return new SidebarMenu(
            (new Menu($params['maileryio/mailery-menu-sidebar']['items']))
                ->withNormalizer(new Normalizer($injector))
                ->withInstantiator(new Instantiator($injector))
                ->withSorter(new Sorter())
        );
    },
];
