<?php

declare(strict_types=1);

use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Mailery\Rbac\Controller\PermissionController;
use Mailery\Rbac\Controller\RoleController;
use Mailery\Rbac\Controller\RuleController;
use Mailery\Rbac\Controller\AssignController;
use Mailery\Rbac\Middleware\AssetBundleMiddleware;

return [
    Group::create('/rbac')
        ->middleware(AssetBundleMiddleware::class)
        ->routes(
            // Permissions:
            Route::get('/permission/index')
                ->name('/rbac/permission/index')
                ->action([PermissionController::class, 'index']),

            Route::get('/permission/view/{name:\w+}')
                ->name('/rbac/permission/view')
                ->action([PermissionController::class, 'view']),
            Route::methods(['GET', 'POST'], '/permission/edit/{name:\w+}')
                ->name('/rbac/permission/edit')
                ->action([PermissionController::class, 'edit']),
            Route::delete('/permission/delete/{name:\w+}')
                ->name('/rbac/permission/delete')
                ->action([PermissionController::class, 'delete']),
            Route::methods(['GET', 'POST'], '/permission/create')
                ->name('/rbac/permission/create')
                ->action([PermissionController::class, 'create']),

            // Roles:
            Route::get('/role/index')
                ->name('/rbac/role/index')
                ->action([RoleController::class, 'index']),
            Route::get('/role/view/{name:\w+}')
                ->name('/rbac/role/view')
                ->action([RoleController::class, 'view']),
            Route::methods(['GET', 'POST'], '/role/edit/{name:\w+}')
                ->name('/rbac/role/edit')
                ->action([RoleController::class, 'edit']),
            Route::delete('/role/delete/{name:\w+}')
                ->name('/rbac/role/delete')
                ->action([RoleController::class, 'delete']),
            Route::methods(['GET', 'POST'], '/role/create')
                ->name('/rbac/role/create')
                ->action([RoleController::class, 'create']),

            // Rules:
            Route::get('/rule/index')
                ->name('/rbac/rule/index')
                ->action([RuleController::class, 'index']),
            Route::get('/rule/view/{name:\w+}')
                ->name('/rbac/rule/view')
                ->action([RuleController::class, 'view']),
            Route::methods(['GET', 'POST'], '/rule/edit/{name:\w+}')
                ->name('/rbac/rule/edit')
                ->action([RuleController::class, 'edit']),
            Route::delete('/rule/delete/{name:\w+}')
                ->name('/rbac/rule/delete')
                ->action([RuleController::class, 'delete']),
            Route::methods(['GET', 'POST'], '/rule/create')
                ->name('/rbac/rule/create')
                ->action([RuleController::class, 'create']),

            Route::get('/rule/suggestions')
                ->name('/rbac/rule/suggestions')
                ->action([RuleController::class, 'suggestions']),

            // Assign:
            Route::post('/assign')
                ->name('/rbac/assign')
                ->action([AssignController::class, 'assign']),
            Route::post('/unassign')
                ->name('/rbac/unassign')
                ->action([AssignController::class, 'unassign']),
            Route::get('/assigned')
                ->name('/rbac/assigned')
                ->action([AssignController::class, 'assigned']),
            Route::get('/unassigned')
                ->name('/rbac/unassigned')
                ->action([AssignController::class, 'unassigned'])
        )
];
