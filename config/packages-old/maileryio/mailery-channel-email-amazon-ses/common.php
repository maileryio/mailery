<?php

use Mailery\Channel\Email\Amazon\Model\RegionList;

return [
    RegionList::class => static function () use($params) {
        return new RegionList($params['maileryio/mailery-channel-email-amazon-ses']['regions']);
    },
];
