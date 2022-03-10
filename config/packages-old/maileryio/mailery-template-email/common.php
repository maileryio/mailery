<?php

use Mailery\Template\Email\Model\EditorList;

return [
    EditorList::class => [
        '__construct()' => [
            'elements' => $params['maileryio/mailery-template-email']['editors'],
        ],
    ],
];
