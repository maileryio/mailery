<?php

use Mailery\User\Enum\Rbac as UserRbac;
use Mailery\Brand\Enum\Rbac as BrandRbac;

return [
    UserRbac::ROLE_ADMIN => [
        'children' => [
            BrandRbac::PERMISSION_EDIT_BRAND,
        ],
    ],
    BrandRbac::PERMISSION_EDIT_BRAND => [
        'name' => BrandRbac::PERMISSION_EDIT_BRAND,
        'type' => 'permission',
        'updatedAt' => 1599036348,
        'createdAt' => 1599036348,
    ],
];
