<?php

use Core\Core\Application;

require_once '../vendor/autoload.php';

$container = require_once '../app/bootstrap.php';
$app = new Application($container);
$app->start();