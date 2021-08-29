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
     * @var CurrentUser
     */
    private CurrentUser $currentUser;

    /**
     * @var CurrentRoute
     */
    private CurrentRoute $currentRoute;

    /**
     * @var AssetBundleRegistry
     */
    private AssetBundleRegistry $assetBundleRegistry;

    /**
     * @param CurrentUser $currentUser
     * @param CurrentRoute $currentRoute
     */
    public function __construct(
        CurrentUser $currentUser,
        CurrentRoute $currentRoute,
        AssetBundleRegistry $assetBundleRegistry
    ) {
        $this->currentUser = $currentUser;
        $this->currentRoute = $currentRoute;
        $this->assetBundleRegistry = $assetBundleRegistry;
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
            'assetBundleRegistry' => $this->assetBundleRegistry,
        ];
    }
}
