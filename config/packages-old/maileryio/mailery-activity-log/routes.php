<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Activity\Log\Controller\DefaultController;

return [
    Group::create('/activity-log')
        ->routes(
            Route::get('/default/index')
                ->name('/activity-log/default/index')
                ->action([DefaultController::class, 'index']),
            Route::get('/default/view/{id:\d+}')
                ->name('/activity-log/default/view')
                ->action([DefaultController::class, 'view'])
        )
];
