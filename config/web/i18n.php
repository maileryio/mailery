<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

//use Mailery\I18n\Translator;
use Psr\Container\ContainerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\MessageReaderInterface;
use Yiisoft\Translator\Translator;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Translator\Formatter\Intl\IntlMessageFormatter;
use Yiisoft\Translator\Message\Php\MessageSource;

return [
    MessageFormatterInterface::class => IntlMessageFormatter::class,
    MessageReaderInterface::class => function (ContainerInterface $container) {
        $filePath = $container->get(Aliases::class)->get('@root/messages/ru-RU/messages.php');

        return new MessageSource($filePath);
    },
    TranslatorInterface::class => function (ContainerInterface $container) use($params) {
        return new Translator(
            $params['i18n']['locale']
        );
    },
];
