<?php

namespace frontend\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * @property int $parent_id
 * @property int $child_id
 */
final class ArticleChildren extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%article_children}}';
    }

    public function rules()
    {
        return [
            ['parent_id', 'required'],
            ['parent_id', 'integer'],
            ['child_id', 'required'],
            ['child_id', 'integer'],
        ];
    }
}
