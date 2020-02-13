<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

defined('YII_ENV') or define('YII_ENV', $_ENV['ENV'] ?? 'prod');
defined('YII_DEBUG') or define('YII_DEBUG', (bool) ($_ENV['DEBUG'] ?? YII_ENV === 'dev'));
