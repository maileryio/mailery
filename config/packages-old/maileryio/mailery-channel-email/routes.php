<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Channel\Email\Controller\DefaultController;

return [
    Group::create('/channel')
        ->routes(
                Route::get('/email/view/{id:\d+}')
                ->name('/channel/email/view')
                ->action([DefaultController::class, 'view']),
            Route::methods(['GET', 'POST'], '/email/create')
                ->action([DefaultController::class, 'create'])
                ->name('/channel/email/create'),
            Route::methods(['GET', 'POST'], '/email/edit/{id:\d+}')
                ->action([DefaultController::class, 'edit'])
                ->name('/channel/email/edit'),
            Route::delete('/default/email/{id:\d+}')
                ->action([DefaultController::class, 'delete'])
                ->name('/channel/email/delete'),
        )
];
