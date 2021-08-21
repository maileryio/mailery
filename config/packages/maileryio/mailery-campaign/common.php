<?php

declare(strict_types=1);

use Mailery\Campaign\Repository\CampaignRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Campaign\Entity\Campaign;

return [
    CampaignRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Campaign::class);
    },
];
