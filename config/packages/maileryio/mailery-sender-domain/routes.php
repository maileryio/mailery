<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Sender\Domain\Controller\SettingsController;

return [
    Group::create('/brand/{brandId:\d+}')
        ->routes(
            Route::methods(['GET', 'POST'], '/settings/domain')
                ->name('/brand/settings/domain')
                ->action([SettingsController::class, 'domain']),
            Route::methods(['POST'], '/settings/check-dns')
                ->name('/brand/settings/check-dns')
                ->action([SettingsController::class, 'checkDns'])
    )
];
