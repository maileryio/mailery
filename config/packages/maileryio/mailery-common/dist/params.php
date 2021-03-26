<?php

use Mailery\Common\Setting\GeneralSettingGroup;
use Mailery\Setting\Form\SettingForm;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Form\HtmlOptions\RequiredHtmlOptions;
use Yiisoft\Form\HtmlOptions\HasLengthHtmlOptions;
use Yiisoft\Form\HtmlOptions\EmailHtmlOptions;
use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Rule\HasLength;
use Yiisoft\Validator\Rule\Email;

return [
    'maileryio/mailery-setting' => [
        'groups' => [
            Reference::to(GeneralSettingGroup::class),
        ],
    ],

    'maileryio/mailery-common' => [
        'settings' => [
            GeneralSettingGroup::PARAM_NO_REPLY_EMAIL => [
                'name' => GeneralSettingGroup::PARAM_NO_REPLY_EMAIL,
                'label' => static function () {
                    return 'System no-reply email address';
                },
                'description' => static function () {
                    return 'This email address is used as the sender without the need to reply';
                },
                'field' => static function (Field $field, SettingForm $form) {
                    return $field->config($form, GeneralSettingGroup::PARAM_NO_REPLY_EMAIL);
                },
                'rules' => static function () {
                    return [
                        new RequiredHtmlOptions(new Required()),
                        new HasLengthHtmlOptions((new HasLength())->max(255)),
                        new EmailHtmlOptions((new Email())),
                    ];
                },
                'value' => 'no-reply@mailery.io',
            ],
        ],
    ],
];
