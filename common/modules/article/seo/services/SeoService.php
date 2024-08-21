<?php

declare(strict_types=1);

namespace common\modules\article\seo\services;

use common\modules\article\seo\models\Article;
use common\modules\article\seo\repositories\interfaces\SeoRepositoryInterface;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\web\Request;

final class SeoService implements interfaces\SeoServiceInterface
{
    private SeoRepositoryInterface $seoRepository;

    public function __construct(SeoRepositoryInterface $seoRepository)
    {
        $this->seoRepository = $seoRepository;
    }

    /** @ineritdoc */
    public function getDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $this->seoRepository->getProviderQuery(),

            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => false,
        ]);
    }

    /** @ineritdoc */
    public function findOrCreate(?int $id = null): ?Article
    {
        return $id === null ? new Article() : $this->seoRepository->findById($id);
    }

    /** @ineritdoc */
    public function createOrUpdate(Request $request, ?int $id = null): Article
    {
        $article = empty($id)
            ? new Article(['scenario' => Article::CREATE_SCENARIO])
            : $this->seoRepository->findById($id);

        $article->attributes = $request->post('Article');
        $article->created_at = (new \DateTimeImmutable())->format('Y-m-d h:i:s');

        if ($article->validate()) {
            $this->seoRepository->save($article);
        }

        return $article;
    }

    /** @ineritdoc */
    public function remove(int $id): void
    {
        $article = $this->findOrCreate($id);

        if ($article->image_path !== $article->noImagePath) {
            $path = $article->fullPathToImageDir . $article->image_path;

            if (file_exists($path)) {
                FileHelper::unlink($path);
            }
        }

        $this->seoRepository->remove($article);
    }

    /** @ineritdoc */
    public function findBySlug(string $slug): ?Article
    {
        return $this->seoRepository->findBySlug($slug);
    }

    /** @ineritdoc */
    public function findArticles(int $limit): array
    {
        return $this->seoRepository->findArticles($limit);
    }
}
