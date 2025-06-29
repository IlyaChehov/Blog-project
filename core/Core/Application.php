<?php

namespace Core\Core;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;

class Application
{
    private Request $request;
    private Response $response;
    private Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(): void
    {
        echo $this->router->dispatch();
    }

    public function getRouter(): Router
    {
        return $this->router;
    }
}