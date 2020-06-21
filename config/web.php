<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Psr\Container\ContainerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\I18n\Formatter\IntlMessageFormatter;
use Yiisoft\I18n\GettextPoFile;
use Yiisoft\I18n\MessageFormatterInterface;
use Yiisoft\I18n\MessageReaderInterface;
use Yiisoft\I18n\Translator\Translator;
use Yiisoft\I18n\TranslatorInterface;

return [
    ContainerInterface::class => function (ContainerInterface $container) {
        return $container;
    },

    // I18n:
    MessageFormatterInterface::class => IntlMessageFormatter::class,
    MessageReaderInterface::class => function (ContainerInterface $container) {
        $filePath = $container->get(Aliases::class)->get('@root/messages/ru-RU/messages.po');

        return new GettextPoFile($filePath);
    },
    TranslatorInterface::class => [
        '__class' => Translator::class,
        'setDefaultLocale()' => [$params['i18n']['defaultLocale']],
    ],
];
