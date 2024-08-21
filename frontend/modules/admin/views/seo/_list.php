<?php

use common\modules\article\seo\models\Article;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var Article $article
 */
?>
<div class="list">
    <div class="list tab-content rounded">
        <div class="list__header">
            <button class="btn btn-success btn-custom list_btn-create" onclick="showEditor()">
                <?= Yii::t('app', 'Создать') ?>
            </button>
            <div class="loader">
              <div class="inner one"></div>
              <div class="inner two"></div>
              <div class="inner three"></div>
            </div>
        </div>

        <?php Pjax::begin(['id' => 'pjax-list',]) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-bordered table-hover'],
            'rowOptions' => function (Article $article) {
                return ['id' => $article->id, 'onclick' => 'showEditor(this.id)', 'class' => 'list__row'];
            },
            'columns' => [
                'header',
                [
                    'attribute' => 'title',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'description',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'keywords',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'slug',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'image_path',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'image_alt',
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d.m.Y H:i:s'],
                    'headerOptions' => ['class' => 'to-hide'],
                    'contentOptions' => ['class' => 'to-hide'],
                    'filterOptions' => ['class' => 'to-hide'],
                ],
            ],
        ]); ?>

        <?php Pjax::end() ?>
    </div>
</div>
