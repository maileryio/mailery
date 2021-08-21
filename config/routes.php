<?php

declare(strict_types=1);

use Yiisoft\Router\Route;
use Mailery\Controller\DefaultController;

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

return [
    Route::get('/')
        ->name('/default/index')
        ->action([DefaultController::class, 'index']),
];
