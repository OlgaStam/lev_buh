<?php

declare(strict_types=1);

namespace frontend\modules\main\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
final class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/main/web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $publishOptions = ['forceCopy' => true];
}
