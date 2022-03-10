<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Form\Widget\Field;
use Yiisoft\Yii\View\CommonParametersInjectionInterface;

class CommonViewInjection implements CommonParametersInjectionInterface
{
    /**
     * @var Field
     */
    private Field $field;

    /**
     * @param Field $field
     */
    public function __construct(
        Field $field
    ) {
        $this->field = $field;
    }

    /**
     * @return array
     */
    public function getCommonParameters(): array
    {
        return [
            'field' => $this->field,
        ];
    }
}
