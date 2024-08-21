<?php

declare(strict_types=1);

namespace common\modules\article\seo\models;

use frontend\modules\admin\behaviors\ResizeImageBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;
use yii\validators\ImageValidator;
use yii\validators\RequiredValidator;
use yii\validators\SafeValidator;
use yii\validators\StringValidator;
use yii\validators\UniqueValidator;
use yii\web\UploadedFile;

/**
 * @see M240306132047CreateArticlesSeoTable
 * @property string $header Заголовок (H1) статьи
 * @property string $title Заголовок для SEO оптимизации, информация пойдет в тег title
 * @property string $slug Автоматически генерируется исходя раздела, даты публикации и названия статьи
 * @property string $description Короткое описание для SEO, информация пойдет в тег description
 * @property string $keywords Ключевые слова, разделяются запятой и пробелом
 * @property string $image_path Путь к файлу с изображением статьи
 * @property string $image_alt Описание изображения статьи для поисковых систем, информация пойдет в атрибут alt
 * @property string $content Содержимое статьи
 * @property string|null $created_at Момент создания записи
 * @property string|null $updated_at Момент обновления записи
 * @property ?UploadedFile $image Файл с изображением
 * @property-read string $fullPathToImageDir Абсолютный путь к хранилищу изображения статьи
 * @property-read string $previewUrl Абсолютная ссылка на изображене статьи для превью в редакторе
 */
final class Article extends ActiveRecord
{
    public const CREATE_SCENARIO = 'create';

    /** @var UploadedFile|string|null $image */
    public $image = null;

    public string $noImagePath = '/img/no-image.png';

    public static function tableName(): string
    {
        return '{{%articles_seo}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => ResizeImageBehavior::class,
                'uploadedFileField' => 'image',
                'pathToImageField' => 'image_path',
                'imagesDir' => $this->fullPathToImageDir,
            ],
            [
                'class' => SluggableBehavior::class,
                'attribute' => ['created_at', 'header'],
            ],
        ];
    }

    public function beforeValidate(): bool
    {
        $this->image = UploadedFile::getInstance($this, 'image');

        return parent::beforeValidate();
    }

    public function rules(): array
    {
        return [
            [
                ['header', 'title', 'description', 'keywords', 'image', 'image_alt', 'content'],
                RequiredValidator::class,
                'on' => self::CREATE_SCENARIO
            ],
            [
                ['header', 'title', 'description', 'keywords','image_alt', 'content'],
                RequiredValidator::class,
            ],
            [['header', 'title', 'slug', 'description', 'keywords', 'image_alt', 'content'], StringValidator::class],
            [['slug'], UniqueValidator::class],
            ['image', ImageValidator::class, 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024],
            [['created_at', 'updated_at'], SafeValidator::class],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'header' => Yii::t('app', 'Заголовок'),
            'title' => Yii::t('app', 'Title'),
            'slug' => 'Slug',
            'description' => Yii::t('app', 'Описание'),
            'keywords' => Yii::t('app', 'Ключевые слова'),
            'image_path' => Yii::t('app', 'Изображение (путь)'),
            'image_alt' => Yii::t('app', 'Изображение (описание)'),
            'image' => Yii::t('app', 'Изображение'),
            'content' => Yii::t('app', 'Контент'),
            'created_at' => Yii::t('app', 'Создано'),
            'updated_at' => Yii::t('app', 'Обновлено'),
        ];
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->image_path == '') {
            $this->image_path = $this->noImagePath;
        }

        if ($this->content !== null) {
            $this->content = htmlspecialchars($this->content);
        }

        return true;
    }

    public function afterFind(): void
    {
        if ($this->content !== null) {
            $this->content = htmlspecialchars_decode($this->content);
        }

        parent::afterFind();
    }

    /**
     * Получение абсолютного пути к хранилищу изображения статьи
     */
    public function getFullPathToImageDir(): string
    {
        return Yii::$app->params['file.basePublicImageDir'] . DIRECTORY_SEPARATOR . 'articles' . DIRECTORY_SEPARATOR;
    }

    public function getPreviewUrl(): string
    {
        if (!$this->image_path) {
            return '';
        }

        if ($this->image_path !== $this->noImagePath) {
            return Url::to(['/file/article/image', 'imagePath' => $this->image_path]);
        } else {
            return $this->noImagePath;
        }
    }
}
