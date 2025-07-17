<?php

namespace Core\Core;

class View
{
    private string $layout;
    private string $content;
    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }

    public function render(string $content, array $data = [], string $layout = null)
    {
        extract($data);
        $content = trim($content, '/');
        $pathToContent = DIR_VIEWS . "/{$content}.php";
        if (!file_exists($pathToContent)) {
            throw new \Exception("Not found content: {$pathToContent}");
        }
        ob_start();
        require_once $pathToContent;
        $this->content = ob_get_clean();
        $layout = $layout ?? $this->layout;
        $layout = trim($layout, '/');
        $pathToLayout = DIR_LAYOUT . "/{$layout}.php";
        if (!file_exists($pathToLayout)) {
            throw new \Exception("Not Found layout: {$pathToLayout}");
        }
        ob_start();
        require_once $pathToLayout;
        return ob_get_clean();
    }

    public function getContent(): string
    {
        return $this->content;
    }
}