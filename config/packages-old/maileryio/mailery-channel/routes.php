<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Channel\Controller\DefaultController;

return [
    Group::create('/channel')
        ->routes(
            Route::get('/default/index')
                ->action([DefaultController::class, 'index'])
                ->name('/channel/default/index'),
        )
];
