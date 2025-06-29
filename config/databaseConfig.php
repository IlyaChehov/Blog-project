<?php

return [
    'DB_HOST' => 'MariaDB-11.7',
    'DB_NAME' => 'blog-project',
    'DB_USER' => 'root',
    'DB_PASSWORD' => '',
    'CHARSET' => 'utf8mb4',
    'OPTIONS' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
];