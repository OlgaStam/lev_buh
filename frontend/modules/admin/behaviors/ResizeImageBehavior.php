<?php

declare(strict_types=1);

namespace frontend\modules\admin\behaviors;

use yii\base\Behavior;
use yii\db\BaseActiveRecord;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * Сохраняет изображение и сжимает его до нужных размеров
 */
final class ResizeImageBehavior extends Behavior
{
    /**
     * Максимальная ширина до которой будут обрезаться изображения
     */
    const MAX_IMAGE_WIDTH = 1200;

    /**
     * Максимальная высота до которой будут обрезаться изображения
     */
    const MAX_IMAGE_HEIGHT = 1200;

    /**
     * Поле овнера в котором должен быть UploadedFile
     *
     * @var string
     */
    public $uploadedFileField;

    /**
     * Поле овнера в котором сохраняется путь к картинке
     *
     * @var string
     */
    public $pathToImageField;

    /**
     * Абсолютный путь к директории для сохранения изображений
     *
     * @var string
     */
    public $imagesDir;

    public function events()
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
        ];
    }

    public function beforeSave($event)
    {
        /** @var UploadedFile $imageFile */
        $imageFile = $this->owner->{$this->uploadedFileField};
        if (is_null($imageFile)) {
            return;
        }

        $oldImage = $this->owner->{$this->pathToImageField};

        $this->owner->{$this->pathToImageField} = $this->createPath($imageFile->extension);

        if ($imageFile->saveAs($this->imagesDir . $this->owner->{$this->pathToImageField})) {
            $this->resizeImage($this->owner->{$this->pathToImageField});
            $this->deleteImage($oldImage);
        }
    }

    /**
     * Подбирает свободное имя файла в текущей папке
     *
     * @param string $extension
     *
     * @return string
     *
     * @throws \yii\base\Exception
     */
    private function createPath(string $extension): string
    {
        $subDir = $this->createFolderIfNotExists();

        do {
            $path = $subDir . strtotime('now') . '.' . $extension;
        } while (file_exists($this->imagesDir . $path));

        return $path;
    }

    /**
     * Создаёт (если её ещё нет) директорию с сегодняшней датой в директории для сохранения изображений
     *
     * @return string относительный путь к сегодняшней директории
     *
     * @throws \yii\base\Exception
     */
    private function createFolderIfNotExists(): string
    {
        $subDir = date('Y-m-d') . DIRECTORY_SEPARATOR;
        if (!file_exists($this->imagesDir . $subDir)) {
            FileHelper::createDirectory($this->imagesDir . $subDir);
        }

        return $subDir;
    }

    /**
     * Сжимает изображение до cropSize если оно его превышает
     *
     * @param string $path
     *
     * @return void
     */
    private function resizeImage(string $path)
    {
        $path = $this->imagesDir . $path;
        list($width, $height) = getimagesize($path);
        if ($width > self::MAX_IMAGE_WIDTH || $height > self::MAX_IMAGE_HEIGHT) {
            Image::resize($path, self::MAX_IMAGE_WIDTH, self::MAX_IMAGE_HEIGHT, true)
                ->save($path, ['quality' => 95]);
        }
    }

    /**
     * Удаляет файл
     *
     * @param string|null $path
     *
     * @return void
     */
    private function deleteImage($path)
    {
        if ($path && is_file($this->imagesDir . $path)) {
            FileHelper::unlink($this->imagesDir . $path);
        }
    }
}
