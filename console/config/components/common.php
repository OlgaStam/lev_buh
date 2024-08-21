<?php

declare(strict_types=1);

use yii\log\FileTarget;

return [
    'log' => [
        //'targets' => CONSOLE_LOG_TARGETS,
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => ['error', 'warning'],
            ]
        ],
        'traceLevel' => false,
    ],
];
