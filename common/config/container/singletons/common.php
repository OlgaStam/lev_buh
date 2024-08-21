<?php

declare(strict_types=1);

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use yii\web\User;

return [
    EventDispatcherInterface::class => EventDispatcher::class,
    User::class => User::class,
];
