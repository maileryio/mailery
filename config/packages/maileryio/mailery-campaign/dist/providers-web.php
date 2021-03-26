<?php

declare(strict_types=1);

use Mailery\Campaign\Provider\CampaignTypeServiceProvider;
use Mailery\Campaign\Provider\RouteCollectorServiceProvider;

return [
    CampaignTypeServiceProvider::class => CampaignTypeServiceProvider::class,
    RouteCollectorServiceProvider::class => RouteCollectorServiceProvider::class,
];
