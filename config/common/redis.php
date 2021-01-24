<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Predis\Client as RedisClient;
use Mailery\Factory\RedisFactory;

return [
    RedisClient::class => new RedisFactory($params['redis.parameters'], $params['redis.options']),
];
