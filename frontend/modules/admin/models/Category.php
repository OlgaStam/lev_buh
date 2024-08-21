<?php

namespace frontend\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 */
final class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%article_categories}}';
    }

    public function rules()
    {
        return [
            ['title', 'required'],
            ['title', 'string'],
            ['slug', 'required'],
            ['slug', 'string'],
        ];
    }
}
