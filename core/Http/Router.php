<?php

namespace Core\Http;

class Router
{
    private array $routes = [];
    private array $params = [];

    public function __construct(
        private Request $request,
        private Response $response
    ) {
    }

    private function addRoute(string $path, array $action, string $method): self
    {
        $path = trim($path, '/');
        $this->routes[] = [
            'path' => "/{$path}",
            'action' => $action,
            'method' => $method
        ];
        return $this;
    }

    public function get(string $path, array $action): self
    {
        return $this->addRoute($path, $action, 'GET');
    }

    public function post(string $path, array $action): self
    {
        return $this->addRoute($path, $action, 'POST');
    }

    private function match(): array|false
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        foreach ($this->routes as $route) {
            $pattern = "%^{$route['path']}$%";
            if (
                preg_match($pattern, $path, $matches)
                &&
                $route['method'] === $method
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

    public function dispatch(): string
    {
        $route = $this->match();
        if ($route === false) {
             echo '404 page not found';
             die;
        }

        if (!class_exists($route['action'][0])) {
            throw new \Exception("Not found class: {$route['action'][0]}");
        }

        if (!method_exists($route['action'][0], $route['action'][1])) {
            throw new \Exception("Not found method: {$route['action'][0]} => {$route['action'][1]}");
        }

        $route['action'][0] = new $route['action'][0];
        return call_user_func($route['action'], $this->params);
    }
}