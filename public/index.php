<?php

require_once '../vendor/autoload.php';

$app = new \Core\Core\Application();
$routes = require_once '../config/routes.php';
$routes($app->getRouter());
$app->run();