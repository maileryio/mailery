<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Campaign\Standard\Controller\DefaultController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::get('/campaign/standard/view/{id:\d+}')
                ->name('/campaign/standard/view')
                ->action([DefaultController::class, 'view']),
            Route::methods(['GET', 'POST'], '/campaign/standard/create')
                ->name('/campaign/standard/create')
                ->action([DefaultController::class, 'create']),
            Route::methods(['GET', 'POST'], '/campaign/standard/edit/{id:\d+}')
                ->name('/campaign/standard/edit')
                ->action([DefaultController::class, 'edit']),
            Route::methods(['POST'], '/campaign/standard/test/{id:\d+}')
                ->name('/campaign/standard/test')
                ->action([DefaultController::class, 'test']),
            Route::delete('/campaign/standard/delete/{id:\d+}')
                ->name('/campaign/standard/delete')
                ->action([DefaultController::class, 'delete'])
        )
];
