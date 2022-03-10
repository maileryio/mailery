<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\User\Controller\AuthController;
use Mailery\User\Controller\DefaultController;
/**
 * User module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-user
 * @package   Mailery\User
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    Group::create('/user')
        ->routes(
            Route::get('/default/index')
                ->action([DefaultController::class, 'index'])
                ->name('/user/default/index'),
            Route::get('/default/view/{id:\d+}')
                ->action([DefaultController::class, 'view'])
                ->name('/user/default/view'),
            Route::methods(['GET', 'POST'], '/default/create')
                ->action([DefaultController::class, 'create'])
                ->name('/user/default/create'),
            Route::methods(['GET', 'POST'], '/default/edit/{id:\d+}')
                ->action([DefaultController::class, 'edit'])
                ->name('/user/default/edit'),
            Route::delete('/default/delete/{id:\d+}')
                ->action([DefaultController::class, 'delete'])
                ->name('/user/default/delete'),

            Route::methods(['GET', 'POST'], '/login')
                ->action([AuthController::class, 'login'])
                ->name('/user/auth/login'),
            Route::post('/logout')
                ->action([AuthController::class, 'logout'])
                ->name('/user/auth/logout')
        )
];
