<?php

declare(strict_types=1);

use Mailery\Campaign\Repository\CampaignRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use Mailery\Campaign\Entity\Campaign;
use Mailery\Campaign\Model\CampaignTypeList;

return [
    CampaignTypeList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-campaign']['types'],
        ],
    ],

    CampaignRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Campaign::class);
    },
];
