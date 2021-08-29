<?php

declare(strict_types=1);

namespace Mailery\Assets;

class AssetBundleRegistry
{

    /**
     * @var array
     */
    private array $bundles = [];

    /**
     * @param string $bundle
     */
    public function add(string $bundle)
    {
        $this->bundles[] = $bundle;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->bundles;
    }

}
