<?php

declare(strict_types=1);

use console\modules\article\ArticleConsoleModule;

$params = array_merge(
    require(__DIR__ . '/../../../common/config/params.php'),
    require(__DIR__ . '/../params.php'),
);

// чтобы исполнялись консольные комманды нужно делать модулю другое название в ключе,
// если он в другом конфиге уже был обьявлен ранее
return [
    //'sms' => SmsModule::class,
    'articles' => ArticleConsoleModule::class,
];
