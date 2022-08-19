<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Pheanstalk\Pheanstalk;
use Pheanstalk\Contract\PheanstalkInterface;

return [
    PheanstalkInterface::class => static function () use($params) {
        return Pheanstalk::create(
            $params['beanstalkd']['host'],
            $params['beanstalkd']['port'],
            $params['beanstalkd']['timeout']
        );
    },
];
