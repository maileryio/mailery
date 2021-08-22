<?php

declare(strict_types=1);

use Yiisoft\Router\Route;
use Mailery\Dashboard\Controller\DefaultController;

return [
    Route::get('/brand/{brandId:\d+}')
        ->name('/dashboard/default/index')
        ->action([DefaultController::class, 'index'])
];
