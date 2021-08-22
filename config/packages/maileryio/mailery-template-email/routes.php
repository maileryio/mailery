<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Template\Email\Controller\DefaultController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::methods(['GET', 'POST'], '/template/email/view/{id:\d+}')
                ->name('/template/email/view')
                ->action([DefaultController::class, 'view']),
            Route::methods(['GET', 'POST'], '/template/email/create')
                ->name('/template/email/create')
                ->action([DefaultController::class, 'create']),
            Route::methods(['GET', 'POST'], '/template/email/edit/{id:\d+}')
                ->name('/template/email/edit')
                ->action([DefaultController::class, 'edit'])
        ),
];
