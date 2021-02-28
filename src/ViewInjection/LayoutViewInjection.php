<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\LayoutParametersInjectionInterface;
use Yiisoft\User\CurrentUser;
use Yiisoft\Router\UrlMatcherInterface;

class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    /**
     * @var CurrentUser
     */
    private CurrentUser $currentUser;

    /**
     * @var UrlMatcherInterface
     */
    private UrlMatcherInterface $urlMatcher;

    /**
     * @param CurrentUser $currentUser
     * @param UrlMatcherInterface $urlMatcher
     */
    public function __construct(
        CurrentUser $currentUser,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->currentUser = $currentUser;
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
            'user' => $this->currentUser->getIdentity(),
            'currentUrl' => (string) $this->urlMatcher->getCurrentUri()->getPath(),
        ];
    }
}
