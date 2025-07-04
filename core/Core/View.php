<?php

namespace Core\Core;

class View
{
    private string $content;
    private string $layout;
    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }

    public function render(string $content, array $data = [], string $layout = null): void
    {
        extract($data);
        $pathToContent = DIR_VIEW . "/{$content}.php";
        if (!file_exists($pathToContent)) {
            throw new \Exception("File content not found: {$pathToContent}");
        }
        ob_start();
        require $pathToContent;
        $this->content = ob_get_clean();

        $layout = $layout ?? $this->layout;
        $pathToLayout = DIR_VIEW . "/layouts/{$layout}.php";
        if (!file_exists($pathToLayout)) {
            throw new \Exception("File layout not found: {$pathToLayout}");
        }

        require_once $pathToLayout;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function renderPartial(string $content, array $data): void
    {
        extract($data);
        $pathToContent = DIR_VIEW . "/{$content}.php";
        require $pathToContent;
    }
}