<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        //'migrate' => require(__DIR__ . '/controllerMap/migrate/common.php'),
    ],
    'components' => require(__DIR__ . '/components/common.php'),
    'container' => [
        'definitions' => require(__DIR__ . '/container/definitions/common.php'),
    ],
    'modules' => require(__DIR__ . '/modules/common.php'),
    'params' => $params,
];
