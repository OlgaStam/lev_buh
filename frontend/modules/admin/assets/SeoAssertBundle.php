<?php

namespace frontend\modules\admin\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

final class SeoAssertBundle extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/web/seo';

    public $css = [
        'css/index.css',
        'css/index.css',
        'css/_loader.css',
        'css/_list.css',
        'css/_editor.css',
    ];

    public $js = [
        'js/requests.js',
        'js/index.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
