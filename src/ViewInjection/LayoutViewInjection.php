<?php

declare(strict_types=1);

namespace Mailery\ViewInjection;

use Yiisoft\Yii\View\LayoutParametersInjectionInterface;
use Yiisoft\User\CurrentUser;
use Yiisoft\Router\CurrentRoute;
use Mailery\Assets\AssetBundleRegistry;

class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    /**
     * @param CurrentUser $currentUser
     * @param CurrentRoute $currentRoute
     */
    public function __construct(
        private CurrentUser $currentUser,
        private CurrentRoute $currentRoute,
        private AssetBundleRegistry $assetBundleRegistry
    ) {}

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
            'assetBundleRegistry' => $this->assetBundleRegistry,
        ];
    }
}
