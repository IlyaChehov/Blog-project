<?php

return function (\Core\Http\Router $router) {
    $router->get('/', [\App\Controllers\HomeController::class, 'index']);
    $router->get('/register', [\App\Controllers\UserController::class, 'register']);

    $router->post('/register', [\App\Controllers\UserController::class, 'store']);
};