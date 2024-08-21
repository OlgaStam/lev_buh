<?php

declare(strict_types=1);

use yii\db\Connection;
use \yii\log\FileTarget;

const DB_HOST = '';
const DB_PORT = '5432';
const DB_NAME = '';
const DB_USER = '';
const DB_PASS = '';

const QUEUE_HOST = 'rabbit';
const QUEUE_PORT = '5672';
const QUEUE_USER = 'user';
const QUEUE_PASS = 'user';

const DB_CONNECTION_CLASS = Connection::class;

const API_COOKIE_VALIDATION_KEY = 'mySuperSecretKey';

const JWT_LIFETIME_ACCESS = 3600 * 24;
const JWT_LIFETIME_REFRESH = 3600 * 24 * 30;
const JWT_ISSUED_BY = 'site';
const JWT_PERMITTED_FOR = 'phone';
const JWT_IDENTIFIED_BY_ACCESS = 'secret access';
const JWT_IDENTIFIED_BY_REFRESH = 'secret refresh';

const COMMON_DB_ENABLE_SCHEMA_CACHE = false;
const COMMON_DB_SCHEMA_CACHE_DURATION = 3600;

const COMMON_FILE_BASE_IMAGE_DIR = '/srv/storage/private';
const COMMON_FILE_BASE_IMAGE_URI = 'private';
const COMMON_FILE_BASE_CONSENTS_DIR = '/srv/storage/private';
const COMMON_FILE_BASE_CONSENTS_URI = 'private';

define("CONSOLE_LOG_TARGETS", [
    [
        'class' => FileTarget::class,
        'levels' => ['error', 'warning'],
    ],
    [
        'class' => FileTarget::class,
        'categories' => ['notifier'],
        'logVars' => [],
        'logFile' => '@app/runtime/logs/notifier.log',
    ],
]);
