<?php

namespace Core\Core;

use Core\Http\Router;
use Core\ServiceContainer\ServiceContainer;

class Application
{
    private ServiceContainer $container;
    public function __construct(ServiceContainer $container)
    {
        $this->container = $container;
        $this->registerRoutes();
    }

    /**
     * @throws \Exception
     */
    public function start(): void
    {
        echo $this->container->getServices(Router::class)->dispatch();
    }

    private function registerRoutes()
    {
        $router = $this->container->getServices(Router::class);
        $routes = require_once DIR_CONFIG . '/routes.php';
        $routes($router);
    }
}