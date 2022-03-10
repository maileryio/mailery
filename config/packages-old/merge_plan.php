<?php

declare(strict_types=1);

// Do not edit. Content will be replaced.
return [
    '/' => [
        'bootstrap' => [
            '/' => [
                'config/bootstrap.php',
            ],
            'yiisoft/widget' => [
                'bootstrap.php',
            ],
        ],
        'bootstrap-console' => [
            '/' => [
                '$bootstrap',
                'config/bootstrap-console.php',
            ],
        ],
        'bootstrap-web' => [
            '/' => [
                '$bootstrap',
                'config/bootstrap-web.php',
            ],
        ],
        'common' => [
            '/' => [
                'config/common/*.php',
            ],
            'maileryio/mailery-campaign' => [
                'common.php',
            ],
            'maileryio/mailery-campaign-standard' => [
                'common.php',
            ],
            'maileryio/mailery-channel-email-amazon-ses' => [
                'common.php',
            ],
            'maileryio/mailery-rbac' => [
                'common.php',
            ],
            'maileryio/mailery-sender' => [
                'common.php',
            ],
            'maileryio/mailery-sender-domain' => [
                'common.php',
            ],
            'maileryio/mailery-sender-email' => [
                'common.php',
            ],
            'maileryio/mailery-setting' => [
                'common.php',
            ],
            'maileryio/mailery-subscriber' => [
                'common.php',
            ],
            'maileryio/mailery-template-email' => [
                'common.php',
            ],
            'yiisoft/cache-file' => [
                'common.php',
            ],
            'yiisoft/log-target-file' => [
                'common.php',
            ],
            'yiisoft/translator-formatter-intl' => [
                'common.php',
            ],
            'yiisoft/translator-message-php' => [
                'common.php',
            ],
            'maileryio/mailery-channel' => [
                'common.php',
            ],
            'maileryio/mailery-channel-email' => [
                'common.php',
            ],
            'maileryio/mailery-queue' => [
                'common.php',
            ],
            'yiisoft/yii-queue' => [
                'common.php',
            ],
            'yiisoft/mailer-swiftmailer' => [
                'common.php',
            ],
            'maileryio/mailery-storage' => [
                'common.php',
            ],
            'yiisoft/yii-filesystem' => [
                'common.php',
            ],
            'maileryio/mailery-template' => [
                'common.php',
            ],
            'yiisoft/translator' => [
                'common.php',
            ],
            'maileryio/mailery-user' => [
                'common.php',
            ],
            'maileryio/mailery-activity-log' => [
                'common.php',
            ],
            'maileryio/mailery-common' => [
                'common.php',
            ],
            'maileryio/mailery-brand' => [
                'common.php',
            ],
            'yiisoft/router-fastroute' => [
                'common.php',
            ],
            'yiisoft/yii-cycle' => [
                'common.php',
            ],
            'yiisoft/router' => [
                'common.php',
            ],
            'yiisoft/aliases' => [
                'common.php',
            ],
            'yiisoft/view' => [
                'common.php',
            ],
            'yiisoft/cache' => [
                'common.php',
            ],
            'yiisoft/validator' => [
                'common.php',
            ],
            'yiisoft/yii-event' => [
                'common.php',
            ],
        ],
        'console' => [
            '/' => [
                '$common',
                'config/console/*.php',
            ],
            'yiisoft/yii-cycle' => [
                'console.php',
            ],
            'yiisoft/yii-console' => [
                'console.php',
            ],
            'yiisoft/yii-event' => [
                'console.php',
            ],
        ],
        'events' => [
            '/' => [
                'config/events.php',
            ],
            'yiisoft/yii-event' => [
                'events.php',
            ],
        ],
        'events-console' => [
            '/' => [
                '$events',
                'config/events-console.php',
            ],
            'yiisoft/log' => [
                'events-console.php',
            ],
            'yiisoft/yii-cycle' => [
                'events-console.php',
            ],
            'yiisoft/yii-console' => [
                'events-console.php',
            ],
            'yiisoft/yii-event' => [
                '$events',
                'events-console.php',
            ],
        ],
        'events-web' => [
            '/' => [
                '$events',
                'config/events-web.php',
            ],
            'yiisoft/log' => [
                'events-web.php',
            ],
            'yiisoft/yii-event' => [
                '$events',
                'events-web.php',
            ],
        ],
        'params' => [
            '/' => [
                'config/params.php',
                '?config/params-local.php',
            ],
            'maileryio/mailery-campaign' => [
                'params.php',
            ],
            'maileryio/mailery-campaign-standard' => [
                'params.php',
            ],
            'maileryio/mailery-channel-email-amazon-ses' => [
                'params.php',
            ],
            'maileryio/mailery-dashboard' => [
                'params.php',
            ],
            'maileryio/mailery-rbac' => [
                'params.php',
            ],
            'maileryio/mailery-sender' => [
                'params.php',
            ],
            'maileryio/mailery-sender-domain' => [
                'params.php',
            ],
            'maileryio/mailery-sender-email' => [
                'params.php',
            ],
            'maileryio/mailery-setting' => [
                'params.php',
            ],
            'maileryio/mailery-subscriber' => [
                'params.php',
            ],
            'maileryio/mailery-template-email' => [
                'params.php',
            ],
            'yiisoft/cache-file' => [
                'params.php',
            ],
            'yiisoft/log-target-file' => [
                'params.php',
            ],
            'maileryio/mailery-channel' => [
                'params.php',
            ],
            'maileryio/mailery-channel-email' => [
                'params.php',
            ],
            'maileryio/mailery-queue' => [
                'params.php',
            ],
            'yiisoft/yii-queue' => [
                'params.php',
            ],
            'yiisoft/mailer-swiftmailer' => [
                'params.php',
            ],
            'maileryio/mailery-storage' => [
                'params.php',
            ],
            'maileryio/mailery-template' => [
                'params.php',
            ],
            'maileryio/mailery-template-email-ckeditor' => [
                'params.php',
            ],
            'yiisoft/translator' => [
                'params.php',
            ],
            'maileryio/mailery-user' => [
                'params.php',
            ],
            'maileryio/mailery-activity-log' => [
                'params.php',
            ],
            'maileryio/mailery-common' => [
                'params.php',
            ],
            'yiisoft/user' => [
                'params.php',
            ],
            'maileryio/mailery-brand' => [
                'params.php',
            ],
            'maileryio/mailery-web' => [
                'params.php',
            ],
            'maileryio/mailery-menu-navbar' => [
                'params.php',
            ],
            'maileryio/mailery-menu-sidebar' => [
                'params.php',
            ],
            'yiisoft/router-fastroute' => [
                'params.php',
            ],
            'yiisoft/yii-bootstrap5' => [
                'params.php',
            ],
            'yiisoft/yii-view' => [
                'params.php',
            ],
            'yiisoft/yii-cycle' => [
                'params.php',
            ],
            'yiisoft/aliases' => [
                'params.php',
            ],
            'yiisoft/assets' => [
                'params.php',
            ],
            'yiisoft/csrf' => [
                'params.php',
            ],
            'yiisoft/session' => [
                'params.php',
            ],
            'yiisoft/view' => [
                'params.php',
            ],
            'yiisoft/yii-console' => [
                'params.php',
            ],
        ],
        'providers' => [
            '/' => [
                'config/providers.php',
            ],
            'yiisoft/yii-filesystem' => [
                'providers.php',
            ],
        ],
        'providers-console' => [
            '/' => [
                '$providers',
                'config/providers-console.php',
            ],
            'yiisoft/yii-console' => [
                'providers-console.php',
            ],
        ],
        'providers-web' => [
            '/' => [
                '$providers',
                'config/providers-web.php',
            ],
            'yiisoft/yii-cycle' => [
                'providers-web.php',
            ],
        ],
        'rbac-assignments' => [
            'maileryio/mailery-rbac' => [
                'rbac/assignments.php',
            ],
            'maileryio/mailery-user' => [
                'rbac/assignments.php',
            ],
            'maileryio/mailery-brand' => [
                'rbac/assignments.php',
            ],
        ],
        'rbac-items' => [
            'maileryio/mailery-rbac' => [
                'rbac/items.php',
            ],
            'maileryio/mailery-user' => [
                'rbac/items.php',
            ],
            'maileryio/mailery-brand' => [
                'rbac/items.php',
            ],
        ],
        'rbac-rules' => [
            'maileryio/mailery-rbac' => [
                'rbac/rules.php',
            ],
            'maileryio/mailery-user' => [
                'rbac/rules.php',
            ],
            'maileryio/mailery-brand' => [
                'rbac/rules.php',
            ],
        ],
        'routes' => [
            '/' => [
                'config/routes.php',
            ],
            'maileryio/mailery-campaign' => [
                'routes.php',
            ],
            'maileryio/mailery-campaign-standard' => [
                'routes.php',
            ],
            'maileryio/mailery-channel-email-amazon-ses' => [
                'routes.php',
            ],
            'maileryio/mailery-dashboard' => [
                'routes.php',
            ],
            'maileryio/mailery-rbac' => [
                'routes.php',
            ],
            'maileryio/mailery-sender' => [
                'routes.php',
            ],
            'maileryio/mailery-sender-domain' => [
                'routes.php',
            ],
            'maileryio/mailery-sender-email' => [
                'routes.php',
            ],
            'maileryio/mailery-setting' => [
                'routes.php',
            ],
            'maileryio/mailery-subscriber' => [
                'routes.php',
            ],
            'maileryio/mailery-template-email' => [
                'routes.php',
            ],
            'maileryio/mailery-channel' => [
                'routes.php',
            ],
            'maileryio/mailery-channel-email' => [
                'routes.php',
            ],
            'maileryio/mailery-storage' => [
                'routes.php',
            ],
            'maileryio/mailery-template' => [
                'routes.php',
            ],
            'maileryio/mailery-user' => [
                'routes.php',
            ],
            'maileryio/mailery-activity-log' => [
                'routes.php',
            ],
            'maileryio/mailery-brand' => [
                'routes.php',
            ],
        ],
        'web' => [
            '/' => [
                '$common',
                'config/web/*.php',
            ],
            'maileryio/mailery-channel-email-amazon-ses' => [
                'web.php',
            ],
            'maileryio/mailery-dashboard' => [
                'web.php',
            ],
            'maileryio/mailery-icon-material' => [
                'web.php',
            ],
            'maileryio/mailery-sender' => [
                'web.php',
            ],
            'maileryio/mailery-sender-domain' => [
                'web.php',
            ],
            'maileryio/mailery-sender-email' => [
                'web.php',
            ],
            'maileryio/mailery-setting' => [
                'web.php',
            ],
            'yiisoft/error-handler' => [
                'web.php',
            ],
            'maileryio/mailery-channel' => [
                'web.php',
            ],
            'maileryio/mailery-channel-email' => [
                'web.php',
            ],
            'maileryio/mailery-user' => [
                'web.php',
            ],
            'maileryio/mailery-activity-log' => [
                'web.php',
            ],
            'yiisoft/user' => [
                'web.php',
            ],
            'maileryio/mailery-brand' => [
                'web.php',
            ],
            'maileryio/mailery-web' => [
                'web.php',
            ],
            'maileryio/mailery-menu-navbar' => [
                'web.php',
            ],
            'maileryio/mailery-menu-sidebar' => [
                'web.php',
            ],
            'yiisoft/router-fastroute' => [
                'web.php',
            ],
            'yiisoft/yii-bootstrap5' => [
                'web/*.php',
            ],
            'yiisoft/yii-view' => [
                'web.php',
            ],
            'maileryio/mailery-menu' => [
                'web.php',
            ],
            'yiisoft/middleware-dispatcher' => [
                'web.php',
            ],
            'yiisoft/assets' => [
                'web.php',
            ],
            'yiisoft/csrf' => [
                'web.php',
            ],
            'yiisoft/session' => [
                'web.php',
            ],
            'yiisoft/data-response' => [
                'web.php',
            ],
            'yiisoft/view' => [
                'web.php',
            ],
            'yiisoft/yii-event' => [
                'web.php',
            ],
        ],
    ],
];
