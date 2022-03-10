<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Template\Controller\DefaultController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::get('/templates')
                ->name('/template/default/index')
                ->action([DefaultController::class, 'index']),
            Route::delete('/template/default/delete/{id:\d+}')
                ->name('/template/default/delete')
                ->action([DefaultController::class, 'delete'])
    )
];
