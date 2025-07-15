<?php

namespace Core\Http;

class Request
{
    private string $uri;

    public function __construct(string $uri)
    {
        $uri = trim($uri, '/');
        $this->uri = urldecode($uri);
    }

    public function getPath(): string
    {
        if (!$this->uri) {
            return '/';
        }

        $path = explode('?', $this->uri)[0];
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

    public function getData(array $fields = []): array
    {
        $data = $this->isPost() ? $_POST : $_GET;
        $data = array_map(fn($el) => trim($el), $data);
        if (empty($fields)) {
            return $data;
        }

        return array_reduce($fields, function ($acc, $field) use ($data) {
            $acc[$field] = $data[$field] ?? '';
            return $acc;
        }, []);
    }
}