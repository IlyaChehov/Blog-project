<?php

namespace Core\Http;

class Request
{
    private string $uri;

    public function __construct(string $uri = null)
    {
        $uri = $uri ?? $_SERVER['REQUEST_URI'];
        $uri = urldecode($uri);
        $this->uri = $uri;
    }

    public function getPath(): string
    {
        $path = parse_url($this->uri, PHP_URL_PATH) ?? '/';
        $path = trim($path, '/');
        return "/{$path}";
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'GET';
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    public function getData(array $fields = null): array
    {
        $data = $this->isPost() ? $_POST : $_GET;
        if (!empty($fields)) {
            $data = array_reduce($fields, function ($acc, $el) use ($data) {
                $acc[$el] = $data[$el] ?? '';
                return $acc;
            }, []);
        }

        return array_map(fn($el) => trim($el), $data);
    }
}