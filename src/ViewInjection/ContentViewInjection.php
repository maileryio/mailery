<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Form\Widget\Field;
use Yiisoft\Yii\View\ContentParametersInjectionInterface;

class ContentViewInjection implements ContentParametersInjectionInterface
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
    public function getContentParameters(): array
    {
        return [
            'field' => $this->field,
        ];
    }
}
