<?php

namespace Mailery\Assets;

use Yiisoft\Assets\AssetBundle;

class AppAssetBundle extends AssetBundle
{

    /**
     * {@inheritdoc}
     */
    public ?string $basePath = '@public/assets';

    /**
     * {@inheritdoc}
     */
    public ?string $baseUrl = '@web';

    /**
     * {@inheritdoc}
     */
    public ?string $sourcePath = '@npm/@maileryio/mailery-assets/dist';

    /**
     * {@inheritdoc}
     */
    public array $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=cyrillic',
        'main.min.css',
    ];

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'main.umd.min.js',
    ];

    /**
     * {@inheritdoc}
     */
    public array $depends = [
        VueAssetBundle::class,
        VuexAssetBundle::class,
        BootstrapVueAssetBundle::class,
    ];

}
