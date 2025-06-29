<?php

namespace Core\Http;

class Router
{
    private array $routes = [];
    private array $params = [];

    public function __construct(private Request $request, private Response $response)
    {
    }

    private function addRoute(string $path, array|callable $action, string $method): self
    {
        $path = trim($path, '/');
        $this->routes[] = [
            'path' => "/{$path}",
            'action' => $action,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get(string $path, array|callable $action): self
    {
        return $this->addRoute($path, $action, 'GET');
    }

    public function post(string $path, array|callable $action): self
    {
        return $this->addRoute($path, $action, 'POST');
    }

    private function math(): array|false
    {
        $path = $this->request->getPath();
        foreach ($this->routes as $route) {
            $pattern = "%^{$route['path']}$%";
            if (
                preg_match($pattern, $path, $matches)
                &&
                $route['method'] === $this->request->getMethod()
            ) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $this->params[$k] = $v;
                    }
                }
                return $route;
            }
        }

        return false;
    }

    public function dispatch()
    {
        $route = $this->math();
        if ($route === false) {
            return '404 - page not found';
        }

        if (is_array($route['action'])) {
            $route['action'][0] = new $route['action'][0];
        }

        return call_user_func($route['action'], $this->getParams());
    }

    public function getParams(): array
    {
        return $this->params;
    }
}