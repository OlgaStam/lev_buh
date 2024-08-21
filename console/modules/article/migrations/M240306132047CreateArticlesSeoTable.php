<?php

declare(strict_types=1);

namespace console\modules\article\migrations;

use yii\db\Migration;

/**
 * Создание таблицы статей для SEO-оптимизации
 * @link https://youtrack.dengigroup.kz/issue/SCPL-1493/Realizovat-redaktor-statej-Article-dlya-SEO-optimizacii-na-sajte
 */
final class M240306132047CreateArticlesSeoTable extends Migration
{
    private const TABLE_NAME = '{{%articles_seo}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'header' => $this->string()->notNull()
                ->comment('Заголовок (H1) статьи'),
            'title' => $this->string()->notNull()
                ->comment('Заголовок для SEO оптимизации, информация пойдет в тег title'),
            'slug' => $this->string()->unique()->notNull()
                ->comment('Автоматически генерируется исходя раздела, даты публикации и названия статьи'),
            'description' => $this->string()->notNull()
                ->comment('Короткое описание для SEO, информация пойдет в тег description'),
            'keywords' => $this->string()->notNull()
                ->comment('Ключевые слова, разделяются запятой и пробелом'),
            'image_path' => $this->string()->notNull()
                ->comment('Путь к файлу с изображением статьи'),
            'image_alt' => $this->string()->notNull()
                ->comment('Описание изображения статьи для поисковых систем, информация пойдет в атрибут alt'),
            'content' => $this->text()->notNull()->comment('Содержимое статьи'),
            'created_at' => $this->timestamp()->comment('Момент создания записи'),
            'updated_at' => $this->timestamp()->comment('Момент обновления записи'),
        ]);

        $this->addCommentOnTable(self::TABLE_NAME, 'Таблица статей для CEO-оптимизации на сайте');
    }

    /**
     * {@inheritdoc}
     */
    public function down(): void
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
