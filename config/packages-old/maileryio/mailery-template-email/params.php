<?php

declare(strict_types=1);

/**
 * Email template module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-template-email
 * @package   Mailery\Template
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Template\Email\Model\TemplateType;
use Mailery\Template\Email\Model\TextAreaEditor;
use Yiisoft\Definitions\Reference;

return [
    'maileryio/mailery-template' => [
        'types' => [
            Reference::to(TemplateType::class),
        ],
    ],

    'maileryio/mailery-template-email' => [
        'editors' => [
            Reference::to(TextAreaEditor::class),
        ],
    ],

    'yiisoft/yii-cycle' => [
        'entity-paths' => [
            '@vendor/maileryio/mailery-template-email/src/Entity',
        ],
    ],

    'maileryio/mailery-menu-sidebar' => [
        'items' => [
            'templates' => [
                'activeRouteNames' => [
                    '/template/email/view',
                    '/template/email/create',
                    '/template/email/edit',
                ],
            ],
        ],
    ],
];
