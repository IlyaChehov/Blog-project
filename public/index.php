<?php

require_once '../vendor/autoload.php';

$req = new \Core\Http\Request($_SERVER['REQUEST_URI']);
$res = new \Core\Http\Response();

$r = new \Core\Http\Router($req, $res);
$routes = require_once '../config/routes.php';
$routes($r);
echo $r->dispatch();