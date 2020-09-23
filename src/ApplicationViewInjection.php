<?php

declare(strict_types=1);

namespace Mailery;

use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;
use Yiisoft\Yii\View\LinkTagsInjectionInterface;
use Yiisoft\Yii\View\MetaTagsInjectionInterface;
use Yiisoft\Yii\Web\User\User;

class ApplicationViewInjection implements
    LayoutParametersInjectionInterface,
    MetaTagsInjectionInterface,
    LinkTagsInjectionInterface
{
    private User $user;
    private UrlMatcherInterface $urlMatcher;

    public function __construct(
        User $user,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->user = $user;
        $this->urlMatcher = $urlMatcher;
    }

    public function getLayoutParameters(): array
    {
        return [
            'language' => 'ru-RU',
            'encoding' => 'utf-8',
            'user' => $this->user->getIdentity(),
            'currentUrl' => (string)$this->urlMatcher->getLastMatchedRequest()->getUri(),
            'brandLabel' => 'Mailery Platform',
        ];
    }

    public function getMetaTags(): array
    {
        return [
            [
                '__key' => 'generator',
                'name' => 'generator',
                'value' => 'Mailery',
            ],
        ];
    }

    public function getLinkTags(): array
    {
        return [
            [
                '__key' => 'favicon',
                'name' => 'icon',
                'value' => '/favicon.ico',
            ],
        ];
    }
}
