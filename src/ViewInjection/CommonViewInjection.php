<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Yii\View\CommonParametersInjectionInterface;

class CommonViewInjection implements CommonParametersInjectionInterface
{
    /**
     * @param AssetManager $assetManager
     */
    public function __construct(
        private AssetManager $assetManager
    ) {}

    /**
     * @return array
     */
    public function getCommonParameters(): array
    {
        return [
            'assetManager' => $this->assetManager
        ];
    }
}
