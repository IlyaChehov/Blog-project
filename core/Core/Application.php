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
    }

    /**
     * @throws \Exception
     */
    public function start(): void
    {
        $this->container->getServices(Router::class)->dispatch();
    }
}