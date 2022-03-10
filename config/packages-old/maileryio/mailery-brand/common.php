<?php

use Mailery\Brand\Repository\BrandRepository;
use Cycle\ORM\ORMInterface;
use Mailery\Brand\Entity\Brand;
use Psr\Container\ContainerInterface;

return [
    BrandRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Brand::class);
    },
];
