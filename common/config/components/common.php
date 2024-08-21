<?php
//phpcs:ignoreFile

declare(strict_types=1);

use yii\caching\FileCache;

return [
    'cache' => [
        'class' => FileCache::class,
    ],
    // очереди реббита
    // дб и прочее из main.local перенести сюда
];