<?php

declare(strict_types=1);

use Yiisoft\Yii\Queue\Driver\DriverInterface;
use Yiisoft\Yii\Queue\Driver\SynchronousDriver;

return [
    DriverInterface::class => SynchronousDriver::class,
];
