<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Brand\Controller\DefaultController;
use Mailery\Brand\Controller\SettingsController;
use Mailery\Brand\Middleware\AssetBundleMiddleware;

return [
    Route::get('/brands')
        ->name('/brand/default/index')
        ->middleware(AssetBundleMiddleware::class)
        ->action([DefaultController::class, 'index']),

    Group::create('/brand')
        ->middleware(AssetBundleMiddleware::class)
        ->routes(
            Route::methods(['GET', 'POST'], '/new-brand')
                ->name('/brand/default/create')
                ->action([DefaultController::class, 'create']),
            Route::delete('/{id:\d+}/delete')
                ->name('/brand/default/delete')
                ->action([DefaultController::class, 'delete'])
        ),

    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::methods(['GET', 'POST'], '/settings/basic')
                ->action([SettingsController::class, 'basic'])
                ->name('/brand/settings/basic')
        ),
];
