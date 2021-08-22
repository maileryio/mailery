<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Storage\Controller\FileController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::get('/storage/file/download/{id:\d+}')
                ->name('/storage/file/download')
                ->action([FileController::class, 'download'])
    )
];
