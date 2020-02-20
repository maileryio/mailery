<?php

namespace Mailery\Assets;

use Yiisoft\Assets\AssetBundle;

class BootstrapVueAssetBundle extends AssetBundle
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
    public ?string $sourcePath = '@npm/bootstrap-vue/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'bootstrap-vue.min.js',
    ];

    /**
     * {@inheritdoc}
     */
    public array $depends = [
        VueAssetBundle::class,
    ];

}
