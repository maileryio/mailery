<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Channel\Email\Amazon\Controller\SettingsController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::methods(['GET', 'POST'], '/settings/aws')
                ->name('/brand/settings/aws')
                ->action([SettingsController::class, 'ses'])
        )
];
