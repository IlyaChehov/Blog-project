<?php

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;
use Core\ServiceContainer\ServiceContainer;

$container = new ServiceContainer();
$container->bindSingleton(Request::class, fn() => new Request($_SERVER['REQUEST_URI']));
$container->bindSingleton(Response::class, fn() => new Response());
$container->bindSingleton(Router::class, function () use ($container) {
    return new Router(
        $container->getServices(Request::class),
        $container->getServices(Response::class)
    );
});

ServiceContainer::setContainer($container);

return $container;