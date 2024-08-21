<?php

use frontend\modules\admin\AdminModule;
use frontend\modules\main\MainModule;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'uk',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['admin/auth/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            'cookieParams' => [
                'path' => '/',
                'domain' => '',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'main/home/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/home/index',
                'contact' => 'main/contact/index',
                'about' => 'main/about/index',
                'serve' => 'main/serve/index',
                'price' => 'main/price/index',
                'testimonial' => 'main/testimonial/index',
                'consulting' => 'admin/consulting/index',
                'article' => 'admin/seo/index',
                //'logout' => 'admin/auth/logout',
                //'admin/login' => 'admin/login/index',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],

    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ],
        'gii' => [
            'class' => '\yii\gii\Module',
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ],
        'main' => [
            'class' => MainModule::class,
            'layout' => '@frontend/modules/main/views/layouts/main'
        ],
        'admin' => [
            'class' => AdminModule::class,
            'layout' => '@frontend/modules/admin/views/layouts/main'
        ],
    ],
    'params' => $params,
];
