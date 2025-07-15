<?php

return function(\Core\Http\Router $router) {
    $router->get('/', [\App\Controllers\TestController::class, 'index']);
    $router->get('/about', []);
    $router->get('/post/(?P<slug>[0-9]+)', [\App\Controllers\TestController::class, 'index2']);
};