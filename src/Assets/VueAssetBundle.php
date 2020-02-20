<?php

namespace Mailery\Assets;

use Yiisoft\Assets\AssetBundle;

class VueAssetBundle extends AssetBundle
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
    public ?string $sourcePath = '@npm/vue/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'vue.min.js',
    ];

}
