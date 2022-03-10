<?php

use Mailery\Common\Setting\GeneralSettingGroup;

return [
    GeneralSettingGroup::class => [
        '__construct()' => [
            'items' => $params['maileryio/mailery-common']['settings'],
        ],
    ],
];
