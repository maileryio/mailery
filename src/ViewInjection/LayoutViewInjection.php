<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\LayoutParametersInjectionInterface;
use Yiisoft\User\CurrentUser;
use Yiisoft\Router\CurrentRoute;

class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    /**
     * @var CurrentUser
     */
    private CurrentUser $currentUser;

    /**
     * @var CurrentRoute
     */
    private CurrentRoute $currentRoute;

    /**
     * @param CurrentUser $currentUser
     * @param CurrentRoute $currentRoute
     */
    public function __construct(
        CurrentUser $currentUser,
        CurrentRoute $currentRoute
    ) {
        $this->currentUser = $currentUser;
        $this->currentRoute = $currentRoute;
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
            'currentUrl' => $this->currentRoute->getUri()->getPath(),
        ];
    }
}
