<?php

return function (\Core\Http\Router $router) {
    $router->get('/', function () {
        return 'main';
    });
    $router->get('/about', function () {
        return 'about';
    });
    $router->get('/posts/(?P<slug>[a-z0-9-]+)', function ($params) {
        extract($params);
        return "posts:{$slug}";
    });
};