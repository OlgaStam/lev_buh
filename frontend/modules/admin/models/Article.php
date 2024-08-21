<?php

namespace frontend\modules\admin\models;

use frontend\modules\admin\behaviors\ResizeImageBehavior;
use frontend\modules\admin\models\ArticleQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 *
 * @property int           $id - ИД
 * @property bool          $is_active - флаг активности элемента
 * @property int           $priority - приоритет от больего к меньшему
 * @property int           $category_id - ИД категории
 * @property string        $title - заголовок
 * @property string        $slug - путь
 * @property string        $image - изображение статьи
 * @property string|null   $content - тело
 * @property string        $created_at - Дата создания
 * @property string        $updated_at - Дата обновления
 * @property Category      $category - категория
 * @property Article[]     $children - дочерние элементы
 * @property Article[]     $parents - родительские элементы
 * @property-read string   $imagesDir - абсолютный путь к директории для сохранения изображений статей
 */
class Article extends ActiveRecord
{
    public $noImage = '/img/no-image.png';
    public $imageFile;

    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()')
            ],
            [
                'class' => ResizeImageBehavior::class,
                'uploadedFileField' => 'imageFile',
                'pathToImageField' => 'image',
                'imagesDir' => $this->imagesDir,
            ],
        ];
    }

    public function rules()
    {
        return [
            ['title', 'required'],
            ['title', 'string'],
            ['slug', 'required'],
            ['slug', 'string'],
            ['image', 'string'],
            ['category_id', 'required'],
            ['category_id', 'integer'],
            ['content', 'string'],
            ['is_active', 'boolean'],
            ['priority', 'integer'],
            ['priority', 'default', 'value' => 100],
            ['imageFile', 'image', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024]
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'title' => Yii::t('app', 'Заголовок'),
            'slug' => Yii::t('app', 'Путь'),
            'priority' => Yii::t('app', 'Приоритет'),
            'imageFile' => Yii::t('app', 'Изображение')
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Article::class, ['id' => 'child_id'])
            ->viaTable(ArticleChildren::tableName(), ['parent_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Article::class, ['id' => 'parent_id'])
            ->viaTable(ArticleChildren::tableName(), ['child_id' => 'id']);
    }

    /**
     * @return bool
     */
    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        return parent::beforeValidate();
    }

    /**
     * @param $insert
     *
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->image == '') {
            $this->image = $this->noImage;
        }

        if (!is_null($this->content)) {
            $this->content = str_replace("\r", '', $this->content);
            $this->content = str_replace("\n", '<br>', $this->content);
            $this->content = htmlspecialchars($this->content);
        }

        return true;
    }

    /**
     * @return void
     */
    public function afterFind()
    {
        if (!is_null($this->content)) {
            $this->content = htmlspecialchars_decode($this->content);
        }

        parent::afterFind();
    }

    /**
     * Абсолютный путь к директории для сохранения изображений статей
     *
     * @return string
     */
    public function getImagesDir(): string
    {
        return Yii::$app->params['file.basePublicImageDir'] . DIRECTORY_SEPARATOR . 'articles' . DIRECTORY_SEPARATOR;
    }
}
