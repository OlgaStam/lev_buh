<?php

declare(strict_types=1);

namespace common\modules\exceptions;

use Exception;
use Throwable;

/**
 * Корневое исключение для приложения
 *
 * Унаследовав своё исключение от данного исключения, мы даем понять, что это ошибка именно логики приложения,
 * что в свою очередь, даёт возможность удобно перехватывать ошибки приложения,
 * которые мы выбрасываем при нарушении бизнес логики приложения
 */
class ApplicationException extends Exception
{
    public function __construct(
        string $message = "",
        Throwable $previous = null,
        int $code = 0
    ) {
        parent::__construct($message, $code, $previous);
    }
}
