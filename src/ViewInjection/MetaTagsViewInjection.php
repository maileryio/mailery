<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\MetaTagsInjectionInterface;

class MetaTagsViewInjection implements MetaTagsInjectionInterface
{
    /**
     * @return array
     */
    public function getMetaTags(): array
    {
        return [
            [
                '__key' => 'generator',
                'name' => 'generator',
                'content' => 'Mailery',
            ],
        ];
    }
}
