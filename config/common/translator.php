<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\MessageReaderInterface;
use Yiisoft\Translator\Message\Php\MessageSource;
use Yiisoft\Definitions\DynamicReference;

return [
    MessageReaderInterface::class => DynamicReference::to(static function (Aliases $aliases) {
        return new MessageSource($aliases->get('@messages'));
    }),
];
