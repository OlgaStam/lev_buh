<?php

declare(strict_types=1);

use common\modules\article\seo\repositories\interfaces\SeoRepositoryInterface;
use common\modules\article\seo\repositories\SeoDBRepository;
use common\modules\article\seo\services\interfaces\SeoServiceInterface;
use common\modules\article\seo\services\SeoService;

return [
    SeoServiceInterface::class => SeoService::class,
    SeoRepositoryInterface::class => SeoDbRepository::class,
];
