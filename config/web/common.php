<?php

use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\Yii\Event\ListenerCollectionFactory;
use Yiisoft\Composer\Config\Builder;

return [
    ListenerCollection::class => static fn (ListenerCollectionFactory $factory) => $factory->create(require Builder::path('events-web')),
];
