<?php

declare(strict_types=1);

namespace common\modules\article\seo\services\interfaces;

use common\modules\article\seo\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Request;

interface SeoServiceInterface
{
    /** Получение провайдера данных */
    public function getDataProvider(): ActiveDataProvider;

    /** Поиск или создание новой статьи */
    public function findOrCreate(?int $id = null): ?Article;

    /**
     * Обновление или создание новой статьи
     */
    public function createOrUpdate(Request $request, ?int $id = null): Article;

    /** Удаление статьи */
    public function remove(int $id): void;

    /** Поиск статьи по slug */
    public function findBySlug(string $slug): ?Article;

    /**
     * Получение списка статей
     * @param int $limit Ограничение списка
     */
    public function findArticles(int $limit): array;
}
