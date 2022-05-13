<?php

declare(strict_types=1);

return [
    static function () use($params) {
        // sometimes debug throw fatal error "Allowed memory size of ..."
        $debugEnabled = $params['yiisoft/yii-debug']['enabled'] ?? false;
        if ($debugEnabled === true) {
            ini_set('memory_limit', '1024M');
        }
    }
];
