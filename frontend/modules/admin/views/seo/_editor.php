<?php

declare(strict_types=1);

use frontend\modules\admin\assets\SeoAssertBundle;
use frontend\modules\admin\models\Article;
use kartik\editors\Summernote;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

$bundleBaseUrl = $this->assetManager->getBundle(SeoAssertBundle::class)->baseUrl;

/**
 * @var View $this
 * @var Article $article
 * @var ActiveForm $form
 * @var bool $hasErrors
 */
?>
<?php Pjax::begin([
    'id' => 'pjax-editor',
    'enablePushState' => false,
]) ?>
<?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['seo/save', 'id' => $article->id ?? '']),
        'options' => ['id' => 'editor__form', 'data-pjax' => 1, 'enctype' => 'multipart/form-data']
]) ?>

<?= $form->field($article, 'header')
    ->textInput(
        ['placeholder' => Yii::t('app', 'Заголовок SEO оптимизации для тега {0}', ['h1'])],
    ) ?>
<?= $form->field($article, 'title')
    ->textInput(
        ['placeholder' => Yii::t('app', 'Заголовок SEO оптимизации для тега {0}', ['title'])],
    ) ?>
<?= $form->field($article, 'keywords')
    ->textInput(['placeholder' => Yii::t('app', 'Пример') .': keyword1, keyword2, keyword3']) ?>
<?= $form->field($article, 'description')
    ->textarea(['placeholder' => Yii::t('app', 'Краткое описание статьи')]) ?>
<div class="editor__image-block">
    <image
        class="editor__preview"
        src="<?= empty($article->previewUrl) ? "$bundleBaseUrl/img/upload.png" : $article->previewUrl ?>"
        onclick="document.getElementById('image').click()"
        height="63"
        title="<?= Yii::t('app', 'Нажмите для изменения') ?>"
    >
    <div class="editor__image-info-block">
        <?= $form->field($article, 'image_alt')->textInput(['placeholder' => Yii::t(
            'app',
            'Заголовок SEO оптимизации для тега {0}',
            ['alt'],
        )]) ?>
    </div>
</div>
<?= $form->field($article, 'image')
    ->fileInput(['id' => 'image', 'style' => 'display: none'])->label(false) ?>
<div class="row editor__content-editor-block">
    <?= $form->field($article, 'content')->widget(Summernote::class, [
        'useKrajeePresets' => false,
        'pluginOptions' => [
            'height' => '250px',
            'placeholder' => Yii::t('app', 'Ввведите содержимое статьи'),
            'shortcuts: false' => false,
            'toolbar' => [
                ['style1', ['style']],
                ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['action', ['undo', 'redo']],
                ['view', ['codeview', 'fullscreen'],['class' => 'float-end float-right ml-auto ms-auto']],
            ],
        ],
    ])->label(
        $article->getAttributeLabel('content'),
        ['title' => Yii::t(
            'app',
            "Структура статьи должна создаваться с помощью инструментов редактора\nВставляемые, в подготовленные структурные блоки, скопированные фрагменты\nне должны содержать нечего, кроме текста",
        )]
    ) ?>
</div>
<div class="form-group editor__footer">
    <div class="editor__footer-left">
        <?= Html::submitButton(
            Yii::t('app', 'Сохранить'),
            ['class' => 'btn btn-custom btn-primary editor__btn-save'],
        ) ?>
        <?= Html::button(
            Yii::t('app', 'Отмена'),
            ['class' => 'btn btn-custom btn-black editor__btn-cancel'],
        ) ?>
    </div>
    <?= Html::button(
        Yii::t('app', 'Удалить'),
        [
            'class' => 'btn btn-custom btn-danger editor__btn-delete',
            'id' => $article->id,
        ],
    ) ?>
</div>
<?php ActiveForm::end() ?>
<?php Pjax::end() ?>
