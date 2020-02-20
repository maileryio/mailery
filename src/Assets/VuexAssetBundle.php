<?php

namespace Mailery\Assets;

use Yiisoft\Assets\AssetBundle;

class VuexAssetBundle extends AssetBundle
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
    public ?string $sourcePath = '@npm/vuex/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'vuex.min.js',
    ];

}
