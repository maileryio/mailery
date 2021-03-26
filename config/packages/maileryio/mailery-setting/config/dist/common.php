<?php

use Mailery\Setting\Model\Setting;
use Mailery\Setting\Model\SettingGroupList;
use Mailery\Setting\Factory\SettingFactory;
use Mailery\Setting\Factory\SettingFactoryInterface;

return [
    SettingFactoryInterface::class => [
        '__class' => SettingFactory::class,
        '__construct()' => [
            Setting::class,
        ],
    ],

    SettingGroupList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-setting']['groups'],
        ],
    ],
];
