<?php

declare(strict_types=1);

use Mailery\Campaign\Repository\CampaignRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Campaign\Entity\Campaign;
use Mailery\Campaign\Provider\CampaignTypeConfigs;

return [
    CampaignTypeConfigs::class => static function () use ($params) {
        $configs = $params['maileryio/mailery-campaign']['types'] ?? [];
        return new CampaignTypeConfigs($configs);
    },

    CampaignRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Campaign::class);
    },
];
