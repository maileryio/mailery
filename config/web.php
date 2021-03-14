<?php

declare(strict_types=1);

/**
 * Basic Mailery project template
 * @link      https://github.com/maileryio/mailery
 * @package   Mailery
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Yiisoft\Form\Widget\Field;

return [
    Field::class => static function () {
        $field = new Field();

        $field->errorOptions([
            'class' => 'invalid-feedback',
        ]);

        $field->hintOptions([
            'class' => 'form-text text-muted',
        ]);

        return $this->field
            ->errorCssClass('is-invalid');
    },
];
