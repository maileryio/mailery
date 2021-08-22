<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Setting\Controller\DefaultController;

return [
    Group::create('/setting')
        ->routes(
            Route::get('/default/index')
                ->name('/setting/default/index')
                ->action([DefaultController::class, 'index'])
        ),
];
