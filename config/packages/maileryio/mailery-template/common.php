<?php

declare(strict_types=1);

/**
 * Template module for Mailery Platform
 * @link      https://github.com/maileryio/mailery-template
 * @package   Mailery\Template
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

use Mailery\Template\Entity\Template;
use Mailery\Template\Repository\TemplateRepository;
use Cycle\ORM\ORMInterface;
use Psr\Container\ContainerInterface;
use Mailery\Template\Model\TemplateTypeList;

return [
    TemplateTypeList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-template']['types'],
        ],
    ],

    TemplateRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Template::class);
    },
];
