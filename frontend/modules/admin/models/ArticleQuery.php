<?php

namespace frontend\modules\admin\models\queries;

use frontend\modules\admin\models\Article;
use frontend\modules\admin\models\ArticleChildren;
use yii\db\ActiveQuery;

final class ArticleQuery extends ActiveQuery
{
    /**
     * Получить статьи не имеющие родителя
     */
    public function hasNotParents(): self
    {
        return $this
            ->leftJoin(
                ArticleChildren::tableName(),
                ArticleChildren::tableName() . '.child_id = ' . Article::tableName() . '.id'
            )
            ->having('COUNT(' . ArticleChildren::tableName() . '.child_id) = 0')
            ->groupBy('id');
    }

    /**
     * Активные статьи
     */
    public function active(bool $state = true): self
    {
        return $this
            ->andWhere(['is_active' => $state]);
    }

    /**
     * Отсортировать по приоритету
     */
    public function orderByPriority(): self
    {
        return $this
            ->orderBy(['priority' => SORT_DESC]);
    }

    /**
     * Отсортировать по дате добавления
     */
    public function orderByCreateAt(): self
    {
        return $this
            ->orderBy(['created_at' => SORT_DESC]);
    }
}
