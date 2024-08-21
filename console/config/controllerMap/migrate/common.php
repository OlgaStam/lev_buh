<?php

declare(strict_types=1);

use yii\console\controllers\MigrateController;

return [
    'class' => MigrateController::class,
    'migrationNamespaces' => [
        'console\modules\article\migrations',
    ],
    'migrationPath' => null,
    'migrationTable' => 'new_migrations',
];
