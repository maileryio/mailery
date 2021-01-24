<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\LinkTagsInjectionInterface;

class LinkTagsViewInjection implements LinkTagsInjectionInterface
{
    /**
     * @return array
     */
    public function getLinkTags(): array
    {
        return [
            [
                '__key' => 'favicon',
                'rel' => 'icon',
                'href' => '/favicon.ico',
            ],
        ];
    }
}
