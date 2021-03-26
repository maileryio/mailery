<?php

use Mailery\Sender\Domain\Repository\DomainRepository;
use Psr\Container\ContainerInterface;
use Cycle\ORM\ORMInterface;
use SPFLib\DNS\StandardResolver;
use Mailery\Sender\Domain\Entity\Domain;
use Mailery\Sender\Domain\Model\CheckerList;
use Mailery\Sender\Domain\Model\GeneratorList;
use Mailery\Sender\Domain\Generator\SpfGenerator;
use Mailery\Sender\Domain\Generator\DkimGenerator;
use Mailery\Sender\Domain\Generator\DmarcGenerator;
use Mailery\Sender\Domain\Generator\MxGenerator;
use Mailery\Sender\Domain\Checker\SpfChecker;
use Mailery\Sender\Domain\Checker\DkimChecker;
use Mailery\Sender\Domain\Checker\DmarcChecker;
use Mailery\Sender\Domain\Checker\MxChecker;
use Yiisoft\Factory\Definitions\Reference;
use Symfony\Component\Mime\MimeTypes;
use Mailery\Sender\Domain\Model\DomainDkimBucket;
use Mailery\Storage\Filesystem\FileStorageInterface;

return [
    DomainDkimBucket::class => [
        '__construct()' => [
            'filesystem' => Reference::to(FileStorageInterface::class),
        ],
    ],

    MimeTypes::class => [
        '__construct()' => [
            'map' => [
                'application/x-pem-file' => ['pem'],
            ],
        ],
    ],

    SpfGenerator::class => [
        '__construct()' => [
            'domainSpec' => $params['maileryio/mailery-sender-domain']['spf-domain-spec'],
            'dnsResolver' => Reference::to(StandardResolver::class),
        ],
    ],

    DkimGenerator::class => [
        '__construct()' => [
            'selector' => $params['maileryio/mailery-sender-domain']['dkim-selector'],
        ],
    ],

    GeneratorList::class => [
        '__construct()' => [
            'elements' => [
                Reference::to(SpfGenerator::class),
                Reference::to(DkimGenerator::class),
                Reference::to(DmarcGenerator::class),
                Reference::to(MxGenerator::class),
            ]
        ],
    ],

    SpfChecker::class => [
        '__construct()' => [
            'domainSpec' => $params['maileryio/mailery-sender-domain']['spf-domain-spec'],
        ],
    ],

    CheckerList::class => [
        '__construct()' => [
            'elements' => [
                Reference::to(SpfChecker::class),
                Reference::to(DkimChecker::class),
                Reference::to(DmarcChecker::class),
                Reference::to(MxChecker::class),
            ]
        ],
    ],

    DomainRepository::class => static function (ContainerInterface $container) {
        return $container
            ->get(ORMInterface::class)
            ->getRepository(Domain::class);
    },
];
