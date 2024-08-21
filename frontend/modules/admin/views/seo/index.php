<?php

declare(strict_types=1);

use frontend\modules\admin\assets\SeoAssertBundle;
use common\modules\article\seo\models\Article;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

SeoAssertBundle::register($this);

$this->title = Yii::t('app', 'Список статей для CEO');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CEO')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Список')];

/**
 * @var View $this
 * @var Article $article
 * @var ActiveDataProvider $dataProvider
 */
?>

<div class="page-content">
    <div class="page-header">
        <h1><?= Html::encode($this->title); ?></h1>
    </div>

    <div class="articles">
        <?= $this->render('_list', compact('dataProvider')) ?>
        <div class="editor">
            <div id="pjax-editor" class="editor tab-content rounded editor-content">
                <?= $this->render('_editor', compact('article')) ?>
            </div>
        </div>
    </div>
</div>
