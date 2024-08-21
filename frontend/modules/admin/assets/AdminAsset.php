<?php

declare(strict_types=1);

namespace frontend\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
final class AdminAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/admin/web';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        //'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $publishOptions = ['forceCopy' => true];
}