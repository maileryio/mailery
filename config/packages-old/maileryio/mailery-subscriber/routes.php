<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Subscriber\Controller\SubscriberController;
use Mailery\Subscriber\Controller\ImportController;
use Mailery\Subscriber\Controller\GroupController;
use Mailery\Subscriber\Middleware\AssetBundleMiddleware;

return [
    Group::create('/brand/{brandId:\d+}')
        ->middleware(AssetBundleMiddleware::class)
        ->routes(
            // Subscribers:
            Route::get('/subscribers')
                ->name('/subscriber/subscriber/index')
                ->action([SubscriberController::class, 'index']),
            Route::get('/subscriber/subscriber/view/{id:\d+}')
                ->name('/subscriber/subscriber/view')
                ->action([SubscriberController::class, 'view']),
            Route::methods(['GET', 'POST'], '/subscriber/subscriber/create')
                ->name('/subscriber/subscriber/create')
                ->action([SubscriberController::class, 'create']),
            Route::methods(['GET', 'POST'], '/subscriber/subscriber/edit/{id:\d+}')
                ->name('/subscriber/subscriber/edit')
                ->action([SubscriberController::class, 'edit']),
            Route::delete('/subscriber/subscriber/delete/{id:\d+}')
                ->name('/subscriber/subscriber/delete')
                ->action([SubscriberController::class, 'delete']),
            Route::methods(['GET', 'POST'], '/subscriber/subscriber/import')
                ->name('/subscriber/subscriber/import')
                ->action([SubscriberController::class, 'import']),

            // Imports:
            Route::get('/imports')
                ->name('/subscriber/import/index')
                ->action([ImportController::class, 'index']),
            Route::get('/import/view/{id:\d+}')
                ->name('/subscriber/import/view')
                ->action([ImportController::class, 'view']),

            // Groups:
            Route::get('/subscriber/groups')
                ->name('/subscriber/group/index')
                ->action([GroupController::class, 'index']),
            Route::get('/subscriber/group/view/{id:\d+}')
                ->name('/subscriber/group/view')
                ->action([GroupController::class, 'view']),
            Route::methods(['GET', 'POST'], '/subscriber/group/create')
                ->name('/subscriber/group/create')
                ->action([GroupController::class, 'create']),
            Route::methods(['GET', 'POST'], '/subscriber/group/edit/{id:\d+}')
                ->name('/subscriber/group/edit')
                ->action([GroupController::class, 'edit']),
            Route::delete('/subscriber/group/delete/{id:\d+}')
                ->name('/subscriber/group/delete')
                ->action([GroupController::class, 'delete']),
            Route::delete('/subscriber/group/delete-subscriber/{id:\d+}/{subscriberId:\d+}')
                ->name('/subscriber/group/delete-subscriber')
                ->action([GroupController::class, 'deleteSubscriber']),
    )
];
