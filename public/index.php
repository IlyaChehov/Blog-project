<?php

use Core\Core\Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = require_once '../app/bootstrap.php';
$app = new Application($container);
try {
    $app->start();
} catch (Exception $e) {
    die($e->getMessage());
}
