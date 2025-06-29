<?php

return function (\Core\Http\Router $router) {
    $router->get('/', [\App\Controllers\HomeController::class, 'index']);
};