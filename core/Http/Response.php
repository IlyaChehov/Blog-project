<?php

namespace Core\Http;

class Response
{
    public function redirect(string $path): void
    {
        header("Location:{$path}");
        die();
    }
}