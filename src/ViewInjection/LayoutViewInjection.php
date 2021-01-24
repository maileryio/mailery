<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\LayoutParametersInjectionInterface;
use Yiisoft\User\User;
use Yiisoft\Router\UrlMatcherInterface;

class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @var UrlMatcherInterface
     */
    private UrlMatcherInterface $urlMatcher;

    /**
     * @param User $user
     * @param UrlMatcherInterface $urlMatcher
     */
    public function __construct(
        User $user,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->user = $user;
        $this->urlMatcher = $urlMatcher;
    }

    /**
     * @return array
     */
    public function getLayoutParameters(): array
    {
        return [
            'language' => 'ru-RU',
            'encoding' => 'utf-8',
            'brandLabel' => 'Mailery Platform',
            'user' => $this->user->getIdentity(),
            'currentUrl' => (string) $this->urlMatcher->getCurrentUri()->getPath(),
        ];
    }
}
