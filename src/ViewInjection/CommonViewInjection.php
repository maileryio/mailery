<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Yii\View\CommonParametersInjectionInterface;

class CommonViewInjection implements CommonParametersInjectionInterface
{
    /**
     * @param Field $field
     */
    public function __construct(
        private AssetManager $assetManager,
        private Field $field
    ) {}

    /**
     * @return array
     */
    public function getCommonParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'field' => $this->field,
        ];
    }
}
