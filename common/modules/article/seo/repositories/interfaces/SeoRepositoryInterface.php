<?php

declare(strict_types=1);

namespace common\modules\article\seo\repositories\interfaces;

use common\modules\article\seo\models\Article;
use yii\db\ActiveQuery;

interface SeoRepositoryInterface
{
    /** Получение подготовленного запроса для провайдера */
    public function getProviderQuery(): ActiveQuery;

    /** Поиск статьи по идентификатору */
    public function findById(int $id): ?Article;

    /** Сохранение статьи */
    public function save(Article $article): void;

    /** Удаление статьи */
    public function remove(Article $article): void;

    /** Поиск статьи по slug */
    public function findBySlug(string $slug): ?Article;

    /**
     * Получение списка статей
     * @param ?int $limit Ограничение списка
     */
    public function findArticles(int $limit): array;
}
