<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Factory\LoggerFactory;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\Log\LoggerInterface;
use Yiisoft\EventDispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\Log\Target\File\FileRotator;
use Yiisoft\Log\Target\File\FileRotatorInterface;
use Yiisoft\I18n\MessageFormatterInterface;
use Yiisoft\I18n\Formatter\IntlMessageFormatter;
use Yiisoft\I18n\MessageReaderInterface;
use Yiisoft\I18n\GettextPoFile;
use Yiisoft\I18n\TranslatorInterface;
use Yiisoft\I18n\Translator\Translator;
use Yiisoft\Aliases\Aliases;

return [
    ContainerInterface::class => function (ContainerInterface $container) {
        return $container;
    },
    LoggerInterface::class => new LoggerFactory(),
    FileRotatorInterface::class => FileRotator::class,

    // event dispatcher
    ListenerProviderInterface::class => Provider::class,
    EventDispatcherInterface::class => Dispatcher::class,

    // i18n
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
