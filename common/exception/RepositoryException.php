<?php

declare(strict_types=1);

namespace common\modules\exceptions;

use Throwable;

class RepositoryException extends ApplicationException
{
    public function __construct(string $message, Throwable $previous = null, int $code = 0)
    {
        parent::__construct($message, $previous, $code = 0);
    }
}
